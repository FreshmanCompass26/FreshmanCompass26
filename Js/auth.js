// ── Freshman Compass · Auth Panel ──────────────────────────
const authBox     = document.getElementById('authBox');
const panelL      = document.getElementById('panelLeft');
const panelR      = document.getElementById('panelRight');

const loginForm     = document.getElementById('loginForm');
const signupWelcome = document.getElementById('signupWelcome');
const loginWelcome  = document.getElementById('loginWelcome');
const signupForm    = document.getElementById('signupForm');

document.getElementById('goSignup')?.addEventListener('click', toSignup);
document.getElementById('goSignupFromWelcome')?.addEventListener('click', toSignup);
document.getElementById('goLoginFromWelcome')?.addEventListener('click', toLogin);
document.getElementById('goLoginFromForm')?.addEventListener('click', toLogin);

let busy = false;
const DUR = 600; // duración de cada fase en ms

// ── Helpers ──────────────────────────────────────────────
function show(el) {
  el.classList.remove('hidden');
  el.classList.remove('fade-in');
  void el.offsetWidth;
  el.classList.add('fade-in');
}
function hide(el) {
  el.classList.add('hidden');
  el.classList.remove('fade-in');
}

// ── Crear / obtener la cortina ────────────────────────────
// La cortina es un div que cubre todo el auth-box con clip-path
// expandiéndose desde el centro hacia los lados.
let curtain = null;

function getCurtain() {
  if (!curtain) {
    curtain = document.createElement('div');
    curtain.id = 'curtain';
    curtain.style.cssText = `
      position: absolute;
      inset: 0;
      z-index: 20;
      pointer-events: none;
      /* clip-path parte como una línea vertical en el centro */
      clip-path: inset(0 50% 0 50%);
      transition: clip-path ${DUR}ms cubic-bezier(0.76, 0, 0.24, 1);
    `;
    authBox.appendChild(curtain);
  }
  return curtain;
}

// ── TO SIGNUP ─────────────────────────────────────────────
// 1. Cortina teal se expande desde el centro cubriendo todo
// 2. Contenido cambia silenciosamente debajo
// 3. Cortina se retrae hacia los lados y desaparece
function toSignup() {
  if (busy) return;
  busy = true;

  const c = getCurtain();

  // Color de la cortina: el teal que "invade" la pantalla
  c.style.background = 'linear-gradient(135deg, rgba(61,143,156,0.95), rgba(148,206,215,0.9))';

  // Fase 1: cortina cerrada (línea en el centro)
  c.style.transition = 'none';
  c.style.clipPath = 'inset(0 50% 0 50%)';
  void c.offsetWidth;

  // Fase 2: cortina se expande cubriendo todo
  c.style.transition = `clip-path ${DUR}ms cubic-bezier(0.76, 0, 0.24, 1)`;
  c.style.clipPath = 'inset(0 0% 0 0%)';

  // Fase 3: a mitad, cambiar contenido y colores de paneles
  setTimeout(() => {
    hide(loginForm);
    hide(loginWelcome);
    authBox.classList.add('switched');
    show(signupWelcome);
    show(signupForm);
  }, DUR * 0.55);

  // Fase 4: cortina se retrae hacia los lados
  setTimeout(() => {
    c.style.transition = `clip-path ${DUR}ms cubic-bezier(0.76, 0, 0.24, 1)`;
    c.style.clipPath = 'inset(0 50% 0 50%)';
  }, DUR + 60);

  // Fase 5: fin
  setTimeout(() => {
    busy = false;
  }, DUR * 2 + 100);
}

// ── TO LOGIN ──────────────────────────────────────────────
// Mismo efecto pero con cortina blanca
function toLogin() {
  if (busy) return;
  busy = true;

  const c = getCurtain();

  // Color de la cortina: blanco que "invade"
  c.style.background = 'rgba(255,255,255,0.96)';

  // Fase 1: cortina cerrada
  c.style.transition = 'none';
  c.style.clipPath = 'inset(0 50% 0 50%)';
  void c.offsetWidth;

  // Fase 2: se expande
  c.style.transition = `clip-path ${DUR}ms cubic-bezier(0.76, 0, 0.24, 1)`;
  c.style.clipPath = 'inset(0 0% 0 0%)';

  // Fase 3: cambiar contenido
  setTimeout(() => {
    hide(signupWelcome);
    hide(signupForm);
    authBox.classList.remove('switched');
    show(loginForm);
    show(loginWelcome);
  }, DUR * 0.55);

  // Fase 4: se retrae
  setTimeout(() => {
    c.style.transition = `clip-path ${DUR}ms cubic-bezier(0.76, 0, 0.24, 1)`;
    c.style.clipPath = 'inset(0 50% 0 50%)';
  }, DUR + 60);

  // Fase 5: fin
  setTimeout(() => {
    busy = false;
  }, DUR * 2 + 100);
}

// ── Validación básica en tiempo real ─────────────────────
document.querySelectorAll('input').forEach(input => {
  input.addEventListener('blur', () => {
    if (input.required && !input.value.trim()) input.classList.add('error');
  });
  input.addEventListener('input', () => {
    input.classList.remove('error');
  });
});
