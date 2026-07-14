<?php
// =========================================================================
// 1. BANCO DE DATOS DE LAS SITUACIONES REALES (¡SUPÉRATE! ADOC)
// =========================================================================
$casos_superate = [
    1 => [
        "titulo" => "Caso 1: Notificación de Cita Médica",
        "palabras_clave" => ["ausencia", "permiso", "cita", "médica", "justificante", "isss"],
        "saludos_validos" => ["estimada lic", "estimado teacher", "buenos días", "buenas tardes"],
        "respuestas_correctas" => [
            "asunto" => "asunto",
            "saludo" => "saludo",
            "introduccion" => "introduccion",
            "cuerpo" => "cuerpo",
            "despedida" => "despedida",
            "firma" => "firma"
        ]
    ],
    2 => [
        "titulo" => "Caso 2: Reporte de Falla de Laptop Institucional",
        "palabras_clave" => ["computadora", "laptop", "falla", "wi-fi", "enciende", "soporte", "informática"],
        "saludos_validos" => ["estimado coordinador", "estimada lic", "estimado teacher"],
        "respuestas_correctas" => [
            "asunto" => "asunto",
            "saludo" => "saludo",
            "introduccion" => "introduccion",
            "cuerpo" => "cuerpo",
            "despedida" => "despedida",
            "firma" => "firma"
        ]
    ]
];

// =========================================================================
// 2. PROCESAMIENTO Y EVALUACIÓN DE LAS RESPUESTAS
// =========================================================================

$nota_final = 0;
$feedback_sistema = [];
$evaluacion_completada = false;

// ---- EVALUACIÓN PARA EL MODO FÁCIL ----
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validar_facil'])) {
    $evaluacion_completada = true;
    $id_caso = intval($_POST['caso_id']);
    $caso_actual = $casos_superate[$id_caso];
    
    // Recibimos el arreglo de los selects del formulario
    $respuestas_usuario = isset($_POST['orden']) ? $_POST['orden'] : [];
    
    $aciertos = 0;
    foreach ($caso_actual['respuestas_correctas'] as $parte => $valor_correcto) {
        if (isset($respuestas_usuario[$parte]) && $respuestas_usuario[$parte] === $valor_correcto) {
            $aciertos++;
            $feedback_sistema[] = "✅ La sección **" . strtoupper($parte) . "** está en el orden correcto.";
        } else {
            $feedback_sistema[] = "❌ La sección **" . strtoupper($parte) . "** tiene un fragmento que no le corresponde.";
        }
    }
    
    // Calcular nota en base a 100%
    $nota_final = round(($aciertos / count($caso_actual['respuestas_correctas'])) * 100);
}

// ---- EVALUACIÓN PARA EL MODO DIFÍCIL (REDACCIÓN) ----
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validar_dificil'])) {
    $evaluacion_completada = true;
    $id_caso = intval($_POST['caso_id']);
    $caso_actual = $casos_superate[$id_caso];
    
    // Sanitizar y limpiar lo que escribió el alumno
    $asunto_usuario = trim($_POST['asunto_libre']);
    $cuerpo_usuario = trim($_POST['cuerpo_libre']);
    
    // Unimos todo en un solo texto en minúsculas para buscar fácilmente las palabras
    $texto_evaluar = mb_strtolower($asunto_usuario . " " . $cuerpo_usuario, 'UTF-8');

    // 1. Evaluar Asunto (15 puntos)
    if (!empty($asunto_usuario) && strlen($asunto_usuario) > 10) {
        $nota_final += 15;
        $feedback_sistema[] = "✅ **Asunto detectado:** Estructuraste un título para el correo.";
    } else {
        $feedback_sistema[] = "❌ **Asunto ausente o muy corto:** Un correo formal de ¡Supérate! necesita un asunto claro.";
    }

    // 2. Evaluar Saludo Formal (15 puntos)
    $tiene_saludo = false;
    foreach ($caso_actual['saludos_validos'] as $saludo) {
        if (strpos($texto_evaluar, $saludo) !== false) {
            $tiene_saludo = true;
            break;
        }
    }
    if ($tiene_saludo) {
        $nota_final += 15;
        $feedback_sistema[] = "✅ **Saludo formal aprobado:** Dirigido correctamente a la autoridad.";
    } else {
        $feedback_sistema[] = "❌ **Falta saludo formal:** Recuerda usar aperturas institucionales como 'Estimada Lic.' o 'Estimado Teacher:'.";
    }

    // 3. Evaluar Frase de Introducción / Cortesía (15 puntos)
    if (strpos($texto_evaluar, "espero") !== false || strpos($texto_evaluar, "saludo") !== false) {
        $nota_final += 15;
        $feedback_sistema[] = "✅ **Introducción aprobada:** Mostraste cortesía antes de explicar tu problema.";
    } else {
        $feedback_sistema[] = "❌ **Falta introducción:** Evita saltar directo al grano; saluda cordialmente primero (ej: 'Espero que se encuentre bien').";
    }

    // 4. Evaluar Cuerpo y Palabras Clave (30 puntos)
    $coincidencias = 0;
    foreach ($caso_actual['palabras_clave'] as $palabra) {
        if (strpos($texto_evaluar, $palabra) !== false) {
            $coincidencias++;
        }
    }
    if ($coincidencias >= 2) {
        $nota_final += 30;
        $feedback_sistema[] = "✅ **Cuerpo del mensaje completo:** Explicas el motivo usando los términos clave de la situación.";
    } else {
        $feedback_sistema[] = "❌ **Cuerpo poco detallado:** Tu explicación necesita ser más precisa con la situación del problema.";
    }

    // 5. Evaluar Despedida Formal (15 puntos)
    if (strpos($texto_evaluar, "atento") !== false || strpos($texto_evaluar, "atentamente") !== false || strpos($texto_evaluar, "gracias") !== false || strpos($texto_evaluar, "cordialmente") !== false) {
        $nota_final += 15;
        $feedback_sistema[] = "✅ **Despedida formal aprobada:** Buen cierre de comunicación.";
    } else {
        $feedback_sistema[] = "❌ **Falta despedida:** Recuerda despedirte formalmente (ej: 'Atentamente' o 'Quedo atento a su respuesta').";
    }

    // 6. Evaluar Estructura de Firma (10 puntos)
    if (strpos($texto_evaluar, "año") !== false || strpos($texto_evaluar, "sección") !== false || strpos($texto_evaluar, "promo") !== false) {
        $nota_final += 10;
        $feedback_sistema[] = "✅ **Firma identificada:** Añadiste tus datos escolares.";
    } else {
        $feedback_sistema[] = "❌ **Firma incompleta:** Por norma del programa, siempre debes firmar con tu Nombre, Año y Sección.";
    }
}
?>