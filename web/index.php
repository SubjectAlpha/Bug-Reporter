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
                            			<?php echo htmlspecialchars( $row["SteamID"],ENT_QUOTES, 'UTF-8'); ?>
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
