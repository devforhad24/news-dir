<?php
    require('../connect.inc.php');
    session_start();
    if(empty($_SESSION['user_id'])){
        if(isset($_POST['username']) AND isset($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(!empty($username) AND !empty($password)){
                $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password' ";
                $sql_query = mysqli_query($con, $sql);

                $mysqli_num_rows = mysqli_num_rows($sql_query);

                if($mysqli_num_rows){
                    $data = mysqli_fetch_array($sql_query);
                    $id = $data['id'];

                    $_SESSION['user_id'] = $id;

                    header('location:index.php');
                }else{
                    echo 'Invalid username or password!';
                }
            }else{
                echo 'Fill up all fields';
            }
        }
?>

<form action="login.php" method="post">
    Username: <input type="text" name="username"> <br><br>
    Password: <input type="password" name="password"> <br><br>

    <input type="submit" value="Login">
</form>

<?php }else{
    header('location:index.php');
} ?>