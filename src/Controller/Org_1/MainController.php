<?php

namespace App\Controller\Org_1;

use Slim\Views\Twig as View;
use Slim\Router as Router;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Controller\BaseController;
use Firebase\JWT\JWT;
use App\Models\Pathway;
use App\Models\FieldMaster;
use App\Models\FormType;
use App\Models\PathwayContent;
use App\Models\Skill;
use App\Models\CustomFilterMapping;
use App\Models\CustomFilterLo;
use App\Models\Organization;


class MainController extends BaseController
{

	// function for the dashboard page
    public function index(Request $request, Response $response, $args)
    {
       
    }

    public function taskList(Request $request, Response $response, $args)
    {
        $session = MainController::getSessionHelper();
        $language = $request->getAttribute('lang');
        $routeLang = $this->getRouteName($language);
        $messages = $this->flash->getMessages();
        $PATHWAY_TYPE = unserialize(PATHWAY_TYPE);
        
        $pathwayListData = Pathway::where('is_published', '=', 0)->where('is_delete', '=', '0')->get(); 
      
        if(!empty($pathwayListData)) {
            $pathwayListData = $pathwayListData->toArray();
            foreach ($pathwayListData as $pKey => $pValue) {
                $pathwayListData[$pKey]['id'] = encriptString($pValue['id']);   
                $pathwayListData[$pKey]['pathway_type'] =  $PATHWAY_TYPE[$pValue['pathway_type']];                              
            }
        }

        $pathwayListDataPub = Pathway::where('is_published', '=', 1)->where('is_delete', '=', '0')->get();     
      
        if(!empty($pathwayListDataPub)) {
            $pathwayListDataPub = $pathwayListDataPub->toArray();
            foreach ($pathwayListDataPub as $pKey1 => $pValue1) {
                $pathwayListDataPub[$pKey1]['id'] = encriptString($pValue1['id']);
                $pathwayListDataPub[$pKey1]['pathway_type'] =  $PATHWAY_TYPE[$pValue1['pathway_type']];                                   
            }
        }
        
        
        $levelData = FieldMaster::where('is_active', '=', 1)->where('org_id', '=', 1)->where('type', '=', 'level')->get();
        if(!empty($levelData)) {
            $levelData = $levelData->toArray();
        }       
        $availabilityData = FieldMaster::where('is_active', '=', 1)->where('org_id', '=', 1)->where('type', '=', 'availability')->get();
        if(!empty($availabilityData)) {
            $availabilityData = $availabilityData->toArray();
        }       
        $pathwayTypeData = FieldMaster::where('is_active', '=', 1)->where('org_id', '=', 1)->where('type', '=', 'type')->get();
        if(!empty($pathwayTypeData)) {
            $pathwayTypeData = $pathwayTypeData->toArray();
        }
		$duration = ['15-min' => '< 15 mins', '15-1hr' => '15 mins to 1 hour', '1-3hr' => '1 - 3 hours', '3-5hr' => '3 - 5 hours', '5-10hr' => '5 - 10 hours', '10-plushr' =>'10+ hours'];
		//echo '<pre>'; print_r($pathwayTypeData);exit;
        return $this->view->render($response, 'Org_1/Home/task_list.twig', ['pathwayList' => $pathwayListData,'pathwayListPub' => $pathwayListDataPub, 'level' =>$levelData, 'availability' =>$availabilityData, 'pathway_type' => $pathwayTypeData, 'lang'=>$language,'routeName'=>$routeLang, 'duration' => $duration]);
    }

    public function taskListData(Request $request, Response $response, $args)
    {
		
        $session = MainController::getSessionHelper();
        $language = $request->getAttribute('language');
        $routeName = $this->getRouteName($language);
        $messages = $this->flash->getMessages();
        $PATHWAY_TYPE = unserialize(PATHWAY_TYPE);
		$levelArr = ['Beginner', 'Intermediate', 'Advanced'];
		$levelArrMap = ['Beginner' => 1,'Intermediate' => 2, 'Advanced' => 3];

		$level = [];
		$durationArr = ['< 15 mins', '15 mins to 1 hour','1 - 3 hours','3 - 5 hours','5 - 10 hours','10+ hours'];
		$durationArrMap = ['< 15 mins' => '(duration  < 15)', '15 mins to 1 hour' => '(duration  > 15 and duration < 60)', '1 - 3 hours' => '( duration > 60 and duration < 180)', '3 - 5 hours' => '(duration > 180 and duration < 300)', '5 - 10 hours' => '(duration >300 and duration < 600)', '10+ hours' => '(duration > 600)'];
		$duration = [];
		$statusArr = ['Active', 'Inactive'];
		$statusArrMap = ['Active' => 1, 'Inactive' => 2];
		$status = [];
		$p_type = ['General' => 3, 'Branching' => 1, 'Sequence' => 4, 'Completion rule' => 2];
		//print_r($_POST);exit;
		$pway_type = [];

		$avlbility = ['India', 'USA', 'UK'];
		$avlbilityMap = ['India' => 4, 'USA' => 5, 'UK' => 6];
		$avlSearch = [];
		
		foreach($_POST['fil_data'] AS $pVal){
			if(in_array(trim($pVal), $levelArr)){
				 $level[] = $levelArrMap[$pVal];
			}
			if(in_array(trim($pVal), $durationArr)){
				 $duration[] = $durationArrMap[trim($pVal)];
			}
			if(in_array(trim($pVal), $statusArr)){
				 $status[] = $statusArrMap[trim($pVal)];
			}
			if(in_array(trim($pVal), $PATHWAY_TYPE)){								  
				 $pway_type[] = $p_type[trim($pVal)];
			
			}
			if(in_array(trim($pVal), $avlbility)){								  
				 $avlSearch[] = $avlbilityMap[trim($pVal)];
			
			}
		}
		

		 $query = Pathway::query();
		 $query = $query->where('is_published', '=', $_POST['is_published'])->where('is_delete', '=', '0');
		 if(!empty($duration)){
			$duration = implode(' or ', $duration);
			 //echo 'hii';exit;
			$query = $query->whereRaw('('.$duration.')');
		 }
		 if(!empty($level)){
		   $query = $query->whereIn('proficency_level', $level);
		 }
		 if(!empty($status)){
		   $query = $query->whereIn('is_active', $status);
		 }
		 if(!empty($pway_type)){
		   $query = $query->whereIn('pathway_type', $pway_type);
		 }
		 if(!empty($avlSearch)){
		   $query = $query->whereIn('availability', $avlSearch);
		 }
		 //echo $query = $query->toSql();exit;
		 if(!empty($_POST['searchText'])){
			 //echo $_POST['searchText'];exit;
			$query = $query->whereRaw("(title like '%".$_POST['searchText']."%' or description like '%".$_POST['searchText']."%') ");	
		 }
      	 //$pathwayListData = $query->get();
		 $totalCount = $query->count();
		//########### paging ###########
		$countPerPage = 10;
		$linkSpan = 6;
		$noOfPages = ceil($totalCount/$countPerPage);
		$leftArrow = 'no';
		$rightArrow = 'no';
		$prevPage = 1;
		$nextPage = 2;
		$startingPage = 1;
		if(empty($_GET['page'])){
		   $_GET['page'] = 1;
		}
		if(!empty($_GET['page'])){
		   if($_GET['page'] > 1){
		   	    
			   $prevPage = $_GET['page']-1;
			   $nextPage = $_GET['page']+1;
			   if($_GET['move'] == 'y'){					
					$leftArrow = 'yes';
					
			   }
			   
			   $rem =  $_GET['page']%$linkSpan;
			   if($rem == 1){
			   	 $startingPage = $_GET['page'];
			   }
			   
			   
			  
		   }
		}
		//print_r($_POST);exit;
		$page = 1;
		if(!empty($_GET['page'])){
		   $page = $_GET['page'];
		}
		$offset = ($page-1)*$countPerPage;
		$sort_for = '';
		if(!empty($_POST['sort'])){
			$postArr = explode('-', $_POST['sort']);
			//echo $postArr[0];exit;
			if($postArr[1] == 'no'){
				$pathwayListData = $query->skip($offset)->take($countPerPage)->orderBy(trim($postArr[0]), 'DESC')->get();
				
			}else{
			   $pathwayListData = $query->skip($offset)->take($countPerPage)->orderBy(trim($postArr[0]), 'ASC')->get();
				$sort_for = $_POST['sort'];
			}
		}else{
			$pathwayListData = $query->skip($offset)->take($countPerPage)->orderBy('id', 'DESC')->get();
		}
		
		if($noOfPages > $linkSpan){
			$rightArrow = 'yes';
		}
		
		$liHtml = '';
		$count = 0;
		$lastPagingShow = '';		
		$eignConstant = $noOfPages-($linkSpan-1); 
		if($startingPage > $eignConstant){
			// $startingPage = $eignConstant;
		}$sel_page = '';
		for($i = $startingPage; $i <= $noOfPages; $i++){
			
			if($_GET['page'] == $i){
			$liHtml .= '<li class="page-item"><a class="page-link" style="color:maroon">'.$i.'</a></li>';
			$sel_page = $i;
			}else{
			  $liHtml .= '<li class="page-item"><a class="page-link" onclick="loadPagingData('.$i.')" style="cursor:pointer">'.$i.'</a></li>';
			}
			$lastPagingShow = $i;
			$count++;													    
			if($count == $linkSpan){
				break;
			}
		}
		if($lastPagingShow >= $noOfPages){
		   $rightArrow = 'no';
		}
		//echo $liHtml;exit;
		//########## paging end ########
        if(!empty($pathwayListData)) {
			//echo '<pre>';print_r($pathwayListData);exit;
            $pathwayListData = $pathwayListData->toArray();
            foreach ($pathwayListData as $pKey => $pValue) {
                $pathwayListData[$pKey]['id'] = encriptString($pValue['id']);	
                $pathwayListData[$pKey]['pathway_type'] =  $PATHWAY_TYPE[$pValue['pathway_type']];
				$pathwayListData[$pKey]['duration'] =  $this->minToHoursFormat($pathwayListData[$pKey]['duration']);
				
				$requestData = array();
				$requestData['type'] = "ACCESS";
				$requestData['userId'] = "64634ef3171aed4e79862631";
				$requestData['pathwayId'] = (string) $pValue['id'];
				$requestData['lang'] = "en";
				$requestData['tz'] = "Europe/Berlin";
				//$time = gmmktime();
				$time = time();
				$requestData['iat'] = $time;
				$requestData['exp'] = $time + 72000;
				$token = JWT::encode($requestData, PATHWAY_PREVIEW_KEY, 'HS256');
				$pathwayListData[$pKey]['preview_link'] =  PATHWAY_PREVIEW_URL.$token;
            }
        }

		/*
        $pathwayListDataPub = Pathway::where('is_published', '=', 1)->where('is_delete', '=', '0')->get();     
      	
        if(!empty($pathwayListDataPub)) {
            $pathwayListDataPub = $pathwayListDataPub->toArray();
            foreach ($pathwayListDataPub as $pKey => $pValue) {
                $pathwayListDataPub[$pKey]['id'] = encriptString($pValue['id']);                                   
            }
        }
		
		 */
        $levelData = FieldMaster::where('is_active', '=', 1)->where('org_id', '=', 1)->where('type', '=', 'level')->get();
		if(!empty($levelData)) {
			$levelData = $levelData->toArray();
		}		
		$availabilityData = FieldMaster::where('is_active', '=', 1)->where('org_id', '=', 1)->where('type', '=', 'availability')->get();
		if(!empty($availabilityData)) {
			$availabilityData = $availabilityData->toArray();
		}		
		$pathwayTypeData = FieldMaster::where('is_active', '=', 1)->where('org_id', '=', 1)->where('type', '=', 'type')->get();
		if(!empty($pathwayTypeData)) {
			$pathwayTypeData = $pathwayTypeData->toArray();
		}
		$availabilityQArr = FieldMaster::select('id', 'value_of_data')->where('type', '=', 'availability')->get()->toArray();
		
		$availabilityArr = [];
		foreach($availabilityQArr AS $av){
			 $availabilityArr[$av['id']] = $av['value_of_data']; 
		}

		$levelQArr = FieldMaster::select('id', 'value_of_data')->where('type', '=', 'level')->get()->toArray();
		
		$levelArr = [];
		foreach($levelQArr AS $av){
			 $levelArr[$av['id']] = $av['value_of_data']; 
		}
		
		//echo '<pre>';print_r($availabilityArr);exit;
        return $this->view->render($response, 'Org_1/Home/task_data.twig', ['pathwayList' => $pathwayListData, 'level' =>$levelData, 'availability' => $availabilityData, 'level_map' => $levelArr, 'pathway_type' => $pathwayTypeData, 'duration' => $duration, 'lang'=>$language,'routeName'=>$routeName, 'avl_arr' => $availabilityArr, 'page_num' => 2 , 'total_pages' => $noOfPages, 'li_html' => $liHtml, 'left_arrow' => $leftArrow , 'right_arrow' => $rightArrow, 'prev_page' => $prevPage, 'next_page' => $nextPage, 'sort_for' => $sort_for, 'sel_page' => $sel_page]);
    }

    public function getSessionHelper()
    {
        $session = new \SlimSession\Helper;
        return $session;
    }

    public function getRouteName($lang) {

        $url = $_SERVER['REQUEST_URI'];
        $urlExplode = explode($lang.'/', $url);
        return $urlExplode[1];
    }

    public function FormRender(Request $request, Response $response, $args)
    {
        $session = MainController::getSessionHelper();
        $language = $request->getAttribute('lang');
        $routeLang = $this->getRouteName($language);
        $is_resource_flag = false;
        if(isset($args['formName'])){
            $_GET['form_url']=formio_site.''.$args['formName'];
        }
        
        if(!empty($args['form_name'])){
           $_GET['form_url'] = HTTP_SERVER.'form-load/'.$args['form_name'];
        }
        
        $cateType = !empty($_GET['type']) ? '?type='.$_GET['type'] : '';
        if (isset($_GET['form_url'])) {
            $task_id = !empty($_GET['task_id']) ? $_GET['task_id'] : '';
            $user_id = '';
            $process_id = '';
            $event = '';
            $project_size_arr = $incident_size_arr = [];
            $formUrlArray = explode('/', $_GET['form_url']);
            ## variable set for createLeaner and modifyLearner form ##
            if(isset($_GET['params'])){
                $formUrlArray[3] = $_GET['params'];
            } else {
               $formUrlArray[3] = $formUrlArray[3];
            }
            
            ## variable set for createLeaner and modifyLearner form ##
            $formType = FormType::with('formCategory')->where('form_key', $formUrlArray[3])->where('org_id', '=', $session->user['org_id'])->first(); 
            
            $type = 'form';
            $trainingName = '';
            $formKey = $formUrlArray[3];
           
            $routeName=$request->getAttribute('route')->getName();
            $pathwayId = '';
            $sectionId = '';

            if($routeName == 'secFormRender') {
                $pathwayId = $args['id'];
            }
            else if($routeName == 'subSecFormRender') {
                $pathwayId = $args['id'];
                $sectionId = $args['sectionId'];
            }
            
            $pId = decriptString($pathwayId);
            $sId = decriptString($sectionId);           
            
            $tpID = '';
            if($formKey == 'pwc-external-learning-object'){
                $getloType = PathwayContent::where(['id'=> $sId])->first();
                $tpID = $getloType['type_id']; 
            }
            
            return $this->view->render($response, 'Org_1/Home/form.twig', ['FORM_URL' => $_GET['form_url'], 'formKey' => $formKey, 'curr_user_name' => $session->user['first_name'].' '.$session->user['last_name'], 'pathwayId' => $pathwayId, 'sectionId' => $sectionId, 'type_id'=> $tpID, 'lang'=>$language,'routeName'=> $routeLang]);
        }
    }

    public function addPathwayData(Request $request, Response $response, $args) {
        $session = MainController::getSessionHelper();
        $language = $request->getAttribute('language');
        $routeLang = $this->getRouteName($language);
        $data = $request->getParsedBody();
        $orgId = $session->user['org_id'];          
        $formKey = $data['formKey'];        
        $collection = $this->MongoDB->pe_form_data;            
        if($formKey == 'pwc-create-pathway') {   
            $pData = $data['data']['data']['pageContainer'];       
            $title = $pData['pathwayTitle'];            
            $description = htmlentities($pData['pathwayDescription']);
            $pathwayThumbnail = !empty($pData['pathwayThumbnail'])?$pData['pathwayThumbnail']: '';
            
                        
            $pathwayDurationHours = $pData['pathwayDurationHours'];
            $pathwayDurationMinutes = $pData['pathwayDurationMinutes'];
            $hourstomin = $pathwayDurationHours * 60;
            $duration = $hourstomin + $pathwayDurationMinutes;
            $pathwayAvailability = !empty($pData['pathwayAvailability'])?$pData['pathwayAvailability']['value']:'0';
            $pathwayLevel = !empty($pData['pathwayLevel'])?$pData['pathwayLevel']['value']:'0';
            $pathwayAccreditation = $pData['pathwayAccreditation'];
            $pathwayAccreditationorganization = !empty($pData['pathwayAccreditationorganization'])?$pData['pathwayAccreditationorganization']:'';
            $pathwayCpEtype = !empty($pData['pathwayCpEtype'])?$pData['pathwayCpEtype']:'';
            $pathwayCpEhours = !empty($pData['pathwayCpEhours'])?$pData['pathwayCpEhours']:'';
            $pathwayFieldStudy = !empty($pData['pathwayFieldStudy'])?$pData['pathwayFieldStudy']:'0';
            $pathwayCertification = !empty($pData['pathwayCertification'])?$pData['pathwayCertification']:'0';         
            $pathwaySkills = !empty($pData['pathwaySkills'])?$pData['pathwaySkills']:'0';           
            $pathwayReviewers = !empty($pData['pathwayReviewers'])?$pData['pathwayReviewers']:'0';         
            $pathwaySearchRecom = $pData['pageContainerProficiencyLevelCont']['pathwaySearchRecom'];
            $proedgeRecom = $pData['pageContainerProficiencyLevelCont']['proedgeRecom'];            
            $proedgeRatingReview = $pData['pageContainerProficiencyLevelCont']['proedgeRatingReview'];          
            $pathwaySearch = $pData['pageContainerProficiencyLevelCont2']['pathwaySearch'];
            $displayProgress = $pData['pageContainerProficiencyLevelCont2']['displayProgress']; 
            $enableFilters = $pData['pageContainerProficiencyLevelCont2']['enableFilters']; 

            $contentTypeFilter = '';
            $providerFilters = '';
            $durationFilters = '';
            if(!empty($pData['pageContainerProficiencyLevelCont2']['pageContainerProficiencyLevelCont2Enablefilter'])) {
                $contentTypeFilter = $pData['pageContainerProficiencyLevelCont2']['pageContainerProficiencyLevelCont2Enablefilter']['contentType'];
                $providerFilters = $pData['pageContainerProficiencyLevelCont2']['pageContainerProficiencyLevelCont2Enablefilter']['provider'];
                $durationFilters = $pData['pageContainerProficiencyLevelCont2']['pageContainerProficiencyLevelCont2Enablefilter']['duration'];
            }
            

            $pathwayType = $pData['containerPathwayType']['pathwayType'];
            
            if(!empty($pathwayThumbnail)) {
                $imgData = $pathwayThumbnail[0];
                $fileInfo = json_decode($this->pwcImageUploadAjax($imgData));   
                $imageName = $fileInfo->message;
                $imgPath = PWC_UPLOAD_PWC_THUMBNAIL . $imageName;
            }
            else {
                $imageName = "default.jpg";
            }
            

            $currentTime = time();
            $data_save = array('user_id' => '', 'form_id' => $data['data']['form'], 'form_url' => $data['FORM_URL'], 'state' => $data['data']['state'], 'form_type' => $data['formKey'],'store_data' => $data['data']['data'], 'org_id' => $orgId, 'submit_dt' => $currentTime);            
            $result = $collection->insertOne($data_save);
            $inserted_id = $result->getInsertedId();            

            /* insert custom filter*/
            if(!empty($data['filterIds'])) {
                $filterIds = $data['filterIds'];
                foreach ($filterIds as $value) {
                    $filterId = $value['id'];
                    $filterName = $value['name'];
                    $filterValue = $value['value'];
                    $filData = array(
                        'form_id' => $inserted_id,
                        'custom_filter_id' => $filterId,
                        'title' => $filterName,
                        'is_enable' => $filterValue,
                        'created_by' => $session->user['user_id'],
                        'updated_by' => $session->user['user_id']

                    );
                    $pathwayResult = CustomFilterMapping::create($filData);
                }
            }

            $currrentDate = date('Y-m-d H:i:s');

            $payload = [
                         'title' => $title,
                         'description' => $description,                        
                         'thumb_image' => $imageName,
                         'background' => 'default image',
                         'duration' => $duration,
                         'proficency_level' => $pathwayLevel,
                         'availability' => $pathwayAvailability,
                         'offer_accreditation' => $pathwayAccreditation == "true"? 1:0,
                         'accreditation_organization' => (!empty($pathwayAccreditationorganization) ? $pathwayAccreditationorganization : "0"),
                         'cpe_type' => (!empty($pathwayCpEtype) ? $pathwayCpEtype : "0"),
                         'cpe_hrs' => (!empty($pathwayCpEhours) ? $pathwayCpEhours : "0"),
                         'field_study' => $pathwayFieldStudy,
                         'certification' => $pathwayCertification,                       
                         'deactivate_on' => '0',
                         'proedge_search_recom' => $pathwaySearchRecom == "true"? 1:0,
                         'proedge_recom' => $proedgeRecom == "true"? 1:0,
                         'proedge_rating_review' => $proedgeRatingReview == "true"? 1:0,
                         'pathway_search' => $pathwaySearch == "true"? 1:0,
                         'pathway_display_progress' => $displayProgress == "true"? 1:0,
                         'pathway_enable_filters' => $enableFilters == "true"? 1:0,
                         'is_content_type' => $contentTypeFilter == "true"? 1:0,
                         'is_provider' => $providerFilters == "true"? 1:0,
                         'is_duration' => $durationFilters == "true"? 1:0,
                         'total_section' => '0',
                         'pathway_type' => $pathwayType,
                         'position' => '0',
                         'mongo_id' => "{$inserted_id}",
                         'org_id' => $orgId,
                         'is_active' => '1',
                         'created_at' => $currrentDate,
                         'created_by' => $session->user["user_id"],
                         'updated_by' => $session->user["user_id"]
        
            ];


            $pathwayResult = Pathway::create($payload);
            return $response->withJson(['success' => true, 'message' => 'success', 'lang'=> $language,'routeName'=>$routeLang], 200);   
        }
    }

    public function editDraft(Request $request, Response $response, $args)
    {
        $session = MainController::getSessionHelper();
        $messages = $this->flash->getMessages();
        $language = $request->getAttribute('language');
        $routeLang = $this->getRouteName($language);
        $formType = $args['form_type']; 
        $data_list = '';
        $mode = '';
        $formUrl = '';
        $messages = '';
        $getData_text = '';
        $task_id = "";
        $user_id = '';
        $collectionName = '';
        $id = $args['id'];
        $currentTime = time();
        $objId = new \MongoDB\BSON\ObjectId("$id");        
        $data = $request->getParsedBody();    
        $isType = '';          
        if($args['form_type'] == "pwc-create-pathway") {        
         $taskDetail = Pathway::where(['org_id' => $session->user["org_id"], 'mongo_id' => $id])->first();
        }elseif($args['form_type'] == "pwc-section-details" || $args['form_type'] == "pwc-sub-section-details"){
         
         $taskDetail = PathwayContent::where(['org_id' => $session->user["org_id"], 'mongo_id' => $id])->first();   
        }elseif($args['form_type'] == "pwc-external-learning-object"){
        
         $taskDetail = PathwayContent::where(['org_id' => $session->user["org_id"], 'mongo_id' => $id])->first();
         //$is_mandatory = $taskDetail['is_mandatory'];      
         $isType = $taskDetail['type_id'];
        }               
        //echo "<pre>"; print_r($isType); die();
        $pathwayId = encriptString($taskDetail['pathway_id']); 
        $customFilterV = '';             
        if($args['form_type'] == "pwc-external-learning-object") {          
            $customFilterMongo = Pathway::where(['org_id' => $session->user["org_id"], 'id' => $taskDetail['pathway_id'], 'pathway_enable_filters' => 1])->first();         
            $cMongoId = $customFilterMongo['mongo_id'];         
            $getCusFil = CustomFilterMapping::where(['form_id' => $cMongoId])->get();
            //echo "<pre>"; print_r(count($getCusFil)); die();
            if(count($getCusFil) > 0) {
                $customFilterV = "yes";
            }else {
                $customFilterV = "no";
            }
        }
        //die();
        
        $collection = $this->MongoDB->pe_form_data;
        if ($request->isPost()) {

            $formUrlData = explode('/', $data['FORM_URL']);
            
            $formType = FormType::with('formCategory')->where('form_key', $formUrlData[3])->where('org_id', '=', $session->user['org_id'])->first();
            $collectiondataHistory = $this->MongoDB->pe_form_data_history;
            $result_history = $collection->findOne(array("_id" => $objId));
            unset($result_history->_id);
            $result_history->submitted_by = $session->user['user_id'];
            $result_history->submitted_on = $currentTime;

            if(!empty($data['submission']['form'])) {
                $dataToUpdate['form_id'] = $data['submission']['form'];    
            }
            $dataToUpdate['form_url'] = $data['FORM_URL'];
            $dataToUpdate['form_type'] = $formType['form_key'];
            if(!empty($formType['form_category'])) {
                $dataToUpdate['form_category'] = $formType['form_category']['id'];
            }
            $dataToUpdate['store_data'] = $data['submission']['data'];
            $dataToUpdate['state'] = $data['submission']['state'];
            $dataToUpdate['submit_dt'] = $currentTime;
            $result = MainController::updateOneMongo((string) $objId, $dataToUpdate, 'pe_form_data');

            if($args['form_type'] == "pwc-create-pathway") {
                $checkData = Pathway::where('is_active', '=', 1)->where('mongo_id', "=", $id)->first();
                if (!empty($checkData)) {

                    /* insert custom filter*/
                    if(!empty($data['filterIds'])) {
                        $filterIds = $data['filterIds'];
                        foreach ($filterIds as $value) {
                            $filterId = $value['id'];
                            $filterName = $value['name'];
                            $filterValue = $value['value'];

                            $getRes = CustomFilterMapping::where('custom_filter_id', '=', $filterId)->first();
                            if(!empty($getRes)) {
                                CustomFilterMapping::where('custom_filter_id', '=', $filterId)->update(['title'=>$filterName, 'is_enable'=> $filterValue]);
                            }
                            else {
                                $filData = array(
                                    'form_id' => $id,
                                    'custom_filter_id' => $filterId,
                                    'title' => $filterName,
                                    'is_enable' => $filterValue,
                                    'created_by' => $session->user['user_id'],
                                    'updated_by' => $session->user['user_id']
                                );
                                $pathwayResult = CustomFilterMapping::create($filData);
                            }
                        }
                    }

                    $result_history->task_id = $checkData->id;
                    $dataCon = $data['submission']['data']['pageContainer'];

                    $title = $dataCon['pathwayTitle'];          
                    $description = $dataCon['pathwayDescription'];
                    if(!empty($dataCon['pathwayThumbnail'])) {
                        $pathwayThumbnail = $dataCon['pathwayThumbnail'];
                        $imgData = $pathwayThumbnail[0];
                    }
                    $pathwayDurationHours = $dataCon['pathwayDurationHours'];
                    $pathwayDurationMinutes = $dataCon['pathwayDurationMinutes'];
                    $hourstomin = $pathwayDurationHours * 60;
                    $duration = $hourstomin + $pathwayDurationMinutes;
                    
                    $pathwayAvailability = !empty($dataCon['pathwayAvailability'])?$dataCon['pathwayAvailability']['value']:'0';
                    $pathwayLevel = !empty($dataCon['pathwayLevel'])?$dataCon['pathwayLevel']['value']:'';
                    $pathwayAccreditation = $dataCon['pathwayAccreditation'];
                    $pathwayAccreditationorganization = !empty($dataCon['pathwayAccreditationorganization'])?$dataCon['pathwayAccreditationorganization']:'';
                    $pathwayCpEtype = !empty($dataCon['pathwayCpEtype'])?$dataCon['pathwayCpEtype']:'';
                    $pathwayCpEhours = !empty($dataCon['pathwayCpEhours'])?$dataCon['pathwayCpEhours']:'';
                    $pathwayFieldStudy = $dataCon['pathwayFieldStudy'];
                    $pathwayCertification = $dataCon['pathwayCertification'];           
                    $pathwaySkills = !empty($dataCon['pathwaySkills'])?$dataCon['pathwaySkills']:'';         
                    $pathwayReviewers = !empty($dataCon['pathwayReviewers'])?$dataCon['pathwayReviewers']:'';           
                    $pathwaySearchRecom = $dataCon['pageContainerProficiencyLevelCont']['pathwaySearchRecom'];
                    $proedgeRecom = $dataCon['pageContainerProficiencyLevelCont']['proedgeRecom'];          
                    $proedgeRatingReview = $dataCon['pageContainerProficiencyLevelCont']['proedgeRatingReview'];            
                    $pathwaySearch = $dataCon['pageContainerProficiencyLevelCont2']['pathwaySearch'];
                    $displayProgress = $dataCon['pageContainerProficiencyLevelCont2']['displayProgress'];   
                    $enableFilters = $dataCon['pageContainerProficiencyLevelCont2']['enableFilters'];   

                    $contentTypeFilter = $dataCon['pageContainerProficiencyLevelCont2']['pageContainerProficiencyLevelCont2Enablefilter']['contentType'];
                    $providerFilters = $dataCon['pageContainerProficiencyLevelCont2']['pageContainerProficiencyLevelCont2Enablefilter']['provider'];
                    $durationFilters = $dataCon['pageContainerProficiencyLevelCont2']['pageContainerProficiencyLevelCont2Enablefilter']['duration'];

                    $pathwayType = $dataCon['containerPathwayType']['pathwayType'];
            

                    $updateArray = [
                        'title' => $title,
                        'description' => htmlentities($description),                         
                        //'thumb_image' => $imageName,
                        'duration' => $duration,
                        'proficency_level' => $pathwayLevel,
                        'availability' => $pathwayAvailability,
                        'offer_accreditation' => $pathwayAccreditation  == "true"? 1:0,
                        'accreditation_organization' => (isset($pathwayAccreditationorganization) ? $pathwayAccreditationorganization : ""),
                        'cpe_type' => (!empty($pathwayCpEtype) ? $pathwayCpEtype : ""),
                        'cpe_hrs' => (!empty($pathwayCpEhours) ? $pathwayCpEhours : "0"),
                        'field_study' => $pathwayFieldStudy,
                        'certification' => $pathwayCertification,                        
                        'deactivate_on' => '',
                        'proedge_search_recom' => $pathwaySearchRecom == "true"? 1:0,
                        'proedge_recom' => $proedgeRecom == "true"? 1:0,
                        'proedge_rating_review' => $proedgeRatingReview == "true"? 1:0,
                        'pathway_search' => $pathwaySearch == "true"? 1:0,
                        'pathway_display_progress' => $displayProgress == "true"? 1:0,
                        'pathway_enable_filters' => $enableFilters == "true"? 1:0,
                        'is_content_type' => $contentTypeFilter == "true"? 1:0,
                        'is_provider' => $providerFilters == "true"? 1:0,
                        'is_duration' => $durationFilters == "true"? 1:0,
                        'pathway_type' => $pathwayType,
                        'updated_by' => $session->user["user_id"]
                    ];

                    $pathwayUpdate = Pathway::where(['id' => $checkData->id])->update($updateArray);

                    MainController::insertOneMongo($result_history, 'pe_form_data_history');
                    
                    return $response->withJson(['success' => true, 'newformkey' =>$args['form_type']]);
                }
            }
            if($args['form_type'] == "pwc-section-details") {

                $checkData = PathwayContent::where('is_active', '=', 1)->where('mongo_id', "=", $id)->first();
                                
                if (!empty($checkData)) {
                    $result_history->task_id = $checkData->id;
                    
                    $dataCon = $data['submission']['data']['sectiondetails'];

                    $title = $dataCon['sectiondetailsSectiontitle'];            
                    $type = $dataCon['sectiondetailsSectiontype'];
                    $description = $dataCon['sectiondetailsDescription'];   
                    $updateArray = [
                        'title' => $title,
                        'description' => htmlentities($description),        
                        'type_id' => $type,                     
                        'updated_at' => date('Y-m-d H:i:s'),
                        'updated_by' => $session->user["user_id"]
                    ];
                   
                    $sectionUpdate = PathwayContent::where(['id' => $checkData->id])->update($updateArray);
                    MainController::insertOneMongo($result_history, 'pe_form_data_history');
                    if ($sectionUpdate) {
                        return $response->withJson(['success' => true, 'milestoneId' => '']);
                    } else {
                        return $response->withJson(['success' => false, 'milestoneId' => '']);
                    }
                }
            }
            if($args['form_type'] == "pwc-sub-section-details") {
                $checkData = PathwayContent::where('is_active', '=', 1)->where('mongo_id', "=", $id)->first();
                
                if (!empty($checkData)) {
                    $result_history->task_id = $checkData->id;
                    
                    $dataCon = $data['submission']['data']['subSectiondetails'];

                    $title = $dataCon['subSectiondetailsSubSectiontitle'];          
                    $type = $dataCon['subSectiondetailsSubSectiontype'];
                    $description = $dataCon['subSectiondetailsDescription'];    
                    $updateArray = [
                        'title' => $title,
                        'description' => htmlentities($description),        
                        'type_id' => $type,                     
                        'updated_at' => date('Y-m-d H:i:s'),
                        'updated_by' => $session->user["user_id"]
                    ];
                   
                    $sectionUpdate = PathwayContent::where(['id' => $checkData->id])->update($updateArray);
                    MainController::insertOneMongo($result_history, 'pe_form_data_history');
                    if ($sectionUpdate) {
                        return $response->withJson(['success' => true, 'milestoneId' => '']);
                    } else {
                        return $response->withJson(['success' => false, 'milestoneId' => '']);
                    }
                }
            }
            if($args['form_type'] == "pwc-external-learning-object") {
                $checkData = PathwayContent::where('is_active', '=', 1)->where('mongo_id', "=", $id)->first();
                 
                if (!empty($checkData)) {
                    $result_history->task_id = $checkData->id;                  
                    $dataCon = $data['submission']['data']['page1ExternalLearningObject'];                      
                    $loTitle = $dataCon['loTitle'];                             
                    $loDescription = $dataCon['loDescription'];
                    
                    if(!empty($dataCon['loThumbnail'])) {
                        $loThumbnail = $dataCon['loThumbnail'];
                        $imgData = $loThumbnail[0];
                        $fileInfo = json_decode($this->pwcLoEditImageUploadAjax($imgData));
                    }else {
                        $imgData = '';
                        $fileInfo = '';
                    }
                    $loLevel = !empty($dataCon['loLevel'])?$dataCon['loLevel']['value']:'0';
                    $url = $dataCon['sourceUrl'];                   
                    $loContentType = $dataCon['loContentType'];    
                    $thisMandatory = $dataCon['thisMandatory'];
                    if($thisMandatory == "true"){
                        $is_mandatory = "1";
                    }else {
                        $is_mandatory = "0";
                    }           
                    $loProvider = $dataCon['loProvider'];
                    $loMinutes = $dataCon['loMinutes'];
                    $loHours = $dataCon['loHours'];
                    $duration = $loHours."h ".$loMinutes."m";
                    if(!empty($imgData)) {
                        $fileInfo = json_decode($this->pwcImageUploadAjax($imgData));
                        $imageName = $fileInfo->message;
                        $imgPath = LO_UPLOAD_LO_THUMBNAIL . $imageName;
                    }
                    else {
                        $imageName = '';
                    }
                       
                    $updateArray = [
                        'title' => $loTitle,
                        'description' => htmlentities($loDescription),      
                        'level' => $loLevel,
                        'lo_type' => $loContentType,
                        'provider' => $loProvider,
                        'is_mandatory' => $is_mandatory,
                        'duration' => $duration,
                        'url' => $url,                      
                        'updated_at' => date('Y-m-d H:i:s'),
                        'updated_by' => $session->user["user_id"]
                    ];

                    if(!empty($imageName)) {
                        $updateArray['image'] = $imageName;
                    }
                    
                    $sectionUpdate = PathwayContent::where(['id' => $checkData->id])->update($updateArray);
                    MainController::insertOneMongo($result_history, 'pe_form_data_history');
                    if ($sectionUpdate) {
                        return $response->withJson(['success' => true, 'milestoneId' => '']);
                    } else {
                        return $response->withJson(['success' => false, 'milestoneId' => '']);
                    }
                }
            }


        }

        $formType = FormType::where('form_key', $args['form_type'])->where('org_id', '=', $session->user['org_id'])->first();
        $formUrl = formio_site . $formType['form_key'];        
        return $this->view->render($response, 'Org_1/Home/edit_form.twig', ['mode' => $mode, 'FORM_URL' => $formUrl, 'messages' => $messages, 'title' => $getData_text, 'task_id' => $task_id, 'mongo_id' => $id, 'user_id' => $user_id, 'form_id' => $id, 'form_type' => $formType['form_key'], 'formKey' => $formType['form_key'], 'lang'=>$language, 'pathwayId'=>$pathwayId, 'routeName'=> $routeLang, 'custom_filter_v'=>$customFilterV, 'is_mandatory'=>$isType]);
    }

    public function pathwayDetails(Request $request, Response $response, $args) {
        $messages = $this->flash->getMessages();
        $language = $request->getAttribute('language');
        $routeName = $this->getRouteName($language);
        $pathwayId = $request->getAttribute('id');
        $PATHWAY_TYPE = unserialize(PATHWAY_TYPE);
        $getLevelMaster = FieldMaster::where('is_active', '=', ACTIVE)->where('type', '=', 'level')->pluck('value_of_data', 'id')->toArray();
        //$getContentTypeMaster = FieldMaster::where('is_active', '=', ACTIVE)->where('type', '=', 'content_type')->pluck('value_of_data', 'id')->toArray();
        $preview_token = '#';
        if(!empty($pathwayId)) {
            $pathwayDecsId = decriptString($pathwayId);
            if($pathwayDecsId > 0) {
                
                $getPathwayData = Pathway::where('id', '=', $pathwayDecsId)->first();
                $getPathwayData['description'] = html_entity_decode($getPathwayData['description']);
                $getPathwayData['pathway_type_name'] = $PATHWAY_TYPE[$getPathwayData['pathway_type']]; 
                if($getPathwayData['proficency_level'] > 0) {
                	$getPathwayData['proficency_level'] = $getLevelMaster[$getPathwayData['proficency_level']];
                }  
                else {
                	$getPathwayData['proficency_level'] = '';
                }
                
                $getPathwayData['duration'] = $this->minToHoursFormat($getPathwayData['duration']);

                $lastUpdate = date('h.i A');
                if(!empty($getPathwayData['updated_at'])) {
                    //$lastUpdate = date('h.i A', strtotime($getPathwayData['last_pathway_updated']));
                    $lastUpdate = date('h.i A', strtotime($getPathwayData['updated_at']));
                }

                $getSectionDetals = PathwayContent::where('is_active', '=', 1)->where('pathway_id', '=', $pathwayDecsId)->where('parent_id', '=', 0)->where('is_delete', '=', '0')->orderBy('position')->get()->toArray();                              
                if(!empty($getSectionDetals)) {
                    foreach ($getSectionDetals as $gSecKey => $gSecValue) {
                        $sessionId = $gSecValue['id'];
                        $typeId = $gSecValue['type_id'];
                        $typeName = '';
                        if($typeId == '3') {
                            $typeName = 'General';
                        }elseif($typeId == '4'){
                            $typeName = 'Sequence';
                        }elseif($typeId == '2'){
                            $typeName = 'Completion rules';
                        }
                        $getSectionDetals[$gSecKey]['id'] = encriptString($sessionId);
                        $getSectionDetals[$gSecKey]['valid_id'] = $sessionId;
                        $getSectionDetals[$gSecKey]['secid'] = $sessionId;  
                        $getSectionDetals[$gSecKey]['description'] = html_entity_decode($gSecValue['description']);
                        $getSectionDetals[$gSecKey]['type_name'] = $typeName; 

                        // Get sub section details.
                        $getSubSectionDetals = PathwayContent::where('is_active', '=', 1)->where('pathway_id', '=', $pathwayDecsId)->where('parent_id', '=', $sessionId)->where('is_delete', '=', '0')->orderBy('position')->get()->toArray();

                        if(!empty($getSubSectionDetals)) {
                            
                            $getSectionDetals[$gSecKey]['subSection'] = $getSubSectionDetals;
                                            
                            foreach ($getSubSectionDetals as $gSubSecKey => $gSubSecValue) {
                                $subSessionId = $gSubSecValue['id'];
                                $subSectionTypeId = $gSubSecValue['type_id'];
                                $subSectionTypeName = '';
                                if($subSectionTypeId == '3') {
                                    $subSectionTypeName = 'General';
                                }elseif($subSectionTypeId == '4'){
                                    $subSectionTypeName = 'Sequence';
                                }elseif($subSectionTypeId == '2'){
                                    $subSectionTypeName = 'Completion rule';
                                }
                                $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['description'] = html_entity_decode($gSubSecValue['description']);                               
                                $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['type_name'] = $subSectionTypeName;                          

                                if($gSubSecValue['category'] == '2') {
                                    // For custom filter
                                    $getLOFilter = CustomFilterLo::where('lo_id', '=', $gSubSecValue['id'])->where("pathway_id", '=', $gSubSecValue['pathway_id'])->get()->toArray();
                                    if(!empty($getLOFilter)) {
                                        $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['customFilter'] = $getLOFilter;
                                    }

                                    if(!empty($gSubSecValue['level'])) {
                                        $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['level'] = $getLevelMaster[$gSubSecValue['level']];
                                    }
                                    /*if(!empty($gSubSecValue['lo_type'])) {
                                        $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['lo_type'] = $getContentTypeMaster[$gSubSecValue['lo_type']];
                                    }*/
                                    if(!empty($gSubSecValue['image'])) {
                                        $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['image'] = MEDIA_URL_LO.$gSubSecValue['image'];
                                    }else {
                                        $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['image'] = MEDIA_URL_LO.'default.jpg';
                                    }
                                                                        
                                    
                                    
                                }
                                
                                // Get Learning object
                                $getLearningObjectDetals = PathwayContent::where('is_active', '=', 1)->where('pathway_id', '=', $pathwayDecsId)->where('parent_id', '=', $subSessionId)->where('is_delete', '=', '0')->orderBy('position')->groupBy('id')->get()->toArray();

                                if($getLearningObjectDetals) {                                  
                                    $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['learningObject'] = $getLearningObjectDetals;
                                    foreach($getLearningObjectDetals as $sloKey => $sloValue){
                                        $loId = $sloValue['id'];
                                        $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['learningObject'][$sloKey]['lo_id'] = $loId;
                                        $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['learningObject'][$sloKey]['id'] = encriptString($loId);

                                        $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['learningObject'][$sloKey]['valid_id']=$loId;


                                        $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['learningObject'][$sloKey]['description'] = html_entity_decode($sloValue['description']);

                                        if($sloValue['category'] == '2') {
                                            // For custom filter
                                            $getLOFilter = CustomFilterLo::where('lo_id', '=', $sloValue['id'])->where("pathway_id", '=', $sloValue['pathway_id'])->get()->toArray();
                                            if(!empty($getLOFilter)) {
                                                $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['learningObject'][$sloKey]['customFilter'] = $getLOFilter;
                                            }

                                            if(!empty($sloValue['level'])) {
                                                $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['learningObject'][$sloKey]['level'] = $getLevelMaster[$sloValue['level']];
                                            }
                                            /*if(!empty($sloValue['lo_type'])) {
                                                $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['learningObject'][$sloKey]['lo_type'] = $getContentTypeMaster[$sloValue['lo_type']];
                                            }*/
                                            if(!empty($sloValue['image'])) {
                                                $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['learningObject'][$sloKey]['image'] = MEDIA_URL_LO.$sloValue['image'];
                                            }else {
                                                $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['learningObject'][$sloKey]['image'] = MEDIA_URL_LO.'default.jpg';
                                            }
                                            
                                        }
                                    }
                                }

                                $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['id'] = encriptString($subSessionId);

                                $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['valid_id']=$subSessionId;

                                $getSectionDetals[$gSecKey]['subSection'][$gSubSecKey]['subsecid'] = $subSessionId;
                            }
                        }
                    }
                }
            }
        }

        $getBranch = FieldMaster::where('is_active', '=', ACTIVE)->where('type', '=', 'branch')->where('org_id', '=', PROEDGE)->get()->toArray();
        $requestData = array();
        $requestData['type'] = "ACCESS";
        $requestData['userId'] = "64634ef3171aed4e79862631";
        $requestData['pathwayId'] = (string) $pathwayDecsId;
        $requestData['lang'] = "en";
        $requestData['tz'] = "Europe/Berlin";
        $time = time();
        $requestData['iat'] = $time;
        $requestData['exp'] = $time + 72000;
        $preview_token = PATHWAY_PREVIEW_URL.JWT::encode($requestData, PATHWAY_PREVIEW_KEY, 'HS256');
        
        return $this->view->render($response, 'Org_1/Home/pathway_details.twig', ['getPathwayData' => $getPathwayData, 'getSectionDetals' => $getSectionDetals, 'pathwayId' => $pathwayId, 'getBranch'=>$getBranch, 'lang'=>$language,'routeName'=>$routeName, 'background' => $getPathwayData['background'], 'lastUpdate' => $lastUpdate,'messages' => $messages, 'preview_token' => $preview_token]);
    }

    public function getFormData(Request $request, Response $response, $args)
    {
        $requestData = $request->getParsedBody();
        $id = $requestData['id'];
        $objId = new \MongoDB\BSON\ObjectId("$id");
        $collection = $this->MongoDB->{$requestData['tb']};     
        $data = $collection->findOne(array('_id' => $objId));     
        $store_data = json_decode(json_encode($data['store_data']), true);
        $keysearch = ['response_id', 'sfdc_response_id', 'ins_response_id'];
        if ($requestData['mode'] == 'copy') {
            $d = $this->findKey($store_data, $keysearch);
        } else {
            $d = $data['store_data'];
        }
        return $response->withJson(['data' => $d], 200);
        
    }

    public function getCustomFilter(Request $request, Response $response, $args){
        $session = MainController::getSessionHelper();
        $messages = $this->flash->getMessages();
        $data = $request->getParsedBody();
        $filterId = $data['filterId'];
        $collection = $this->MongoDB->custom_filter;
        $objId = new \MongoDB\BSON\ObjectId("$filterId");
        $filterData = $collection->findOne(array("_id" => $objId));
        return $response->withJson(['success' => true, 'filterData' => $filterData]);
    }

    public function getFormCustomFilter(Request $request, Response $response, $args){
        $session = MainController::getSessionHelper();
        $messages = $this->flash->getMessages();
        $data = $request->getParsedBody();      
        $formId = $data['formId'];
        $getFilterRes = CustomFilterMapping::where('form_id', '=', $formId)->get()->toArray();
        if(!empty($getFilterRes)) {
            return $response->withJson(['success' => true, 'getFilterRes' => $getFilterRes]);
        }
        else {
            return $response->withJson(['success' => false]);
        }
    }

    public function deleteCustomFilter(Request $request, Response $response, $args){
        $session = MainController::getSessionHelper();
        $messages = $this->flash->getMessages();
        $data = $request->getParsedBody();
        $filterId = $data['filterId'];
        $getRes = CustomFilterMapping::where('custom_filter_id', '=', $filterId)->first();
        if(!empty($getRes)) {
            CustomFilterMapping::where('custom_filter_id', '=', $filterId)->delete();
            return $response->withJson(['success' => true]);
        }
    }

    public function getFormCustomFilterLo(Request $request, Response $response, $args){
        $session = MainController::getSessionHelper();
        $messages = $this->flash->getMessages();
        $data = $request->getParsedBody();      
        $formId = $data['formId'];
        $getLoformId = PathwayContent::where('mongo_id', '=', $formId)->first()->toArray();
        $pathwayIdLo = $getLoformId['pathway_id'];
        $loId = $getLoformId['id'];
        $getLoPformId = Pathway::where('id', '=', $pathwayIdLo)->first()->toArray();
        $mFormId = $getLoPformId['mongo_id'];           
        $getFilterRes = CustomFilterMapping::where('form_id', '=', $mFormId)->where('is_enable', '=', 1)->get()->toArray();
        $collection = $this->MongoDB->custom_filter;        
        $selectedFilter = CustomFilterLo::where('lo_id', '=', $loId)->get()->toArray();
        $filterSelect = array();
        foreach($selectedFilter as $sKey => $sValue) {
            $filterSelect[$sValue['filter_key']] = $sValue['filter_value'];
            
        }
        // echo "<pre>"; print_r($filterSelect); die();
        $dropdown = [];
        $customFilter = [];
        $customHtml = '<div>';
        foreach($getFilterRes as $keyLo => $value) {
            $filterId = $value['custom_filter_id'];
            $objId = new \MongoDB\BSON\ObjectId("$filterId");
            $filterData = $collection->findOne(array("_id" => $objId)); 
                    
            //$getFilterRes[$keyLo]['mongoValue'] = iterator_to_array($filterData);
            $fData = iterator_to_array($filterData);
            $customFilterName = $fData['customFilterName'];
            
            $customFilterValue = $fData['customFilterValue'];
            $cFV = iterator_to_array($customFilterValue);
            $filterArr = array_filter($cFV);                
            $customFilter[$customFilterName] = $filterArr;
            $customHtml .= '<div class="form-group mb-32">';
            $customHtml .= '<label>'.$customFilterName .'</label>';
            $customHtml .= '<select id = "'.$customFilterName.'" name = "'.$customFilterName.'" onchange="selectFilterValue(this.name, this.value)" class="custom-select">';
            foreach($filterArr as $key => $value) {
             if(in_array($value,$filterSelect)) {
                 $customHtml .= '<option value="'.$value.'" selected>'.$value.'</option>';
             }else{
                 $customHtml .= '<option value="'.$value.'">'.$value.'</option>';
             }
                
             
            }
            $customHtml .= '</select>';
            $customHtml .= '</div>';
                        
        }
        $customHtml .= '</div>';
        
        if(!empty($getFilterRes)) {
            return $response->withJson(['success' => true, 'cDropdown' => $customHtml]);
        }
        else {
            return $response->withJson(['success' => false]);
        }
    }

    public static function getObjIdMongo($id)
    {
        $objId = new \MongoDB\BSON\ObjectId("$id");
        return $objId;
    }

    public function insertOneMongo($data, $collectionName)
    {
        $collection = $this->MongoDB->{$collectionName};
        $insertOne = $collection->insertOne($data);
        return $insertOne;
    }

    public function updateOneMongo($id, $dataToUpdate, $collectionName)
    {
        $collection = $this->MongoDB->{$collectionName};
        $objId = MainController::getObjIdMongo($id);
        $update = $collection->findOneAndUpdate(array("_id" => $objId), array('$set' => $dataToUpdate), ['multi' => false]);
        return $update;
    }

    public function pwcImageUploadAjax($imgData)
    {       
        try {
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt');
            if (count($imgData) > 0) {
                $name = $imgData['originalName']; 
                $base64Image = $imgData['url'];             
                $name = explode(".", $name);
                $ext = array_pop($name);
                $ext = strtolower($ext);
                if (!in_array($ext, $valid_extensions)) {
                    $types = implode(',', $valid_extensions);
                    return json_encode(["status" => false, "message" => "File is not valid.Please insert valid file of extension. " . $types]);
                }
                $basename = bin2hex(random_bytes(8));
                $filename = sprintf('%s.%0.8s', $basename, $ext);
                $imgPath = LO_UPLOAD_LO_THUMBNAIL . $filename;
                $base64Image = trim($base64Image);
                $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
                $base64Image = str_replace('data:image/jpg;base64,', '', $base64Image);
                $base64Image = str_replace('data:image/jpeg;base64,', '', $base64Image);
                $base64Image = str_replace('data:image/gif;base64,', '', $base64Image);
                $base64Image = str_replace(' ', '+', $base64Image);

                $imageData = base64_decode($base64Image);
                //Set image whole path here 
                $filePath = $imgPath . $filename;
                file_put_contents($filePath, $imageData);
                return json_encode(["status" => true, "message" => $filename]);
            }
        } catch (Exception $e) {
            return json_encode(["status" => false, message => $e->getMessage()]);
        }
    }

    public function pwcLoEditImageUploadAjax($imgData)
    {       
        try {
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt');
            if (count($imgData) > 0) {
                $name = $imgData['originalName']; 
                $base64Image = $imgData['url'];             
                $name = explode(".", $name);
                $ext = array_pop($name);
                $ext = strtolower($ext);
                if (!in_array($ext, $valid_extensions)) {
                    $types = implode(',', $valid_extensions);
                    return json_encode(["status" => false, "message" => "File is not valid.Please insert valid file of extension. " . $types]);
                }
                $basename = bin2hex(random_bytes(8));
                $filename = sprintf('%s.%0.8s', $basename, $ext);
                $imgPath = LO_UPLOAD_LO_THUMBNAIL . $filename;
                $base64Image = trim($base64Image);
                $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
                $base64Image = str_replace('data:image/jpg;base64,', '', $base64Image);
                $base64Image = str_replace('data:image/jpeg;base64,', '', $base64Image);
                $base64Image = str_replace('data:image/gif;base64,', '', $base64Image);
                $base64Image = str_replace(' ', '+', $base64Image);

                $imageData = base64_decode($base64Image);
                //Set image whole path here 
                $filePath = $imgPath . $filename;
                file_put_contents($filePath, $imageData);
                return json_encode(["status" => true, "message" => $filename]);
            }
        } catch (Exception $e) {
            return json_encode(["status" => false, message => $e->getMessage()]);
        }
    }

    public function pwcLoImageUploadAjax($imgData)
    {       
        try {
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt');
            if (count($imgData) > 0) {
                $name = $imgData['originalName']; 
                $base64Image = $imgData['url'];             
                $name = explode(".", $name);
                $ext = array_pop($name);
                $ext = strtolower($ext);
                if (!in_array($ext, $valid_extensions)) {
                    $types = implode(',', $valid_extensions);
                    return json_encode(["status" => false, "message" => "File is not valid.Please insert valid file of extension. " . $types]);
                }
                $basename = bin2hex(random_bytes(8));
                $filename = sprintf('%s.%0.8s', $basename, $ext);
                $imgPath = LO_UPLOAD_LO_THUMBNAIL . $filename;
                $base64Image = trim($base64Image);
                $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
                $base64Image = str_replace('data:image/jpg;base64,', '', $base64Image);
                $base64Image = str_replace('data:image/jpeg;base64,', '', $base64Image);
                $base64Image = str_replace('data:image/gif;base64,', '', $base64Image);
                $base64Image = str_replace(' ', '+', $base64Image);

                $imageData = base64_decode($base64Image);
                //Set image whole path here 
                $filePath = $imgPath . $filename;
                file_put_contents($filePath, $imageData);
                return json_encode(["status" => true, "message" => $filename]);
            }
        } catch (Exception $e) {
            return json_encode(["status" => false, message => $e->getMessage()]);
        }
    }

    public function uniquePathwayCheck(Request $request, Response $response, $args){
        $session = MainController::getSessionHelper();
        $messages = $this->flash->getMessages();
        $data = $request->getParsedBody();
        $input = $data['input'];
        $mongoId = $data['mongoId'];
        if(!empty($input)) {
            
            if($mongoId) {
                $res = Pathway::where('title', '=', $input)->where('is_delete', '=', '0')->where('mongo_id', '!=', $mongoId)->count();
            }
            else {
                $res = Pathway::where('title', '=', $input)->where('is_delete', '=', '0')->count();
            }
            if($res > 0) {
                return $response->withJson(['success' => false]);
            }
            else {
                return $response->withJson(['success' => true]);
            }
        }
        
    }

    public function getFieldMasterData(Request $request, Response $response, $args)
    {       
        $session = MainController::getSessionHelper();          
        $requestParam = $request->getQueryParams();             
                
        $d = FieldMaster::where('is_active', '=', ACTIVE)->where('type', '=', $requestParam['type'])->where('org_id', '=', PROEDGE)->get()->toArray();
        if (COUNT($d)>0) {      
            $data = array();
            $count = 0;
             foreach ($d as $k => $v) {
                $ndata = array();
                $ndata['value'] = $v['id'];
                $ndata['label'] = $v['value_of_data'];
                $data[] = $ndata;
                $count++;
            }               
        } else {
            echo "No record found";
        }
              
        return $response->withJson($data);
    }

    public function getSkillsData(Request $request, Response $response, $args)
    {       
        $session = MainController::getSessionHelper();          
        $requestParam = $request->getQueryParams();             
                
        if ($requestParam['type'] == 'get-skills') {    
        
            $d = Skill::where('is_active', '=', ACTIVE)->get()->toArray();
                
            $data = array();
            $count = 0;
             foreach ($d as $k => $v) {                           
                $data[$v['name'] . $v['id']] = $v['name'];
                $count++;
            }               
        } else {
            echo "No record found";
        }
              
        return $response->withJson($data);
    }

    public function saveCustomFilter(Request $request, Response $response, $args){
        $session = MainController::getSessionHelper();
        $messages = $this->flash->getMessages();
        $data = $request->getParsedBody();
        $customFilterName = $data['customFilterName'];
        $customFilterId = $data['customFilterId'];
        $collection = $this->MongoDB->custom_filter;
        if(!empty($customFilterId)) {
            
            $objId = new \MongoDB\BSON\ObjectId("$customFilterId");
            $inserted_id = $objId;
            $setData = array(
                "customFilterName" => $data['customFilterName'],
                "customFilterValue" => $data['customFilterValue']
            );
            $update = $collection->findOneAndUpdate(array("_id" => $objId), array('$set' => $setData), ['multi' => false]);
            $getRes = CustomFilterMapping::where('custom_filter_id', '=', $customFilterId)->first();
            if(!empty($getRes)) {
                CustomFilterMapping::where('custom_filter_id', '=', $customFilterId)->update(['title'=>$customFilterName]);
            }
            $mode = 'edit';
            
        }
        else {
            $result = $collection->insertOne($data);
            $inserted_id = $result->getInsertedId();
            $mode = 'add';
        }
        return $response->withJson(['success' => true, 'insertedId' => $inserted_id, 'customFilterName' => $customFilterName, 'mode'=> $mode]);
    }

	
	public function addSectionDetails(Request $request, Response $response, $args){

		$session = $this->getSessionHelper();
		$data = $request->getParsedBody();	
       		
		$formKey = $data['formKey'];
		$orgId = $session->user['org_id'];	
		$pathway_id = '';
        		
		if($formKey == 'pwc-section-details') {
			$title = $data['data']['data']['sectiondetails']['sectiondetailsSectiontitle'];
			$description = $data['data']['data']['sectiondetails']['sectiondetailsDescription'];
			$sectionType = $data['data']['data']['sectiondetails']['sectiondetailsSectiontype'];			
            $pathway_id = decriptString($data['data']['data']['sectiondetails']['pathwayId']);
			$section_id = 0;
            $positionCheck = PathwayContent::where('pathway_id', '=', $pathway_id)->where('org_id', '=', $orgId)->select('position')->orderBy('position', 'DESC')->first();	
			 
            if($positionCheck) {
				$position = $positionCheck['position'] + 1;
				
			}else {
				$position = 1;
			}			
		    
		}
		if($formKey == 'pwc-sub-section-details') {
			$title = $data['data']['data']['subSectiondetails']['subSectiondetailsSubSectiontitle'];
			$sectionType = $data['data']['data']['subSectiondetails']['subSectiondetailsSubSectiontype'];
			$description = $data['data']['data']['subSectiondetails']['subSectiondetailsDescription'];			
            $pathway_id = decriptString($data['data']['data']['subSectiondetails']['pathwayId']);
            $section_id = decriptString($data['data']['data']['subSectiondetails']['sectionId']);
            $type_id = 1;            
            $positionCheck = PathwayContent::where('pathway_id', '=', $pathway_id)->where('parent_id', '=', $section_id )->where('org_id', '=', $orgId)->select('position')->orderBy('position', 'DESC')->first();
			if($positionCheck) {
		    $position = $positionCheck['position'] + 1;	
            }else {
				$position = 1;
			}			
		} 
		$collection = $this->MongoDB->pe_form_data;	
		$timestamp = time();
		$currentTime = time();
		$data_save = array('user_id' => '', 'form_id' => $data['data']['form'], 'form_url' => $data['FORM_URL'], 'state' => $data['data']['state'], 'form_type' => $data['formKey'],'store_data' => $data['data']['data'], 'org_id' => $orgId, 'submit_dt' => $currentTime);	
		$result = $collection->insertOne($data_save);
		$inserted_id = $result->getInsertedId();
        //$currrentDate = date('Y-m-d H:i:s');
		$cont_payload = [
		        //'id' => 10,
                'title'=> $title,
				'category' => 1,
				'description' => htmlentities($description),				
				'pathway_id' => $pathway_id,
				'parent_id' => $section_id,
				'type_id' => $sectionType,
				'position' => $position,
				'dependent_section'=> 0,
				'mongo_id' => "{$inserted_id}",
				'org_id' => $orgId,	
				'is_active'=> 1,
				'created_at'=> "$timestamp",
				'created_by'=> $session->user["user_id"],
                'updated_by' => $session->user["user_id"]				             			
            ];          			
       
        $sectionDetailResult = PathwayContent::create($cont_payload);
        $getSectionId = $sectionDetailResult->id;

        if($formKey == 'pwc-section-details') {
             $pathWayRes = Pathway::where('id', '=', $pathway_id)->first(['sequence_start'])->toArray();
             if(empty($pathWayRes['sequence_start'])) {
                Pathway::where('id', '=', $pathway_id)->where('pathway_type', '=', '4')->update(['sequence_start' => $getSectionId]);
            }
        }
        else if($formKey == 'pwc-sub-section-details') {
            
            $pathWayRes = PathwayContent::where('id', '=', $section_id)->first(['sequence_start'])->toArray();
            if(empty($pathWayRes['sequence_start'])) {
                PathwayContent::where('id', '=', $section_id)->where('type_id', '=', '4')->update(['sequence_start' => $getSectionId]);
            }
        }	 
        
		if($formKey == 'pwc-section-details') {
			if($sectionDetailResult) {
				$this->flash->addMessage('success', 'Section has been added.');
			}
		}
		if($formKey == 'pwc-sub-section-details') {
			if($sectionDetailResult) {
				$this->flash->addMessage('success', 'Subsection has been added.');
			}
		}
		return $response->withJson(['success' => true, 'message' => 'success'], 200);		
		
	}

    public function addExternalLearning(Request $request, Response $response, $args) {

        $session = $this->getSessionHelper();
        $language = $request->getAttribute('language');
        $routeName = $this->getRouteName($language);
        $data = $request->getParsedBody();
        $tpId = $data['tpId'];
        //echo "<pre>"; print_r($tpId); die();  
        $formKey = $data['formKey'];
        $orgId = $session->user['org_id'];  
        $commData = $data['data']['data'];
        $imgData = '';
        if(!empty($commData['page1ExternalLearningObject']['loThumbnail'])) {
            $loThumbnail = $commData['page1ExternalLearningObject']['loThumbnail']; 
            $imgData = $loThumbnail[0];
        }
         
        if(!empty($imgData)) {
            $fileInfo = json_decode($this->pwcLoImageUploadAjax($imgData));
            $imageName = $fileInfo->message;
            $imgPath = LO_UPLOAD_LO_THUMBNAIL . $imageName;
        }else {
            $fileInfo = '';
            $imageName = '';
        }
               
        $loDurationHours = $commData['page1ExternalLearningObject']['loHours'];
        $loDurationMinutes = $commData['page1ExternalLearningObject']['loMinutes'];
        if(!empty($loDurationHours) && !empty($loDurationMinutes)){
             $duration = $loDurationHours."h ".$loDurationMinutes."m";  
        }else{
             $duration = '';    
        }
        $pId = decriptString($commData['page1ExternalLearningObject']['pathwayId']);
        $sId = decriptString($commData['page1ExternalLearningObject']['sectionId']);
        

        $positionCheckLo = PathwayContent::where('pathway_id', '=', $pId)->where('parent_id', '=', $sId )->where('org_id', '=', $orgId)->select('position')->orderBy('position', 'DESC')->first();

        if(!empty($positionCheckLo)) {
        	$position = $positionCheckLo['position'] + 1;
        }
        else {
        	$position = 1;
        }
               



        $collection = $this->MongoDB->pe_form_data;    
        $timestamp = time();
        $currentTime = time();
        $data_save = array('user_id' => '', 'form_id' => $data['data']['form'], 'form_url' => $data['FORM_URL'], 'state' => $data['data']['state'], 'form_type' => $data['formKey'],'store_data' => $commData, 'org_id' => $orgId, 'submit_dt' => $currentTime); 
        
        $result = $collection->insertOne($data_save);
        $inserted_id = $result->getInsertedId();
        $isMad = $commData['page1ExternalLearningObject']['thisMandatory']; 
        if($isMad == 'true'){
          $isMadV = '1';    
        }else{
          $isMadV = '0';
        }       

        $new_payload = array(
            'pathway_id' => $pId,
            'parent_id' => $sId,
            'type_id' => $tpId,
            'category' => 2,
            'title'=> $commData['page1ExternalLearningObject']['loTitle'],
            'lo_type' => $commData['page1ExternalLearningObject']['loContentType'],
            'url' => $commData['page1ExternalLearningObject']['sourceUrl'],
            'description' => htmlentities($commData['page1ExternalLearningObject']['loDescription']),   
            'position' => $position,
            'alt_description' => '',
            'provider' => $commData['page1ExternalLearningObject']['loProvider'],               
            'level' => !empty($commData['page1ExternalLearningObject']['loLevel']) ? $commData['page1ExternalLearningObject']['loLevel']['value'] : '',
            'duration' => $duration,
            'avg_rating' => '',
            'url' => '',
            'mongo_id' => $inserted_id,
            'org_id' => $orgId, 
            'is_mandatory' => $isMadV,
            'is_testout' => 0,         
            'is_active'=> 1,
            'created_at'=> $timestamp,
            'created_by'=> $session->user['user_id'],
            'updated_at'=> $timestamp,
            'updated_by'=> $session->user['user_id']                           
        );   

        if(!empty($imageName)) {
            $new_payload['image'] = $imageName;
        }    
      
       
        $loResult = PathwayContent::create($new_payload);       
        $getLoId = $loResult->id;
        if($formKey == 'pwc-external-learning-object') {
        
            $sectionRes = PathwayContent::where('id', '=', $sId)->first(['sequence_start'])->toArray();
            if(empty($sectionRes['sequence_start'])) {
                PathwayContent::where('id', '=', $sId)->where('type_id', '=', '4')->update(['sequence_start' => $getLoId]);
            }
        }
        if($loResult) {
            $this->flash->addMessage('success', 'External learning item has been added.');
        }
        return $response->withJson(['success' => true, 'message' => 'success', 'lang'=> $language,'routeName'=>$routeName], 200);   
    }


	public function minToHoursFormat($min){
	
		  $hours = floor((float)$min/60);
		  $m = (float)$min%60;
		  $duration = 	$hours.'h '.$m.' min';
		  return $duration;
	}

    public function minToHoursFormatArr($min){
    
          $duration = array();
          $hours = floor((float)$min/60);
          $m = (float)$min%60;
          $duration['hr'] = $hours;
          $duration['min'] = $m;
          return $duration;
    }


    public function changeSectionPosition(Request $request, Response $response, $args)
    {
        $session = MainController::getSessionHelper();
        $data = $request->getParsedBody();

        $current_id = decriptString($data['current_id']);
        $prev_id = decriptString($data['prev_id']);
       
        $getCurrentPos = PathwayContent::where('is_active', '=', 1)->where('id', '=', $current_id)->get()->toArray();

        $getPrevPos = PathwayContent::where('is_active', '=', 1)->where('id', '=', $prev_id)->get()->toArray();

        $current_pos = $getCurrentPos[0]['position'];
        $prev_pos = $getPrevPos[0]['position'];
     

        $currentchange = PathwayContent::where('id', '=', $current_id)->update(['position' => $prev_pos]);
        $prevchange = PathwayContent::where('id', '=', $prev_id)->update(['position' => $current_pos]);

        if ($currentchange) {
            return $response->withJson(['success' => true, 'message' => 'Position Changed']);
        }
    }


    public function changeLOPosition(Request $request, Response $response, $args)
    {
        $session = MainController::getSessionHelper();
        $data = $request->getParsedBody();

        $current_id = $data['current_id'];
        $prev_id = $data['prev_id'];
       
        $getCurrentPos = PathwayContent::where('is_active', '=', 1)->where('id', '=', $current_id)->get()->toArray();

        $getPrevPos = PathwayContent::where('is_active', '=', 1)->where('id', '=', $prev_id)->get()->toArray();

        $current_pos = $getCurrentPos[0]['position'];
        $prev_pos = $getPrevPos[0]['position'];
       

        $currentchange = PathwayContent::where('id', '=', $current_id)->update(['position' => $prev_pos]);
        $prevchange = PathwayContent::where('id', '=', $prev_id)->update(['position' => $current_pos]);

        if ($currentchange) {
            return $response->withJson(['success' => true, 'message' => 'Position Changed']);
        }
    }

    public function deleteLO(Request $request, Response $response, $args)
    {
        $session = MainController::getSessionHelper();
        $data = $request->getParsedBody();
 
        $id = decriptString($data['id']);

        $isDelete = PathwayContent::where('id', '=', $id)->update(['is_delete' => '1']);
        if ($isDelete) {
            return $response->withJson(['success' => true, 'message' => 'LO Deleted.']);
        } else {
            return $response->withJson(['success' => false, 'message' => 'Unable to Delete LO.']);
        }
    }

    public function deleteSubSection(Request $request, Response $response, $args)
    {
        $session = MainController::getSessionHelper();
        $data = $request->getParsedBody();

        $id = decriptString($data['id']);
        $title = $data['title'];

        if($title=='section'){
            $isDeleteSub = PathwayContent::where('id', '=', $id)->update(['is_delete' => '1']);
            $isDeleteSubSect = PathwayContent::where('parent_id', '=', $id)->update(['is_delete' => '1']);
        }else{
             $isDeleteSub = PathwayContent::where('id', '=', $id)->update(['is_delete' => '1']);
             $isDeleteSubSect = PathwayContent::where('parent_id', '=', $id)->update(['is_delete' => '1']);
        }

       
        if ($isDeleteSub) {
            return $response->withJson(['success' => true, 'message' => 'Sub Section Deleted.']);
        } else {
            return $response->withJson(['success' => false, 'message' => 'Unable to Delete Sub Section.']);
        }
    }


    public function inactivatePathway(Request $request, Response $response, $args)
    {
        $session = MainController::getSessionHelper();
        $data = $request->getParsedBody();
        $id = decriptString($data['id']);
        $activeflag = $data['active'];
         if($activeflag=='active'){
            $setflag='1';
         }elseif($activeflag=='inactive'){
            $setflag='2';
         }
        $isDelete = Pathway::where('id', '=', $id)->update(['is_active' => $setflag]);
        if ($isDelete) {
            return $response->withJson(['success' => true, 'message' => 'Pathway Inactivate']);
        } else {
            return $response->withJson(['success' => false, 'message' => 'Unable to Pathway Inactivate.']);
        }
    }


    public function copyPathway(Request $request, Response $response, $args)
    {
        $session = MainController::getSessionHelper();
        $data = $request->getParsedBody();
        $id = decriptString($data['id']);
       // echo $id;die;
        $collection = $this->MongoDB->pe_form_data;
       	$PathwayDetail = Pathway::where(['id' => $id])->first();

       	$id1 = $PathwayDetail['mongo_id'];
        $objId = new \MongoDB\BSON\ObjectId("$id1");
       	$mongoDbObj = $collection->findOne(array("_id" => $objId));
       	$backup = array();
        
        foreach($mongoDbObj as $key => $value) {
		    if($key != '_id') {
		        $backup[$key] = $value;
		    }
		}   	
		$result = $collection->insertOne($backup);
		$inserted_id = $result->getInsertedId();
		

       	$currrentDate = date('Y-m-d H:i:s');
       	$payload = [
                 'title' => $PathwayDetail['title'].'_copy_'.$currrentDate,
                 'description' => $PathwayDetail['description'],                        
                 'thumb_image' => $PathwayDetail['thumb_image'],
                 'background' => 'default image',
                 'duration' => $PathwayDetail['duration'],
                 'proficency_level' => $PathwayDetail['proficency_level'],
                 'availability' => $PathwayDetail['availability'],
                 'offer_accreditation' => $PathwayDetail['offer_accreditation'] == "true"? 1:0,
                 'accreditation_organization' => (!empty($PathwayDetail['accreditation_organization']) ? $PathwayDetail['accreditation_organization'] : "0"),
                 'cpe_type' => (!empty($PathwayDetail['cpe_type']) ? $PathwayDetail['cpe_type'] : "0"),
                 'cpe_hrs' => (!empty($PathwayDetail['cpe_hrs']) ? $PathwayDetail['cpe_hrs'] : "0"),
                 'field_study' => $PathwayDetail['field_study'],
                 'certification' => $PathwayDetail['certification'],                       
                 'deactivate_on' => '0',
                 'proedge_search_recom' => $PathwayDetail['proedge_search_recom'] == "true"? 1:0,
                 'proedge_recom' => $PathwayDetail['proedge_recom'] == "true"? 1:0,
                 'proedge_rating_review' => $PathwayDetail['proedge_rating_review'] == "true"? 1:0,
                 'pathway_search' => $PathwayDetail['pathway_search'] == "true"? 1:0,
                 'pathway_display_progress' => $PathwayDetail['pathway_display_progress'] == "true"? 1:0,
                 'pathway_enable_filters' => $PathwayDetail['pathway_enable_filters'] == "true"? 1:0,
                 'is_content_type' => $PathwayDetail['is_content_type'] == "true"? 1:0,
                 'is_provider' => $PathwayDetail['is_provider'] == "true"? 1:0,
                 'is_duration' => $PathwayDetail['is_duration'] == "true"? 1:0,
                 'total_section' => '0',
                 'pathway_type' => $PathwayDetail['pathway_type'],
                 'position' => '0',
                 'mongo_id' => "{$inserted_id}",
                 'org_id' => $PathwayDetail['org_id'],
                 'is_active' => '1',
                 'created_at' => $currrentDate,
                 'created_by' => $session->user["user_id"],
                 'updated_by' => $session->user["user_id"],
                 'reference_id' => $id
        
            ];

        $pathwayResult = Pathway::create($payload);
        $pathwayId = $pathwayResult->id;


        $getPathwayContent = PathwayContent::where('pathway_id', '=', $id)->get()->toArray();

        $copyMapping = array();
        $pcIds='';
        foreach ($getPathwayContent as $key => $value) {

    		$pContent = [
             'org_id' => $value['org_id'],
             'pathway_id' => $pathwayId,                        
             'parent_id' => $value['parent_id'],
             'type_id' => $value['type_id'],
             'category' => $value['category'],
             'lo_type' => $value['lo_type'],
             'title' => $value['title'],
             'image' => $value['image'],
             'description' => $value['description'],
             'alt_description' => $value['alt_description'],
             'provider' => $value['provider'],
             'level' => $value['level'],
             'duration' => $value['duration'],
             'avg_rating' => $value['avg_rating'],
             'url' => $value['url'],
             'mongo_id' => $value['mongo_id'],
             'dependent_section' => $value['dependent_section'],
             'completion_min' => $value['completion_min'],
             'sequence_start' => $value['sequence_start'],
             'sequence_num' => $value['sequence_num'],
             'unlock' => $value['unlock'],
             'position' => $value['position'],
             'section_branch' => $value['section_branch'],                       
             'is_mandatory' => $value['is_mandatory'],
             'is_testout' => $value['is_testout'],
             'is_active' => $value['is_active'],
             'is_delete' => $value['is_delete'],
             'created_at' => $currrentDate,
             'created_by' => $session->user["user_id"],
             'reference_id' => $id
        
            ];

            $pathwayResultContent = PathwayContent::create($pContent);
            $copyMapping[$value['id']] = $pathwayResultContent->id;
            
            if($value['parent_id']>0){
            	$pcIds = $pcIds.','.$pathwayResultContent->id;
            }
            
          	
        }
        $pcIds = trim($pcIds,',');

        $getParentIdData = PathwayContent::where('pathway_id', '=', $pathwayId)->get()->toArray();

        foreach ($getParentIdData as $key1 => $value1) {
        
	    	if($value1['parent_id']){
	    		$dtaUpdateKey = $copyMapping[$value1['parent_id']];
	    		$updateParentId = PathwayContent::where('id', '=', $value1['id'])->update(['parent_id' => $dtaUpdateKey]);	
	    	}
        	
        
        }
       
       if ($pathwayResult) {
            return $response->withJson(['success' => true, 'message' => 'Pathway Copied']);
        } else {
            return $response->withJson(['success' => false, 'message' => 'Unable']);
        }
       
    }


    public function deletePathway(Request $request, Response $response, $args)
    {
        $session = MainController::getSessionHelper();
        $data = $request->getParsedBody();
        $id = $data['id'];
        $currentTime = time();
        $updateArray = [   
                'is_delete' => '1'
                //'deleted_at' => $currentTime
            ];

        $isDelete = Pathway::where(['id' => $id])->update($updateArray);
        if ($isDelete) {
            return $response->withJson(['success' => true, 'message' => 'Pathway Deleted']);
        } else {
            return $response->withJson(['success' => false, 'message' => 'Unable']);
        }
    }


	public function uploadBackGroungImage(Request $request, Response $response){
       	//echo 'hiiiii';exit;
		//print_r($_FILES);
		$size =  number_format($_FILES["backfile"]["size"]/1024, 2, '.', '');
		if($size > 3000){
		   return $response->withJson(['success' => false, 'message' => 'File Size not more than 3MB!', 'lang'=> $language,'routeName'=>$routeName], 200);
		}
		$language = $request->getAttribute('language');
		$routeName = $this->getRouteName($language);
		$pathwayId = $request->getAttribute('id');
		$target_dir = "../public/upload/";
		$fileName = $pathwayId.'_'.basename($_FILES["backfile"]["name"]);
		$target_file = $target_dir.$fileName; 
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		  if (move_uploaded_file($_FILES["backfile"]["tmp_name"], $target_file)) {
			//echo "The file ". htmlspecialchars( basename( $_FILES["backfile"]["name"])). " has been uploaded.";
			$update = Pathway::where('id', '=', decriptString($pathwayId))->update(['background' => $fileName]);
			return $response->withJson(['success' => true, 'message' => 'success', 'lang'=> $language,'routeName'=>$routeName], 200);
		  } else {
			return $response->withJson(['success' => false, 'message' => 'Unsupported Format!', 'lang'=> $language,'routeName'=>$routeName], 200);
		  }
    }
	public function downloadPathwayExcel(Request $request, Response $response){
       	
		$file = $_GET['file'];
		//$file = "../public/download/pathway_export.csv";
		header('Content-Description: File Transfer');
		header('Cache-Control: public');
		header('Content-Type: csv');
		header("Content-Transfer-Encoding: binary");
		header('Content-Disposition: attachment; filename='. basename($file));
		header('Content-Length: '.filesize($file));
		
		readfile($file);
		unlink($file);
		//return $this->view->render($response, 'Org_1/Home/pathway_download.twig', ['file' => $file]);
		
    }
	public function downloadPathway(Request $request, Response $response){
       	//echo 'hiiiii';exit;
		$ids = [];
		$page = 1;
		if(!empty($_POST['page_no'])){
		   $page = trim($_POST['page_no']);
		}
		//$limit = 25;
		//$offset = ($page-1)*$limit;
		$selIds = [];
		if(!empty($_POST['selected_ids'])){
		   foreach($_POST['selected_ids'] AS $idV){		   
		   		 $selIds[] = base64_decode(trim($idV)); 
		   }
		}
		//print_r($selIds);exit;
		$pList = Pathway::select('id', 'title', 'pathway_type')->whereIn('id', $selIds)->orderBy('id', 'DESC')->get()->toArray();
		$list = [];
		$i = 1;
		foreach($pList AS  $val){
			if($i == 1){
				foreach($val AS $key => $sV){
					if($key != 'id'){
						$list[0][] = $key;
					}
				}
			}
			foreach($list[0] AS $lv){
				$vl = strip_tags(html_entity_decode(htmlspecialchars_decode($val[$lv])));
			   $list[$i][] = $vl;
			}		   
		   $i++;
		}
		$csvHeaderMap = ['title' => 'Pathway Title', 'pathway_type' => 'Pathway Type'];
		/* $d = FieldMaster::select('id', 'value_of_data')->where('is_active', '=', ACTIVE)->where('org_id', '=', PROEDGE)->get()->toArray();
		
		foreach($d AS $v){
		   $filedMapArr[$v['id']] = $v['value_of_data'];
		} */
		$filedMapArr = unserialize(PATHWAY_TYPE);
		//echo '<pre>';print_r($filedMapArr[3]);exit;
		$hIndex = 0;
		foreach($list[0] AS $lv){
			$list[0][$hIndex] = $csvHeaderMap[$lv];
			$hIndex++;
		}
		foreach($list AS $lky => $lv){
			if($lky > 0 ){
				foreach($lv AS $k => $v){
					if($k == 1){
						$list[$lky][$k] = $filedMapArr[trim($v)];
					}
				}
			}
		}
		//echo '<pre>';print_r($list);exit;
		//$file = fopen('php://memory', 'r+');
		$fName = '../public/download/pathway_export_'.time().'.csv';
		$file = fopen($fName, 'w');
		
		foreach ($list as $item) {
			fputcsv($file, $item, ',', '"', "\\");
		}
		rewind($file);
		return $response->withJson(['success' => true, 'file_name' => $fName], 200);
		
		
    }

    public function saveMinimumComplition(Request $request, Response $response, $args){
        $session = MainController::getSessionHelper();
        $messages = $this->flash->getMessages();
        $data = $request->getParsedBody();
        $complitionMin = $data['complitionMin'];
        $pathwayId = $data['pathwayId'];
        $mode = $data['mode'];
        if($mode == 'pathway') {
            Pathway::where('id', '=', $pathwayId)->update(['completion_min' => $complitionMin]);
        }
        else if($mode == 'session') {
            $sessionId = decriptString($data['sessionId']);
            PathwayContent::where('id', '=', $sessionId)->update(['completion_min' => $complitionMin]);
        }
        return $response->withJson(['success' => true]);
    }

    public function saveSequenceStart(Request $request, Response $response, $args){
        $session = MainController::getSessionHelper();
        $messages = $this->flash->getMessages();
        $data = $request->getParsedBody();
        $mode = $data['mode'];
        $sequenceStart = $data['sequenceStart'];
        if($mode == 'pathway') {
            $pathwayId = $data['pathwayId'];
            Pathway::where('id', '=', $pathwayId)->update(['sequence_start' => $sequenceStart]);
        }
        else if($mode == 'section') {
            $sectionId = $data['sectionId'];
            PathwayContent::where('id', '=', $sectionId)->update(['sequence_start' => $sequenceStart]);
        }
        return $response->withJson(['success' => true]);
    }

    public function sequenceUnlock(Request $request, Response $response, $args){
        $session = MainController::getSessionHelper();
        $messages = $this->flash->getMessages();
        $data = $request->getParsedBody();
        $mode = $data['mode'];
        
        if($mode == 'section') {
            $unlock = $data['unlock'];
            $sectionId = $data['sectionId'];

            //PathwayContent::where('id', '=', $unlock)->update(['Unlock' => $sectionId]);
            PathwayContent::where('id', '=', $sectionId)->update(['sequence_num' => $unlock, 'unlock' => $unlock]);
        }
        else if($mode == 'lo') {
            $unlock = $data['unlock'];
            $learningObject = $data['learningObject'];
            
            //PathwayContent::where('id', '=', $unlock)->update(['unlock' => $learningObject]);
            PathwayContent::where('id', '=', $learningObject)->update(['sequence_num' => $unlock, 'unlock' => $unlock]);
        }
        return $response->withJson(['success' => true]);
    }

    public function addBranch(Request $request, Response $response, $args){
        $session = MainController::getSessionHelper();
        $messages = $this->flash->getMessages();
        $data = $request->getParsedBody();
        $sectionId = $data['sectionId'];
        $branchId = $data['branchId'];
        
        PathwayContent::where('id', '=', $sectionId)->update(['section_branch' => $branchId]);
        return $response->withJson(['success' => true]);
    }

    public function publishPathway(Request $request, Response $response, $args) {
        $language = $request->getAttribute('language');
        $routeName = $this->getRouteName($language);
        $PATHWAY_TYPE = unserialize(PATHWAY_TYPE);
        $session = MainController::getSessionHelper();
        $data = $request->getParsedBody();

        $pathwayId = $data['pathwayId'];
        $showPreview = $data['showPreview'];
        if($showPreview == 'true') {
        	$collectionPathBuilder = $this->MongoDB->pe_preview;
        }
        else {
        	$collectionPathBuilder = $this->MongoDB->pathway_builder;
        }
        

        $publishData = [];
        if(!empty($pathwayId) && $pathwayId > 0) {

           
            $numOfPathway = $collectionPathBuilder->count(['id'=>$pathwayId]);
            $getPathwayData = Pathway::where('id', '=', $pathwayId)->first();
            
            $publishData['id'] = $pathwayId;
            $publishData['ver'] = $numOfPathway + 1;
            $publishData['title'] = $getPathwayData['title'];
            $publishData['desc'] = $getPathwayData['description'];
            $publishData['bg'] = HTTP_SERVER.'images/org_1/background-image.jpg';
            $publishData['thumb'] = HTTP_SERVER.'images/org_1/pwc_thumbnail/'.$getPathwayData['thumb_image'];

            $publishData['drtn'] = $this->minToHoursFormatArr($getPathwayData['duration']);

            if(!empty($getPathwayData['availability'])) {
            	$availabilityData = FieldMaster::where('is_active', '=', 1)->where('id', '=', $getPathwayData['availability'])->where('org_id', '=', 1)->where('type', '=', 'availability')->pluck('value_of_data', 'id')->toArray();

	            if($getPathwayData['availability'] > 0) {
	            	$aval_title = $availabilityData[$getPathwayData['availability']];
	            }
            }
            else {
            	$aval_title = '';
            }
            


            if($getPathwayData['availability'] > 0) {
                //$publishData['avlbl'] = $getPathwayData['availability'];
                $publishData['avlbl'] = ['id' => $getPathwayData['availability'], 'title' => $aval_title];
            }

            if(!empty($getPathwayData['proficency_level'])) {

	            $getLevelMaster = FieldMaster::where('is_active', '=', ACTIVE)->where('id', '=', $getPathwayData['proficency_level'])->where('type', '=', 'level')->pluck('value_of_data', 'id')->toArray();
	            
	            if($getPathwayData['proficency_level'] > 0) {
	            	$level_title = $getLevelMaster[$getPathwayData['proficency_level']];
	            }
            }
            else {
            	$level_title = '';
            }
            

            if($getPathwayData['proficency_level'] > 0) {
                $publishData['level'] = ['id' => $getPathwayData['proficency_level'], 'title' => $level_title];
            }

            //$publishData['type'] = $getPathwayData['pathway_type'];
            $publishData['type'] = ['id' => $getPathwayData['pathway_type'], 'title' => $PATHWAY_TYPE[$getPathwayData['pathway_type']]];
            

            $publishData['proE']['srch'] = $getPathwayData['proedge_search_recom'];
            $publishData['proE']['recom'] = $getPathwayData['proedge_recom'];
            $publishData['proE']['rare'] = $getPathwayData['proedge_rating_review'];
            
            $publishData['pathE']['srch'] = $getPathwayData['pathway_search'];
            $publishData['pathE']['prog'] = $getPathwayData['pathway_display_progress'];
            //$publishData['pathE']['rare'] = $getPathwayData['pathway_enable_filters'];

            if($getPathwayData['pathway_enable_filters'] > 0) {

                $publishData['fltrE']['cntnt'] = $getPathwayData['is_content_type'];
                $publishData['fltrE']['prvdr'] = $getPathwayData['is_provider'];
                $publishData['fltrE']['drtn'] = $getPathwayData['is_duration'];
                

                
                $getCusFil = CustomFilterMapping::where(['form_id' => $getPathwayData['mongo_id'], 'is_enable' => 1])->get()->toArray();
                $collection = $this->MongoDB->custom_filter;
                if(!empty($getCusFil)) {
                    $mFilterArr = array();
                    foreach ($getCusFil as $cuKey => $cuValue) {
                        $filterArr = array();
                        $filterId = $cuValue['custom_filter_id'];
                        $objId = new \MongoDB\BSON\ObjectId("$filterId");
                        $filterData = $collection->findOne(array("_id" => $objId));
                        $filterArr['name'] = $filterData->customFilterName;
                        $filterArr['value'] = array_filter(iterator_to_array($filterData->customFilterValue));
                        $mFilterArr[] = $filterArr;
                    }
                    $publishData['cstFt'] = $mFilterArr;
                }

            }
            
            
            $publishData['crtDt'] = strtotime($getPathwayData['created_at']);
            $publishData['updDt'] = strtotime($getPathwayData['updated_at']);
            $publishData['pubDt'] = time();
            $publishData['dctDt'] = '';

            $getOrgMaster = Organization::where('org_id', '=', $getPathwayData['org_id'])->pluck('title', 'org_id')->toArray();
            
            $org_title = $getOrgMaster[$getPathwayData['org_id']];


            //$publishData['org'] = $getPathwayData['org_id'];
            $publishData['org'] = ['id' => $getPathwayData['org_id'],'title' =>$org_title];
            $publishData['lang'] = '1';
            if($getPathwayData['pathway_type'] == '4') {
                $publishData['seqSt'] = $getPathwayData['sequence_start'];
            }
            else if($getPathwayData['pathway_type'] == '2') {
                $publishData['cmplt'] = $getPathwayData['completion_min'];
            }

            $getSectionDetals = PathwayContent::where('is_active', '=', 1)->where('pathway_id', '=', $pathwayId)->where('parent_id', '=', 0)->where('is_delete', '=', '0')->orderBy('position')->get()->toArray();
            if(!empty($getSectionDetals)) {
                $publishSectionDetals = array();
                foreach ($getSectionDetals as $gSecKey => $gSecValue) {

                    $sessionId = $gSecValue['id'];
                    $publishSectionDetals[$gSecKey]['id'] = $gSecValue['id'];
                    $publishSectionDetals[$gSecKey]['title'] = $gSecValue['title'];
                    $publishSectionDetals[$gSecKey]['desc'] = $gSecValue['description'];
                    $publishSectionDetals[$gSecKey]['type'] = $gSecValue['type_id'];
                    
                    if($gSecValue['type_id'] == '4') {
                        $publishSectionDetals[$gSecKey]['seqSt'] = $gSecValue['sequence_start'];
                    }
                    else if($gSecValue['type_id'] == '2') {
                        $publishSectionDetals[$gSecKey]['cmplt'] = $gSecValue['completion_min'];
                    }

                    if($getPathwayData['pathway_type'] == '4') {

                        if($getPathwayData['sequence_start'] == $gSecValue['id']) {
                            $publishSectionDetals[$gSecKey]['begin'] = $gSecValue['id'];
                        }
                        else {
                            $publishSectionDetals[$gSecKey]['unlckW'] = $gSecValue['unlock'];
                        }
                    }
                    else if($getPathwayData['pathway_type'] == '1') {
                        $publishSectionDetals[$gSecKey]['brnch'] = $gSecValue['section_branch'];
                    }

                    // Get sub section details.
                    $getSubSectionDetals = PathwayContent::where('is_active', '=', 1)->where('pathway_id', '=', $pathwayId)->where('parent_id', '=', $sessionId)->where('is_delete', '=', '0')->orderBy('position')->get()->toArray();
                    if(!empty($getSubSectionDetals)) {
                                        
                        foreach ($getSubSectionDetals as $gSubSecKey => $gSubSecValue) {

                            if($gSubSecValue['category'] == '1') {
                                $subSessionId = $gSubSecValue['id'];
                                $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['id'] = $gSubSecValue['id'];
                                $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['cate'] = ['id' =>$gSubSecValue['category'],'type' => 'Subsection'];
                                $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['title'] = $gSubSecValue['title'];
                                $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['desc'] = $gSubSecValue['description'];
                                $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['type'] = $gSubSecValue['type_id'];

                                if($gSecValue['type_id'] == '4') {

                                    if($gSecValue['sequence_start'] == $gSubSecValue['id']) {
                                        $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['begin'] = $gSubSecValue['id'];
                                    }
                                    else {
                                        $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['unlckW'] = $gSubSecValue['unlock'];
                                    }
                                }

                                if($gSubSecValue['type_id'] == '4') {
                                    $sequenceStart = $gSubSecValue['sequence_start'];
                                    $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['seqSt'] = $gSubSecValue['sequence_start'];
                                }
                                else if($gSubSecValue['type_id'] == '2') {
                                    $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['cmplt'] = $gSubSecValue['completion_min'];
                                }

                                // Get Learning object
                                $getLearningObjectDetals = PathwayContent::where('is_active', '=', 1)->where('pathway_id', '=', $pathwayId)->where('parent_id', '=', $subSessionId)->where('is_delete', '=', '0')->orderBy('position')->groupBy('id')->get()->toArray();
                                if($getLearningObjectDetals) {                                  

                                    foreach($getLearningObjectDetals as $sloKey => $sloValue){

                                        $getLOFilter = CustomFilterLo::where('lo_id', '=', $sloValue['id'])->where("pathway_id", '=', $sloValue['pathway_id'])->get()->toArray();

                                        $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['lo'][$sloKey]['cntID'] = $sloValue['id'];
                                        $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['lo'][$sloKey]['cate'] = ['id' => $sloValue['category'],'type' => 'LO'];
                                        $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['lo'][$sloKey]['title'] = $sloValue['title'];
                                        $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['lo'][$sloKey]['desc'] = $sloValue['description'];
                                        $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['lo'][$sloKey]['loTy'] = $sloValue['lo_type'];
                                        $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['lo'][$sloKey]['mndtr'] = $sloValue['is_mandatory'];

                                        if(!empty($getLOFilter)) {
                                            $loCustomFilterArr = array();
                                            foreach ($getLOFilter as $loFilKey => $loFilValue) {
                                                $loCustomFilterArr[$loFilValue['filter_key']] = $loFilValue['filter_value'];
                                            }
                                            $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['lo'][$sloKey]['cstFt'] = $loCustomFilterArr;
                                        }
                                        
                                        $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['lo'][$sloKey]['crtDt'] = strtotime($sloValue['created_at']);
                                        if($gSubSecValue['type_id'] == '4') {
                                            if($sequenceStart == $sloValue['id']) {
                                                $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['lo'][$sloKey]['begin'] = $sloValue['id'];
                                            }
                                            else {
                                                $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['lo'][$sloKey]['unlckW'] = $sloValue['unlock'];
                                            }
                                        }
                                    }
                                }
                            }
                            else if($gSubSecValue['category'] == '2') {

                                $getLOFilter = CustomFilterLo::where('lo_id', '=', $gSubSecValue['id'])->where("pathway_id", '=', $gSubSecValue['pathway_id'])->get()->toArray();

                                $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['id'] = $gSubSecValue['id'];
                                $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['cate'] = ['id' => $gSubSecValue['category'], 'type' => 'LO'];
                                $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['title'] = $gSubSecValue['title'];
                                $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['desc'] = $gSubSecValue['description'];
                                $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['loTy'] = $gSubSecValue['lo_type'];
                                $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['mndtr'] = $gSubSecValue['is_mandatory'];

                                if(!empty($getLOFilter)) {
                                    $loCustomFilterArr = array();
                                    foreach ($getLOFilter as $loFilKey => $loFilValue) {
                                        $loCustomFilterArr[$loFilValue['filter_key']] = $loFilValue['filter_value'];
                                    }
                                    $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['cstFt'] = $loCustomFilterArr;
                                }
                                
                                $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['crtDt'] = strtotime($gSubSecValue['created_at']);

                                if($gSecValue['type_id'] == '4') {

                                    if($gSecValue['sequence_start'] == $gSubSecValue['id']) {
                                        $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['begin'] = $gSubSecValue['id'];
                                    }
                                    else {
                                        $publishSectionDetals[$gSecKey]['sbsLo'][$gSubSecKey]['unlckW'] = $gSubSecValue['unlock'];
                                    }
                                }
                            }

                        }
                        
                    }

                    $publishData['sec'] = $publishSectionDetals;

                    
                }
            }
            //$publishData = json_encode($publishData);
            if($showPreview == 'true') {
            	$insertOne = $collectionPathBuilder->insertOne($publishData);
            	$requestData = array();
				$requestData['type'] = "ACCESS";
				$requestData['userId'] = "64634ef3171aed4e79862631";
				$requestData['pathwayId'] = (string) $pathwayId;
				$requestData['lang'] = "en";
				$requestData['tz'] = "Europe/Berlin";
				$time = time();
				$requestData['iat'] = $time;
				$requestData['exp'] = $time + 72000;
				$preview_token = PATHWAY_PREVIEW_URL.JWT::encode($requestData, PATHWAY_PREVIEW_KEY, 'HS256');
            	return $response->withJson(['success' => true, 'publishData' => $publishData, 'url' => $preview_token]);
            }
            else {
	            $validation = MainController::pathwayValidation($request,$pathwayId);
	            
	            if(!empty($validation)) {
	            	if($validation['success']=='false'){
		                return $response->withJson(['success' => false, 'publishData' => $validation]);
		            }
	            }
	            else{
	                
	                $insertOne = $collectionPathBuilder->insertOne($publishData);
	                $ispublish = Pathway::where('id', '=', $pathwayId)->update(['is_published' => '1']);
	                return $response->withJson(['success' => true, 'publishData' => $publishData]);
	            }
	        }
            
        }
    }


    public function saveFilterValue(Request $request, Response $response, $args) {
		$session = MainController::getSessionHelper();
        $messages = $this->flash->getMessages();
        $data = $request->getParsedBody();
		$id = $data['form_id'];
		$sName = $data['name'];
		$sValue = $data['value'];
	
        $getLoDetails = PathwayContent::where(['org_id' => $session->user["org_id"], 'mongo_id' => $id])->first()->toArray();
		$loId = $getLoDetails['id'];
		$pathwayId = $getLoDetails['pathway_id'];
		$selectedFilter = CustomFilterLo::where('lo_id', '=', $loId)->get()->toArray();	       
		$getallFv = array();
		foreach($selectedFilter as $key => $val) {	
            $getallFv[$val['filter_key']] = $val['filter_value'];		
		}
		
		$arrKey = array_keys($getallFv);
		$arrValue = array_values($getallFv);
		if(in_array($sName,$arrKey)) {
			$payload = [              		
					'filter_value' => $sValue			
					];
				$filterUpdate = CustomFilterLo::where(['lo_id' => $loId])->where(['filter_key' => $sName])->update($payload);
		}else{
			$payload = [
                    'pathway_id' => $pathwayId,
                    'lo_id'	=> $loId,			
					'filter_key' => $sName,
					'filter_value' => $sValue,
					'created_by' => $session->user["user_id"],
					'updated_by' => $session->user["user_id"]
					];
				$pathwayResult = CustomFilterLo::create($payload);
		}
		
	}


    public function pathwayValidation($request,$pathwayId)
    {   
        
        ini_set('MAX_EXECUTION_TIME', '-1');
        $session = new \SlimSession\Helper;
        $requestData = $request->getParsedBody();       
        $array = [];
        $message = [];
        //Get pathway all data here
        $getPathwayData = Pathway::where('id', '=', $pathwayId)->where('is_active', '=', '1')->where('is_delete', '=', '0')->get()->toArray();

        $pathwayType=$getPathwayData[0]['pathway_type'];
        $completion_min=$getPathwayData[0]['completion_min'];
        $sequence_start=$getPathwayData[0]['sequence_start'];

        // Get pathway content data here
        $getPathwayContentData = PathwayContent::where('pathway_id', '=', $pathwayId)->where('is_active', '=', '1')->where('is_delete', '=', '0')->get()->toArray();

        $getPathwayContentData1 = PathwayContent::where('pathway_id', '=', $pathwayId)->where('is_active', '=', '1')->where('is_delete', '=', '0')->get()->count();
      
     
       //This if condition is for general condition
        if($pathwayType=='3'){
            $LOcount=0; 
            $LOcount1=0;            
            

            if($getPathwayContentData1==0){
                $array['message'] = 'To publish your Pathway, you must include at least one section and one learning item.';
                $array['success'] = 'false';
                $array['section_id'] = $getPathwayData[0]['id'];
                return $array;
        	}


            foreach ($getPathwayContentData as $key => $value) {   
                $category=$value['category'];
                $sequence_start=trim($value['sequence_start']);
                $parent_id = $value['parent_id'];
                $id = $value['id'];
                $type_id=$value['type_id'];
                $completion_min=$value['completion_min'];
                $section_name = $value['title'];
                $getData = PathwayContent::where('parent_id', '=', $id)->where('is_active', '=', '1')->where('category', '=', '1')->where('is_delete', '=', '0')->get()->toArray();

                $getDataLo = PathwayContent::where('parent_id', '=', $id)->where('is_active', '=', '1')->where('category', '=', '2')->where('is_delete', '=', '0')->get()->toArray();
                
                
                if($category=='1' && $parent_id==0 && count($getDataLo)==0 ){
                    
                    $array['message']='There are no learning items or subsections in the following section:'.$value['title'];
                    $array['success'] = 'false';
                    $array['section_id']=$value['id'];
                    return $array;
                }

                if($category=='1' && $parent_id==0 && count($getData)==0 ){
                    
                    $array['message']='There are no learning items or subsections in the following section:'.$value['title'];
                    $array['success'] = 'false';
                    $array['section_id']=$value['id'];
                    return $array;
                }

                if($category=='1' && $parent_id!=0 ){
                   
                    $getDataSecLO = PathwayContent::where('parent_id', '=', $value['id'])->where('is_active', '=', '1')->where('category', '=', '2')->where('is_delete', '=', '0')->get()->toArray();
                    if(count($getDataSecLO)==0){
                        $array['message']='There are no learning objects in one or more subsections:'.$value['title'];
                        $array['success'] = 'false';
                        $array['section_id']=$value['id'];
                        return $array;
                    }
                }

                
                if($parent_id==0 && $sequence_start=='' && $type_id=='4'){
                    $array['message'] = 'One or more unlock rule are missing in the section '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                }elseif($parent_id==0 && $sequence_start==0 && $type_id=='4'){
                    $array['message'] = 'One or more unlock rule are missing in the section '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                }elseif($parent_id==0 && $completion_min=='' && $type_id=='2'){
                    $array['message'] = 'You must specify how many section the learner must complete '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                }elseif($category=='1' && $parent_id!=0 && $type_id=='4' && $sequence_start==''){
                    $array['message'] = 'One or more unlock rules are missing in the subsection '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                }elseif($category=='1' && $parent_id!=0 && $type_id=='2' && $completion_min==''){
                    $array['message'] = 'You must specify how many subsection the learner must complete '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                }

            }

            
            
        }elseif ($pathwayType=='4') {

        	if($getPathwayContentData1==0){
                $array['message'] = 'To publish your Pathway, you must include at least one section and one learning item.';
                $array['success'] = 'false';
                $array['section_id'] = $getPathwayData[0]['id'];
                return $array;
        	}


            if($sequence_start==''){
                $array['message'] = 'One or more unlock rule are missing';
                $array['success'] = 'false';
                $array['section_id'] = $getPathwayData[0]['id'];
                return $array;
            }

            foreach ($getPathwayContentData as $key => $value) {
                
                $parent_id = $value['parent_id'];
                $id = $value['id'];
                $category=$value['category'];
                $sequence_start=$value['sequence_start'];
                $type_id=$value['type_id'];
                $completion_min=$value['completion_min'];

                
                $getData = PathwayContent::where('parent_id', '=', $id)->where('is_active', '=', '1')->where('category', '=', '1')->where('is_delete', '=', '0')->get()->toArray();

                $getDataLo = PathwayContent::where('parent_id', '=', $id)->where('is_active', '=', '1')->where('category', '=', '2')->where('is_delete', '=', '0')->get()->toArray();
                
                
                if($category=='1' && $parent_id==0 && count($getDataLo)==0 ){
                    
                    $array['message']='There are no learning objects in one or more sections.';
                    $array['success'] = 'false';
                    $array['section_id']=$value['id'];
                    return $array;
                }

                if($category=='1' && $parent_id==0 && count($getData)==0 ){
                    
                    $array['message']='There are no subsections in one or more sections.';
                    $array['success'] = 'false';
                    $array['section_id']=$value['id'];
                    return $array;
                }

                if($category=='1' && $parent_id!=0 ){
                   
                    $getDataSecLO = PathwayContent::where('parent_id', '=', $value['id'])->where('is_active', '=', '1')->where('category', '=', '2')->where('is_delete', '=', '0')->get()->toArray();
                    if(count($getDataSecLO)==0){
                        $array['message']='There are no learning objects in one or more subsections.';
                        $array['success'] = 'false';
                        $array['section_id']=$value['id'];
                        return $array;
                    }
                }

                
        
                if($parent_id==0 && $sequence_start=='' && $type_id=='4'){
                    $array['message'] = 'One or more unlock rule are missing in the section '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                    return $array;
                }elseif($parent_id==0 && $sequence_start==0 && $type_id=='4'){
                    $array['message'] = 'One or more unlock rule are missing in the section '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                    return $array;
                }elseif($parent_id==0 && $completion_min=='' && $type_id=='2'){
                    $array['message'] = 'You must specify how many section the learner must complete '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                    return $array;
                }elseif($category=='1' && $parent_id!=0 && $type_id=='4' && $sequence_start==''){
                    $array['message'] = 'One or more unlock rules are missing in the subsection '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                    return $array;
                }elseif($category=='1' && $parent_id!=0 && $type_id=='2' && $completion_min==''){
                    $array['message'] = 'You must specify how many subsection the learner must complete '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                    return $array;
                }
                
           }
             
        }elseif ($pathwayType=='2') {

     
           if($completion_min=='0'){
                $array['message'] = 'You must specify how many section the learner must complete';
                $array['success'] = 'false';
                return $array;
           }

           if($getPathwayContentData1==0){
                $array['message'] = 'To publish your Pathway, you must include at least one section and one learning item.';
                $array['success'] = 'false';
                $array['section_id'] = $getPathwayData[0]['id'];
                return $array;
        	}

           foreach ($getPathwayContentData as $key => $value) {
                
                $parent_id = $value['parent_id'];
                $id = $value['id'];
                $category=$value['category'];
                $sequence_start=$value['sequence_start'];
                $type_id=$value['type_id'];
                $completion_min=$value['completion_min'];

                
                $getData = PathwayContent::where('parent_id', '=', $id)->where('is_active', '=', '1')->where('category', '=', '1')->where('is_delete', '=', '0')->get()->toArray();

                $getDataLo = PathwayContent::where('parent_id', '=', $id)->where('is_active', '=', '1')->where('category', '=', '2')->where('is_delete', '=', '0')->get()->toArray();
                
                
                if($category=='1' && $parent_id==0 && count($getDataLo)==0 ){
                    
                    $array['message']='There are no learning objects in one or more sections.';
                    $array['success'] = 'false';
                    $array['section_id']=$value['id'];
                    return $array;
                }

                if($category=='1' && $parent_id==0 && count($getData)==0 ){
                    
                    $array['message']='There are no subsections in one or more sections.';
                    $array['success'] = 'false';
                    $array['section_id']=$value['id'];
                    return $array;
                }

                if($category=='1' && $parent_id!=0 ){
                   
                    $getDataSecLO = PathwayContent::where('parent_id', '=', $value['id'])->where('is_active', '=', '1')->where('category', '=', '2')->where('is_delete', '=', '0')->get()->toArray();
                    if(count($getDataSecLO)==0){
                        $array['message']='There are no learning objects in one or more subsections.';
                        $array['success'] = 'false';
                        $array['section_id']=$value['id'];
                        return $array;
                    }
                }


                if($parent_id==0 && $sequence_start=='' && $type_id=='4'){
                    $array['message'] = 'One or more unlock rule are missing in the section '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                    return $array;
                }elseif($parent_id==0 && $sequence_start==0 && $type_id=='4'){
                    $array['message'] = 'One or more unlock rule are missing in the section '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                    return $array;
                }elseif($parent_id==0 && $completion_min=='' && $type_id=='2'){
                    $array['message'] = 'You must specify how many section the learner must complete '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                    return $array;
                }elseif($category=='1' && $parent_id!=0 && $type_id=='4' && $sequence_start==''){
                    $array['message'] = 'One or more unlock rules are missing in the subsection '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                    return $array;
                }elseif($category=='1' && $parent_id!=0 && $type_id=='2' && $completion_min==''){
                    $array['message'] = 'You must specify how many subsection the learner must complete '.$value['title'].'.';
                    $array['success'] = 'false';
                    $array['section_id'] = $value['id'];
                    return $array;
                }
        
           }
                      
        }   
            
      return $array;
    }

}


?>