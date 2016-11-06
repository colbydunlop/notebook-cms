<?php

class Template {
    protected $file;
    protected $values = array();
  
    public function __construct($file) {
        $this->file = $file;
    }
	
	public function set($key, $value) {
		$this->values[$key] = $value;
	}
	  
	public function output() {
		if (!file_exists($this->file)) {
			return "Error loading template file ($this->file).";
		}
		$output = file_get_contents($this->file);
	  
		foreach ($this->values as $key => $value) {
			$tagToReplace = "[@$key]";
			$output = str_replace($tagToReplace, $value, $output);
		}
	  
		return $output;
	}
	
}

class Page {
	
	protected $output;
	
	public function __construct($name, $desc) {
		
		$values = array (
			"name" => strtolower($name),
			"desc" => strtolower($desc),
		);
	
		if (file_exists($GLOBALS['root'].'/page/'.$values['name'].'.md')) {
			$this->output = "error: page already exists";
		} else {
			$serializedData = serialize($values);
			file_put_contents($GLOBALS['root'].'/page/'.$values['name'].'.md', $serializedData);
			$this->output = "page successfully created!";	
		}
	}
	
	public function output() {
		return $this->output;
	}
}


?>