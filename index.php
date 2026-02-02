<?php
session_start();

$users = [ 
    'member1' => [ 'password' => 'pass123', 'tier' => 'Regular' ],
    'boss_vip'  => [ 'password' => 'vip999', 'tier' => 'VIP' ]
];

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];


    if (isset($users[$username]) && $users[$username]['password'] === $password) {

        $_SESSION['username']  = $username;
        $_SESSION['user_tier'] = $users[$username]['tier'];
        $_SESSION['last_activity'] = time();
        $_SESSION['timestamp'] = time();


        header("Location: workout.php");
        exit;
    }

    $error = "Invalid login";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4" style="width: 350px;">
        <h1 class="mb-3">Login</h1>
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <input type="text" class="form-control mb-2" name="username" placeholder="Username" required>
            <input type="password" class="form-control mb-3" name="password" placeholder="Password" required>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>