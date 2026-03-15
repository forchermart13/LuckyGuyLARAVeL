<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A‑Clothing Studio · Admin</title>
    <!-- Professional sans‑serif font (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 (free) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f0f2f5;  /* soft neutral background */
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            line-height: 1.5;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
        }

        .login-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 20px 35px -8px rgba(0,0,0,0.1), 0 5px 12px -4px rgba(0,0,0,0.05);
            padding: 2.5rem 2rem;
            transition: box-shadow 0.2s ease;
        }

        .login-card:hover {
            box-shadow: 0 25px 40px -10px rgba(0,0,0,0.15);
        }

        /* branding header */
        .studio-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 2rem;
        }

        .studio-icon {
            background: #1e1e2f;
            color: white;
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 10px 15px -6px rgba(30,30,47,0.2);
        }

        .studio-name {
            font-weight: 600;
            font-size: 1.8rem;
            letter-spacing: -0.02em;
            color: #1e1e2f;
            line-height: 1.2;
        }
        .studio-name small {
            display: block;
            font-size: 0.7rem;
            font-weight: 400;
            color: #6b6b7b;
            letter-spacing: 0.3px;
            margin-top: 2px;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 500;
            color: #2c2c3a;
            text-align: center;
            margin-bottom: 0.25rem;
        }

        .admin-badge {
            text-align: center;
            margin-bottom: 2rem;
            color: #7a7a8c;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border-bottom: 1px solid #eaeef2;
            padding-bottom: 1.5rem;
        }
        .admin-badge i {
            color: #a5a5b5;
            font-size: 0.8rem;
        }

        /* error message (professional alert) */
        .error-message {
            background: #fff2f0;
            border-left: 4px solid #e04f5f;
            border-radius: 10px;
            padding: 0.9rem 1.2rem;
            margin-bottom: 2rem;
            color: #b33a48;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 10px rgba(224,79,95,0.05);
        }
        .error-message i {
            font-size: 1.1rem;
            color: #e04f5f;
        }

        /* input groups */
        .input-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #8f8fa3;
            font-size: 1.1rem;
            transition: color 0.15s;
        }

        .input-group input {
            width: 100%;
            background: #f9fafc;
            border: 1.5px solid #e2e6ea;
            border-radius: 14px;
            padding: 0.9rem 1rem 0.9rem 3rem;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            color: #1e1e2f;
            font-weight: 400;
            outline: none;
            transition: all 0.2s;
        }

        .input-group input:focus {
            border-color: #1e1e2f;
            background: #ffffff;
            box-shadow: 0 6px 14px rgba(30,30,47,0.05);
        }

        .input-group input::placeholder {
            color: #a9a9bc;
            font-weight: 300;
            font-size: 0.9rem;
        }

        .input-group input:focus + i {
            color: #1e1e2f;
        }

        /* extra options (remember + forgot) */
        .login-extras {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 1.2rem 0 2rem;
            font-size: 0.9rem;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #4a4a5a;
            cursor: pointer;
        }
        .remember input[type="checkbox"] {
            accent-color: #1e1e2f;
            width: 16px;
            height: 16px;
            margin: 0;
        }

        .forgot-link {
            color: #4a4a5a;
            text-decoration: none;
            font-weight: 500;
            border-bottom: 1px dashed #c2c2d0;
        }
        .forgot-link:hover {
            color: #1e1e2f;
            border-bottom-color: #1e1e2f;
        }

        /* primary login button */
        .login-btn {
            width: 100%;
            background: #1e1e2f;
            border: none;
            border-radius: 40px;
            padding: 0.9rem 1.8rem;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            font-size: 1.1rem;
            letter-spacing: 0.3px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s, box-shadow 0.2s;
            box-shadow: 0 8px 18px rgba(30,30,47,0.2);
            border: 1px solid rgba(255,255,255,0.05);
        }

        .login-btn i {
            font-size: 1rem;
            transition: transform 0.15s;
        }

        .login-btn:hover {
            background: #2b2b40;
            box-shadow: 0 12px 24px rgba(30,30,47,0.3);
        }

        .login-btn:hover i {
            transform: translateX(4px);
        }

        /* footer note / studio signature */
        .studio-footer {
            margin-top: 2rem;
            text-align: center;
            color: #a0a0b2;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border-top: 1px solid #eaecf0;
            padding-top: 1.5rem;
        }

        .studio-footer span {
            font-weight: 500;
            color: #5a5a70;
        }

        /* tiny extra refinement */
        .login-card {
            position: relative;
            overflow: hidden;
        }
        .login-card::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 120px;
            height: 120px;
            background: radial-gradient(circle at top right, rgba(30,30,47,0.02), transparent 70%);
            pointer-events: none;
            border-radius: 0 24px 0 0;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 2rem 1.5rem;
            }
            .studio-name {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">

            <!-- studio identity with icon (font awesome) -->
            <div class="studio-brand">
                <div class="studio-icon">
                    <i class="fa-solid fa-shirt"></i>  <!-- clothing / fashion icon -->
                </div>
                <div class="studio-name">
                    A‑CLOTHING <small>studio</small>
                </div>
            </div>

            <h2>Admin access</h2>
            <div class="admin-badge">
                <i class="fa-regular fa-circle-check"></i> secure panel <i class="fa-regular fa-circle-check"></i>
            </div>

            <!-- error message placeholder (unchanged logic) -->
            @if(session('error'))
  <div class="error-message">
    <i class="fa-solid fa-circle-exclamation"></i>
    <span>{{ session('error') }}</span>
</div>
@endif
            <!-- login form (same structure, enhanced with icons) -->
            <form method="POST" action="/admin/login">
                @csrf

                <div class="input-group">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email address" required>
                </div>

<div class="input-group">
    <i class="fa-solid fa-key"></i>
    <input type="password" name="password" placeholder="Password" required>
</div>

<button type="submit" class="login-btn">
    <i class="fa-solid fa-right-to-bracket"></i>
    <span>Log in to admin</span>
</button>
            </form>

            <!-- subtle studio footer -->
<div class="studio-footer">
    <i class="fa-solid fa-gem"></i>
    <span>A-Clothing Studio</span> · admin v2.1
    <i class="fa-solid fa-gem"></i>
</div>
        </div>
    </div>
</body>
</html>