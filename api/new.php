<?php namespace api;

require_once 'paths.php';

function new_recipe($userid, $recipeid) {
	 $resolver = new \paths\Resolver($userid);

	 $output = [];
	 $return_var = 0;
	 $error = exec("/usr/bin/git clone -l " . $resolver->dummydir() . " " . $resolver->recipedir($recipeid) . " 2>&1", $output, $return_var);
	 if (0 != $return_var) {
	     return $error;
	 }
	 exec("chmod go+rw " . $resolver->recipedir($recipeid));

	 return true;
};

function new_user($userid) {
	 $resolver = new \paths\Resolver($userid);

	 if (0 != exec("mkdir " . $resolver->userdir())) {
	    return false;
	 }

	 return true;
}


?>