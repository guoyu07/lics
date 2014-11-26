<?php

Router::connect('/', array('controller' => 'books', 'action' => 'index'));

CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
