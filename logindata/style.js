// Mock function to send email with CAPTCHA
function sendEmail(email, captcha) {
    // In real-world, this would use an email service (e.g., SendGrid, Nodemailer).
    console.log(`Sending CAPTCHA "${captcha}" to email: ${email}`);
  }
  
  // Register form validation and submission
  document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const name = document.getElementById('register-name').value;
    const email = document.getElementById('register-email').value;
    const password = document.getElementById('register-password').value;
    const errorMessage = document.getElementById('register-error-message');
  
    if (name === '' || email === '' || password === '') {
      errorMessage.textContent = 'Please fill out all fields.';
    } else {
      errorMessage.textContent = '';
      alert('Registration successful! Please login.');
      // Normally you'd save user info to the backend
      // e.g., localStorage.setItem('registeredUser', JSON.stringify({name, email, password}));
    }
  });
  
  // Login form validation and CAPTCHA
  document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
  
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;
    const captchaContainer = document.getElementById('captcha-container');
    const errorMessage = document.getElementById('login-error-message');
  
    // Check if email and password are filled
    if (email === '' || password === '') {
      errorMessage.textContent = 'Please fill out email and password.';
      return;
    }
  
    // If CAPTCHA input is displayed, validate it
    if (captchaContainer.style.display === 'block') {
      const enteredCaptcha = document.getElementById('captcha-input').value;
      const storedCaptcha = localStorage.getItem('captcha');
      
      if (enteredCaptcha === storedCaptcha) {
        alert('Login successful!');
        // Continue with login logic here (e.g., redirect to dashboard)
      } else {
        errorMessage.textContent = 'Incorrect CAPTCHA. Please try again.';
      }
    } else {
      // Generate and display CAPTCHA
      const captchaCode = generateCaptcha();
      localStorage.setItem('captcha', captchaCode);
      sendEmail(email, captchaCode);
      
      captchaContainer.style.display = 'block';
      errorMessage.textContent = 'CAPTCHA sent to your email. Please enter it to proceed.';
    }
  });
  
  // Function to generate random CAPTCHA
  function generateCaptcha() {
    const chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    let captcha = '';
    for (let i = 0; i < 6; i++) {
      captcha += chars[Math.floor(Math.random() * chars.length)];
    }
    return captcha;
  }
  