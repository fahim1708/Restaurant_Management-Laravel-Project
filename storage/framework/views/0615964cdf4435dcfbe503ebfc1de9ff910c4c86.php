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
            background-image: url('<?php echo e(asset('assets/images/login-bg.png')); ?>'); background-repeat: no-repeat; background-position: center center; background-attachment: fixed;
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

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.validation-errors','data' => ['class' => 'mb-4']]); ?>
<?php $component->withName('jet-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Name Field -->
            <div>
                <label for="name"><?php echo e(__('Name')); ?></label>
                <input id="name" type="text" name="name" :value="old('name')" placeholder="Enter your name" required autofocus />
            </div>

            <!-- Email Field -->
            <div>
                <label for="email"><?php echo e(__('Email')); ?></label>
                <input id="email" type="email" name="email" :value="old('email')" placeholder="Enter your email" required />
            </div>

            <!-- Password Field -->
            <div>
                <label for="password"><?php echo e(__('Password')); ?></label>
                <input id="password" type="password" name="password" placeholder="Enter your password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password Field -->
            <div>
                <label for="password_confirmation"><?php echo e(__('Confirm Password')); ?></label>
                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm your password" required autocomplete="new-password" />
            </div>

            <!-- User Type Field -->
            <div>
                <label for="usertype" style="color: #f89335;"><?php echo e(__('User Type')); ?></label>
                <select id="usertype" name="usertype" required 
                    style="background-color: #181824; color: #f89335; border: 1px solid #f89335; padding: 8px; border-radius: 5px; width: 100%;">
                    <option value="customer" style="background-color: #181824; color: #f89335;" selected><?php echo e(__('Customer')); ?></option>
                    <option value="admin" style="background-color: #181824; color: #f89335;"><?php echo e(__('Admin')); ?></option>
                </select>
            </div>
            

            <!-- Submit Button -->
            <div>
                <button type="submit">
                    <?php echo e(__('Register')); ?>

                </button>
            </div>

            <!-- Login Link -->
            <div class="login-link">
                <p>Already registered? <a href="<?php echo e(route('login')); ?>"><?php echo e(__('Login here')); ?></a></p>
            </div>
        </form>
    </div>
</body>
</html>
<?php /**PATH G:\BRACU\10th Semester (Fall-24)\CSE470\Project\Restaurant_Management-Laravel-Project\resources\views/auth/register.blade.php ENDPATH**/ ?>