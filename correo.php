<?php
$casos_superate = [
    1 => [
        "titulo" => "Caso 1: Notificación de Cita Médica",
        "descripcion" => "Tienes una cita en el ISSS el próximo viernes por la mañana y no podrás asistir a tus clases del Programa ¡Supérate!. Debes notificar a tu Learning Coach e incluir la justificación.",
        "palabras_clave" => ["ausencia", "permiso", "cita", "médica", "justificante", "isss"],
        "saludos_validos" => ["estimada lic", "estimado teacher", "buenos días", "buenas tardes"],
        "bloques_facil" => [
            "asunto" => "Ausencia a clases - Cita Médica",
            "saludo" => "Estimada Lic. Martínez:",
            "introduccion" => "Espero que se encuentre muy bien.",
            "cuerpo" => "Le escribo para informarle que el próximo viernes no podré asistir a clases debido a una cita médica programada en el ISSS. Adjunto el comprobante correspondiente.",
            "despedida" => "Agradezco su comprensión y quedo atento a cualquier indicación.",
            "firma" => "María Fernanda Torres - 2° Año"
        ]
    ],
    2 => [
        "titulo" => "Caso 2: Reporte de Falla de Laptop",
        "descripcion" => "Tu computadora del programa no enciende o no conecta al Wi-Fi institucional y tienes una entrega importante en la materia de Informática. Debes reportarlo al Coordinador Académico.",
        "palabras_clave" => ["computadora", "laptop", "falla", "wi-fi", "enciende", "soporte", "informática"],
        "saludos_validos" => ["estimado coordinador", "estimada lic", "estimado teacher"],
        "bloques_facil" => [
            "asunto" => "Reporte de falla técnica - Laptop Institucional",
            "saludo" => "Estimado Coordinador Académico:",
            "introduccion" => "Reciba un cordial saludo de mi parte.",
            "cuerpo" => "Por este medio reporto que mi laptop asignada no enciende desde esta mañana, afectando mi entrega de Informática. Solicito amablemente su apoyo para revisión técnica.",
            "despedida" => "De antemano gracias por su tiempo y ayuda.",
            "firma" => "Juan Carlos Pérez - 1° Año"
        ]
    ]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafío: Correo Formal - ¡Supérate! ADOC</title>
    <link rel="stylesheet" href="styles/triviasp.css"> 
    <style>
        .screen { display: none; }
        .screen.active { display: block; }
        .outlook-sim { border: 1px solid #ced4da; border-radius: 6px; padding: 20px; background: #faf9f8; text-align: left; margin: 15px 0; }
        .outlook-field { display: flex; align-items: center; border-bottom: 1px solid #edeae5; padding: 8px 0; gap: 10px; }
        .outlook-field label { width: 90px; font-weight: bold; color: #605e5c; }
        .outlook-field select, .outlook-field input, .outlook-field textarea { width: 100%; padding: 6px; border: 1px solid #ced4da; border-radius: 4px; font-family: inherit; }
        .outlook-field textarea { height: 150px; resize: none; }
        .bloque-guia { background: #fff; border: 1px solid #0078d4; padding: 8px; margin: 5px 0; border-radius: 4px; font-size: 14px; text-align: left; }

        .color-dot {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 10px;
            vertical-align: middle;
        }
        .dot-asunto    { background-color: #107c41; }
        .dot-saludo    { background-color: #0078d4; } 
        .dot-intro     { background-color: #5c2d91; } 
        .dot-cuerpo    { background-color: #d83b01; }
        .dot-despedida { background-color: #f7a220; } 
        .dot-firma     { background-color: #323130; } 
    </style>
</head>
<body>

    <div class="game-box">

        <div id="screen-loading" class="screen active">
            <div class="loader-content">
                <h1>Desafío: Correo Formal</h1>
                <p>Preparando tu desafío... ¡Afina tus habilidades!</p>
                <div class="spinner"></div>
            </div>
        </div>

        <div id="screen-info" class="screen">
            <div class="info-content">
                <h2>Guía de Redacción Profesional</h2>
                <div class="info-text" style="text-align: left; max-height: 420px; overflow-y: auto; padding-right: 10px;">
                    <p style="text-align: center;">Antes de escribir a tus Teachers o Coordinadores en ¡Supérate!, recuerda la estructura ideal de <strong>corro_2.jpeg</strong>:</p>
                    
                    <div style="text-align: center;">
                        <img src="img/corro.jpeg" alt="Estructura de correo" style="max-width: 100%; border-radius: 6px; margin: 10px 0;">
                    </div>

                    <hr style="border: 0; border-top: 1px solid #ccc; margin: 20px 0;">

                    <h3 style="color: #0078d4; margin-bottom: 15px;">Estructura del Mensaje</h3>
                    
                    <p><span class="color-dot dot-asunto"></span><strong>Asunto:</strong> Es el título del correo. Debe ser corto y directo para saber de qué trata el mensaje antes de abrirlo (ej: <em>Ausencia a clases - 7 de julio</em>).</p>
                    
                    <p><span class="color-dot dot-saludo"></span><strong>Saludo:</strong> Apertura formal dirigida a la autoridad correspondiente utilizando su cargo o título respectivo (ej: <em>Estimada Lic. Martínez:</em>).</p>
                    
                    <p><span class="color-dot dot-intro"></span><strong>Introducción:</strong> Una frase corta de cortesía para iniciar el mensaje de manera educada y cordial (ej: <em>Espero que se encuentre muy bien.</em>).</p>
                    
                    <p><span class="color-dot dot-cuerpo"></span><strong>Cuerpo:</strong> El corazón del correo. Aquí se explica detalladamente la situación, el motivo del inconveniente (permisos, fallas técnicas) y las fechas exactas.</p>
                    
                    <p><span class="color-dot dot-despedida"></span><strong>Despedida:</strong> Cierre formal donde se agradece la atención prestada y se muestra disposición ante cualquier respuesta (ej: <em>Agradezco su comprensión...</em>).</p>
                    
                    <p><span class="color-dot dot-firma"></span><strong>Firma:</strong> Identificación oficial del estudiante. Es obligatorio incluir tu Nombre Completo, Año, Sección y tu Promoción institucional.</p>

                    <hr style="border: 0; border-top: 1px solid #ccc; margin: 20px 0;">

                    <div id="video-tutorial-container" style="background: #faf9f8; border: 1px solid #ced4da; padding: 15px; border-radius: 6px; text-align: center; margin: 20px 0;">
                        <span style="color: #0078d4; font-weight: bold; display: block; margin-bottom: 10px;">Video Tutorial: Cómo redactar tu correo</span>
                        
                        <video width="100%" height="auto" controls style="border-radius: 4px; border: 1px solid #ccc; background-color: #000;">
                            <source src="uploads/videos/video_tutorial.mp4" type="video/mp4">
                            Tu navegador no soporta la reproducción de video HTML5.
                        </video>
                        
                        <p style="font-size: 12px; color: #666; margin-top: 8px; font-style: italic;">Nota: Si cambias el nombre del archivo, edita el atributo 'src' en el código PHP.</p>
                    </div>
                </div>
                
                <br>
                <button class="btn" onclick="showScreen('screen-selection')">¡Listo, entendido!</button>
            </div>
        </div>

        <div id="screen-selection" class="screen">
            <h2>Selecciona una Situación Real</h2>
            <p>Elige un caso y define cómo quieres resolverlo:</p>
            
            <div style="text-align: left; margin: 20px 0;">
                <?php foreach($casos_superate as $id => $c): ?>
                    <div style="background: #faf9f8; border: 1px solid #ccc; padding: 15px; margin-bottom: 10px; border-radius: 6px;">
                        <input type="radio" name="selected_caso" value="<?php echo $id; ?>" id="caso_<?php echo $id; ?>" <?php if($id==1) echo 'checked'; ?>>
                        <label for="caso_<?php echo $id; ?>">
                            <strong><?php echo $c['titulo']; ?></strong>
                            <p style="margin: 5px 0 0 20px; font-size: 14px; color: #555;"><?php echo $c['descripcion']; ?></p>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>

            <div style="margin-top: 20px;">
                <button class="btn" onclick="iniciarJuego('facil')" style="background: #107c41;">Modo Fácil (Ordenar)</button>
                <button class="btn" onclick="iniciarJuego('dificil')">Modo Difícil (Redactar)</button>
            </div>
        </div>

        <div id="screen-facil" class="screen">
            <h2>Modo Fácil: Estructura el Correo</h2>
            <p>Asigna cada fragmento de texto a la sección de Outlook que le corresponde.</p>
            
            <div id="contenedor-bloques-mezclados"></div>

            <div class="outlook-sim">
                <div class="outlook-field"><label>Asunto:</label><select id="f_asunto"><option value="">-- Elige el asunto --</option></select></div>
                <div class="outlook-field"><label>Saludo:</label><select id="f_saludo"><option value="">-- Elige el saludo --</option></select></div>
                <div class="outlook-field"><label>Intro:</label><select id="f_introduccion"><option value="">-- Elige la introducción --</option></select></div>
                <div class="outlook-field"><label>Cuerpo:</label><select id="f_cuerpo"><option value="">-- Elige el cuerpo --</option></select></div>
                <div class="outlook-field"><label>Despedida:</label><select id="f_despedida"><option value="">-- Elige la despedida --</option></select></div>
                <div class="outlook-field"><label>Firma:</label><select id="f_firma"><option value="">-- Elige la firma --</option></select></div>
            </div>

            <button class="btn" onclick="evaluarFacil()">Validar Estructura</button>
        </div>

        <div id="screen-dificil" class="screen">
            <h2>Modo Difícil: Redacción Desde Cero</h2>
            <p>Escribe el correo cumpliendo las normas formales de ¡Supérate! ADOC.</p>

            <div class="outlook-sim">
                <div class="outlook-field">
                    <label>Asunto:</label>
                    <input type="text" id="d_asunto" placeholder="Escribe el asunto del correo...">
                </div>
                <div class="outlook-field" style="align-items: flex-start;">
                    <label>Contenido:</label>
                    <textarea id="d_cuerpo" placeholder="Estimada Lic...&#10;&#10;Espero se encuentre bien..."></textarea>
                </div>
            </div>

            <button class="btn" onclick="evaluarDificil()">Enviar a Revisión</button>
        </div>

        <div id="screen-results" class="screen">
            <div class="results-content">
                <h2 id="result-title">¡Evaluación Completada!</h2>
                
                <div style="margin: 20px 0; font-size: 18px; font-weight: bold; color: #0078d4;" id="result-score"></div>
                
                <div id="result-feedback-list" style="text-align: left; background: #f3f2f1; padding: 15px; border-radius: 6px; font-size: 14px; max-height: 200px; overflow-y: auto;"></div>
                
                <br>
                <button class="btn" onclick="showScreen('screen-selection')">Intentar Otra Vez</button>
                <a href="actividades.php" class="btn" style="background: #555;">Volver a Actividades</a>
            </div>
        </div>

    </div>

    <script>
        const datosCasos = <?php echo json_encode($casos_superate); ?>;
    </script>
    <script src="js/correo.js"></script>
</body>
</html>