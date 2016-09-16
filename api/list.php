<?php
include 'paths.php';


$r = new paths\Resolver(123);
$recipes = array();

foreach ($r->listall() as $recipe_id) {
	$recipes[$recipe_id] = $r->getmeta($recipe_id);
}

var_dump($recipes);


?>