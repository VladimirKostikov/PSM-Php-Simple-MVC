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
    [ 'GET',        '/register',       'AuthController',       'register'],
    [ 'GET',        '/login',          'AuthController',       'login'],
];