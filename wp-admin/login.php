<?php
session_start(); 

if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'] ?? '';
	$password = $_POST['password'] ?? '';
	if ($username === 'admin' && $password === 'livehome@2025') {
		$_SESSION['username'] = $username;
		header('Location: index.php');
		exit;
	} else {
		$error = 'Invalid username or password.';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login - Live Home Services Admin</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
	<div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm border border-gray-200">
		<div class="flex flex-col items-center mb-6">
			<div class="w-16 h-16 rounded-full bg-primary flex items-center justify-center mb-3">
				<i class="fas fa-user-shield text-white text-3xl"></i>
			</div>
			<h2 class="text-2xl font-bold text-primary">Admin Login</h2>
		</div>
		<?php if ($error): ?>
			<div class="mb-4 text-red-600 text-center font-semibold"><?php echo $error; ?></div>
		<?php endif; ?>
		<form method="POST" action="" class="space-y-6">
			<div>
				<label for="username" class="block mb-2 font-medium text-gray-700">Username</label>
				<input type="text" id="username" name="username" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary bg-gray-50" required>
			</div>
			<div>
				<label for="password" class="block mb-2 font-medium text-gray-700">Password</label>
				<input type="password" id="password" name="password" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary bg-gray-50" required>
			</div>
			<button type="submit" class="w-full bg-green-400 text-white font-bold py-3 px-6 rounded-lg hover:bg-secondary transition shadow-md">Login</button>
		</form>
	</div>
</body>
</html>
