<?php
include("conexion.php");
include("navbar.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CompassBot</title>

    <link rel="stylesheet" href="../styles/compassbot.css">
    <link rel="stylesheet" href="../styles/navbar.css">
</head>

<body>

<div class="contenido">

    <div class="header-bot">

        <div class="icono-bot">
            <img src="../img/ia.png" alt="IA">
        </div>

        <div>
            <h1>CompassBot</h1>
            <p>Tu asistente virtual de Freshman Compass.</p>
        </div>

    </div>

    <div class="chat-container">

        <div class="mensaje bot">

            <div class="avatar1">
                <img src="../img/ia.png" alt="IA">
            </div>

            <div class="burbuja">

                <strong>¡Hola! 👋</strong><br><br>

                Soy CompassBot, tu asistente virtual.

                Estoy aquí para ayudarte con dudas académicas,
                consejos de estudio y recursos.

                ¿En qué puedo ayudarte hoy?

            </div>

        </div>

    </div>
    <div class="sugerencias">

        <button class="sugerencia-btn">¿Qué es Súperate?</button>

        <button class="sugerencia-btn">Dame un consejo</button>

        <button class="sugerencia-btn">Tengo nervios</button>

        <button class="sugerencia-btn">Dato curioso</button>

    </div>
    <div class="entrada-chat">

        <input
            type="text"
            placeholder="Escribe tu pregunta aquí..."
        >

        <button>
            ➤
        </button>

    </div>

</div>

<script src="../styles//Js/compassbot.js"></script>

</body>
</html>