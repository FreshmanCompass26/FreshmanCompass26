<?php include("php/navbar.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Navbar Moderno</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    display:flex;
    background:#eaf4ff;
}

/* SIDEBAR */

.sidebar{
    width:250px;
    height:100vh;
    background:#081b63;
    padding:20px 15px;
    position:fixed;
    left:0;
    top:0;
}

.logo{
    display:flex;
    align-items:center;
    gap:10px;
    margin-bottom:50px;
}

.logo img{
    width:45px;
    height:45px;
    border-radius:50%;
}

.logo h2{
    color:#d6ff00;
    font-size:18px;
}

/* MENU */

.menu{
    display:flex;
    flex-direction:column;
    gap:12px;
}

.menu a{
    text-decoration:none;
    color:white;
    padding:15px 18px;
    border-radius:18px;
    display:flex;
    align-items:center;
    gap:12px;
    font-size:17px;
    transition:0.3s ease;
}

/* EFECTO HOVER */

.menu a:hover{
    background:rgba(255,255,255,0.15);
    transform:translateX(5px);
    backdrop-filter:blur(6px);
}

/* BOTON ACTIVO */

.menu .active{
    background:white;
    color:#081b63;
    font-weight:600;
}

/* CONTENIDO */

.main{
    margin-left:250px;
    width:100%;
}

/* NAVBAR ARRIBA */

.topbar{
    width:100%;
    height:85px;
    background:#102c7a;
    display:flex;
    justify-content:flex-end;
    align-items:center;
    padding:0 40px;
    gap:20px;
}

/* BOTONES */

.btn{
    padding:14px 28px;
    border-radius:30px;
    border:none;
    cursor:pointer;
    font-size:16px;
    font-weight:600;
    transition:0.3s;
}

.yellow{
    background:#ffc400;
    color:black;
}

.outline{
    background:transparent;
    border:2px solid #ffc400;
    color:#ffc400;
}

.btn:hover{
    transform:scale(1.05);
}

</style>
</head>
<body>

<!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png">
        <h2>Freshman<br>Compass</h2>
    </div>

    <div class="menu">

        <a href="#">
            <i class="fa-solid fa-house"></i>
            Inicio
        </a>

        <a href="#">
            <i class="fa-solid fa-users"></i>
            Teachers
        </a>

        <a href="#" class="active">
            <i class="fa-solid fa-school"></i>
            Nuestro centro
        </a>

        <a href="#">
            <i class="fa-solid fa-heart"></i>
            Consejos
        </a>

        <a href="#">
            <i class="fa-solid fa-calendar"></i>
            Eventos
        </a>

    </div>

</div>

<!-- CONTENIDO -->

<div class="main">

    <div class="topbar">

        <button class="btn yellow">
            Registrarse
        </button>

        <button class="btn outline">
            Crear Cuenta
        </button>

    </div>

</div>

</body>
</html>