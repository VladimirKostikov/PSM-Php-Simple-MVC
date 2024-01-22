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
    [ 'GET',        '/product',        'PageController',       'product',       'product'],
    [ 'GET',        '/profile',        'ProfileController',    'profile',       'profile'],
    [ 'GET',        '/reg',            'AuthController',       'reg',           'reg'],
    [ 'GET',        '/login',          'AuthController',       'login',         'login'],




    // Post
    [ 'POST',       '/post/login',     'AuthController',        'post_login',   'post_login'],
    [ 'POST',       '/post/reg',       'AuthController',        'post_reg',     'post_reg']
];