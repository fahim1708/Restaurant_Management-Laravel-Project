<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-image: url('{{ asset('assets/images/login-bg.png') }}'); background-repeat: no-repeat; background-position: center center; background-attachment: fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .register-container {
            background: rgba(24, 24, 36, 0.75); /* Blurred glass effect */
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            width: 400px;
            padding: 20px 30px;
        }

        .register-header {
            text-align: center;
            margin-bottom: 20px;
            color: #f89335;
            font-size: 24px;
            font-weight: 700;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #f89335;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: none;
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 14px;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        select {
            cursor: pointer;
        }

        button {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            background-color: #f89335;
            color: #181824;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff9e4d;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
            color: #f89335;
        }

        .login-link a {
            color: #f89335;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">Create an Account</div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name Field -->
            <div>
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" :value="old('name')" placeholder="Enter your name" required autofocus />
            </div>

            <!-- Email Field -->
            <div>
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" :value="old('email')" placeholder="Enter your email" required />
            </div>

            <!-- Password Field -->
            <div>
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" placeholder="Enter your password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password Field -->
            <div>
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm your password" required autocomplete="new-password" />
            </div>

            <!-- User Type Field -->
            <div>
                <label for="usertype" style="color: #f89335;">{{ __('User Type') }}</label>
                <select id="usertype" name="usertype" required 
                    style="background-color: #181824; color: #f89335; border: 1px solid #f89335; padding: 8px; border-radius: 5px; width: 100%;">
                    <option value="customer" style="background-color: #181824; color: #f89335;" selected>{{ __('Customer') }}</option>
                    <option value="admin" style="background-color: #181824; color: #f89335;">{{ __('Admin') }}</option>
                </select>
            </div>
            

            <!-- Submit Button -->
            <div>
                <button type="submit">
                    {{ __('Register') }}
                </button>
            </div>

            <!-- Login Link -->
            <div class="login-link">
                <p>Already registered? <a href="{{ route('login') }}">{{ __('Login here') }}</a></p>
            </div>
        </form>
    </div>
</body>
</html>
