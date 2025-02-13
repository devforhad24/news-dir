<?php
    require('connect.inc.php');

    $sql = "SELECT id,sitename,sitelogo,siteurl,details,country FROM newssite";
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
        <?php include('include/menu.inc.php') ?>
        </div>
        <div class="contentBody">
            <div class="contentBodyLeft">
                <div class="contentContainer">
                    <?php 
                        while($data = mysqli_fetch_array($sql_query)){
                            $id = $data['id'];
                            $sitename = $data['sitename'];
                            $sitelogo = $data['sitelogo'];
                            $siteurl = $data['siteurl'];
                    ?>
                    <div class="logoContainer">
                        <a href="http://<?php echo $siteurl; ?>"><img src="images/<?php echo $sitelogo; ?>" alt="prothomalo"></a>
                        <a href="details.php?id=<?php echo $id ?>"><h3><?php echo $sitename; ?></h3></a>
                    </div>
                    <?php } ?>
                </div>
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