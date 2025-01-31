<?php
    require('connect.inc.php');

    $getid = $_GET['id'];

    $sql = "SELECT id,sitename,sitelogo,siteurl,details,country FROM newssite WHERE id=$getid";
    $sql_query = mysqli_query($con, $sql);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="mainBody">
        <div class="topBar">
            <h1>NewsDir</h1>
        </div>
        <div class="menuBar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Bangladesh</a></li>
                <li><a href="#">India</a></li>
                <li><a href="#">America</a></li>
            </ul>
        </div>
        <div class="contentBody">
            <div class="contentBodyLeft">
                <?php
                    $data = mysqli_fetch_array($sql_query);

                    $sitename = $data['sitename'];
                    $sitelogo = $data['sitelogo'];
                    $details = $data['details'];

                ?>
                <h2><?php echo $sitename; ?></h2>
                
                <img width="250px;" id="detailslogo" src="images/<?php echo $sitelogo; ?>" alt="sitelogo">
                <p><?php echo $details; ?></p>
            </div>
            <div class="contentBodyRight">
                <div class="contentBodyRightOne">
                    contebodyright1
                </div>
                <div class="contentBodyRightTwo">
                    contentbodyrihgt2
                </div>
            </div>
        </div>
        <div class="copyrightBar">
            copyright
        </div>
    </div>

</body>
</html>