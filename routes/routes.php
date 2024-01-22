<?php

/**
 * Method
 * URI
 * Controller
 * Action
 * Name
 */


return [
    [ 'GET',        '/',               'PageController',       'index',         'welcome'],
    [ 'GET',        '/profile',        'PageController',       'profile',       'profile'],
    [ 'GET',        '/reg',            'AuthController',       'reg',           'reg'],
    [ 'GET',        '/login',          'AuthController',       'login',         'login'],
    [ 'GET',        '/exit',           'AuthController',       'exit',          'exit'],




    // Post
    [ 'POST',       '/post/login',     'AuthController',        'post_login',   'post_login'],
    [ 'POST',       '/post/reg',       'AuthController',        'post_reg',     'post_reg']
];