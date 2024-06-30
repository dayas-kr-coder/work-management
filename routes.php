<?php

// Home and static pages
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// Work routes
$router->get('/works', 'controllers/works/index.php')->only('auth');
$router->post('/works', 'controllers/works/store.php')->only('auth');

$router->get('/work', 'controllers/works/show.php')->only('auth');
$router->get('/work/create', 'controllers/works/create.php')->only('auth');
$router->get('/work/edit', 'controllers/works/edit.php')->only('auth');

$router->patch('/work/update', 'controllers/works/update.php')->only('auth');
$router->delete('/work', 'controllers/works/destroy.php')->only('auth');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');

$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/session', 'controllers/session/store.php')->only('guest');
$router->delete('/session', 'controllers/session/destroy.php')->only('auth');
