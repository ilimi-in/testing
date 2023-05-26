<?php

//$session = new \SlimSession\Helper;
date_default_timezone_set("UTC");
$ht = "http://";
define('PROTOCOL', $ht);
if ($_SERVER['SERVER_PORT'] != 8080){
    define('DOMAIN', $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/");
	}
else {
    define('DOMAIN', $_SERVER['SERVER_NAME'] . "/");
 }
$filepath=dirname(__file__);
define('SUB_FOLDER', 'pwc_upgrade/public/');

define('HTTP_SERVER', PROTOCOL . DOMAIN . SUB_FOLDER);
define('BASE_URL', PROTOCOL . DOMAIN . SUB_FOLDER . 'c/' );
define('MEDIA_URL', PROTOCOL . DOMAIN . SUB_FOLDER . 'c/media-detail?id=');
define('MEDIA_URL_ADMIN', PROTOCOL . DOMAIN . SUB_FOLDER . 'admin/');
//define('SITE_URL', $_SERVER['BASE']);

	define('MONGO_HOST', 'mongodb://localhost:27017:');
	define('MONGO_DB_NAME','proedge');


define('MAX_FILE_SIZE_IMAGE', '500000');
define('MAX_FILE_SIZE_VIDEO', '500000');
define('default_password', 'admin@123');

define('formio_site', 'https://formio-new-qc.niit-mts.com/');

define('SMTP_HOST', '');
define('SMTP_PORT', '25');
define('TASK_LIST_ID_PREFIX', 'REQ_');
define('PAGE_LIMIT_TASKS', 10);
define('PAGE_LIMIT_DRAFTS', 10);
define('SUPER_ADMIN', 6);
define('DRAFT_LIST_ID_PREFIX', 'DR_');
define('DRAFT_LIST_NOTSHOWN', 'solutionwizard');
define('PAGE_LIMIT_GOALS', 10); 
define('PAGE_LIMIT_INITIATIVES', 10); 
define('MAX_FILE_SIZE', 524288000); 
define('PROPOSAL_URL', 'createproposal'); 
define('ADMIN', 0); 
define('USER_LIMIT', 100); 
//define('ENCRYPTION_KEY', 'eNbBDyjLr6uA5YRCZ2vh2aAUUAiDrhPathway');
define('ENCRYPTION_KEY', 'eNbBDyjLr6uA5YRCZ2vh2aAUUAiDrhBD');
define('TEMPLATE_EMAIL', '/usr/bin/php email.php ');
define('DOCUMENTPATH','documents/'); 
define('EXPIRY_TIME',300); 
define('REFRESH_LOCK_TIMING', 30000); 
define('PAGE_LIMIT_USER', 10);
 
define('ACTIVE',1);
define('INACTIVE',0);  
define('SECRET_SERVER_KEY', '');
define('LOCK_TIMING', 300); 
define('IDLE_TIMING', 1200);
define('MAX_LENGTH_TO_SHOW',2);
define('SECOND',60); //1 minute
define('api_code',"");
define('BULK_TASK_LIST_ID_PREFIX', 'BLK_REQ_');
define('TOKEN_VALIDITY',300); //token valid duration in seconds
define('ENCRYPTION_KEY_TOKEN_CREATION','');
define("CXP_FILE_PATH", './images/uploads');
define('TOKEN_VALIDITY_24_HOUR',86400); //token valid duration in seconds
define('SECRET_JWT_SKEY_CXP', '');
define('PROEDGE',1);
         
    
if(!empty($session->user["roleConstant"])){        
foreach($session->user["roleConstant"] as $constant_key=>$constant_value){    
define($constant_key,$constant_value);               
}              
}              
define('PROEDGE_LOGIN_URL','http://localhost/PWC/public/login');

define('PROEDGE_CLICKSTREAM_URL', '');
define('FILE_MINE_TYPE', serialize(array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel')));


define('APP_URL', PROTOCOL . $_SERVER['SERVER_NAME']);
define('MONGO_MASTER_HOST', '');
define('AUTH_REQUEST', '/pwc/public/login');
define('PROEDGE_CSS_VERSION','1.1');
define('PWC_UPLOAD_PWC_THUMBNAIL','images/org_1/pwc_thumbnail/');
define('PROEDGE_REVIEWERS','3');
define('LO_UPLOAD_LO_THUMBNAIL','images/org_1/lo_thumbnail/');

define('PATHWAY_TYPE', serialize(array('3' => 'General', '4' => 'Sequence', '2' => 'Completion rule', '1' => 'Branching')));
define('PATHWAY_PREVIEW_KEY','pwcpathway_qc');
define('PATHWAY_PREVIEW_URL','https://learner-pathway-qc.niit-mts.com/?token=');