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
    <link rel="icon" type="favicon" href="img/favicon.png">
    <link rel="stylesheet" href="../styles/navbar.css">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<div class="contenido">

    <!-- ENCABEZADO -->

    <div class="header-bot">

        <div class="icono-bot">

            <img src="../img/ia.png" alt="IA">

        </div>

        <div>

            <h1>CompassBot</h1>

            <p>Tu asistente virtual de Freshman Compass.</p>

        </div>

    </div>

    <!-- BOTÓN NUEVO CHAT -->

    <div class="acciones-chat">

        <button id="nuevoChatBtn" class="nuevo-chat-btn">

            <i class="fa-solid fa-rotate-left"></i>

            Nuevo chat

        </button>

    </div>

    <!-- CHAT -->

    <div class="chat-container">

        <div class="mensaje bot">

            <div class="avatar1">

                <img src="../img/ia.png" alt="IA">

            </div>

            <div class="burbuja">

                <strong>¡Hola! 👋</strong><br><br>

                Soy <strong>CompassBot</strong>, el asistente virtual de <strong>Freshman Compass</strong>.

                Estoy aquí para ayudarte durante tu primer año en el Programa ¡Supérate! ADOC.

                Puedes preguntarme sobre:

                <br><br>

                📚 Estudios

                <br>

                💙 Adaptación

                <br>

                ⏰ Organización

                <br>

                💡 Consejos

                <br>

                🌎 Cultura general

            </div>

        </div>

    </div>

    <!-- SUGERENCIAS -->

    <div class="sugerencias">

        <button class="sugerencia-btn">
            ¿Qué es Súperate?
        </button>

        <button class="sugerencia-btn">
            Dame un consejo
        </button>

        <button class="sugerencia-btn">
            Tengo nervios
        </button>

        <button class="sugerencia-btn">
            Dato curioso
        </button>

    </div>

    <!-- ENTRADA -->

    <div class="entrada-chat">

        <input
            type="text"
            placeholder="Escribe tu pregunta aquí..."
        >

        <button>

            <i class="fa-solid fa-paper-plane"></i>

        </button>

    </div>

</div>

<script src="../Js/compassbot.js"></script>

</body>

</html>