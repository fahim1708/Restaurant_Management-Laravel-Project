<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background-color: #181824; color: #f78029; font-family: Arial, sans-serif;">

    <!-- Header -->
    <header class="bg-gray-900 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <!-- Dashboard Link (Left) -->
            <a href="<?php echo e(route('index')); ?>" 
            class="text-white text-lg font-semibold hover:text-orange-500">
                Home
            </a>

            <!-- Profile Title (Center) -->
            <h1 class="text-3xl font-bold text-center flex-grow" style="color: #f78029;">Customer Profile</h1>

            <!-- Logout Link (Right) -->
            <a href="<?php echo e(route('logout')); ?>" 
            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 text-sm font-semibold">
                Logout
            </a>
        </div>
    </header>


    <!-- Main Content -->
    <div class="max-w-4xl mx-auto py-10">
        <!-- Profile Details -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-orange-500 mb-8">
            <h2 class="text-xl font-semibold mb-4" style="color: #f78029;">Personal Information</h2>
            <p><strong>Name:</strong> <?php echo e($user->name); ?></p>
            <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
            <p><strong>User Type:</strong> Customer</p>
        </div>

        <!-- Update Profile Section -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-orange-500 mb-8">
            <h2 class="text-xl font-semibold mb-4" style="color: #f78029;">Update Profile</h2>
            <form method="POST" action="<?php echo e(route('user.profile.update')); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo e($user->name); ?>" 
                           class="block w-full bg-gray-700 text-white border border-gray-600 rounded p-2 mt-1" 
                           required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo e($user->email); ?>" 
                           class="block w-full bg-gray-700 text-white border border-gray-600 rounded p-2 mt-1" 
                           required>
                </div>
                <button type="submit" 
                        class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 font-semibold">
                    Update Profile
                </button>
            </form>
        </div>

        <!-- Update Password Section -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-lg border border-orange-500">
            <h2 class="text-xl font-semibold mb-4" style="color: #f78029;">Update Password</h2>
            <form method="POST" action="<?php echo e(route('user.password.update')); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="mb-4">
                    <label for="current_password" class="block text-sm font-medium">Current Password</label>
                    <input type="password" id="current_password" name="current_password" 
                           class="block w-full bg-gray-700 text-white border border-gray-600 rounded p-2 mt-1" 
                           required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">New Password</label>
                    <input type="password" id="password" name="password" 
                           class="block w-full bg-gray-700 text-white border border-gray-600 rounded p-2 mt-1" 
                           required>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" 
                           class="block w-full bg-gray-700 text-white border border-gray-600 rounded p-2 mt-1" 
                           required>
                </div>
                <button type="submit" 
                        class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 font-semibold">
                    Update Password
                </button>
            </form>
        </div>
    </div>
</body>
</html>
<?php /**PATH G:\BRACU\10th Semester (Fall-24)\CSE470\Project\Restaurant_Management-Laravel-Project\resources\views/profile/profile.blade.php ENDPATH**/ ?>