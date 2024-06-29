<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/works', 'controllers/works/index.php');
$router->get('/work', 'controllers/works/show.php');
$router->get('/work/create', 'controllers/works/create.php');
$router->get('/work/update', 'controllers/works/update.php');
