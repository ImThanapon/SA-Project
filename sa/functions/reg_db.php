<?php
    session_start();
    include('functions/connect.php');
    $error = array();
    if(isset($_POST['reg_user'])){
        $username       = mysqli_real_escape_string($conn, $_POST['username']);
        $email          = mysqli_real_escape_string($conn, $_POST['email']);
        $passsword_1    = mysqli_real_escape_string($conn, $_POST['password_1']);
        $passsword_2    = mysqli_real_escape_string($conn, $_POST['password_2']);

        if(empty($username)){
            array_push($error, "Username is required");
        }
        if(empty($email)){
            array_push($error, "Email is required");
        }
        if(empty($passsword_1)){
            array_push($error, "passsword is required");
        }
        if($passsword_1 != $passsword_2){
            array_push($error,"กรุณาใส่รหัสผ่านให้ตรงกัน");
        }

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result){
            if($result['username']==$username){
                array_push($error,"บัญชีผู้ใช้ "+$username+"นี้ ได้มีการลงทะเบียนแล้ว !! ");
            }
            if($result['email']==$username){
                array_push($error,"บัญชีอีเมล "+$email+"นี้ ได้มีการลงทะเบียนแล้ว !! ");
            }
        }
        if(count($error) == 0){
            $password = md5($passsword_1);
            $sql = "INSERT INTO user (username, email, password) VALUES('$username', '$email', '$password')";
            mysqli_query($conn,$sql);
            $_SESSION['username'] = $username;
            $_SESSION['success']  = "คุณได้เข้าสู่ระบบแล้ว";
            header('location: index.php');
        }

    }

?>