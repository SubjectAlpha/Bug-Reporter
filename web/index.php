<?php
//START CONFIG------------------------
    $DB_HOSTNAME = "localhost";
    $DB_USERNAME = "admin";
    $DB_PASSWORD = "password";
    $DB_NAME = "generic_name";
//END CONFIG--------------------------

    $connection = new mysqli($DB_HOSTNAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    $result = mysqli_query($connection, "SELECT SteamID,BugReport FROM bug_report");
    mysqli_fetch_assoc($result);
    mysqli_close($connection); //Make sure to close out the database connection
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>3FX Bug Reports</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="center-page">
    <div>
    <tbody>
    <div class="table">
        <table>
            <tr>
                <td colspan="2">Bug Reports</td>
            </tr>
            <tr>
                <td>SteamID</td>
                <td>Description</td>
            </tr>
                <?php foreach($result as $bu=>$b): ?>
            <tr>
            <td>
                <?php echo htmlspecialchars($b['SteamID'], ENT_QUOTES, 'UTF-8'); ?>
            </td>
            <td>
                <?php echo htmlspecialchars($b['BugReport'], ENT_QUOTES, 'UTF-8'); ?>
            </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    </tbody>
    </div>
    </div>
</body>

<footer>
    <p>&copy;2016 <a href="https://github.com/SubjectAlpha" style="color:#fff;">Subject_Alpha</a> (Basic Structure)</p>
    <p><a href="https://github.com/Lunaversitay/Bug-Reporter/tree/master/web" style="color:#fff;">Lunaversity</a> (Web Improvements)</p>
    <p><a href="https://github.com/meharryp" style="color:#fff;">meharryp</a> (Security Improvements)</p>
</footer>
</html>
