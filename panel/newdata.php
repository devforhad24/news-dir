<?php
    require('../connect.inc.php');

    if(isset($_POST['sitename']) AND isset($_POST['siteurl']) AND isset($_POST['details']) AND isset($_POST['country']) AND isset($_POST['status']) ){
        $sitename = $_POST['sitename'];
        $siteurl = $_POST['siteurl'];
        $details = $_POST['details'];
        $country = $_POST['country'];
        $status = $_POST['status'];

        $sitelogo = $_FILES['sitelogo']['name'];
        $tmpname = $_FILES['sitelogo']['tmp_name'];

        if(!empty($sitename) AND !empty($sitelogo) AND !empty($siteurl) AND !empty($details) AND !empty($country) AND !empty($status)){
            move_uploaded_file($tmpname,'../images/'.$sitelogo);
            $sql = "INSERT INTO newssite VALUES ('NULL','$sitename','$sitelogo','$siteurl','$details','$country','$status')";
            $sql_query = mysqli_query($con, $sql);
        }else{
            echo 'Fill up all forms!';
        }
    }
    
?>

<form action="newdata.php" method="POST" enctype="multipart/form-data">
    Sitename: <input type="text" name="sitename"> <br><br>
    Sitelogo: <input type="file" name="sitelogo"> <br><br>
    Siteurl: <input type="text" name="siteurl"> <br><br>
    Details: <input type="text" name="details"> <br><br>
    Country: <input type="text" name="country" placeholder="text small letter"> <br><br>
    Status: <input type="text" name="status"> <br><br>
    <input type="submit" value="submit">
</form>