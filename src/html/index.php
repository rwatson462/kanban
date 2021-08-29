<?php

include dirname(__DIR__).'/config.php';
include dirname(__DIR__).'/config/route_config.php';

// single point of entry for all requests
// determine requested URI, check if file
// exists, include it if it does
$uri = $_SERVER['REQUEST_URI'];

// request uri contains query string parameters
// we'll ditch those as PHP has already got them
// captured in $_GET
[$uri] = explode('?', $uri);

// special case '/'
if( $uri === '/' )
{
   $uri = '/welcome';
}

if(!file_exists(RouteDirectory.$uri.'.php'))
{
   http_response_code(404);
   include RouteDirectory.'/404.html';
   exit;
}

include RouteDirectory.$uri.'.php';
