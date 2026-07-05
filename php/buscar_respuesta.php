<?php

include("config.php");
include("contexto_compass.php");
include("memoria.php");

function consultarIA($pregunta)
{
    global $CONTEXTO_COMPASS;

    // Detectar si necesita el contexto de ¡Supérate!
    $usarContexto = false;

    $palabrasClave = [
        "supérate","superate","adoc","freshman","compass",
        "programa","inglés","ingles","informática","informatica",
        "teacher","teachers","primer año","primer anio","valores"
    ];

    foreach($palabrasClave as $palabra){
        if(stripos($pregunta,$palabra)!==false){
            $usarContexto=true;
            break;
        }
    }

    $promptSistema = "
Eres CompassBot, el asistente oficial de Freshman Compass.

Siempre responde en español.

Sé amable, cercano y motivador.

Nunca digas que eres ChatGPT, OpenAI o un modelo de IA.

Responde de forma natural y breve.

Usa muchos emojis.
";

    if($usarContexto){
        $promptSistema .= "\n\n".$CONTEXTO_COMPASS;
    }

    // ======= HISTORIAL ========

    $messages = [];

    $messages[] = [
        "role"=>"system",
        "content"=>$promptSistema
    ];

    foreach(obtenerHistorial() as $mensaje){
        $messages[] = $mensaje;
    }

    $messages[] = [
        "role"=>"user",
        "content"=>$pregunta
    ];

    // ==========================

    $datos = [

        "model"=>"cohere/north-mini-code:free",

        "temperature"=>0.4,

        "max_tokens"=>180,

        "messages"=>$messages

    ];

    $ch = curl_init("https://openrouter.ai/api/v1/chat/completions");

    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    curl_setopt($ch,CURLOPT_POST,true);

    curl_setopt($ch,CURLOPT_HTTPHEADER,[

        "Authorization: Bearer ".OPENROUTER_API_KEY,

        "Content-Type: application/json",

        "HTTP-Referer: http://localhost",

        "X-Title: Freshman Compass"

    ]);

    curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($datos));

    $respuesta=curl_exec($ch);

    if(curl_errno($ch)){

        curl_close($ch);

        return "⚠️ Error de conexión.";

    }

    curl_close($ch);

    $json=json_decode($respuesta,true);

    if(isset($json["choices"][0]["message"]["content"])){

        $texto=trim($json["choices"][0]["message"]["content"]);

        // Guardar conversación

        guardarMensaje("user",$pregunta);

        guardarMensaje("assistant",$texto);

        return $texto;

    }

    if(isset($json["error"]["message"])){

        return "⚠️ ".$json["error"]["message"];

    }

    return "Lo siento, no pude responder.";
}

if(isset($_POST["pregunta"])){

    $pregunta=trim($_POST["pregunta"]);

    if($pregunta==""){

        exit("Escribe una pregunta.");

    }

    echo consultarIA($pregunta);

}