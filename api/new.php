<?php

require 'paths.php';

function new_recipe($userid, $recipeid) {
	 $resolver = new paths\Resolver($userid);

	 if (0 != exec("git clone -l " . $resolver->dummydir() . " " . $resolver->recipedir($recipeid))) {
	     return false;
	 }

	 return true;
};

new_recipe(123,456);

?>