<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin - Shrewsbury International School</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      margin: 0;
      min-height: 100vh;
      font-family: 'Segoe UI', Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #0f172a;
      color: #e5e7eb;
      position: relative;
      overflow: hidden;
    }
    
    /* ===== ANIMATED BACKGROUND ELEMENTS ===== */
    /* Dot Pattern Animation */
    .bg-dots {
      display: none;
    }
    
    .bg-dots::before {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      background-image: 
        radial-gradient(circle, rgba(59, 130, 246, 0.15) 1px, transparent 1px),
        radial-gradient(circle, rgba(37, 99, 235, 0.1) 1px, transparent 1px);
      background-size: 50px 50px, 80px 80px;
      background-position: 0 0, 40px 40px;
      animation: dotMove 20s linear infinite;
    }
    
    @keyframes dotMove {
      0% { transform: translate(0, 0); }
      100% { transform: translate(50px, 50px); }
    }
    
    /* Hexagon Floating Pattern */
    .hexagon-container {
      display: none;
    }
    
    .hexagon {
      position: absolute;
      width: 80px;
      height: 80px;
      opacity: 0.08;
      animation: floatHex 15s ease-in-out infinite;
    }
    
    .hexagon::before {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #3b82f6, #2563eb);
      clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
    }
    
    .hexagon:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; width: 100px; height: 100px; }
    .hexagon:nth-child(2) { top: 20%; right: 15%; animation-delay: 2s; width: 70px; height: 70px; }
    .hexagon:nth-child(3) { bottom: 15%; left: 20%; animation-delay: 4s; width: 90px; height: 90px; }
    .hexagon:nth-child(4) { bottom: 25%; right: 10%; animation-delay: 6s; width: 60px; height: 60px; }
    .hexagon:nth-child(5) { top: 50%; left: 5%; animation-delay: 3s; width: 80px; height: 80px; }
    .hexagon:nth-child(6) { top: 60%; right: 8%; animation-delay: 5s; width: 75px; height: 75px; }
    
    @keyframes floatHex {
      0%, 100% {
        transform: translateY(0) rotate(0deg);
        opacity: 0.08;
      }
      50% {
        transform: translateY(-30px) rotate(180deg);
        opacity: 0.15;
      }
    }
    
    /* Glowing Blur Circles */
    .glow-circle {
      display: none;
    }
    
    .glow-circle-1 {
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(59, 130, 246, 0.2), transparent);
      top: -100px;
      right: -100px;
      animation-delay: 0s;
    }
    
    .glow-circle-2 {
      width: 500px;
      height: 500px;
      background: radial-gradient(circle, rgba(37, 99, 235, 0.15), transparent);
      bottom: -150px;
      left: -150px;
      animation-delay: 2s;
    }
    
    .glow-circle-3 {
      width: 350px;
      height: 350px;
      background: radial-gradient(circle, rgba(59, 130, 246, 0.18), transparent);
      top: 40%;
      left: 50%;
      animation-delay: 4s;
    }
    
    @keyframes glowPulse {
      0%, 100% {
        transform: scale(1) translate(0, 0);
        opacity: 0.3;
      }
      50% {
        transform: scale(1.2) translate(20px, -20px);
        opacity: 0.5;
      }
    }
    .container {
      display: flex;
      width: 100%;
      max-width: 820px;
      background: rgba(15, 23, 42, 0.72);
      border-radius: 28px;
      overflow: hidden;
      box-shadow: 0 30px 80px rgba(15, 23, 42, 0.7);
      position: relative;
      z-index: 1;
      border: 1px solid rgba(148, 163, 184, 0.4);
      backdrop-filter: blur(22px) saturate(150%);
    }
    /* Bagian logo */
    .illustration {
      flex: 0.8;
      background: radial-gradient(circle at top, rgba(59,130,246,0.5), transparent 65%);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 2rem 1.5rem;
      position: relative;
      overflow: hidden;
    }
    
    .illustration::before {
      content: '';
      position: absolute;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(59, 130, 246, 0.1), transparent 70%);
      animation: rotate 20s linear infinite;
    }
    
    @keyframes rotate {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    .illustration img {
      max-width: 250px;
      height: auto;
      margin-bottom: 0.85rem;
      position: relative;
      z-index: 1;
      filter: drop-shadow(0 10px 30px rgba(59, 130, 246, 0.3));
      animation: logoFloat 3s ease-in-out infinite;
    }
    
    @keyframes logoFloat {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }
    
    .illustration h3 {
      position: relative;
      z-index: 1;
      text-shadow: 0 4px 12px rgba(15,23,42,0.6);
      font-size: 1.05rem;
      font-weight: 600;
      color: #f9fafb;
      text-align: center;
      letter-spacing: 0.3px;
    }
    .login-form {
      flex: 1;
      padding: 2.6rem 2.6rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: transparent;
    }
    .login-form h2 {
      font-size: 1.6rem;
      color: #f9fafb;
      margin-bottom: 0.3rem;
      font-weight: 700;
      text-align: left;
    }
    .login-form p {
      font-size: 0.85rem;
      color: #cbd5f5;
      margin-bottom: 1.5rem;
    }
    .form-group {
      margin-bottom: 1rem;
    }
    .form-group label {
      display: block;
      margin-bottom: 0.4rem;
      font-weight: 500;
      color: #e5e7eb;
      font-size: 0.85rem;
    }
    .form-group input {
      width: 100%;
      padding: 0.7rem 0.95rem;
      border: 1px solid rgba(148, 163, 184, 0.65);
      border-radius: 999px;
      background: rgba(15, 23, 42, 0.75);
      color: #e5e7eb;
      font-size: 0.9rem;
      transition: border 0.2s, box-shadow 0.2s, background 0.2s;
      outline: none;
    }
    .form-group input:focus {
      border-color: #38bdf8;
      background: rgba(15, 23, 42, 0.95);
      box-shadow: 0 0 0 2px rgba(56, 189, 248, 0.35);
    }
    
    /* CAPTCHA Styling */
    .captcha-container {
      margin: 1rem 0;
    }
    
    .captcha-box {
      background: rgba(15, 23, 42, 0.6);
      border: 1px dashed rgba(148, 163, 184, 0.8);
      border-radius: 12px;
      padding: 1rem;
      text-align: center;
    }
    
    .captcha-label {
      font-size: 0.8rem;
      color: #e5e7eb;
      margin-bottom: 0.7rem;
      font-weight: 600;
    }
    
    .captcha-question {
      font-size: 1.3rem;
      font-weight: 700;
      color: #38bdf8;
      margin-bottom: 0.7rem;
      letter-spacing: 2px;
    }
    
    .captcha-input {
      width: 100%;
      max-width: 130px;
      padding: 0.6rem 0.9rem;
      border: 1px solid rgba(148, 163, 184, 0.9);
      border-radius: 999px;
      background: rgba(15, 23, 42, 0.85);
      color: #e5e7eb;
      font-size: 1rem;
      text-align: center;
      font-weight: 600;
      transition: all 0.2s;
      outline: none;
    }
    
    .captcha-input:focus {
      border-color: #38bdf8;
      box-shadow: 0 0 0 2px rgba(56, 189, 248, 0.35);
    }
    
    .captcha-hint {
      font-size: 0.7rem;
      color: #cbd5f5;
      margin-top: 0.45rem;
    }
    
    .captcha-error {
      color: #fecaca;
      font-size: 0.75rem;
      margin-top: 0.45rem;
      display: none;
    }
    .btn-login {
      width: 100%;
      padding: 0.8rem 0;
      background: linear-gradient(135deg, #38bdf8 0%, #2563eb 100%);
      border: none;
      border-radius: 999px;
      color: #0f172a;
      font-weight: 600;
      font-size: 0.95rem;
      cursor: pointer;
      transition: all 0.25s;
      margin-top: 0.9rem;
      box-shadow: 0 10px 30px rgba(15, 23, 42, 0.9);
      position: relative;
      overflow: hidden;
    }
    
    .btn-login::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
    }
    
    .btn-login:hover::before {
      left: 100%;
    }
    .btn-login:hover {
      background: linear-gradient(135deg, #0ea5e9 0%, #1d4ed8 100%);
      transform: translateY(-1px);
      box-shadow: 0 12px 32px rgba(15, 23, 42, 0.95);
    }
    
    .btn-login:active {
      transform: translateY(0);
    }
    
    .btn-login:disabled {
      opacity: 0.6;
      cursor: not-allowed;
    }
    .extra-links {
      display: flex;
      justify-content: space-between;
      margin-top: 0.85rem;
      font-size: 0.8rem;
      color: #cbd5f5;
    }
    .extra-links a {
      color: #e5e7eb;
      text-decoration: none;
      transition: color 0.2s;
    }
    .extra-links a:hover {
      color: #38bdf8;
    }
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
        max-width: 420px;
        background: rgba(15, 23, 42, 0.8);
      }
      .illustration {
        padding: 1.25rem;
      }
      .illustration img {
        max-width: 100px;
      }
      .illustration h3 {
        font-size: 1rem;
      }
      .login-form {
        padding: 1.75rem 1.5rem;
      }
      .login-form h2 {
        font-size: 1.3rem;
      }
      .captcha-question {
        font-size: 1.15rem;
      }
      .captcha-input {
        max-width: 110px;
        font-size: 0.95rem;
      }
    }
    
    /* Alert Messages */
    .alert {
      padding: 0.65rem 0.9rem;
      border-radius: 8px;
      margin-bottom: 0.85rem;
      font-size: 0.85rem;
    }
    
    .alert-danger {
      background: rgba(239, 68, 68, 0.1);
      border: 1px solid rgba(239, 68, 68, 0.3);
      color: #fca5a5;
    }
    
    .alert-success {
      background: rgba(34, 197, 94, 0.1);
      border: 1px solid rgba(34, 197, 94, 0.3);
      color: #86efac;
    }
  </style>
</head>
<body style="background: url('{{ asset('images/admin-login-campus.jpg') }}') center center / cover no-repeat fixed;">
  <!-- ===== ANIMATED BACKGROUND ELEMENTS ===== -->
  <div class="bg-dots"></div>
  
  <div class="hexagon-container">
    <div class="hexagon"></div>
    <div class="hexagon"></div>
    <div class="hexagon"></div>
    <div class="hexagon"></div>
    <div class="hexagon"></div>
    <div class="hexagon"></div>
  </div>
  
  <div class="glow-circle glow-circle-1"></div>
  <div class="glow-circle glow-circle-2"></div>
  <div class="glow-circle glow-circle-3"></div>
  
  <div class="container">
    <!-- Logo di sisi kiri -->
    <div class="illustration">
      <img src="{{ Storage::url('galleries/logo-shrewsbury.png.png') }}" alt="Logo SMK4">
      <h3 style="color:#fff; margin-top:10px;">Shrewsbury International School</h3>
    </div>

    <!-- Form Login -->
    <div class="login-form">
      <h2>Welcome Admin</h2>
      <p>Silakan login untuk melanjutkan ke dashboard admin.</p>
      
      @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif
      
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
      
      <form method="POST" action="{{ route('admin.login.submit') }}" id="loginForm">
        @csrf
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" required autocomplete="username" value="{{ old('username') }}">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" required autocomplete="current-password">
        </div>
        
        <!-- Math CAPTCHA (Anti-Robot) -->
        <div class="captcha-container">
          <div class="captcha-box">
            <div class="captcha-label">Verifikasi (Anti-Robot)</div>
            <div class="captcha-question" id="captchaQuestion">3 - 2 = ?</div>
            <input type="number" 
                   class="captcha-input" 
                   id="captchaAnswer" 
                   name="captcha_answer" 
                   placeholder="Jawaban"
                   required
                   autocomplete="off">
            <input type="hidden" id="captchaCorrect" name="captcha_correct" value="">
            <div class="captcha-hint">Ketik jawaban Anda</div>
            <div class="captcha-error" id="captchaError">Jawaban CAPTCHA salah. Silakan coba lagi.</div>
          </div>
        </div>
        
        <button type="submit" class="btn-login" id="submitBtn">Login</button>
      </form>
    </div>
  </div>
  
  <script>
    // Generate random math CAPTCHA
    let correctAnswer;
    
    function generateCaptcha() {
      const num1 = Math.floor(Math.random() * 10) + 1;
      const num2 = Math.floor(Math.random() * 10) + 1;
      const operations = ['+', '-', '*'];
      const operation = operations[Math.floor(Math.random() * operations.length)];
      
      let question, answer;
      
      switch(operation) {
        case '+':
          question = `${num1} + ${num2} = ?`;
          answer = num1 + num2;
          break;
        case '-':
          // Ensure positive result
          const larger = Math.max(num1, num2);
          const smaller = Math.min(num1, num2);
          question = `${larger} - ${smaller} = ?`;
          answer = larger - smaller;
          break;
        case '*':
          const smallNum1 = Math.floor(Math.random() * 5) + 1;
          const smallNum2 = Math.floor(Math.random() * 5) + 1;
          question = `${smallNum1} × ${smallNum2} = ?`;
          answer = smallNum1 * smallNum2;
          break;
      }
      
      correctAnswer = answer;
      document.getElementById('captchaQuestion').textContent = question;
      document.getElementById('captchaCorrect').value = answer;
      document.getElementById('captchaAnswer').value = '';
      document.getElementById('captchaError').style.display = 'none';
    }
    
    // Generate CAPTCHA on page load
    generateCaptcha();
    
    // Form validation with Math CAPTCHA
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      const userAnswer = parseInt(document.getElementById('captchaAnswer').value);
      const correctValue = parseInt(document.getElementById('captchaCorrect').value);
      
      if (isNaN(userAnswer) || userAnswer !== correctValue) {
        e.preventDefault();
        document.getElementById('captchaError').style.display = 'block';
        document.getElementById('captchaAnswer').style.borderColor = '#ef4444';
        
        // Generate new CAPTCHA
        setTimeout(function() {
          generateCaptcha();
          document.getElementById('captchaAnswer').style.borderColor = '#334155';
        }, 2000);
        
        return false;
      }
      
      // Disable submit button to prevent double submission
      const submitBtn = document.getElementById('submitBtn');
      submitBtn.disabled = true;
      submitBtn.textContent = 'Loading...';
    });
    
    // Clear error on input
    document.getElementById('captchaAnswer').addEventListener('input', function() {
      document.getElementById('captchaError').style.display = 'none';
      this.style.borderColor = '#334155';
    });
    
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
      const alerts = document.querySelectorAll('.alert');
      alerts.forEach(function(alert) {
        alert.style.transition = 'opacity 0.5s';
        alert.style.opacity = '0';
        setTimeout(function() {
          alert.remove();
        }, 500);
      });
    }, 5000);
  </script>
</body>
</html>
