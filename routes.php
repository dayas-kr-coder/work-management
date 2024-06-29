<?php

// Home and static pages
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// Work routes
$router->get('/works', 'controllers/works/index.php');
$router->post('/works', 'controllers/works/store.php');

$router->get('/work', 'controllers/works/show.php');
$router->delete('/work', 'controllers/works/destroy.php');
$router->get('/work/create', 'controllers/works/create.php');
