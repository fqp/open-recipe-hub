<?php
require_once 'vendor/autoload.php';
require_once 'api/list.php';
require_once 'api/new.php';
require_once 'api/security.php';
require_once 'api/recipe.php';

Flight::route('OPTIONS *', function() {
     header("Access-Control-Allow-Origin: *");
     header("Access-Control-Allow-Headers: content-type");
     Flight::json(array());
});

Flight::route('GET /user/@userid:[0-9]+', function($userid) {
     header("Access-Control-Allow-Origin: *");
    Flight::json(api\list_recipes($userid));
});

Flight::route('POST /user/@userid:[0-9]+/new', function($userid) {
     header("Access-Control-Allow-Origin: *");
    if (!api\security_can_modify($userid)) {
        Flight::json(array("error" => "security"));
    }
    $recipe_id = uniqid("", true);
    $recipe_message = api\new_recipe($userid, $recipe_id);
    if ($recipe_message === true) {
       return Flight::json(array("recipe_id" => $recipe_id));
    } else {
       return Flight::json(array("error" => $recipe_message));
    }
});

Flight::route('GET /user/@userid:[0-9]+/recipe/@recipeid:[0-9]+', function($userid, $recipeid) {
     header("Access-Control-Allow-Origin: *");
    return Flight::json(api\get_recipe($userid, $recipeid));
});


Flight::route('POST /user/new/@userid:[0-9]+', function($userid) {
     header("Access-Control-Allow-Origin: *");
    if (!api\security_can_modify($userid)) {
        Flight::json(array("error" => "security"));
    }

    $new_msg = api\new_user($userid);
    if ($new_msg === true) {
        return Flight::json(array("user_id" => $userid));
    } else {
        return Flight::json(array("error" => $new_msg));
    }
});


Flight::route('POST /user/@userid:[0-9]+/fork/@anotheruserid:[0-9]+/recipes/@recipeid:[0-9]+', function($userid, $anotheruserid, $recipeid) {
     header("Access-Control-Allow-Origin: *");
    if (!api\security_can_modify($userid)) {
        Flight::json(array("error" => "security"));
    }

    if (api\fork($userid, $anotheruserid, $recipeid)) {
        return Flight::json(array("user_id" => $userid, "recipe_id" => $recipeid));
    } else {
        return Flight::json(array("error" => "error"));
    }
});

Flight::route('PUT /user/@userid:[0-9]+/recipe/@recipeid:[0-9]+', function($userid, $recipeid) {
     header("Access-Control-Allow-Origin: *");
    if (!api\security_can_modify($userid)) {
       Flight::json(array("error" => "security"));
    }

    $data = file_get_contents("php://input");

    $error = api\put_recipe($userid, $recipeid, $data);
    if ($error === true) {
       return Flight::json(array("success" => true ));
    } else {
      return Flight::json(array("error" => $error));
    }
});

Flight::route('GET /allthethings', function() {
    header("Access-Control-Allow-Origin: *");
    return Flight::json(api\list_all_recipes());
});


Flight::start();
?>