<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Freshman Compass – Login</title>
  <link rel="stylesheet" href="styles/auth.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600&display=swap" rel="stylesheet"/>
</head>
<body>

<div class="auth-wrapper">
  <div class="auth-box" id="authBox">

    <div class="panel panel-left" id="panelLeft">

      <div class="form-section" id="loginForm">
        <div class="logo-area">
          <img src="img/logoooooo.png" alt="Freshman Compass" class="logo-img">
        </div>
        <h2 class="form-title">Bienvenido de nuevo</h2>
        <p class="form-subtitle">Inicia sesión en tu cuenta</p>
        <form action="php/login.php" method="POST" class="form" novalidate>
          <div class="field">
            <label for="l-email">Correo electrónico</label>
            <input type="email" id="l-email" name="email" placeholder="daniel.rivas2027@adoc.superate.org" required/>
            <span class="field-icon">✉</span>
          </div>
          <div class="field">
            <label for="l-pass">Contraseña</label>
            <input type="password" id="l-pass" name="password" placeholder="••••••••" required/>
            <span class="field-icon"></span>
          </div>
          <button type="submit" class="btn-primary">Sign In</button>
        </form>
        <p class="switch-text">
         ¿No tienes una cuenta?
          <button class="switch-btn" id="goSignup">Crear cuenta</button>
        </p>
      </div>

      <div class="welcome-section hidden" id="signupWelcome">
        <h1>¡Bienvenido a,<br/>Freshman Compass!</h1>
        <p>Tu camino ya comenzó. Inicia sesión y sigue creciendo con nosotros.</p>
        <button class="btn-outline" id="goLoginFromWelcome">Iniciar sesión</button>
      </div>

    </div>

    <div class="panel panel-right" id="panelRight">

      <div class="welcome-section" id="loginWelcome">
        <h1>Hola,<br/>Freshman!</h1>
        <p>Bienvenido a <strong>Freshman Compass,</strong> crece, aprende y alcanza el éxito en el Centro ¡Supérate! ADOC.</p>
        <button class="btn-outline" id="goSignupFromWelcome">Crear cuenta</button>
      </div>

      <!-- Estado B: Signup form (modo signup) -->
      <div class="form-section hidden" id="signupForm">
        <div class="logo-area">
          <img src="img/logoooooo.png" alt="Freshman Compass" class="logo-img">
        </div>
        <h2 class="form-title">Crear cuenta</h2>
        <p class="form-subtitle">Únete a Freshman Compass hoy mismo.</p>
        <form action="php/signup.php" method="POST" class="form" novalidate>
          <div class="fields-row">
            <div class="field">
              <label for="s-fname">nombre</label>
              <input type="text" id="s-fname" name="first_name" placeholder="Isaac" required/>
            </div>
            <div class="field">
              <label for="s-lname">Apellido</label>
              <input type="text" id="s-lname" name="last_name" placeholder="Reyes" required/>
            </div>
          </div>
          <div class="field">
            <label for="s-email">Correo electrónico</label>
            <input type="email" id="s-email" name="email" placeholder="daniel.rivas2027@adoc.superate.org" required/>
            <span class="field-icon">✉</span>
          </div>
          <div class="field">
            <label for="s-phone">Teléfono</label>
            <input type="tel" id="s-phone" name="phone" placeholder="+503 0000-0000" required/>
            <span class="field-icon"></span>
          </div>
          <div class="field">
            <label for="s-pass">Contraseña</label>
            <input type="password" id="s-pass" name="password" placeholder="Min. 8 characters" required/>
          </div>
          <button type="submit" class="btn-primary teal-btn">Crear cuenta</button>
        </form>
        <p class="switch-text teal-switch">
          ¿Ya tienes una cuenta?
          <button class="switch-btn teal-switch-btn" id="goLoginFromForm">iniciar sesión</button>
        </p>
      </div>

      <img src="img/orbitt_transparent.png" class="orbit-character">

    </div>

  </div>
</div>

<script src="Js/auth.js"></script>
</body>
</html>
