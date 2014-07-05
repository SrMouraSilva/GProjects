GProjects
=========

A simple viewer projects for your htdocs

![My index project](https://raw.githubusercontent.com/SrMouraSilva/GProject/master/doc/GProject.png)

About
-----
His htdocs/www folder is really messy? Simply view your projects in the root's folder using GProjects. You want list your projects in the root's index?

If your server run .php, you can it!

Using
-----
Just include in the desired root's index

**www/index.php**

    <!-- in head -->
    <link href="GP_folder/static/css.css" rel="stylesheet">
	<script src="GP_folder/static/js.js"></script>

    <!-- in body -->
    <?php 
    	include_once("GP_folder/GP.php");
		$GP = new GP();
	    $GP->show();
	?>

**www/package.json**

    {
      "name": "Index",
      "description": "Project's Index"
    }

How to works
------

The system will scan all parent's folders.

If this have a _package.json_, the 'name' and 'description' attributes will be showed in the _index.php_.

Also will scan subfolders to not find more package.json.

**Correct Example** 

    folder/
        subfolder/
            project
            package.json <-- Watch
        package.json <-- Watch
    index.php
    package.json  <-- Watch

**Incorrect Example** 

    folder/
        subfolder/
            project
            package.json
        package.json
    index.php

**Incorrect Example** 

    folder/
        subfolder/
            project
            package.json
    index.php
    package.json

**Incorrect Example** 

    folder/
        subfolder/
            project
        package.json
    index.php
    package.json

Result
------
The result can be viewed in the image upper =)
