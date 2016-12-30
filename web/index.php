<?php
//START CONFIG------------------------
    $DB_HOSTNAME = "localhost";
    $DB_USERNAME = "admin";
    $DB_PASSWORD = "password";
    $DB_NAME = "generic_name";
    $COMMUNITY_NAME = "My favorite server";
//END CONFIG--------------------------

	$pdo = new PDO("mysql:host=$DB_HOSTNAME;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$result = array();
	try {
   		$result = $pdo->query("SELECT SteamID, BugReport FROM bug_report");
    	$result = $result->fetchAll();
	} catch (Exception $e) {
    	$error = $e->getMessage();
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
    	<title><?php echo htmlspecialchars($COMMUNITY_NAME);?> Bug Reports</title>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/darkly/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body class="background-color">
    	<div class="container">
        	<div class="row">
           		<div class="col-lg-10 col-lg-push-1">
                	<?php
                		if (isset($error)) {
                    		echo "<div class='alert alert-danger'>$error</div>";
                		} else {
                	?>
                    	<table class="table table-bordered">
                        	<thead>
                            	<tr>
                                	<th>Reporter (SteamID)</th>
                                	<th>Description</th>
                            	</tr>
                        	</thead>

                        	<tbody>
                            	<?php foreach ($result as $row): ?>
                            	<tr>
                            		<td>
                            			<?php
							$ReporterSteamID = strtolower($row["SteamID"]);
							if (substr($ReporterSteamID,0,7)=='steam_0') {
								$tmp=explode(':', $ReporterSteamID);
							}
							if ((count($tmp)==3) && is_numeric($tmp[1]) && is_numeric($tmp[2])){
								$steamidCalc=($tmp[2]*2)+$tmp[1]; 
								$calckey=1197960265728;
								$pre=7656;	
								$steamcid=$steamidCalc+$calckey;
								$ReporterProfile = "http://steamcommunity.com/profiles/$pre" . number_format($steamcid,0,"","");
							};
							echo "<a href='" . $ReporterProfile . "' target='_blank'>" . $row["SteamID"] . "</a>";
                            			?>
                            		</td>
                            		<td>
                            			<?php echo htmlspecialchars( $row["BugReport"],ENT_QUOTES, 'UTF-8'); ?>
                            		</td>
                            	</tr>
                            	<?php endforeach; ?>
                        	</tbody>
                    	</table>

                    	<?php 
                    		} 
                    	?>
            	</div>
        	</div>
    	</div>
	</body>
    <footer>
        &copy; <?php echo date("Y") ?> by <a href="https://github.com/SubjectAlpha">Subject_Alpha</a>
    </footer>
</html>
