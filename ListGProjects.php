<?php

class ListGProjects {

	private $projectRoot;

	/** 
	 * @param String $root: Root folder
	 */
	public function __construct($root) {
		$this->setProjectRoot($this->loadGPackage($root));
		$this->search($this->projectRoot);
	}

	public function getProjectRoot() {
		return $this->projectRoot;
	}
	private function setProjectRoot(GProject $project) {
		$this->projectRoot = $project;
	}

	/*********************************************
	/* Control
	/*********************************************/
	/** 
	 * @param GProject $projectParent : current project has be finding child projects
	 */
	private function search(GProject $projectParent) {

		$currentDir = scandir($projectParent->getAddress());
		foreach ($currentDir as $dir) {
			if ($dir == "." || $dir == "..") { continue;}
			$dir = $projectParent->getAddress() . "\\" . $dir;
			if (!is_dir($dir)) { continue; }


			try {
				$project = $this->loadGPackage($dir);
			} catch (GProjectException $e) {
				continue;
			}
			$projectParent->addProject($project);
			$this->search($project);
		}
	}

	/**
	 * Loads a package located in $address and return a relative GProject
	 *
	 * @throws GProjectException - Package not found if this is not in $address
	 */
	private function loadGPackage($address) {
		// Verificando existência
		$fileAddress = $address . "\\" . "package.json";

		if (!file_exists($fileAddress)) {
			throw new GProjectException('<strong>package.json</strong> not found in given address: ' . $address);
		}

		// Carregando
		$file = file($fileAddress);

		// Formatando
		$json = "";
		foreach ($file as $line) { $json .= $line; }

		$json = json_decode($json, true);

		// Creating a GProject
		return new GProject($json['name'], $json['description'], $address);
	}
}