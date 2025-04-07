<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* General Styling */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('{{ asset('assets/images/login-bg.png') }}'); background-repeat: no-repeat; background-position: center center; background-attachment: fixed;
            color: #f89335;
        }

        /* Glass Effect for Login Box */
        .login-box {
            background: rgba(24, 24, 36, 0.6); /* Semi-transparent glass effect */
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px); /* Blur glass effect */
            -webkit-backdrop-filter: blur(10px);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        .login-box h2 {
            margin: 0 0 20px 0;
            text-align: center;
            color: #f89335;
            font-size: 24px;
        }

        .login-box label {
            font-size: 14px;
            color: #f89335;
        }

        .login-box input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #f89335;
            background: transparent;
            color: #f89335;
            font-size: 14px;
            outline: none;
        }

        .login-box input::placeholder {
            color: #f89335;
        }

        .login-box button {
            width: 100%;
            padding: 12px;
            background-color: #f89335;
            border: none;
            border-radius: 8px;
            color: #181824;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-box button:hover {
            background-color: #d6782e;
        }

        .login-box a {
            display: block;
            text-align: center;
            color: #f89335;
            font-size: 12px;
            margin-top: 10px;
            text-decoration: none;
        }

        .login-box a:hover {
            text-decoration: underline;
        }

        /* Mobile Responsiveness */
        @media (max-width: 600px) {
            .login-box {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" placeholder="Enter your email" required autofocus>
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit">Log In</button>
        </form>
        <a href="{{ route('password.request') }}">Forgot your password?</a>
    </div>
</body>
</html>
