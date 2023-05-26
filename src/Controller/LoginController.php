<?php
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Firebase\JWT\JWT;
use App\Models\User;
use App\Models\TimezoneMaster;
use App\Models\BusinessUnit;
use App\Models\Organization;
use App\Models\Role;
use App\Models\Session;


class LoginController extends BaseController
{

	public function index(Request $request, Response $response, $args)
    {
        $messages = $this->flash->getMessages();
        $requestData = $request->getQueryParams();

    	$this->view->render($response, 'Login/pwc_login.twig', ['messages' => $messages, 'lang'=>$request->getAttribute('lang'),'routeName'=>$request->getAttribute('route')->getName(), 'get' => $_GET]);
        return $response;

    }

    public function defaultRoute(Request $request, Response $response, $args){

        $url = $this->router->pathFor('login', ['lang'=>'en']);
        return $response->withRedirect($url);
    }

    public function ProedgeLoginSubmit(Request $request, Response $response, $args)
    {
        $session = new \SlimSession\Helper;
        if (empty($request->getParam('username')) || empty($request->getParam('password'))) {
            $this->flash->addMessage('error', 'Enter username and password.');
            $url = $this->router->pathFor('login', ['lang'=>$args['lang']]);
            return $response->withRedirect($url);
        }

        $user = User::with('timezoneMaster', 'businessUnit')->where('username', '=', $request->getParam('username'))->where('is_active', '=', ACTIVE)->first();
        
        
        if(!empty($user)) {
            $password = $user->password;

        }
        else {
            // $this->flash->addMessage('error', 'User is inactive.');
            $this->flash->addMessage('error', 'Invalid credentials! Try again.');
            $url = $this->router->pathFor('login', ['lang'=>$args['lang']]);
            return $response->withRedirect($url);
        }

        
        $messages = $this->flash->getMessages();
        if ((LoginController::passwordDecryption($password) === $request->getParam('password')) && ($user['org_id'] == PROEDGE)) {

            if (isset($user['org_id'])) {
                $organization = Organization::where('org_id', '=', $user['org_id'])->first();
            }
        
            $role = Role::where('org_id', '=', PROEDGE)->pluck('name', 'role_id');
            $roleConstant = Role::where('org_id', '=', PROEDGE)->pluck('role_id','constant_name')->toArray();
            $roleConstantArr = array_flip($roleConstant);
            $data['user_id'] = $user['id'];
            $data['roleConstant'] = $roleConstant;
            $data['email'] = $user['email'];
            $data['first_name'] = $user['first_name'];
            $data['last_name'] = $user['last_name'];
            $data['username'] = $user['username'];
            $data['role_id'] = $user['role_id'];
            $data['role_constant'] = !empty($roleConstantArr[$user['role_id']]) ? $roleConstantArr[$user['role_id']] : '';
            $data['company_id'] = !empty($user["company_id"])?$user["company_id"]:'';
            $data['role'] = isset($role[$user['role_id']]) ? $role[$user['role_id']] : '';
            $data['org_id'] = $user['org_id'];
            $data['bemsid'] = $user['wwid'];
            $data['manager_bemsid'] = $user['manager_bemsid'];
            $data['is_processmaker'] = @$user['is_processmaker'];
            $data['is_mantis_user'] = @$user['is_mantis_user'];
            $data['instructor_access'] = $user['instructor_access'];
            $data['timezone'] = $user['timezone_id'];
            $data['contact_no'] = isset($user['contact_no']) ? $user['contact_no'] : '';
            $data['allowed_home_banner'] = isset($user['allowed_home_banner']) ? $user['allowed_home_banner'] : '';
            $data['timezoneName'] = timezone_name_from_abbr('', $user['timezone']['offset_seconds'], 0);
            $data['timezoneOffset'] = $user['timezone']['offset_seconds'];
            $data['site_title'] = isset($organization->title) ? $organization->title : 'Pathway';
            $data['site_logo'] = isset($organization->logo_path) ? $organization->logo_path . '.svg' : 'logo.svg'; 
            $data['site_email'] = isset($organization->title) ? strtolower(str_replace(' ', '-', $organization->title)) : 'NIIT';
            $data['site_logo_mobile'] = isset($organization->logo_path) ? $organization->logo_path . '_mobile.svg' : 'NIIT_logo.svg';
            $data['signature'] = isset($organization->e_signature_applicable) ? $organization->e_signature_applicable : '0';
            $timezone = timezone_name_from_abbr('', $user['timezone']['offset_seconds'], 0);
            $data['login_expire'] = time()+36000;
            
            //date_default_timezone_set("$timezone");
          
            $menuData = $this->GetMediaType($user['org_id']);
            foreach ($menuData as $value) {
                unset($value['_id']);
                $men_getter[] = json_decode(json_encode($value), true);
            }
            
            
            $data['mainmenu'] = $men_getter;
            $session->user = $data;
            $checkUser = Session::where(['user_id' => $user['id']])->first();

            User::where('id', $user['id'])->update(['last_login' => date("Y-m-d H:i:s")]);
            
            if (!empty($checkUser)) {
                Session::where(['user_id' => $user['id']])->update(['is_login' => "1", 'login_time' => time(), 'logout_time' => '']);
            } else {
                $SessionData = [
                    'user_id' => $user['id'],
                    'is_login' => '1',
                    'login_time' => time(),
                ];

                Session::create($SessionData);
            }
             $userData = $session->user;
            if (!empty($userData)) {
                $time = time();
                $exptime = $time + TOKEN_VALIDITY_24_HOUR;
                $tokenArr = array(
                    "email" => $user['email'],
                    "First_name" => $user['first_name'],
                    "Last_Name" => $user['last_name'],
                    "person_number" =>  $user['person_number'],
                    "iat" => $time,
                    "iss" => 'NIIT',
                    "exp" => $exptime
                );

                $token = JWT::encode($tokenArr,$this->settings['jwt']['pwcsecret'],'HS256');
                 // Session::create($token);
                $_SESSION['token'] = $token;
            }

            // send click stream data
            $clickStrim = array();
            $clickStrim['ev'] = 'Login';
            $clickStrim['mo'] = 'success';
            $clickStrim['oid'] = PROEDGE;
            $clickStrim['un'] = $request->getParam('username');
            $clickStrim["key"] = "Click";
            $clickStrim["ev_1"] = "PROEDGE Login";
            $clickStrim["tp"] = "PROEDGE Login Success";
            $clickStrim['cid'] = HTTP_SERVER;
            
            
            $this->setClickStream('proedgeLogin',$clickStrim);
            if(isset($_SERVER["HTTP_REFERER"]) && strstr($_SERVER["HTTP_REFERER"],'rurl') ){
                $queryparams=(parse_url($_SERVER["HTTP_REFERER"],PHP_URL_QUERY));
                parse_str($queryparams, $query);
                if(isset($query['rurl']) && $query['rurl']!=''){
                    $rurl=urldecode($query['rurl']);
                    return $response->withRedirect($rurl);
                }else{
                    $url = $this->router->pathFor('taskList', ['lang'=>$args['lang']]);
                }
            }else{
                $url = $this->router->pathFor('taskList', ['lang'=>$args['lang']]);
            }
            $url = $this->router->pathFor('taskList', ['lang'=>$args['lang']]);
            
            return $response->withRedirect($url);
        } else {

            $url = $this->router->pathFor('login', ['lang'=>$args['lang']]);
            
            // send click stream data
            $clickStrim = array();
            $clickStrim['ev'] = 'Login';
            $clickStrim['mo'] = 'failed';
            $clickStrim['oid'] = PROEDGE;
            $clickStrim['un'] = $request->getParam('username');
            $clickStrim["key"] = "Click";
            $clickStrim["ev_1"] = "PROEDGE Login";
            $clickStrim["tp"] = "PROEDGE Login Failed";
            $clickStrim['cid'] = HTTP_SERVER;
            
            $this->setClickStream('proedgeLogin',$clickStrim);
            return $response->withRedirect($url);
        }
    }

    public function passwordDecryption($string)
    {
        $data = decriptString($string);
        return $data;
    }

    public function GetMediaType($orgId)
    {
        
        $collection = $this->MongoDB->media_type;
        $options = ['sort' => ['weight' => 1]];
        $cursor = $collection->find(array('org_id' => (string) $orgId, 'is_active' => ACTIVE), $options);
        $data = array();
        foreach ($cursor as $document) {
            $data[] = (array) $document;
        }
        return $data;
    }

    public function setClickStream($page,$input)
    {
        $clickstream_url = PROEDGE_CLICKSTREAM_URL;
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP')){
            $ipaddress = getenv('HTTP_CLIENT_IP');
        }else if(getenv('HTTP_X_FORWARDED_FOR')){
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        }else if(getenv('HTTP_X_FORWARDED')){
            $ipaddress = getenv('HTTP_X_FORWARDED');
        }else if(getenv('HTTP_FORWARDED_FOR')){
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        }else if(getenv('HTTP_FORWARDED')){
           $ipaddress = getenv('HTTP_FORWARDED');
        }else if(getenv('REMOTE_ADDR')){
            $ipaddress = getenv('REMOTE_ADDR');
        }else{
            $ipaddress = 'UNKNOWN';
        }
        
        $data = array();
        $data['e'] = $page;
        $data['kv']= $input;
        
        $data_string = json_encode($data);
        $ch = curl_init($clickstream_url.'?data='.urlencode($data_string));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, HTTP_SERVER);
        $result = curl_exec($ch);
        
        $error_msg = '';
        if (curl_error($ch)) {
            $error_msg = curl_error($ch);
            $error_msg = "CURL Error: ".$error_msg;
        }
      // echo $result; die;
    }

    public function logout(Request $request, Response $response, $args)
    {
        $session = $this->getSessionHelper();
        Session::where(['user_id' => $session->user['user_id']])->update(['is_login' => "0", 'logout_time' => time(), 'popup' => 0]);
        
        unset($session->user);
        unset($session->request_filter);
        //For delete cookie value on logout
        unset($_COOKIE['PHPSESSID']);
        setcookie('PHPSESSID', '', time() - 3600, '/');
        $url = $this->router->pathFor('thanksLogin', ['lang'=>$args['lang']]);
        return $response->withRedirect($url);
    }

    public function getSessionHelper()
    {
        $session = new \SlimSession\Helper;
        return $session;
    }

    public function thanksLogin(Request $request, Response $response, $args)
    {   
        return $this->view->render($response, 'Org_1/Home/thanks_login.twig', ['lang' => $request->getAttribute('lang')]);
    }

}
?>