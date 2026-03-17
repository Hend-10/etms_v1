<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CLIMA TRACK | Connexion</title>

<style>
  @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Playfair+Display:wght@700&display=swap');

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --teal: #3ecfbf;
    --teal-dark: #29a99b;
    --teal-glow: rgba(62,207,191,0.18);
    --bg: #0e1a1f;
    --card: #14242b;
    --border: rgba(62,207,191,0.15);
    --text: #e8f4f3;
    --muted: #7fa8a3;
    --error: #ff6b6b;
    --input-bg: rgba(255,255,255,0.04);
  }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--bg);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }

  /* Animated background */
  .bg-orbs { position: fixed; inset: 0; pointer-events: none; z-index: 0; }
  .orb {
    position: absolute; border-radius: 50%;
    filter: blur(80px); opacity: 0.18;
    animation: drift 12s ease-in-out infinite alternate;
  }
  .orb1 { width: 420px; height: 420px; background: var(--teal); top: -100px; left: -120px; animation-delay: 0s; }
  .orb2 { width: 280px; height: 280px; background: #1a7a7a; bottom: -80px; right: -60px; animation-delay: -4s; }
  .orb3 { width: 180px; height: 180px; background: var(--teal); top: 50%; left: 60%; animation-delay: -8s; }

  @keyframes drift {
    0%   { transform: translate(0, 0) scale(1); }
    100% { transform: translate(30px, 20px) scale(1.08); }
  }

  /* Grid lines */
  .bg-grid {
    position: fixed; inset: 0; z-index: 0; pointer-events: none;
    background-image:
      linear-gradient(rgba(62,207,191,0.04) 1px, transparent 1px),
      linear-gradient(90deg, rgba(62,207,191,0.04) 1px, transparent 1px);
    background-size: 48px 48px;
  }

  /* Card */
  .card {
    position: relative; z-index: 1;
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 44px 40px 40px;
    width: 420px;
    box-shadow: 0 24px 80px rgba(0,0,0,0.45), 0 0 0 1px rgba(62,207,191,0.06);
    animation: fadeUp 0.7s cubic-bezier(.22,.8,.36,1) both;
  }
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(28px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  /* Logo */
  .logo-row { display: flex; align-items: center; gap: 12px; margin-bottom: 32px; }
  .logo-icon {
    width: 42px; height: 42px; border-radius: 10px;
    background: linear-gradient(135deg, var(--teal), var(--teal-dark));
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 4px 16px rgba(62,207,191,0.3);
    flex-shrink: 0;
  }
  .logo-icon svg { width: 22px; height: 22px; }
  .logo-text { font-family: 'Playfair Display', serif; font-size: 1.45rem; color: var(--text); letter-spacing: 0.5px; }
  .logo-text span { color: var(--teal); }

  /* Heading */
  .card-heading { margin-bottom: 6px; }
  .card-heading h1 { font-size: 1.35rem; font-weight: 600; color: var(--text); }
  .card-heading p  { font-size: 0.875rem; color: var(--muted); margin-top: 4px; }

  /* Divider */
  .divider { height: 1px; background: var(--border); margin: 22px 0; }

  /* Field */
  .field { margin-bottom: 16px; }
  .field label {
    display: block; font-size: 0.78rem; font-weight: 500;
    color: var(--muted); text-transform: uppercase;
    letter-spacing: 0.8px; margin-bottom: 8px;
  }
  .input-wrap { position: relative; }
  .input-wrap .icon {
    position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
    color: var(--muted); pointer-events: none; line-height: 1;
  }
  .input-wrap input {
    width: 100%;
    background: var(--input-bg);
    border: 1px solid var(--border);
    border-radius: 10px;
    padding: 12px 14px 12px 42px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.9rem;
    color: var(--text);
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
  }
  .input-wrap input::placeholder { color: #4a6b68; }
  .input-wrap input:focus {
    border-color: var(--teal);
    box-shadow: 0 0 0 3px var(--teal-glow);
    background: rgba(62,207,191,0.04);
  }
  .input-wrap input.is-invalid { border-color: var(--error) !important; }

  /* Password toggle */
  .toggle-pw {
    position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
    background: none; border: none; cursor: pointer; color: var(--muted);
    padding: 0; line-height: 1; transition: color 0.2s;
  }
  .toggle-pw:hover { color: var(--teal); }

  /* Forgot */
  .forgot-row { text-align: right; margin-top: 6px; }
  .forgot-row a { font-size: 0.8rem; color: var(--teal); text-decoration: none; opacity: 0.85; transition: opacity 0.2s; }
  .forgot-row a:hover { opacity: 1; }

  /* Button */
  .btn-login {
    width: 100%; margin-top: 22px;
    background: linear-gradient(135deg, var(--teal), var(--teal-dark));
    color: #0a1a1d;
    border: none; border-radius: 10px;
    padding: 13px;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.9rem; font-weight: 600;
    letter-spacing: 0.5px;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center; gap: 8px;
    box-shadow: 0 4px 20px rgba(62,207,191,0.25);
    transition: transform 0.15s, box-shadow 0.15s, filter 0.15s;
    position: relative; overflow: hidden;
  }
  .btn-login::after {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.12), transparent);
    opacity: 0; transition: opacity 0.2s;
  }
  .btn-login:hover { transform: translateY(-1px); box-shadow: 0 8px 28px rgba(62,207,191,0.35); filter: brightness(1.05); }
  .btn-login:hover::after { opacity: 1; }
  .btn-login:active { transform: translateY(0); }

  /* Footer */
  .card-footer { margin-top: 24px; text-align: center; }
  .card-footer p { font-size: 0.82rem; color: var(--muted); }
  .card-footer a { color: var(--teal); text-decoration: none; font-weight: 500; }
  .card-footer a:hover { text-decoration: underline; }

  /* Flash / Error messages */
  .alert {
    background: rgba(255,107,107,0.1);
    border: 1px solid rgba(255,107,107,0.3);
    border-radius: 8px;
    color: var(--error);
    font-size: 0.83rem;
    padding: 10px 14px;
    margin-bottom: 16px;
  }
  .text-danger { font-size: 0.78rem; color: var(--error); margin-top: 5px; display: block; }
</style>
</head>

<body>
  <div class="bg-orbs">
    <div class="orb orb1"></div>
    <div class="orb orb2"></div>
    <div class="orb orb3"></div>
  </div>
  <div class="bg-grid"></div>

  <div class="card">

    <!-- Logo -->
    <div class="logo-row">
      <div class="logo-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M17.5 19H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"/>
        </svg>
      </div>
      <div class="logo-text">CLIMA <span>TRACK</span></div>
    </div>

    <!-- Heading -->
    <div class="card-heading">
      <h1>Bienvenue</h1>
      <p>Connectez-vous à votre espace de suivi</p>
    </div>

    <div class="divider"></div>

    <!-- PHP Flash Message -->
    <?php flash('user_message'); ?>

    <!-- Login Form -->
    <form action="<?php echo URLROOT; ?>/users/login" method="POST">

      <!-- Email -->
      <div class="field">
        <label for="email">Adresse e-mail</label>
        <div class="input-wrap">
          <span class="icon">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="4" width="20" height="16" rx="2"/>
              <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
            </svg>
          </span>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="votre@email.com"
            value="<?php echo $data['email']; ?>"
            class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
            autocomplete="email"
            autofocus
            required
          >
        </div>
        <?php if (!empty($data['email_err'])): ?>
          <span class="text-danger"><?php echo $data['email_err']; ?></span>
        <?php endif; ?>
      </div>

      <!-- Password -->
      <div class="field">
        <label for="password">Mot de passe</label>
        <div class="input-wrap">
          <span class="icon">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="11" width="18" height="11" rx="2"/>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
          </span>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="••••••••"
            class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
            autocomplete="current-password"
            required
          >
          <button class="toggle-pw" type="button" onclick="togglePw(this)" title="Afficher/masquer le mot de passe">
            <svg id="eye-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>
        <?php if (!empty($data['password_err'])): ?>
          <span class="text-danger"><?php echo $data['password_err']; ?></span>
        <?php endif; ?>
      </div>

      <!-- Forgot password -->
      <div class="forgot-row">
        <a href="#">Mot de passe oublié ?</a>
      </div>

      <!-- Submit -->
      <button class="btn-login" type="submit">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
          <polyline points="10 17 15 12 10 7"/>
          <line x1="15" y1="12" x2="3" y2="12"/>
        </svg>
        SE CONNECTER
      </button>

    </form>

    <!-- Footer -->
    <div class="card-footer">
      <p>Besoin d'un compte ? <a href="mailto:admin@climatrack.tn">Contactez l'administrateur</a></p>
    </div>

  </div>

  <script>
    function togglePw(btn) {
      const inp = document.getElementById('password');
      const icon = document.getElementById('eye-icon');
      const show = inp.type === 'password';
      inp.type = show ? 'text' : 'password';
      icon.innerHTML = show
        ? '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>'
        : '<path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/>';
    }
  </script>

</body>
</html>