<?php namespace api;

require_once 'paths.php';

function get_recipe($userid, $recipeid) {
 	 $resolver = new \paths\Resolver($userid);

	 $recipefile = file_get_contents($resolver->recipefile($recipeid));
	 $recipemeta = $resolver->getmeta($recipeid);

	 return array(
	 	"data" => $recipefile,
		"meta" => $recipemeta,
	 );
}

function put_recipe($userid, $recipeid, $data) {
	 $resolver = new \paths\Resolver($userid);

	 $output = [];
	 $return_var = 0;
	 $recipefile = $resolver->recipefile($recipeid);
	 $git_dir =  $resolver->recipedir($recipeid) . "/.git";

	 file_put_contents($recipefile, $data);

#	 return "/usr/bin/git --git-dir " . $resolver->recipedir($recipeid) . " add " . $recipefile;

	 $error = exec("/usr/bin/git --git-dir " . $git_dir . " add " . $recipefile . " 2>&1", $output, $return_var);
	 if (0 != $return_var) {
	    return $error;
         }

	 $error = exec("/usr/bin/git --git-dir " . $git_dir . " commit --author=\"Unimportant <nonuser@example.net>\" -m \"a change\" 2>&1", $output, $return_var);
	 if (0 != $return_var) {
	    return $error;
         }
}

?>