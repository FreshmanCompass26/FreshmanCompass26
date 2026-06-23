<?php

include("conexion.php");

if(isset($_POST['pregunta'])){

    $pregunta = strtolower(trim($_POST['pregunta']));

    /* 🧠 1. SÚPERATE / ADOC */
    if (preg_match('/superate|adoc/i', $pregunta)) {

        $respuestas = [
            "🌟 Súperate es un programa educativo que forma jóvenes en inglés, informática y valores para su futuro.",
            "💙 Súperate ayuda a estudiantes a desarrollarse académica y profesionalmente en Centroamérica.",
            "📚 Es una iniciativa que impulsa el aprendizaje de inglés, tecnología y valores para mejorar oportunidades."
        ];

        echo $respuestas[array_rand($respuestas)];
        exit;
    }

    /* 🌱 2. EMOCIONES / ADAPTACIÓN */
    if (preg_match('/me siento|estoy|no tengo|no me siento|tengo miedo|me cuesta|no entiendo|me siento solo|me siento perdido|me da nervios|estoy nervioso/i', $pregunta)) {

        $respuestas = [
            "💙 Es normal sentirse así al inicio, poco a poco todo mejora.",
            "🌱 No estás solo, muchos pasan por lo mismo cuando empiezan algo nuevo.",
            "🤝 Con el tiempo te vas a adaptar y vas a conocer nuevas personas.",
            "💪 Tranquilo, esto es parte del proceso, después todo se vuelve más fácil.",
            "🌟 No te presiones, estás aprendiendo y eso ya es progreso."
        ];

        echo $respuestas[array_rand($respuestas)];
        exit;
    }

    /* 🤖 3. AYUDA GENERAL */
    if (preg_match('/ayuda|help|no entiendo/i', $pregunta)) {
        echo "🤖 Claro, dime qué necesitas y te ayudo paso a paso.";
        exit;
    }

    /* 📚 4. BASE DE DATOS (ESTUDIOS) */

    $sql = "SELECT * FROM chatbot_respuestas";
    $resultado = $conn->query($sql);

    $respuestas = [];

    while($fila = $resultado->fetch_assoc()){

        $palabras = explode(",", strtolower($fila['palabra_clave']));

        foreach($palabras as $palabra){

            $palabra = trim($palabra);

            if(strpos($pregunta, $palabra) !== false){
                $respuestas[] = $fila['respuesta'];
            }
        }
    }

    if(count($respuestas) > 0){

        $respuesta = $respuestas[array_rand($respuestas)];

        $variaciones = [
            $respuesta,
            "💬 " . $respuesta,
            "🌱 " . $respuesta,
            "💡 " . $respuesta,
            $respuesta . " ¿quieres que te explique más?"
        ];

        echo $variaciones[array_rand($variaciones)];
        exit;
    }

    /* ❌ 5. FALLBACK */
    echo "Lo siento 😔 aún no tengo información sobre eso.";

}
?>