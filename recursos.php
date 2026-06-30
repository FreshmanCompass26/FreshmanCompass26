<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Centro de Recursos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<link rel="stylesheet" href="styles/navbar.css">
<link rel="stylesheet" href="styles/recursos.css">

</head>

<body>

<div class="wave"></div>
<?php include 'php/navbar.php'; ?>

<div class="container py-5 contenido-recursos">

    <div class="text-center mb-5">

        <h1 class="titulo">
            📚 Centro de Recursos
        </h1>

        <p class="subtitulo">
            Aprende y fortalece tus conocimientos con recursos recomendados.
        </p>

    </div>


    <div class="accordion" id="accordionRecursos">

        <!-- INFORMÁTICA -->

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#info">

                    Informática

                </button>

            </h2>

            <div id="info" class="accordion-collapse collapse show">

                <div class="accordion-body">

                    <div class="row">

                        <div class="col-md-3">

                            <div class="resource-card">

                                <h4>W3Schools</h4>

                                <p>HTML, CSS, JavaScript, PHP y SQL.</p>

                                <a href="https://www.w3schools.com/" target="_blank" class="btn btn-primary">

                                    Visitar

                                </a>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="resource-card">

                                <h4>freeCodeCamp</h4>

                                <p>Cursos gratuitos de programación.</p>

                                <a href="https://www.freecodecamp.org/" target="_blank" class="btn btn-primary">

                                    Visitar

                                </a>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="resource-card">

                                <h4>MDN Web Docs</h4>

                                <p>Documentación para desarrolladores.</p>

                                <a href="https://developer.mozilla.org/es/" target="_blank" class="btn btn-primary">

                                    Visitar

                                </a>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="resource-card">

                                <h4>GitHub</h4>

                                <p>Control de versiones y proyectos.</p>

                                <a href="https://github.com/" target="_blank" class="btn btn-primary">

                                    Visitar

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- INGLÉS -->

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#ingles">

                    Us Inglés

                </button>

            </h2>

            <div id="ingles" class="accordion-collapse collapse">

                <div class="accordion-body">

                    <div class="row">

                        <div class="col-md-3">

                            <div class="resource-card">

                                <h4>Duolingo</h4>

                                <a href="https://www.duolingo.com/" target="_blank" class="btn btn-primary">

                                    Visitar

                                </a>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="resource-card">

                                <h4>BBC Learning English</h4>

                                <a href="https://www.bbc.co.uk/learningenglish/" target="_blank" class="btn btn-primary">

                                    Visitar

                                </a>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="resource-card">

                                <h4>Cambridge Dictionary</h4>

                                <a href="https://dictionary.cambridge.org/" target="_blank" class="btn btn-primary">

                                    Visitar

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- VALORES -->

        <div class="accordion-item">

            <h2 class="accordion-header">

                <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#valores">

                     Valores

                </button>

            </h2>

            <div id="valores" class="accordion-collapse collapse">

                <div class="accordion-body">

                    <div class="row">

                        <div class="col-md-3">

                            <div class="resource-card">

                                <h4>TED</h4>

                                <a href="https://www.ted.com/" target="_blank" class="btn btn-primary">

                                    Ver Charlas

                                </a>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="resource-card">

                                <h4>MindTools</h4>

                                <a href="https://www.mindtools.com/" target="_blank" class="btn btn-primary">

                                    Explorar

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>