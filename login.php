<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Freshman Compass | Login</title>

<link rel="stylesheet" href="styles/auth.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

<div class="background"></div>

<div class="container">

    <!-- LEFT -->

    <div class="left-panel">

    <div class="brand">

    <img src="img/logooooo.jpeg" alt="Logo" class="logo-img">

    <div>
        <h2>Freshman Compass</h2>
        <span>Your academic guide</span>
    </div>

</div>

        <div class="form-content">

        <?php if (isset($_GET['signup'])): ?>
    <p class="success-msg"> Cuenta creada, ahora inicia sesión</p>
<?php endif; ?>

            <span class="tag">
                Welcome Back 👋
            </span>

            <h1>
                Sign in to your account
            </h1>

            <p>
                Continue your academic journey with Freshman Compass.
            </p>

            <form action="php/login.php" method="POST">

                <div class="input-group">

                    <label>Email</label>

                    <div class="input">

                        <i class="fa-solid fa-envelope"></i>

                        <input
                        type="email"
                        name="email"
                        placeholder="you@example.com"
                        required>

                    </div>

                </div>

                <div class="input-group">

                    <label>Password</label>

                    <div class="input">

                        <i class="fa-solid fa-lock"></i>

                        <input
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        required>

                    </div>

                </div>

                <div class="options">

                    <a href="#">
                        Forgot password?
                    </a>

                </div>

                <button class="login-btn">

                    Sign In

                    <i class="fa-solid fa-arrow-right"></i>

                </button>

            </form>

            <div class="signup-link">

                Don't have an account?

             <a href="#" onclick="toggleForm()">
                 Create account
            </a>

            </div>

        </div>

     <form class="signup-form" id="signupForm" style="display:none;">

<h2>Create account</h2>

<input type="text" name="nombre" placeholder="Nombre">
<input type="email" name="email" placeholder="Email">
<input type="password" name="password" placeholder="Password">

<button>Registrarse</button>

<p onclick="toggleForm()">Ya tengo cuenta</p>

</form>

    </div>

    <!-- RIGHT -->

    <div class="right-panel">

        <div class="glass-card">

            <span class="mini-tag">

                Freshman Compass

            </span>

            <h2>

                Everything a freshman needs.

            </h2>

            <p>

                Discover resources, guides, communities and opportunities in one place.

            </p>

            <div class="floating-card">

                🧭
                <strong>Start your journey</strong>

                <small>

                    Learn. Connect. Grow.

                </small>

            </div>

        </div>

    </div>

</div>
<script>
function toggleForm() {

    const login = document.getElementById("loginForm");
    const signup = document.getElementById("signupForm");

    if (login.style.display === "none") {
        login.style.display = "block";
        signup.style.display = "none";
    } else {
        login.style.display = "none";
        signup.style.display = "block";
    }
}
</script>



</body>

</html>