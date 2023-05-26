<?php

namespace App\Controller;

use Slim\Container;
use MongoDB\Client as Mongo;

class BaseController
{
    protected $view;
    protected $logger;
    protected $flash;
    protected $em;  // Entities Manager
    protected $token;
    protected $router;

    public function __construct(Container $c)
    {
        $this->view = $c->get('view');
        $this->logger = $c->get('logger');
        $this->flash = $c->get('flash');
        $this->em = $c->get('em');
        $this->token = $c->get('token');
        $this->router = $c->get('router');

        $Mongo = new Mongo(MONGO_HOST);
        $this->MongoDB = $Mongo->{MONGO_DB_NAME};
    }
}
