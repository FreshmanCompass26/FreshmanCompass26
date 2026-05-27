<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Navbar Vertical</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body{
    background:#17345f;
}

/* NAVBAR */

.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:220px;
    height:100vh;
    background:#123766;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    padding:20px 0;
}

/* Logo */

.logo{
    color:#d9ff3f;
    font-size:20px;
    font-weight:bold;
    text-align:center;
    margin-bottom:20px;
}

/* MENU */

.menu{
    list-style:none;
    width:100%;
}

.menu li{
    margin:15px 0;
}

.menu a{
    text-decoration:none;
    color:white;
    display:flex;
    align-items:center;
    gap:15px;
    padding:15px 25px;
    transition:0.3s;
    border-radius:10px;
}

.menu a:hover{
    background:#1f4f89;
    transform:translateX(5px);
}

.menu i{
    font-size:18px;
}

/* PERFIL */


/* FRASE */

.quote{
    color:white;
    text-align:center;
    padding:15px;
    font-size:14px;
    line-height:22px;
}

.quote span{
    color:#ffe600;
    font-weight:bold;
}

/* TOPBAR */

.topbar{
    position:fixed;
    top:0;
    left:220px;
    right:0;
    height:80px;
    background:#102c7a;

    display:flex;
    justify-content:flex-end;
    align-items:center;
    gap:20px;

    padding-right:40px;
}

/* BOTONES */

.btn{
    padding:12px 25px;
    border-radius:30px;
    text-decoration:none;
    font-weight:bold;
    transition:0.3s;
}

.yellow{
    background:#ffd000;
    color:black;
}

.outline{
    border:2px solid #ffd000;
    color:#ffd000;
}

.btn:hover{
    transform:scale(1.05);
}

</style>
</head>

<body>

<div class="sidebar">

    <div>

        <div class="logo">
            Freshman Compass
        </div>

        <ul class="menu">

            <li><a href="#"><i class="fa-solid fa-house"></i> Home</a></li>
            <li><a href="#"><i class="fa-solid fa-user-group"></i> Teachers</a></li>
            <li><a href="#"><i class="fa-solid fa-calendar"></i> Eventos</a></li>
            <li><a href="#"><i class="fa-solid fa-heart"></i> Consejos</a></li>
            <li><a href="#"><i class="fa-solid fa-comments"></i> Comentarios</a></li>

        </ul>

    </div>

    <div>



        <!-- FRASE -->
        <div class="quote">
            “La educación es el arma más poderosa para cambiar el mundo.”
            <br>
            <span>- Nelson Mandela</span>
        </div>

    </div>

</div>

<!-- TOPBAR -->

<div class="topbar">

    <a href="login.php" class="btn outline">
        Login
    </a>

    <a href="signup.php" class="btn yellow">
        Sign Up
    </a>

</div>


</body>
</html>
