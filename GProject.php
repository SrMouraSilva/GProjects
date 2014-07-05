<?php
/*********************************************
/* Model and View
/*********************************************/
class GProject {
	private $name = "";
	private $description = "";
	private $address = "";

	private $projects = array();

	public static $ADDRESS = 'C:/xampp/htdocs';

	/** 
	 * GProject
	 */
	public function __construct($name, $description, $address) {
		$this->setName($name);
		$this->setDescription($description);
		$this->setAddress($address);
	}


	/** Return the name project
	 */
	public function getName() {
		return $this->name;
	}
	/** Set the project name
	 *  Obs: Change in here dont change in package.json
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/** Return the project's link
	 */
	public function getLink() {
		$link = str_replace('\\', "/", $this->address);
		return str_replace(GProject::$ADDRESS, "", $link);
	}
	/** Get the project's address
	 */
	public function getAddress() {
		return $this->address;
	}
	/** Set the project's address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}


	/** Get the description
	 */
	public function getDescription() {
		return $this->description;
	}
	/** Get the description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}


	/** Get the (sub)Projects
	 *  Obs: Change in here dont change in package.json
	 */
	public function getProjects() {
		return $this->projects;
	}

	/** Add a (sub)GProject in this
	 */
	public function addProject(GProject $project) {
		array_push($this->projects, $project);
	}

	/*********************************************
	/* View
	/*********************************************/
	public function __toString() {
		$return = "";
		// Print GProject Details
		$return .= "<ul class='project'>";
			$return .= "<li>";
				$return .= "<a href='". $this->getLink() ."'>";
				$return .= "<dl>";
					$return .= "<dt>" . $this->getName() . "</dt>";
					$return .= "<dd>" . $this->getDescription() . "</dd>";
				$return .= "</dl>";
				$return .= "</a>";
			$return .= "</li>";

			// Print subGProject Details
			foreach ($this->getProjects() as $subProject) {
				//$return .= "<li>";
					$return .= $subProject;
				//$return .= "</li>";
			}

		$return .= "</ul>";

		return $return;
	}
}
?>