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
            $sql = "INSERT INTO newssite VALUES ('','$sitename','$sitelogo','$siteurl','$details','$country','$status')";
            $sql_query = mysqli_query($con, $sql);
        }else{
            echo 'Fill up all forms!';
        }
    }

    $sql_menu = "SELECT * FROM mainmenu";
    $sql_menu_query = mysqli_query($con, $sql_menu);
    
?>

<form action="newdata.php" method="POST" enctype="multipart/form-data">
    Sitename: <input type="text" name="sitename"> <br><br>
    Sitelogo: <input type="file" name="sitelogo"> <br><br>
    Siteurl: <input type="text" name="siteurl"> <br><br>
    Details: <input type="text" name="details"> <br><br>
    Country: <select name="country">
        <?php
            while($menudata = mysqli_fetch_array($sql_menu_query)){
            $menucountryname = $menudata['countryname'];
            $menucountryalias = $menudata['countryalias'];
        ?>
        <option value="<?php echo $menucountryalias;?>"><?php echo $menucountryname;?></option>
        <?php } ?>
    </select> <br><br>
    Status: <input type="radio" name="status" value="publish">Publish 
            <input type="radio" name="status" value="unpublish">Unpublish <br><br>
    <input type="submit" value="submit">
</form>