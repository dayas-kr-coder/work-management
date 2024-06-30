<?php

// Home and static pages
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// Work routes
$router->get('/works', 'controllers/works/index.php')->only('auth');
$router->post('/works', 'controllers/works/store.php');

$router->get('/works/show', 'controllers/works/show.php');
$router->get('/works/create', 'controllers/works/create.php');
$router->get('/works/edit', 'controllers/works/edit.php');

$router->patch('/works/update', 'controllers/works/update.php');
$router->delete('/works/destroy', 'controllers/works/destroy.php');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');

$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/session', 'controllers/session/store.php')->only('guest');
$router->delete('/session', 'controllers/session/destroy.php')->only('auth');
