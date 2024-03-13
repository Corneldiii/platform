<?php
include "Server/serverDB.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == '' || $password == '') {
        echo 'kosong woi';
    } else {
        $sql = "SELECT * FROM daftar WHERE username = '$username' AND password = '$password'";

        $result = $db->Query($sql);
        
        session_start();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['ID'];

            header('location: main.php');
            exit();
        } else {
            echo 'bruh';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="index.php" method="post">
            <div class="login-page">
                <input type="text" placeholder="Email" id="username" name='username'>
                <div class="username-message"></div>
                <input type="password" placeholder="Password" id="password" name='password'>
                <div class="password-message"></div>
                <button id="button-submit" name='login'>Login</button>
                <a id="link-forgot" href="https://accounts.google.com/accountchooser/identifier?continue=https%3A%2F%2Fmyaccount.google.com%2Fsigninoptions%2Fpassword&flowName=GlifWebSignIn&hl=id&ifkv=AXo7B7WKVUCHOQhLloc62mRQKB_E3_p7Mv-Td0KarCQ-PUE_3SGulc3NgU4cFYJATS8C3qMkcwAY&kdi=CAM&rart=ANgoxcd7tybo4bQzxOJMheVHTKg_IuFlK4AxvpU6AuJp829tOXjie8HTS4wFt8mpeuuU1NMYrcC5p9aSJrERWrEsz7aEkLmvBA&rpbg=1&sarp=1&scc=1&service=accountsettings&flowEntry=AccountChooser">
                    <h5>Forgot your password?</h5>
                </a>
            </div>
        </form>
    </div>




</body>

</html>