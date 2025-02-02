<?php
    $getid = $_REQUEST['id'];
    
    require('../connect.inc.php');
    include('menu.inc.php');
    require('core.inc.php');

    if(!empty($_SESSION['user_id'])){

        $sql = "SELECT * FROM newssite WHERE id={$getid}";
        $sql_query = mysqli_query($con, $sql);

        $data = mysqli_fetch_assoc($sql_query);
        $id = $data['id'];
        $sitename = $data['sitename'];
        $siteurl = $data['siteurl'];
        $details = $data['details'];
        $country = $data['country'];
        $status = $data['status'];

    if(isset($_POST['id']) AND isset($_POST['sitename']) AND isset($_POST['siteurl']) AND isset($_POST['details']) AND isset($_POST['country']) AND isset($_POST['status']) ){
        $newid = $_POST['id'];
        $newsitename = $_POST['sitename'];
        $newsiteurl = $_POST['siteurl'];
        $newdetails = $_POST['details'];
        $newcountry = $_POST['country'];
        $newstatus = $_POST['status'];

       $sitelogo = $_FILES['sitelogo']['name'];
       $tmpname = $_FILES['sitelogo']['tmp_name'];

        if(!empty($newid) AND !empty($newsitename) AND !empty($sitelogo) AND !empty($newsiteurl) AND !empty($newdetails) AND !empty($newcountry) AND !empty($newstatus) ){
            move_uploaded_file($tmpname,'../images/'.$sitelogo);
            $update_sql = "UPDATE newssite SET sitename='$newsitename', sitelogo='$sitelogo' ,siteurl ='$newsiteurl', details ='$newdetails', country ='$newcountry', status ='$newstatus' WHERE id=$newid";
            if($update_sql_query = mysqli_query($con, $update_sql)){
                header('location: listofdata.php');
            }else{
                echo 'Something went wrong! Try again please';
            }
        }else if(!empty($newid) AND !empty($newsitename) AND empty($sitelogo) AND !empty($newsiteurl) AND !empty($newdetails) AND !empty($newcountry) AND !empty($newstatus) ){
            $update_sql = "UPDATE newssite SET sitename='$newsitename', sitelogo='$sitelogo' ,siteurl ='$newsiteurl', details ='$newdetails', country ='$newcountry', status ='$newstatus' WHERE id=$newid";
            if($update_sql_query = mysqli_query($con, $update_sql)){
                header('location: listofdata.php');
            }else{
                echo 'Something went wrong! Try again please';
            }
        }else{
            echo 'Fill up all fields';
        }   
    }

    $sql_menu = "SELECT * FROM mainmenu";
    $sql_menu_query = mysqli_query($con, $sql_menu);
?>

<form action="editdata.php" method="POST" enctype="multipart/form-data">
    id: <input type="text" name="id" value="<?php echo $id; ?>" readonly> <br><br>
    Sitename: <input type="text" name="sitename" value="<?php echo $sitename; ?>"> <br><br>
    Sitelogo: <input type="file" name="sitelogo"> <br><br>
    Siteurl: <input type="text" name="siteurl" value="<?php echo $siteurl; ?>"> <br><br>
    Details: <input type="text" name="details" value="<?php echo $details; ?>"> <br><br>
    Country: <select name="country">
        <?php
            while($menudata = mysqli_fetch_array($sql_menu_query)){
            $menucountryname = $menudata['countryname'];
            $menucountryalias = $menudata['countryalias'];
        ?>
        <option value="<?php echo $menucountryalias;?>"<?php if($country == $menucountryalias){ echo 'selected'; } ?> ><?php echo $menucountryname;?></option>
        <?php } ?>
        </select> <br><br>
    Status: <input type="radio" name="status" value="publish" <?php if($status == 'publish'){ echo 'checked'; } ?> >Publish
            <input type="radio" name="status" value="unpublish" <?php if($status == 'unpublish'){ echo 'checked'; } ?> >Unpublish
            <br><br>
    
    <input type="submit" value="submit">
</form>

<?php }else{
        header('location:login.php');
    }
?>