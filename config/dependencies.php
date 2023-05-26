<?php

use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Component\Translation\Loader\PhpFileLoader;
use Symfony\Component\Translation\Translator;

// DIC configuration

$container = $app->getContainer();
$session = new \SlimSession\Helper;

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Twig
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new \Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    //$view->addExtension(new Twig_Extension_Debug());

    return $view;
};

//Twig View. Setting the twig templates folders
$container['view'] = function ($c)use($session) {
    // $login = strpos($_SERVER['REQUEST_URI'], 'login') || strpos($_SERVER['REQUEST_URI'], 'login') || strpos($_SERVER['REQUEST_URI'], 'privacy-policy') || strpos($_SERVER['REQUEST_URI'], 'sso');

    // if (isset($session->user['org_id']) && !empty($session->user['org_id']) && !$login && (in_array($session->user['org_id'], [1,3,6,7,12,13,14,17,18,19,9,20]))) {

    //     $foldername = 'Org_' . $session->user['org_id'];
    //     $view = new \Slim\Views\Twig(__DIR__ . '/../templates/' . $foldername);
    // } else {
    //     $view = new \Slim\Views\Twig(__DIR__ . '/../templates');
    // }
    // $view->addExtension(new \Slim\Views\TwigExtension(
    //         $container->router, $container->request->getUri()
    // ));

    $settings = $c->get('settings');
    $view = new \Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    //$view->addExtension(new Twig_Extension_Debug());

   

    // check for org 1
    $langRoute=$c->request->getUri()->getPath();
    $requestedLanguage = explode('/', $langRoute)[0];
    $translator = new Translator($requestedLanguage);   
    $langArr = array();
    array_push($langArr, $requestedLanguage);
    $translator->setFallbackLocales($langArr);
    $translator->addLoader('php', new PhpFileLoader());
    // Add language files here
    $translator->addResource('php', __DIR__.'/../lang/Org_1/en_US.php', 'en'); // English
    $translator->addResource('php', __DIR__.'/../lang/Org_1/de_DE.php', 'de');
    $translator->addResource('php', __DIR__.'/../lang/Org_1/pt_PT.php', 'pt'); // Portugese
    $view->addExtension(new TranslationExtension($translator));
    return $view;
};

// Flash messages
$container['flash'] = function ($c) {
    return new \Slim\Flash\Messages;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// doctrine EntityManager
$container['em'] = function ($c) {
    $settings = $c->get('settings');
    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['doctrine']['meta']['entity_path'],
        $settings['doctrine']['meta']['auto_generate_proxies'],
        $settings['doctrine']['meta']['proxy_dir'],
        $settings['doctrine']['meta']['cache'],
        false
    );
    return \Doctrine\ORM\EntityManager::create($settings['doctrine']['connection'], $config);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new \Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['logger']['path'], \Monolog\Logger::DEBUG));
    return $logger;
};

// Service factory for the Eloquent
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
//$capsule->addConnection($container['settings']['master_db'], 'master_db');

$capsule->setAsGlobal();
$capsule->bootEloquent();
$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

$container['LoginController'] = function($container) use($session) {
    $settings = $container->get('settings');
    return new \Src\Controllers\LoginController($container->view, $container->router, $container->logger, $settings);
};


function pre($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function encriptString($simple_string){

    $encryption = base64_encode($simple_string);
    return $encryption;
}

function decriptString($encryption){

    $decryption = base64_decode($encryption);
    return trim($decryption);
}