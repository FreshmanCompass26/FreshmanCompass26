<?php

include("conexion.php");

if (isset($_POST["pregunta"])) {


    $pregunta = trim($_POST["pregunta"]);
    // ==============================
// OPERACIONES MATEMÁTICAS
// ==============================

$operacion = str_replace(" ", "", $pregunta);

// Solo permite números, paréntesis y operadores
if (preg_match('/^[0-9+\-*\/().% ]+$/', $operacion)) {

    try {

        // Evita caracteres peligrosos
        if (preg_match('/[^0-9+\-*\/().%]/', $operacion)) {
            throw new Exception("Operación inválida.");
        }

        $resultado = 0;

        eval("\$resultado = $operacion;");

        echo "🧮 El resultado es: <strong>$resultado</strong>";
        exit;

    } catch (Throwable $e) {

        echo "❌ No pude resolver esa operación.";
        exit;

    }

}

    if ($pregunta == "") {
        exit("Escribe una pregunta.");
    }

    // Convertir a minúsculas
    $pregunta = mb_strtolower($pregunta, "UTF-8");

    // Quitar tildes
    $buscar = str_replace(
        ['á','é','í','ó','ú','ü','ñ'],
        ['a','e','i','o','u','u','n'],
        $pregunta
    );

    // Quitar signos
    $buscar = preg_replace('/[¿?¡!.,;:()"]/u', '', $buscar);

    $sql = "SELECT * FROM chatbot_respuestas";
    $resultado = $conn->query($sql);

    $mejorRespuesta = "";
    $mejorPuntaje = 0;

    while ($fila = $resultado->fetch_assoc()) {

        $puntaje = 0;

        $palabras = explode(",", $fila["palabra_clave"]);

        foreach ($palabras as $palabra) {

            $palabra = trim(mb_strtolower($palabra, "UTF-8"));

            $palabra = str_replace(
                ['á','é','í','ó','ú','ü','ñ'],
                ['a','e','i','o','u','u','n'],
                $palabra
            );

            if ($palabra != "" && strpos($buscar, $palabra) !== false) {
                $puntaje++;
            }
        }

        if ($puntaje > $mejorPuntaje) {
            $mejorPuntaje = $puntaje;
            $mejorRespuesta = $fila["respuesta"];
        }
    }

    if ($mejorPuntaje > 0) {

        $variaciones = [
            $mejorRespuesta,
            "💬 " . $mejorRespuesta,
            "🌟 " . $mejorRespuesta,
            "📚 " . $mejorRespuesta,
            $mejorRespuesta . " 😊"
        ];

        echo $variaciones[array_rand($variaciones)];
        exit;
    }

    // Si no encuentra nada
    $respuestasNoEncontradas = [

        "😕 Lo siento, aún no tengo información sobre ese tema. Intenta escribir la pregunta de otra forma.",

        "🤔 No encontré una respuesta para eso. Prueba usando otras palabras.",

        "📚 Aún sigo aprendiendo. Puedes intentar hacer la pregunta de otra manera.",

        "💙 Todavía no conozco esa respuesta, pero puedes consultar a un docente o reformular tu pregunta."

    ];

    echo $respuestasNoEncontradas[array_rand($respuestasNoEncontradas)];

}

?>