<?php namespace paths;

class Resolver {
      function __construct($userid) {
      	       $this->userid = $userid;
	       $this->root = $_SERVER["DOCUMENT_ROOT"];
      }

      function bindir() {
      	       return $this->root . "/bin";
      }

      function extractor() {
      	       return $this->bindir() . "/extract_ingredients.py";
      }

      function dummydir() {
      	       return $this->root . "/data/dummy";
      }

      function userdir() {
      	       return $this->root . "/data/" . $this->userid;
      }

      function recipedir($recipeid) {
      	       return $this->userdir($this->userid) . "/" . $recipeid;
      }

      function recipefile($recipeid) {
      	       return $this->recipedir($recipeid) . "/recipe";
      }


      function listall() {
      	       $alldirs = array();
	       foreach (scandir($this->userdir()) as $dir) {
	       	   if ("." == $dir || ".." == $dir) {
		      continue;
		   }
	           if (!is_dir($this->userdir() . "/" . $dir)) {
		      continue;
		   }
		   if (!is_dir($this->userdir() . "/" . $dir . "/" . ".git")) {
		      continue;
		   }
		   $alldirs[] = $dir;
	       }

	       return $alldirs;
      }

      function getmeta($recipeid) {
      	       $metastr = shell_exec($this->extractor() . " < " . $this->recipefile($recipeid));
	       $meta = json_decode($metastr);
	       return $meta;
      }
};


?>