<?php
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Router\Group as RouterGroup;

$router = new Router(FALSE);

$router->removeExtraSlashes(true);

$router->add(
    '/',
    [
        "controller" => "index",
        "action"     => "index",
    ]
);

$router->add( "/registration",    ["controller" =>"registration"]);
$router->add( "/login", [ "controller" =>"login" ] );
$router->add( "/recovery", [ "controller" =>"recovery" ] );
//$router->add( "/project", [ "controller" =>"project" ] );

// В качестве первой позиции выступает параметр 'country'



$router->add(
    "/project([0-9\-]+)/house([0-9\-]+)/flat([0-9\-]+)",
    [
        "controller" => "project",
        "project"   => 1,
        "house"     => 2,
        "flat"      => 3
    ]
);

$router->add(
    "/project([0-9\-]+)/house([0-9\-]+)",
    [
        "controller" => "project",
        "project"   => 1,
        "house"     => 2
    ]
);

$router->add(
    "/project([0-9\-]+)",
    [
        "controller" => "project",
        "project"   => 1
    ]
);



$recovery = new RouterGroup([ "controller" => "recovery" ]);
$recovery->setPrefix("/recovery");
$recovery->add( "/request_post", [ "action" =>"request_post" ] );
$recovery->add( "/request",  [ "action" => "request"] );

$authorization = new RouterGroup([ "controller" => "authorization" ]);
// Маршруты начинаются с преффикса /authorization
$authorization->setPrefix("/authorization");
$authorization->add( "/login",  [ "action" => "login" ] );
$authorization->add( "/registration", ["action" => "registration"] );
$authorization->add( "/logout", ["action" => "logout"] );

/*
$router->add(
    "/:controller/:action",
    [
        "controller" => 1,
        "action"     => 2,
    ]
);*/
$router->mount($recovery);
$router->mount($authorization);

$router->notFound(
    [
        "controller" => "errors",
        "action"     => "show404",
    ]
);


return $router;
