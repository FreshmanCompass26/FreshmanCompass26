<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/*
|--------------------------------------------------------------------------
| Inicializar memoria
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION["chat"])) {
    $_SESSION["chat"] = [];
}

/*
|--------------------------------------------------------------------------
| Agregar mensaje
|--------------------------------------------------------------------------
*/

function guardarMensaje($rol, $contenido)
{
    $_SESSION["chat"][] = [
        "role" => $rol,
        "content" => $contenido
    ];

    // Mantener solo los últimos 10 mensajes
    if (count($_SESSION["chat"]) > 10) {
        $_SESSION["chat"] = array_slice($_SESSION["chat"], -10);
    }
}

/*
|--------------------------------------------------------------------------
| Obtener historial
|--------------------------------------------------------------------------
*/

function obtenerHistorial()
{
    return $_SESSION["chat"];
}

/*
|--------------------------------------------------------------------------
| Borrar conversación
|--------------------------------------------------------------------------
*/

function limpiarHistorial()
{
    $_SESSION["chat"] = [];
}