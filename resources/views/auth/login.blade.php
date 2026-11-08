<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | NETSPACE</title>

    <!-- # GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- # ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- # STYLE HALAMAN LOGIN -->
    <style>
        /* # RESET DAN WARNA UTAMA */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        :root {
            --navy: #080f20;
            --card: #111d34;
            --blue: #1677ff;
            --light-blue: #4ca3ff;
            --white: #ffffff;
            --muted: #8d9bb3;
        }

        /* # BODY DAN BACKGROUND */
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 30px 20px;

            background:
                radial-gradient(circle at 15% 20%, rgba(22, 119, 255, 0.17), transparent 30%),
                radial-gradient(circle at 85% 80%, rgba(22, 119, 255, 0.12), transparent 30%),
                var(--navy);

            background-attachment: fixed;
            overflow-x: hidden;
            position: relative;
        }

        /* # DEKORASI BACKGROUND */
        body::before {
            content: "";
            position: absolute;
            width: 450px;
            height: 450px;
            border: 1px solid rgba(76, 163, 255, 0.08);
            border-radius: 50%;
            top: -220px;
            right: -100px;
        }

        body::after {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            border: 1px solid rgba(76, 163, 255, 0.08);
            border-radius: 50%;
            bottom: -180px;
            left: -100px;
        }

        /* # CONTAINER LOGIN */
        .login-wrapper {
            width: 100%;
            max-width: 440px;
            position: relative;
            z-index: 1;
            margin: auto;
        }

        /* # LOGO NETSPACE */
        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 11px;
            margin-bottom: 28px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1684ff, #0751c7);
            border-radius: 12px;
            color: white;
            font-size: 24px;
            font-weight: 800;
            box-shadow: 0 0 25px rgba(22, 119, 255, 0.35);
        }

        .brand-name {
            color: white;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        /* # CARD LOGIN */
        .login-card {
            width: 100%;
            padding: 42px 38px;
            background: rgba(17, 29, 52, 0.94);
            border: 1px solid rgba(94, 153, 255, 0.16);
            border-radius: 20px;
            box-shadow:
                0 25px 70px rgba(0, 0, 0, 0.35),
                0 0 35px rgba(22, 119, 255, 0.06);
            backdrop-filter: blur(15px);
        }

        /* # HEADER LOGIN */
        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-header h1 {
            color: white;
            font-size: 27px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .login-header p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        /* # FORM GROUP */
        .form-group {
            margin-bottom: 21px;
        }

        .form-group label {
            display: block;
            color: #dce8fa;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        /* # INPUT FIELD */
        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #7185a5;
            font-size: 14px;
        }

        .input-wrapper input {
            width: 100%;
            height: 51px;
            padding: 0 16px 0 45px;
            border: 1px solid #263957;
            border-radius: 10px;
            outline: none;
            background: #0b162b;
            color: white;
            font-size: 13px;
            transition: 0.25s;
        }

        .input-wrapper input::placeholder {
            color: #61718c;
        }

        .input-wrapper input:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(22, 119, 255, 0.13);
        }

        /* # PESAN ERROR */
        .error-message {
            display: block;
            color: #ff7777;
            font-size: 11px;
            margin-top: 8px;
        }

        /* # REMEMBER ME */
        .form-options {
            display: flex;
            align-items: center;
            margin: 4px 0 27px;
        }

        .remember-option {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #a9b7ce;
            font-size: 12px;
            cursor: pointer;
        }

        .remember-option input {
            width: 15px;
            height: 15px;
            accent-color: var(--blue);
        }

        /* # TOMBOL LOGIN */
        .login-button {
            width: 100%;
            height: 51px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(110deg, #1677ff, #0860dc);
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 7px 22px rgba(22, 119, 255, 0.2);
            transition: 0.25s;
        }

        .login-button:hover {
            background: linear-gradient(110deg, #318cff, #1677ff);
            box-shadow: 0 8px 28px rgba(22, 119, 255, 0.35);
            transform: translateY(-2px);
        }

        /* # FOOTER */
        .login-footer {
            text-align: center;
            margin-top: 27px;
            color: #65758f;
            font-size: 11px;
            letter-spacing: 0.3px;
        }

        /* # RESPONSIVE MOBILE */
        @media (max-width: 480px) {
            body {
                padding: 20px;
            }

            .login-wrapper {
                max-width: 390px;
            }

            .login-card {
                padding: 35px 25px;
                border-radius: 17px;
            }

            .login-header h1 {
                font-size: 24px;
            }

            .brand-name {
                font-size: 22px;
            }
        }

        .login-link {
            text-align: center;
            margin-top: 24px;
            color: #8d9bb3;
            font-size: 12px;
        }

        .login-link a {
            color: #4ca3ff;
            font-weight: 700;
            text-decoration: none;
        }

        .login-link a:hover {
            color: white;
        }
    </style>
</head>

<body>

    <!-- # WRAPPER UTAMA -->
    <main class="login-wrapper">

        <!-- # BRAND NETSPACE -->
        <div class="brand">
            <div class="brand-icon">N</div>
            <span class="brand-name">NETSPACE</span>
        </div>

        <!-- # CARD LOGIN -->
        <section class="login-card">

            <!-- # HEADER LOGIN -->
            <div class="login-header">
                <h1>Welcome Back</h1>
                <p>Sign in to your account to continue.</p>
            </div>

            <!-- # FORM LOGIN -->
            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <!-- # INPUT EMAIL ATAU USERNAME -->
                <div class="form-group">
                    <label for="identity">Email or Username</label>

                    <div class="input-wrapper">
                        <i class="fa-regular fa-user"></i>

                        <input
                            type="text"
                            id="identity"
                            name="identity"
                            placeholder="Enter your email or username"
                            value="{{ old('identity') }}"
                            autocomplete="username"
                            required
                            autofocus
                        >
                    </div>

                    @error('identity')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- # INPUT PASSWORD -->
                <div class="form-group">
                    <label for="password">Password</label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-lock"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter your password"
                            autocomplete="current-password"
                            required
                        >
                    </div>

                    @error('password')
                        <small class="error-message">{{ $message }}</small>
                    @enderror
                </div>

                <!-- # OPSI REMEMBER ME -->
                <div class="form-options">
                    <label class="remember-option">
                        <input type="checkbox" name="remember" value="1">
                        <span>Remember Me</span>
                    </label>
                </div>

                <!-- # TOMBOL LOGIN -->
                <button type="submit" class="login-button">
                    Sign In
                </button>

            </form>
            <!-- # LINK KE HALAMAN REGISTRASI -->
            <div class="login-link">
                Don't have an account?
                <a href="{{ route('register') }}">Create Account</a>
            </div>
        </section>

        <!-- # FOOTER -->
        <footer class="login-footer">
            © 2026 NETSPACE. All rights reserved.
        </footer>

    </main>

</body>
</html>
