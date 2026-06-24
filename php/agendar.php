<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agendar cita</title>

    <!-- CSS propio -->
    <link rel="stylesheet" href="../styles/agendar.css">

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- FLATPICKR -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>

<div class="badge">
    <i class="fas fa-calendar"></i> Agenda tu bienestar
</div>

<div class="bg-shapes">
    <div class="circle circle1"></div>
    <div class="circle circle2"></div>
    <div class="dots"></div>
</div>



<div class="container">

    <h1>Agenda una cita con nuestras <span>psicólogas</span></h1>
    <p class="sub">
        Habla con una de nuestras psicólogas. Todas las sesiones son confidenciales.
    </p>

    <div class="cards">

        <div class="card">
            <img src="../img/analu.jpeg">
            <h4>Psic. Ana Lucía Nieto</h4>
            <span>Psicóloga Educativa</span>

            <button onclick="seleccionar('Ana Lucía Nieto')">
                <i class="fas fa-calendar"></i> Seleccionar
            </button>
        </div>

        <div class="card">
            <img src="../img/marielos.jpeg">
            <h4>Psic. Blanca Marielos</h4>
            <span>Psicóloga Clínica</span>

            <button onclick="seleccionar('Blanca Marielos')">
                <i class="fas fa-calendar"></i> Seleccionar
            </button>
        </div>

        <div class="card">
            <img src="../img/blanca2.jpg">
            <h4>Psic. Blanca Meléndez</h4>
            <span>Psicóloga Familiar</span>

            <button onclick="seleccionar('Blanca Meléndez')">
                <i class="fas fa-calendar"></i> Seleccionar
            </button>
        </div>

    </div>

    

    <div class="form-box">

        <div class="input-group">
            <label>Selecciona la psicóloga</label>
            <input type="text" id="psicologa" name="psicologa" placeholder="Elige una psicóloga" readonly>
        </div>

        <div class="input-group">
            <label>Selecciona una fecha</label>
            <input type="text" id="fecha" name="fecha" placeholder="Elige una fecha" required>
        </div>

        <button class="confirm-btn" type="submit">
            Confirmar cita
        </button>

    </div>

</form>

    </form>

</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="../Js/agendar.js"></script>

</body>
</html>