<?php

// Home and static pages
$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

// Work routes
$router->get('/works', 'works/index.php')->only('auth');
$router->post('/works', 'works/store.php')->only('auth');

$router->get('/work', 'works/show.php')->only('auth');
$router->get('/work/create', 'works/create.php')->only('auth');
$router->get('/work/edit', 'works/edit.php')->only('auth');

$router->patch('/work/update', 'works/update.php')->only('auth');
$router->delete('/work', 'works/destroy.php')->only('auth');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');
