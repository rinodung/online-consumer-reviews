<?php
$dictionariesPath= __DIR__ . '/lib/PHPInsight/dictionaries/';
$dataPath= __DIR__ . '/lib/PHPInsight/data/';
$dictionariesClass = array("ign", "neg", "neu", "pos", "prefix");
$dictionariesFiles = array();
if(file_exists($dictionariesPath)) {
	$dictionariesFiles = scandir($dictionariesPath);
}
?>
<!DOCTYPE html>
<html lang="en">
	
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/dashboard.css" />
	<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js")></script>
	<script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<title>Online Consumer Review</title>
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Online Consumer Review</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="#">Dictionary <span class="sr-only">(current)</span></a></li>
            <li><a href="author.php">Author</a></li>
            <li class="active"><a href="dictionary.php">Dictionary</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">DataSet</h1>
         <?php
			foreach($dictionariesFiles as $dictionariesFile) {
				if($dictionariesFile == "." || $dictionariesFile == "..") continue;
				$dictionariesFilePath = $dictionariesPath  . $dictionariesFile;
				if(file_exists($dictionariesFilePath)) {
					$sourceData = include($dictionariesFilePath);
					
					$serializeData = serialize($sourceData);
					$dataFilePath = $dataPath. str_replace("source", "data", $dictionariesFile);
					
					if(file_exists($dataFilePath)) {
						file_put_contents($dataFilePath, $serializeData);
						echo "<h2 class='bg-success'>Refesh " . $dictionariesFile . "Data Successfully.<h2>";
						
				
					} else {
						echo "<h2 class='bg-danger'>Not found class</h2>";
					}
				
				}
			
			}
         ?>
          
          </div>
        </div>
      </div>
    </div>

    

    
  </body>
</html>