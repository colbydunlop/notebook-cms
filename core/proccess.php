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
	
	static public function merge($templates, $separator = "") {
		$output = "";
	
		foreach ($templates as $template) {
			$content = (get_class($template) !== "Template")
				? "Error, incorrect type - expected Template."
				: $template->output();
			$output .= $content . $separator;
		}
	
		return $output;
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
			"page" => array(
				"name" => strtolower($name),
				"desc" => strtolower($desc),
			),
			"block" => array(
				"name" => "text-field",
				"content" => "text-area",
			),
			"data" => array(
				array(
					"name" => "sample",
					"content" => "sample text",
				)
			)
		);
		
		$path = ($GLOBALS['worlddir'].'/pages/'.$values['page']['name']);
		
		if (file_exists($path)) {
			$this->output = "error: page already exists";
		} else {
			mkdir($path);
			$serializedData = serialize($values);
			file_put_contents($path.'/'.$values['page']['name'].'.md', $serializedData);
			$this->output = "page successfully created!";	
		}
	}
	
	public function output() {
		return $this->output;
	}
}

class World {
	
	protected $output;
	
	public function __construct($name, $desc) {
	
		$values = array (
			"name" => strtolower($name),
			"desc" => strtolower($desc),
		);
		
		$path = ($GLOBALS['root'].'/data/worlds/'.$values['name']);
		
		if (file_exists($path)) {
			$this->output = "error: World already exists";
		} else {
			mkdir($path);
			$this->output = "World successfully created!";
		}
		
	}
	
	public function output() {
		return $this->output;
	}
	
}


?>