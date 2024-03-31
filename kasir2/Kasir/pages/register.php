<?php
require_once('../db/DB_connection.php');
require_once('../db/DB_register.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopiria | Register</title>
    <link rel="stylesheet" href="../assets/style/register.css">
</head>
<body>
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div class="box form-box" style="text-align: center;">
        <h1>Register</h1>
        <br>
        <div style="margin-bottom: 20px; text-align: left;">
            <label for="username" style="float: left;">Username</label>
            <br>
            <input id="username" name="username" type="text" placeholder="" required="" style="width: 100%;">
        </div>

        <div style="margin-bottom: 20px; text-align: left;">
            <label for="password" style="float: left;">Password</label>
            <br>
            <input id="password" name="password" type="password" placeholder="" required="" style="width: 100%;">
        </div>

        <div style="margin-bottom: 20px; text-align: left;">
            <label for="nama" style="float: left;">Nama</label>
            <br>
            <input id="nama" name="nama" type="text" placeholder="" required="" style="width: 100%;">
        </div>

        <div>
            <button type="submit" class="btn">Register</button>
        </div>

        <p>Have an account? <a href="../index.php">Login!</a></p>
    </div>
</div>


</body>
</html>
