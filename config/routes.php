<?php

use Slim\Http\Request;
use Slim\Http\Response;
// Routes

// $app->get('/', 'App\Controller\HomeController:index');
// $app->get('/login', 'App\Controller\HomeController:login');

// $app->get('/post/{id}', 'App\Controller\HomeController:viewPost');
// $app->get('/member/post/{id}', 'App\Controller\HomeController:viewPost');


// $app->post('/member/login', 'App\Controller\AuthController:login');
// $app->get('/member/logout', 'App\Controller\AuthController:logout');

$app->get('/', 'App\Controller\LoginController:defaultRoute')->setName('defaultRoute');

$app->group('/{lang:(?:en|de|pt)}', function() use($container) {
	
	$this->get('/login', 'App\Controller\LoginController:index')->setName('login');
	$this->get('/logout', 'App\Controller\LoginController:logout')->setName('logout');
	$this->get('/thanks', 'App\Controller\LoginController:thanksLogin')->setName('thanksLogin');
	$this->post('/proedge-login', 'App\Controller\LoginController:ProedgeLoginSubmit')->setName('ProedgeLoginSubmit');
	$this->get('/task-list', 'App\Controller\Org_1\MainController:taskList')->setName('taskList');
	$this->get('/forms/{formName}', 'App\Controller\Org_1\MainController:FormRender')->setName('newFormRender');
	$this->get('/pathway-details/{id}', 'App\Controller\Org_1\MainController:pathwayDetails')->setName('pathwayDetails');
	$this->get('/edit/{form_type}/{id}', 'App\Controller\Org_1\MainController:editDraft')->setName('editDraft');
	$this->post('/edit/{form_type}/{id}', 'App\Controller\Org_1\MainController:editDraft')->setName('updatDraft');
	$this->post('/task-list-data', 'App\Controller\Org_1\MainController:taskListData')->setName('taskListData');
	$this->post('/add-pathway-data', 'App\Controller\Org_1\MainController:addPathwayData')->setName('addPathwayData');
	$this->post('/pathway-section-details', 'App\Controller\Org_1\MainController:addSectionDetails')->setName('addSectionDetails');
	$this->post('/learning-object', 'App\Controller\Org_1\MainController:addExternalLearning')->setName('addExternalLearning');
	$this->get('/forms/{formName}/{id}', 'App\Controller\Org_1\MainController:FormRender')->setName('secFormRender');
	$this->get('/forms/{formName}/{id}/{sectionId}', 'App\Controller\Org_1\MainController:FormRender')->setName('subSecFormRender');
	//$this->get('/upload-background/{id}', 'App\Controller\Org_1\MainController:uploadBackGroungImage')->setName('uploadBackGroungImage');
	$this->get('/download-pathway', 'App\Controller\Org_1\MainController:downloadPathwayExcel')->setName('downloadPathwayExcel');
});

$app->post('/get-form-data', 'App\Controller\Org_1\MainController:getFormData')->setName('getFormData');
$app->post('/inactivate-pathway', 'App\Controller\Org_1\MainController:inactivatePathway')->setName('inactivatePathway');
$app->post('/save-custom-filter', 'App\Controller\Org_1\MainController:saveCustomFilter')->setName('saveCustomFilter');
$app->post('/get-custom-filter', 'App\Controller\Org_1\MainController:getCustomFilter')->setName('getCustomFilter');
$app->post('/unique-pathway-check', 'App\Controller\Org_1\MainController:uniquePathwayCheck')->setName('uniquePathwayCheck');
$app->get('/get-field-master-data', 'App\Controller\Org_1\MainController:getFieldMasterData')->setName('getFieldMasterData');
$app->get('/get-skills-data', 'App\Controller\Org_1\MainController:getSkillsData')->setName('getSkillsData');
$app->post('/save-custom-filter-lo', 'App\Controller\Org_1\MainController:saveFilterValue')->setName('saveFilterValue');
$app->post('/delete-custom-filter', 'App\Controller\Org_1\MainController:deleteCustomFilter')->setName('deleteCustomFilter');
$app->post('/get-form-custom-filter', 'App\Controller\Org_1\MainController:getFormCustomFilter')->setName('getFormCustomFilter');
$app->post('/get-custom-filter-lo', 'App\Controller\Org_1\MainController:getFormCustomFilterLo')->setName('getFormCustomFilterLo');
$app->post('/change-section-position', 'App\Controller\Org_1\MainController:changeSectionPosition')->setName('changeSectionPosition');
$app->post('/change-lo-position', 'App\Controller\Org_1\MainController:changeLOPosition')->setName('changeLOPosition');
$app->post('/delete-lo', 'App\Controller\Org_1\MainController:deleteLO')->setName('deleteLO');
$app->post('/delete-sub-section', 'App\Controller\Org_1\MainController:deleteSubSection')->setName('deleteSubSection');
$app->post('/publish-pathway', 'App\Controller\Org_1\MainController:publishPathway')->setName('publishPathway');
$app->post('/save-minimum-complition', 'App\Controller\Org_1\MainController:saveMinimumComplition')->setName('saveMinimumComplition');
$app->post('/save-sequence-start', 'App\Controller\Org_1\MainController:saveSequenceStart')->setName('saveSequenceStart');
$app->post('/sequence-unlock', 'App\Controller\Org_1\MainController:sequenceUnlock')->setName('sequenceUnlock');
$app->post('/add-branch', 'App\Controller\Org_1\MainController:addBranch')->setName('addBranch');
$app->post('/delete-pathway', 'App\Controller\Org_1\MainController:deletePathway')->setName('deletePathway');
$app->post('/upload-background/{id}', 'App\Controller\Org_1\MainController:uploadBackGroungImage')->setName('uploadBackGroungImage');
$app->post('/download-pathway/{lang}', 'App\Controller\Org_1\MainController:downloadPathway')->setName('downloadPathway');

$app->post('/copy-pathway', 'App\Controller\Org_1\MainController:copyPathway')->setName('copyPathway');