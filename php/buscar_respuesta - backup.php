<?php

include("conexion.php");
include("config.php");
function consultarIA($pregunta){

    $datos = [
        "model" => "cohere/north-mini-code:free",
        "messages" => [
            [
                "role" => "system",
                "content" => "Eres CompassBot, el asistente oficial de Freshman Compass. Responde de forma amable, clara y útil. Nunca digas que eres ChatGPT ni OpenAI."
            ],
            [
                "role" => "user",
                "content" => $pregunta
            ]
        ]
    ];

    $ch = curl_init("https://openrouter.ai/api/v1/chat/completions");

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer ".OPENROUTER_API_KEY,
        "Content-Type: application/json"
    ]);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datos));

    $respuesta = curl_exec($ch);

    curl_close($ch);

    $json = json_decode($respuesta, true);

if(isset($json["choices"][0]["message"]["content"])){
    return $json["choices"][0]["message"]["content"];
}

return "Lo siento, en este momento no puedo responder.";
}


if(isset($_POST['pregunta'])){

    $pregunta = strtolower(trim($_POST['pregunta']));

    /* 🧮 OPERACIONES MATEMÁTICAS */

    if (preg_match('/^\s*\d+\s*[\+\-\*\/]\s*\d+\s*$/', $pregunta)) {

        preg_match('/(\d+)\s*([\+\-\*\/])\s*(\d+)/', $pregunta, $partes);

        $num1 = $partes[1];
        $operador = $partes[2];
        $num2 = $partes[3];

        switch($operador){

            case '+':
                $resultado = $num1 + $num2;
                break;

            case '-':
                $resultado = $num1 - $num2;
                break;

            case '*':
                $resultado = $num1 * $num2;
                break;

            case '/':
                if($num2 == 0){
                    echo "❌ No se puede dividir entre cero.";
                    exit;
                }

                $resultado = $num1 / $num2;
                break;
        }

        echo "🧮 El resultado es: ".$resultado;
        exit;
    }

    /* 🕒 HORA */

    if(strpos($pregunta, "hora") !== false){

        date_default_timezone_set('America/El_Salvador');

        echo "🕒 La hora actual es: ".date("h:i A");
        exit;
    }

    /* 📅 FECHA */

    if(
        strpos($pregunta, "fecha") !== false ||
        strpos($pregunta, "dia") !== false ||
        strpos($pregunta, "hoy") !== false
    ){

        echo "📅 Hoy es: ".date("d/m/Y");
        exit;
    }

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

    /* 🤖 AYUDA GENERAL */

    if (preg_match('/ayuda|help|no entiendo/i', $pregunta)) {

        echo "🤖 Claro, dime qué necesitas y te ayudaré paso a paso.";
        exit;
    }
    /* 👋 SALUDOS */

if(preg_match('/^hola$|^hello$|^buenas$|^hola compassbot$/i', $pregunta)){

    $saludos = [

        "👋 ¡Hola! ¿Cómo puedo ayudarte hoy?",

        "🤖 ¡Hola! Estoy listo para responder tus preguntas.",

        "💙 ¡Bienvenido! ¿En qué necesitas ayuda?",

        "🌟 ¡Hola! Pregúntame lo que quieras."

    ];

    echo $saludos[array_rand($saludos)];
    exit;
}

/* 😂 CHISTES */

if(preg_match('/chiste|chistes|broma|bromas/i', $pregunta)){

    $chistes = [

        "😂 ¿Por qué el libro de matemáticas estaba triste? Porque tenía muchos problemas.",

        "🤣 ¿Qué le dijo un vector a otro? Tenemos la misma dirección.",

        "😆 Estudiar es como entrenar, mientras más practicas mejor te vuelves."

    ];

    echo $chistes[array_rand($chistes)];
    exit;
}

/* 💡 CONSEJOS */

if(preg_match('/consejo|consejos/i', $pregunta)){

    $consejos = [

        "📚 Estudia en bloques de 25 minutos y descansa 5 minutos.",

        "💧 Mantente hidratado mientras estudias.",

        "🎯 Empieza por la tarea más difícil para aprovechar tu energía.",

        "😴 Dormir bien mejora la memoria y la concentración.",

        "📝 Organiza tus tareas en una lista para no olvidar nada."

    ];

    echo $consejos[array_rand($consejos)];
    exit;
}

/* 🌎 DATOS CURIOSOS */

if(preg_match('/dato curioso|datos curiosos|curiosidad|curiosidades/i', $pregunta)){

    $datos = [

        "🧠 El cerebro utiliza alrededor del 20% de la energía del cuerpo.",

        "🌎 La Tierra gira a unos 1670 km/h.",

        "📚 Leer 20 minutos diarios mejora la comprensión lectora.",

        "💡 Aprender algo nuevo fortalece las conexiones neuronales.",

        "🚀 El espacio es completamente silencioso porque no hay aire para transmitir el sonido."

    ];

    echo $datos[array_rand($datos)];
    exit;
}

    /* 📚 RESPUESTAS DE LA BASE DE DATOS */

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
            "💬 ".$respuesta,
            "🌱 ".$respuesta,
            "💡 ".$respuesta,
            $respuesta." ¿Quieres que te explique más?"
        ];

        echo $variaciones[array_rand($variaciones)];
        exit;
    }

    /* 🤖 SI NO ENCUENTRA RESPUESTA, CONSULTAR A LA IA */

echo consultarIA($pregunta);
exit;

}
?>