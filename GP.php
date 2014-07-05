<?php
include_once("GProject.php");
include_once("GProjectException.php");
include_once("ListGProjects.php");

class GP {
	private $list = null; // ListGProjects

	/** 
	 * @param String $root: Root folder
	 */
	public function __construct($root=null) {
		if ($root === null) {
			$root = getcwd();
		}

		$this->list = new ListGProjects($root);
	}

	private function setList($listGProjects) {
		$this->list = $listGProjects;
	}

	/** 
	 * Show the project's tree
	 */
	public function show() {
		echo $this->list->getProjectRoot();
	}
}