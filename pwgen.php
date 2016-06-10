<?php
    require("config.php");
    $username = "admin";    
    $password = randStringGen(5);
    print $password;
    $hashedPass = md5($password);
    $query = "UPDATE user SET password = '$hashedPass' WHERE username='$username';";
    $result = mysqli_query($db,$query);
    function randStringGen ($n) {
        $outputString = '';
        $ascii = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        for ($i = 0; $i < $n; $i++) {
            $outputString .= $ascii[rand(0, strlen($ascii) - 1)];
        }
        return $outputString;
    }
?>