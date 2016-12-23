<?php
    $connection = new mysqli("localhost", "user", "pass", "table");
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
                <?php echo $b['SteamID']; ?>
            </td>
            <td>
                <?php echo $b['BugReport']; ?>
            </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </tbody>
    </div>
    </div>
</body>

<footer>
    <p>&copy;2016 Subject_Alpha</p>
</footer>
</html>