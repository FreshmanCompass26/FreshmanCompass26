<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar cita | Freshman Compass</title>

    <link rel="stylesheet" href="../styles/agendar.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Flatpickr -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body>

<div class="background-shape shape1"></div>
<div class="background-shape shape2"></div>

<div class="container">

    <!-- HERO -->
    <section class="hero">

        <div class="badge">
            <i class="fa-solid fa-heart"></i>
            Tu bienestar es nuestra prioridad
        </div>

        <h1>
            Agenda una cita con nuestras
            <span>Psicólogas</span>
        </h1>

        <p>
            Recibe acompañamiento profesional en un ambiente seguro,
            confidencial y pensado para ti.
        </p>

    </section>

    <!-- TARJETAS -->
    <section class="cards-section">

        <h2>
            <i class="fa-solid fa-user-doctor"></i>
            Selecciona una psicóloga
        </h2>

        <div class="cards">

            <!-- ANA -->
            <div class="card"
                onclick="seleccionar('Ana  Nieto',this)">

                <div class="card-top">
                    <img src="../img/analu.jpeg" alt="">
                </div>

                <div class="card-body">

                    <h3>Ana Nieto</h3>

                    <span class="especialidad">
                        Psicóloga Educativa
                    </span>

                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        5.0
                    </div>

                    <div class="info">

                        <p>
                            <i class="fa-solid fa-graduation-cap"></i>
                            Atención académica
                        </p>

                        <p>
                            <i class="fa-solid fa-clock"></i>
                            Disponible
                        </p> 

                        

                    </div>

                    <button type="button">
                        Seleccionar
                    </button>

                </div>

            </div>

            <!-- MARIELOS -->
            <div class="card"
                onclick="seleccionar('Jessica Angel',this)">

                <div class="card-top">
                    <img src="../img/marielos.jpeg" alt="">
                </div>

                <div class="card-body">

                    <h3>Jessica Angel</h3>

                    <span class="especialidad">
                        Psicóloga Clínica
                    </span>

                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        5.0
                    </div>

                    <div class="info">

                        <p>
                            <i class="fa-solid fa-brain"></i>
                            Salud emocional
                        </p>

                        <p>
                            <i class="fa-solid fa-clock"></i>
                            Disponible
                        </p>

                    </div>

                    <button type="button">
                        Seleccionar
                    </button>

                </div>

            </div>

            <!-- MELENDEZ -->
            <div class="card"
                onclick="seleccionar('Blanca
                 Meléndez',this)">

                <div class="card-top">
                    <img src="../img/blancamelen1.png" alt="">
                </div>

                <div class="card-body">

                    <h3>Blanca Meléndez</h3>

                    <span class="especialidad">
                        Psicóloga Familiar
                    </span>

                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        5.0
                    </div>

                    <div class="info">

                        <p>
                            <i class="fa-solid fa-users"></i>
                            Terapia familiar
                        </p>

                        <p>
                            <i class="fa-solid fa-clock"></i>
                            Disponible
                        </p>

                    </div>

                    <button type="button">
                        Seleccionar
                    </button>

                </div>

            </div>

        </div>

    </section>

    <!-- FORMULARIO -->
    <section class="form-section">

        <div class="form-card">

            <h2>
                <i class="fa-solid fa-calendar-check"></i>
                Información de la cita
            </h2>

            <form id="citaForm">

                <div class="input-group">

                    <label>
                        <i class="fa-solid fa-user-doctor"></i>
                        Psicóloga seleccionada
                    </label>

                    <input
                        type="text"
                        id="psicologa"
                        readonly
                        placeholder="Selecciona una psicóloga">

                </div>

                <div class="doble">

                    <div class="input-group">

                        <label>
                            <i class="fa-regular fa-calendar"></i>
                            Fecha
                        </label>

                        <input
                            type="text"
                            id="fecha"
                            placeholder="Selecciona una fecha">

                    </div>

                    <div class="input-group">

    <label>
        <i class="fa-regular fa-clock"></i>
        Selecciona una hora
    </label>

    <div class="horarios">

        <button type="button" class="hora-btn" data-hora="08:00:00">08:00</button>

        <button type="button" class="hora-btn" data-hora="09:00:00">09:00</button>

        <button type="button" class="hora-btn" data-hora="10:00:00">10:00</button>

        <button type="button" class="hora-btn" data-hora="11:00:00">11:00</button>

        <button type="button" class="hora-btn" data-hora="13:00:00">01:00</button>

        <button type="button" class="hora-btn" data-hora="14:00:00">02:00</button>

        <button type="button" class="hora-btn" data-hora="15:00:00">03:00</button>

    </div>

    <input type="hidden" id="hora">

</div>

                </div>

                <div class="input-group">

                    <label>
                        <i class="fa-solid fa-comment-medical"></i>
                        Motivo de la cita
                    </label>

                    <textarea
                        id="motivo"
                        rows="5"
                        placeholder="Describe brevemente el motivo de tu cita..."></textarea>

                </div>

                <button class="confirm-btn" type="submit">

                    <i class="fa-solid fa-paper-plane"></i>

                    Confirmar cita

                </button>

            </form>

            <div id="mensaje"></div>

        </div>

    </section>

</div>

<!-- MODAL -->

<div class="modal" id="modal">

    <div class="modal-content">

        <div class="check">

            <i class="fa-solid fa-circle-check"></i>

        </div>

        <h2>¡Cita agendada!</h2>

        <p id="textoConfirmacion"></p>

        <button onclick="cerrarModal()">

            Aceptar

        </button>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script src="../JS/agendar.js"></script>

</body>
</html>