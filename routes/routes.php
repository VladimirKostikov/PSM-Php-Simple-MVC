<?php

/**
 * Routes
 * This file contains all URL routes
 * File is used in the Route class
 */


return [
    
    // GET Requests
    // TYPE         URL                 Controller              Method          Name
    [ 'GET',        '/',               'PageController',       'index',         'welcome'],
    [ 'GET',        '/profile',        'PageController',       'profile',       'profile'],
    [ 'GET',        '/reg',            'AuthController',       'reg',           'reg'],
    [ 'GET',        '/login',          'AuthController',       'login',         'login'],
    [ 'GET',        '/exit',           'AuthController',       'exit',          'exit'],


    // POST Requests
    // TYPE         URL                 Controller              Method          Name
    [ 'POST',       '/post/login',     'AuthController',        'post_login',   'post_login'],
    [ 'POST',       '/post/reg',       'AuthController',        'post_reg',     'post_reg']
];