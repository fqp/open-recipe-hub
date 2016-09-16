<?php namespace api;

include 'paths.php';

function list_recipes($userid) {
	 $r = new \paths\Resolver($userid);
	 $recipes = array();

	 foreach ($r->listall() as $recipe_id) {
	 	 $recipes[$recipe_id] = $r->getmeta($recipe_id);
	 }

	 return $recipes;
}

?>