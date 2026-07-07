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

    <!-- ── PANEL IZQUIERDO ── -->
    <div class="panel panel-left" id="panelLeft">

      <!-- Estado A: Login form -->
      <div class="form-section" id="loginForm">
        <div class="logo-area">
          <img src="img/logoooooo.png" alt="Freshman Compass" class="logo-img">
        </div>
        <h2 class="form-title">Welcome back</h2>
        <p class="form-subtitle">Sign in to your account</p>
        <form action="php/login.php" method="POST" class="form" novalidate>
          <div class="field">
            <label for="l-email">Email</label>
            <input type="email" id="l-email" name="email" placeholder="you@example.com" required/>
            <span class="field-icon">✉</span>
          </div>
          <div class="field">
            <label for="l-pass">Password</label>
            <input type="password" id="l-pass" name="password" placeholder="••••••••" required/>
            <span class="field-icon">🔒</span>
          </div>
          <button type="submit" class="btn-primary">Sign In</button>
        </form>
        <p class="switch-text">
          Don't have an account?
          <button class="switch-btn" id="goSignup">Create account</button>
        </p>
      </div>

      <!-- Estado B: Mensaje de bienvenida (modo signup) -->
      <div class="welcome-section hidden" id="signupWelcome">
        <h1>Welcome to,<br/>Freshman Compass!</h1>
        <p>Tu camino ya comenzó. Inicia sesión y sigue creciendo con nosotros.</p>
        <button class="btn-outline" id="goLoginFromWelcome">Sign In</button>
      </div>

    </div>

    <!-- ── PANEL DERECHO ── -->
    <div class="panel panel-right" id="panelRight">

      <!-- Estado A: Mensaje de bienvenida (modo login) -->
      <div class="welcome-section" id="loginWelcome">
        <h1>Hello,<br/>Freshman!</h1>
        <p>Bienvenido a <strong>Freshman Compass,</strong> crece, aprende y alcanza el éxito en el Centro ¡Supérate! ADOC.</p>
        <button class="btn-outline" id="goSignupFromWelcome">Create Account</button>
      </div>

      <!-- Estado B: Signup form (modo signup) -->
      <div class="form-section hidden" id="signupForm">
        <div class="logo-area">
          <img src="img/logoooooo.png" alt="Freshman Compass" class="logo-img">
        </div>
        <h2 class="form-title">Create account</h2>
        <p class="form-subtitle">Join Freshman Compass today</p>
        <form action="php/signup.php" method="POST" class="form" novalidate>
          <div class="fields-row">
            <div class="field">
              <label for="s-fname">First Name</label>
              <input type="text" id="s-fname" name="first_name" placeholder="John" required/>
            </div>
            <div class="field">
              <label for="s-lname">Last Name</label>
              <input type="text" id="s-lname" name="last_name" placeholder="Doe" required/>
            </div>
          </div>
          <div class="field">
            <label for="s-email">Email</label>
            <input type="email" id="s-email" name="email" placeholder="you@example.com" required/>
            <span class="field-icon">✉</span>
          </div>
          <div class="field">
            <label for="s-phone">Phone</label>
            <input type="tel" id="s-phone" name="phone" placeholder="+503 0000-0000" required/>
            <span class="field-icon">📱</span>
          </div>
          <div class="field">
            <label for="s-pass">Password</label>
            <input type="password" id="s-pass" name="password" placeholder="Min. 8 characters" required/>
            <span class="field-icon">🔒</span>
          </div>
          <button type="submit" class="btn-primary teal-btn">Create Account</button>
        </form>
        <p class="switch-text teal-switch">
          Already have an account?
          <button class="switch-btn teal-switch-btn" id="goLoginFromForm">Sign in</button>
        </p>
      </div>

      <img src="img/orbitt_transparent.png" class="orbit-character">

    </div>

  </div>
</div>

<script src="Js/auth.js"></script>
</body>
</html>
