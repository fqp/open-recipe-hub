<?php
require 'vendor/autoload.php';
require 'api/list.php';

Flight::route('GET /user/@userid:[0-9]+', function($userid){
    Flight::json(api\list_recipes($userid));
});

Flight::start();
?>