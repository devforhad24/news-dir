<?php
    require('core.inc.php');
    if(!empty($_SESSION['user_id'])){

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Dir</title>
</head>
<body>
    
    <a href="newdata.php"><h3>New Data</h3></a>
    <a href="listofdata.php"><h3>Edit Data</h3></a>
    <a href="logout.php"><h3>Logout</h3></a>

</body>
</html>

<?php }else{
    header('location:login.php');
} ?>