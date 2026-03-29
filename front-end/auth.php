<?php
require_once '../first-backeend/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Task — Auth</title>
  <link rel="stylesheet" href="StyleAuth.css">
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>   
</head>
<body>

  <!-- Background blobs -->
  <div class="blob blob-1"></div>
  <div class="blob blob-2"></div>
  <div class="blob blob-3"></div>

  <div class="card">

    <!-- Brand -->
    <div class="brand">
      <div class="brand-icon">
        <!-- Checkmark icon -->
        <svg viewBox="0 0 24 24" fill="none" stroke="#0E0E14" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="20 6 9 17 4 12"/>
        </svg>
      </div>
      <span class="brand-name">Task</span>
    </div>

    <!-- Tabs -->
    <div class="tabs">
      <button class="tab active" onclick="switchTab('login')">Log In</button>
      <button class="tab" onclick="switchTab('signup')">Sign Up</button>
    </div>

    <!-- ── LOGIN PANEL ── -->
    <div class="form-panel active" id="panel-login">
      <form action="../first-backeend/login.php" method="POST">
      <h1 class="heading">Welcome back</h1>
      <p class="sub">Pick up where you left off.</p>

      <div class="field">
        <label>Email</label>
        <div class="input-wrap">
          <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 7l10 7 10-7"/></svg>
          <input type="email" name='login_email' placeholder="email" autocomplete="email"/>
        </div>
      </div>

      <div class="field">
        <label>Password</label>
        <div class="input-wrap">
          <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <input type="password" name='login_password' id="login-pass" placeholder="••••••••"/>
          <button class="eye-btn" onclick="togglePass('login-pass', this)" type="button">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="eye-login">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>
      </div>
      

      <div class="row">
        <label class="remember">
          <input type="checkbox"/> Remember me
        </label>
        <a class="forgot" href="#">Forgot password?</a>
      </div>

      <button class="btn-primary" name='login-btn' type="submit">Log In </button>

      <div class="divider">or continue with</div>
      <div class="socials">
        <button class="btn-social" type="button">
          <svg width="16" height="16" viewBox="0 0 24 24"><path fill="#EA4335" d="M5.27 9.77A7.01 7.01 0 0 1 12 5c1.69 0 3.22.6 4.41 1.6L19.9 3.1A12 12 0 0 0 12 1C7.76 1 4.08 3.33 2.14 6.77l3.13 3z"/><path fill="#34A853" d="M16.04 18.01A7 7 0 0 1 12 19c-3.05 0-5.65-1.95-6.63-4.67L2.1 17.5A11.99 11.99 0 0 0 12 23c3.27 0 6.24-1.3 8.44-3.4l-4.4-1.59z"/><path fill="#4A90D9" d="M22.54 12.2c0-.79-.07-1.56-.2-2.3H12v4.51h5.92a5.07 5.07 0 0 1-2.2 3.32l4.4 1.6c2.56-2.37 4.02-5.86 4.02-9.13z"/><path fill="#FBBC05" d="M5.37 14.33A7.07 7.07 0 0 1 5 12c0-.81.14-1.59.37-2.33L2.14 6.77A11.9 11.9 0 0 0 1 12c0 1.87.42 3.63 1.1 5.23l3.27-2.9z"/></svg>
          Google
        </button>
        <button class="btn-social" type="button">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.477 2 2 6.477 2 12c0 4.419 2.865 8.166 6.839 9.489.5.09.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.342-3.369-1.342-.454-1.155-1.11-1.463-1.11-1.463-.908-.62.069-.608.069-.608 1.003.07 1.531 1.031 1.531 1.031.892 1.529 2.341 1.088 2.91.831.092-.647.35-1.087.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0 1 12 6.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.748-1.025 2.748-1.025.546 1.377.202 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.307.678.917.678 1.85 0 1.335-.012 2.415-.012 2.741 0 .267.18.577.688.48C19.138 20.163 22 16.418 22 12c0-5.523-4.477-10-10-10z"/></svg>
          GitHub
        </button>
      </div>
      </form>
    </div>

    <!-- ── SIGNUP PANEL ── -->
    <div class="form-panel" id="panel-signup">
      <form action="../first-backeend/register.php" method="POST">
      <h1 class="heading">Create account </h1>
      <p class="sub">Start getting things done today.</p>

      <div class="field">
        <label>Full Name</label>
        <div class="input-wrap">
          <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="7" r="4"/><path d="M4 21v-2a8 8 0 0 1 16 0v2"/></svg>
          <input type="text" name="fullname" placeholder="Jane Doe" autocomplete="name" required/>
        </div>
      </div>

      <div class="field">
        <label>Email</label>
        <div class="input-wrap">
          <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 7l10 7 10-7"/></svg>
          <input type="email" name="user_email" placeholder="you@email.com" autocomplete="email"/>
        </div>
      </div>

      <div class="field">
        <label>Password</label>
        <div class="input-wrap">
          <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <input type="password" name="user_password" id="signup-pass" placeholder="Min. 8 characters" oninput="checkStrength(this.value)"/>
          <button class="eye-btn" onclick="togglePass('signup-pass', this)" type="button">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>
        <div class="strength-bar"><div class="strength-fill" id="strength-fill"></div></div>
      </div>

      <div class="field" style="margin-bottom:24px">
        <label>Confirm Password</label>
        <div class="input-wrap">
          <svg width="16" height="16" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <input type="password" id="signup-confirm" placeholder="Repeat password"/>
          <button class="eye-btn" onclick="togglePass('signup-confirm', this)" type="button">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>
      </div>
      <button type="submit" name="signup_btn" class="btn-primary">Create Account</button>
      </form>

      <div class="divider">or sign up with</div>
      <div class="socials">
        <button class="btn-social" type="button">
          <svg width="16" height="16" viewBox="0 0 24 24"><path fill="#EA4335" d="M5.27 9.77A7.01 7.01 0 0 1 12 5c1.69 0 3.22.6 4.41 1.6L19.9 3.1A12 12 0 0 0 12 1C7.76 1 4.08 3.33 2.14 6.77l3.13 3z"/><path fill="#34A853" d="M16.04 18.01A7 7 0 0 1 12 19c-3.05 0-5.65-1.95-6.63-4.67L2.1 17.5A11.99 11.99 0 0 0 12 23c3.27 0 6.24-1.3 8.44-3.4l-4.4-1.59z"/><path fill="#4A90D9" d="M22.54 12.2c0-.79-.07-1.56-.2-2.3H12v4.51h5.92a5.07 5.07 0 0 1-2.2 3.32l4.4 1.6c2.56-2.37 4.02-5.86 4.02-9.13z"/><path fill="#FBBC05" d="M5.37 14.33A7.07 7.07 0 0 1 5 12c0-.81.14-1.59.37-2.33L2.14 6.77A11.9 11.9 0 0 0 1 12c0 1.87.42 3.63 1.1 5.23l3.27-2.9z"/></svg>
          Google
        </button>
        <button class="btn-social" type="button">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="white"><path d="M12 2C6.477 2 2 6.477 2 12c0 4.419 2.865 8.166 6.839 9.489.5.09.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.342-3.369-1.342-.454-1.155-1.11-1.463-1.11-1.463-.908-.62.069-.608.069-.608 1.003.07 1.531 1.031 1.531 1.031.892 1.529 2.341 1.088 2.91.831.092-.647.35-1.087.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0 1 12 6.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.748-1.025 2.748-1.025.546 1.377.202 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.307.678.917.678 1.85 0 1.335-.012 2.415-.012 2.741 0 .267.18.577.688.48C19.138 20.163 22 16.418 22 12c0-5.523-4.477-10-10-10z"/></svg>
          GitHub
        </button>
      </div>

      <p class="terms">By signing up you agree to our <a href="#">Terms</a> & <a href="#">Privacy Policy</a>.</p>
    </div>

  </div>

  <script>
    function switchTab(tab) {
      document.querySelectorAll('.tab').forEach((t, i) => {
        t.classList.toggle('active', (i === 0 && tab === 'login') || (i === 1 && tab === 'signup'));
      });
      document.getElementById('panel-login').classList.toggle('active', tab === 'login');
      document.getElementById('panel-signup').classList.toggle('active', tab === 'signup');
    }

    function togglePass(id, btn) {
      const inp = document.getElementById(id);
      const isText = inp.type === 'text';
      inp.type = isText ? 'password' : 'text';
      btn.querySelector('svg').innerHTML = isText
        ? '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>'
        : '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
    }

    function checkStrength(val) {
      const fill = document.getElementById('strength-fill');
      let score = 0;
      if (val.length >= 8) score++;
      if (/[A-Z]/.test(val)) score++;
      if (/[0-9]/.test(val)) score++;
      if (/[^A-Za-z0-9]/.test(val)) score++;
      const widths  = ['0%', '25%', '50%', '75%', '100%'];
      const colors  = ['transparent', '#FF5B5B', '#FFB347', '#4FC3F7', '#C8FF00'];
      fill.style.width = widths[score];
      fill.style.background = colors[score];
    }
  </script>
</body>
</html>