<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Centro de Recursos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Estilos -->
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="stylesheet" href="styles/recursos.css?v=<?php echo time(); ?>">
    <link rel="icon" type="favicon" href="img/favicon.png">

</head>

<body>

    <!-- Barra lateral -->
    <?php include 'php/navbar.php'; ?>

    <!-- Fondo decorativo -->
    <div class="bg-circle bg-circle-1"></div>
    <div class="bg-circle bg-circle-2"></div>
    <div class="bg-circle bg-circle-3"></div>

    <!-- Contenido -->
    <main class="contenido-recursos">

        <!-- Encabezado -->

        <section class="hero-recursos text-center">

            <div class="hero-icon">

                <i class="fa-solid fa-book-open"></i>

            </div>

            <h1 class="titulo">

                Centro de Recursos

            </h1>

            <p class="subtitulo">

                Aprende y fortalece tus conocimientos con recursos recomendados.

            </p>

        </section>

        <!-- Acordeón principal -->

        <div class="accordion accordion-recursos" id="accordionRecursos">

            <!-- ================================================= -->
            <!--                INFORMÁTICA                        -->
            <!-- ================================================= -->

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#informatica"
                        aria-expanded="true">

                        <i class="fa-solid fa-laptop-code me-3"></i>

                        Informática

                    </button>

                </h2>

                <div id="informatica"
                    class="accordion-collapse collapse show"
                    data-bs-parent="#accordionRecursos">

                    <div class="accordion-body">

                        <div class="row g-4">
                                                <!-- W3Schools -->

                            <div class="col-xl-3 col-lg-6 col-md-6">

                                <div class="resource-card">

                                    <span class="badge-resource">

                                        Gratis

                                    </span>

                                    <div class="resource-icon">

                                        <i class="fa-solid fa-globe"></i>

                                    </div>

                                    <h4>W3Schools</h4>

                                    <p>

                                        HTML, CSS, JavaScript, PHP y SQL.

                                    </p>

                                    <a href="https://www.w3schools.com/"
                                        target="_blank"
                                        class="btn btn-resource">

                                        Visitar

                                        <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>

                                    </a>

                                </div>

                            </div>

                            <!-- freeCodeCamp -->

                            <div class="col-xl-3 col-lg-6 col-md-6">

                                <div class="resource-card">

                                    <span class="badge-resource">

                                        Gratis

                                    </span>

                                    <div class="resource-icon">

                                        <i class="fa-solid fa-code"></i>

                                    </div>

                                    <h4>freeCodeCamp</h4>

                                    <p>

                                        Cursos gratuitos de programación.

                                    </p>

                                    <a href="https://www.freecodecamp.org/"
                                        target="_blank"
                                        class="btn btn-resource">

                                        Visitar

                                        <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>

                                    </a>

                                </div>

                            </div>

                            <!-- MDN -->

                            <div class="col-xl-3 col-lg-6 col-md-6">

                                <div class="resource-card">

                                    <span class="badge-resource">

                                        Gratis

                                    </span>

                                    <div class="resource-icon">

                                        <i class="fa-solid fa-book"></i>

                                    </div>

                                    <h4>MDN Web Docs</h4>

                                    <p>

                                        Documentación para desarrolladores.

                                    </p>

                                    <a href="https://developer.mozilla.org/es/"
                                        target="_blank"
                                        class="btn btn-resource">

                                        Visitar

                                        <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>

                                    </a>

                                </div>

                            </div>

                            <!-- GitHub -->

                            <div class="col-xl-3 col-lg-6 col-md-6">

                                <div class="resource-card">

                                    <span class="badge-resource">

                                        Gratis

                                    </span>

                                    <div class="resource-icon">

                                        <i class="fa-brands fa-github"></i>

                                    </div>

                                    <h4>GitHub</h4>

                                    <p>

                                        Control de versiones y proyectos.

                                    </p>

                                    <a href="https://github.com/"
                                        target="_blank"
                                        class="btn btn-resource">

                                        Visitar

                                        <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- ================================================= -->
            <!--                    INGLÉS                         -->
            <!-- ================================================= -->

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#ingles">

                        <i class="fa-solid fa-comments me-3"></i>

                        Inglés

                    </button>

                </h2>

                <div id="ingles"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionRecursos">

                    <div class="accordion-body">

                        <div class="row g-4">
                                                <!-- Duolingo -->

                            <div class="col-xl-3 col-lg-6 col-md-6">

                                <div class="resource-card">

                                    <span class="badge-resource">

                                        Gratis

                                    </span>

                                    <div class="resource-icon">

                                        <i class="fa-solid fa-language"></i>

                                    </div>

                                    <h4>Duolingo</h4>

                                    <p>

                                        Aprende inglés de forma divertida con ejercicios interactivos.

                                    </p>

                                    <a href="https://www.duolingo.com/"
                                        target="_blank"
                                        class="btn btn-resource">

                                        Visitar

                                        <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>

                                    </a>

                                </div>

                            </div>

                            <!-- BBC Learning English -->

                            <div class="col-xl-3 col-lg-6 col-md-6">

                                <div class="resource-card">

                                    <span class="badge-resource">

                                        Gratis

                                    </span>

                                    <div class="resource-icon">

                                        <i class="fa-solid fa-headphones"></i>

                                    </div>

                                    <h4>BBC Learning English</h4>

                                    <p>

                                        Lecciones gratuitas de gramática, vocabulario y pronunciación.

                                    </p>

                                    <a href="https://www.bbc.co.uk/learningenglish/"
                                        target="_blank"
                                        class="btn btn-resource">

                                        Visitar

                                        <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>

                                    </a>

                                </div>

                            </div>

                            <!-- Cambridge Dictionary -->

                            <div class="col-xl-3 col-lg-6 col-md-6">

                                <div class="resource-card">

                                    <span class="badge-resource">

                                        Gratis

                                    </span>

                                    <div class="resource-icon">

                                        <i class="fa-solid fa-book-open"></i>

                                    </div>

                                    <h4>Cambridge Dictionary</h4>

                                    <p>

                                        Diccionario en línea con pronunciación y ejemplos.

                                    </p>

                                    <a href="https://dictionary.cambridge.org/"
                                        target="_blank"
                                        class="btn btn-resource">

                                        Visitar

                                        <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>

                                    </a>

                                </div>

                            </div>

                            <!-- TOEIC Practice -->

                            <div class="col-xl-3 col-lg-6 col-md-6">

                                <div class="resource-card">

                                    <span class="badge-resource">

                                        Gratis

                                    </span>

                                    <div class="resource-icon">

                                        <i class="fa-solid fa-graduation-cap"></i>

                                    </div>

                                    <h4>TOEIC Practice</h4>

                                    <p>

                                        Practica comprensión auditiva y prepárate para el examen TOEIC.

                                    </p>

                                    <a href="https://toeiclistening.net/"
                                        target="_blank"
                                        class="btn btn-resource">

                                        Visitar

                                        <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- ================================================= -->
            <!--                    VALORES                        -->
            <!-- ================================================= -->

            <div class="accordion-item">

                <h2 class="accordion-header">

                    <button
                        class="accordion-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#valores">

                        <i class="fa-solid fa-heart me-3"></i>

                        Valores

                    </button>

                </h2>

                <div id="valores"
                    class="accordion-collapse collapse"
                    data-bs-parent="#accordionRecursos">

                    <div class="accordion-body">

                        <div class="row g-4">
                                                <!-- PsicoActiva -->

                            <div class="col-xl-4 col-lg-6 col-md-6">

                                <div class="resource-card">

                                    <span class="badge-resource">

                                        Gratis

                                    </span>

                                    <div class="resource-icon">

                                        <i class="fa-solid fa-brain"></i>

                                    </div>

                                    <h4>PsicoActiva</h4>

                                    <p>

                                        Test y recursos para conocer tu nivel de estrés y bienestar emocional.

                                    </p>

                                    <a href="https://www.psicoactiva.com/test/test-escala-percepcion-estres/"
                                        target="_blank"
                                        class="btn btn-resource">

                                        Visitar

                                        <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>

                                    </a>

                                </div>

                            </div>

                            <!-- Goldty -->

                            <div class="col-xl-4 col-lg-6 col-md-6">

                                <div class="resource-card">

                                    <span class="badge-resource">

                                        Gratis

                                    </span>

                                    <div class="resource-icon">

                                        <i class="fa-solid fa-seedling"></i>

                                    </div>

                                    <h4>Goldty</h4>

                                    <p>

                                        Plataforma enfocada en el crecimiento personal, hábitos y desarrollo de valores.

                                    </p>

                                    <a href="https://goldty.infinityfreeapp.com/?i=2"
                                        target="_blank"
                                        class="btn btn-resource">

                                        Explorar

                                        <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>

                                    </a>

                                </div>

                            </div>

                            <!-- VARK -->

                            <div class="col-xl-4 col-lg-6 col-md-6">

                                <div class="resource-card">

                                    <span class="badge-resource">

                                        Gratis

                                    </span>

                                    <div class="resource-icon">

                                        <i class="fa-solid fa-lightbulb"></i>

                                    </div>

                                    <h4>¿Cómo aprendes mejor?</h4>

                                    <p>

                                        Descubre tu estilo de aprendizaje mediante el cuestionario VARK.

                                    </p>

                                    <a href="https://vark-learn.com/the-vark-questionnaire/"
                                        target="_blank"
                                        class="btn btn-resource">

                                        Explorar

                                        <i class="fa-solid fa-arrow-up-right-from-square ms-2"></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

    

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>