<?php 
    require ('../connect.inc.php');

    $sql = "SELECT id,sitename FROM newssite";
    $sql_query = mysqli_query($con, $sql);

    while($data = mysqli_fetch_array($sql_query)){
        $id = $data['id'];
    ?>
    <a href="editdata.php?id=<?php echo $id; ?> "><?php echo $data['sitename']; ?></a><br>
    <?php } ?>
