<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BizBooster | Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4cc9f0;
            --warning-color: #f72585;
            --border-radius: 10px;
            --box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            animation: rotate 20s linear infinite;
            z-index: 1;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .container-wrapper {
            display: flex;
            width: 100%;
            max-width: 1200px;
            min-height: 700px;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            position: relative;
            z-index: 2;
        }a
        
        .illustration-side {
            flex: 1;
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.9) 0%, rgba(63, 55, 201, 0.9) 100%);
            color: white;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .illustration-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('');
        }
        
        .illustration-content {
            position: relative;
            z-index: 2;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .illustration-side h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .illustration-side p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        .features-list {
            list-style: none;
            margin-bottom: 40px;
        }
        
        .features-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .features-list i {
            margin-right: 10px;
            color: var(--accent-color);
            font-size: 1.2rem;
        }
        
        .form-side {
            flex: 1;
            background-color: white;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .logo img {
            height: 50px;
        }
        
        .logo h1 {
            color: var(--primary-color);
            font-size: 2rem;
            font-weight: 700;
            margin-top: 10px;
        }
        
        .form-title {
            text-align: center;
            margin-bottom: 30px;
            color: var(--dark-color);
            font-size: 28px;
            font-weight: 700;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 25px;
        }
        
        .input-group i {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: var(--primary-color);
            font-size: 18px;
        }
        
        .input-group input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e9ecef;
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: var(--transition);
        }
        
        .input-group input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }
        
        .input-group label {
            position: absolute;
            left: 45px;
            top: 15px;
            color: #adb5bd;
            font-size: 16px;
            pointer-events: none;
            transition: var(--transition);
        }
        
        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
            top: -10px;
            left: 35px;
            font-size: 12px;
            background-color: white;
            padding: 0 5px;
            color: var(--primary-color);
        }
        
        .btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }
        
        .btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: var(--transition);
        }
        
        .btn:hover {
            background: linear-gradient(90deg, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .btn:hover::after {
            left: 100%;
        }
        
        .or {
            text-align: center;
            margin: 25px 0;
            color: #adb5bd;
            position: relative;
        }
        
        .or::before,
        .or::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background-color: #e9ecef;
        }
        
        .or::before {
            left: 0;
        }
        
        .or::after {
            right: 0;
        }
        
        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 25px;
        }
        
        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            color: white;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 14px rgba(0, 0, 0, 0.1);
        }
        
        .social-btn.google {
            background-color: #db4437;
        }
        
        .social-btn.facebook {
            background-color: #4267b2;
        }
        
        .links {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
        }
        
        .links p {
            color: var(--dark-color);
            font-size: 14px;
        }
        
        .links button {
            background: none;
            border: none;
            color: var(--primary-color);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            padding: 5px;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .links button:hover {
            color: var(--secondary-color);
            background-color: rgba(67, 97, 238, 0.1);
        }
        
        .recover {
            text-align: right;
            margin-bottom: 20px;
        }
        
        .recover a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
            transition: var(--transition);
        }
        
        .recover a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }
        
        @media (max-width: 992px) {
            .container-wrapper {
                flex-direction: column;
                min-height: auto;
            }
            
            .illustration-side {
                padding: 40px 20px;
                text-align: center;
            }
            
            .form-side {
                padding: 40px 20px;
            }
            
            .illustration-side h2 {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 576px) {
            .form-title {
                font-size: 24px;
            }
            
            .social-login {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <div class="container-wrapper">
        <div class="illustration-side">
            <div class="illustration-content">
                <h2>Grow Your Business with BizBooster</h2>
                <p>Join thousands of entrepreneurs who are scaling their businesses with our powerful tools and resources.</p>
                <ul class="features-list">
                    <li><i class="fas fa-rocket"></i> Boost your sales with smart analytics</li>
                    <li><i class="fas fa-chart-line"></i> Track performance in real-time</li>
                    <li><i class="fas fa-users"></i> Connect with your customers</li>
                    <li><i class="fas fa-lightbulb"></i> Get actionable business insights</li>
                </ul>
                <div class="testimonial">
                    <p>"BizBooster helped me double my revenue in just 3 months!"</p>
                    <p>- VTD Tech and co.</p>
                </div>
            </div>
        </div>
        <div class="form-side">
            <div class="container" id="signup" style="display:none;">
                <div class="logo">
                    <h1>BizBooster</h1>
                </div>
                <h1 class="form-title">Create Account</h1>
                <form method="post" action="register.php">
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="fName" id="fName" placeholder="First Name" required>
                        <label for="fName">First Name</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="lName" id="lName" placeholder="Last Name" required>
                        <label for="lName">Last Name</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <input type="submit" class="btn" value="Get Started" name="signUp">
                </form>
                
                <div class="links">
                    <p>Already have an account?</p>
                    <button id="signInButton">Sign In</button>
                </div>
            </div>

            <div class="container" id="signIn">
                <div class="logo">
                    <h1>BizBooster</h1>
                </div>
                <h1 class="form-title">Welcome Back</h1>
                <form method="post" action="register.php">
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="signInEmail" placeholder="Email" required>
                        <label for="signInEmail">Email</label>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="signInPassword" placeholder="Password" required>
                        <label for="signInPassword">Password</label>
                    </div>
                    <p class="recover">
                        <a href="#"></a>
                    </p>
                    <input type="submit" class="btn" value="Sign In" name="signIn">
                </form>
                
                <div class="links">
                    <p>New to BizBooster?</p>
                    <button id="signUpButton">Create Account</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const signUpButton = document.getElementById('signUpButton');
            const signInButton = document.getElementById('signInButton');
            const signUpForm = document.getElementById('signup');
            const signInForm = document.getElementById('signIn');
            
            // Check if there's a hash in the URL to determine which form to show
            if(window.location.hash === '#signup') {
                signUpForm.style.display = 'block';
                signInForm.style.display = 'none';
            } else {
                signUpForm.style.display = 'none';
                signInForm.style.display = 'block';
            }
            
            signUpButton.addEventListener('click', function() {
                signInForm.style.display = 'none';
                signUpForm.style.display = 'block';
                window.location.hash = 'signup';
            });
            
            signInButton.addEventListener('click', function() {
                signUpForm.style.display = 'none';
                signInForm.style.display = 'block';
                window.location.hash = '';
            });
            
            // Add password strength indicator
            const passwordInput = document.getElementById('password');
            if(passwordInput) {
                passwordInput.addEventListener('input', function() {
                    // Password strength logic could go here
                });
            }
            
            // Add animation to form elements
            const animateElements = document.querySelectorAll('.input-group, .btn, .social-login, .links');
            animateElements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, 100 + (index * 100));
            });
        });
    </script>
</body>
</html>