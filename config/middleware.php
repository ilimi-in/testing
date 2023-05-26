<?php

use MongoDB\Client as Mongo;

$container = $app->getContainer();


// Check the user is logged in when necessary. 
$loggedInMiddleware = function ($request, $response, $next) {

    $route = $request->getAttribute('route');
    $routePath = $request->getUri()->getPath();

    if (!empty($route)) {
        $routeName = $route->getName();
    } else {
        $routeName = '';
    }

    $languageArray = array('en','fr','de','pt');
    if(isset($route) && !empty($route->getArgument('lang'))){
        $requestedLanguage = explode('/', $route->getArgument('lang'))[0];
    }
    if (!empty($route) && strpos($route->getPattern(), 'manager') > 0 && strpos($route->getPattern(), 'api') <= 0) {

    } 
    else if (empty($route) || (!empty($route) && strpos($route->getPattern(), 'api') <= 0)) {
        $publicRoutesArray = array(
            'login',
            'loginSecondary',
            'signin',
            'signinSecondary',
            'forgotPassword',
            'resetPassword',
            'forgotPasswordSubmit',
            'resetPasswordSubmit',
            'loginApi',
            'forgotPasswordSubmit',
            'ssoLogin',
            'testSSO',
            'privacyPolicy',
            'goalList',
            'initiativeList',
            'userList',
            'getGoals',
            'getInitiative',
            'getTasks',
            'getNotifications',
            'getSurveyData',
            'waitListCron',
            'mantisCreateUserCron',
            'mantisProjectCreateCron',
            'getModules',
            'moduleList',
            'sendUserDetails',
            'approvedInternalNotification',
            'approvedInternalAutoCancel',
            'getMasterData',
            'reminderMail',
            'downloadBulkFile',
            'thanksLogin',
            'thankyouLogin',
            'thanksForSubmission',
            'getFilelist',
            'createIMUser',
            'showError',
            'checkSessionExpire',
            'cxpCronRequest',
            'cxpCronRequestAfter',
            'sendEmailNotification',
            'downloadRequestTaskList',
            'downloadExcelFileMonth',
            'ProedgeLoginSubmit',
            'defaultRoute',
            'getPathway',
            'getLo'
            
        );

        $session = new \SlimSession\Helper;

        date_default_timezone_set('UTC');
        // check user login exceed time
        if(isset($session->user['login_expire']) && $session->user['login_expire'] <= time()){
            unset($session->user);
            unset($session->request_filter);
            //For delete cookie value on logout
            unset($_COOKIE['PHPSESSID']);
            setcookie('PHPSESSID', '', time() - 3600, '/');
        }
        
        if(isset($requestedLanguage)) {
            if (in_array($requestedLanguage, $languageArray)) {
                $request = $request->withAttribute('language', $requestedLanguage);
            }
        }
        if (!isset($session->user['user_id']) && !in_array($routeName, $publicRoutesArray)) {
            if ($request->isXhr()) {
                if (in_array($routePath, $publicRoutesArray)) {
                    return $response;
                }
                return $response->withStatus(401);
            } else {
                $url = $this->router->pathFor('login', ['lang'=>'en']);
                return $response->withRedirect($url);
            }
        } 
        else if (isset($session->user['user_id']) && $routeName == '') {
            $url = $this->router->pathFor('taskList', ['lang'=>'en']);          
            return $response->withRedirect($url);

        } 
        else {
            $response = $next($request, $response);
        }

        return $response;
    }
    else {
        return $response = $next($request, $response);
    }
    
};
$app->add($loggedInMiddleware);

// -----------------------------------------------------------------------------
// JWT Authentication
// -----------------------------------------------------------------------------
$container['JwtAuthentication'] = function ($c) {
    $settings = $c->get('settings');
    return new Tuupola\Middleware\JwtAuthentication([
        'path' => $settings['jwt']['path'],
        'ignore' => $settings['jwt']['ignore'],
        'secret' => $settings['jwt']['secret'],
        'logger' => $c['logger'],
        'algorithm' => $settings['jwt']['algorithm'],
        'relaxed' => $settings['jwt']['relaxed'],
        'attribute' => false,
        'error' => function ($response, $arguments) use ($c) {
            return $c->get('App\Controller\ErrorController')->E401(null, $response, $arguments);
        },
        'before' => function ($request, $arguments) use ($c) {
            $c['token']->populate($arguments['decoded']);
        },
        'after' => function ($response, $arguments) use ($c) {
            return $c->get('auth')->precheck($response, $arguments);
        }
    ]);
};
$container["token"] = function ($container) {
    return new \App\Lib\Token;
};
$container['auth'] = function($c) {
    return new \App\Lib\JwtAuth($c);
};

$app->add('JwtAuthentication');

