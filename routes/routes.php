<?php

/**
 * Method
 * URI
 * Controller
 * Action
 */


return [
    [ 'GET',        '/',               'PageController',       'index'],
    [ 'GET',        '/product',        'PageController',       'product'],
    [ 'GET',        '/profile',        'ProfileController',    'profile'],
    [ 'GET',        '/reg',            'AuthController',       'reg'],
    [ 'GET',        '/login',          'AuthController',       'login'],




    // Post
    [ 'POST',       '/post/login',     'AuthController',        'post_login'],
    [ 'POST',       '/post/reg',       'AuthController',        'post_reg']
];