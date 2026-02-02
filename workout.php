<?php
session_start();

$timeout = 10;

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

$_SESSION['last_activity'] = time();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Workout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="alert alert-info">
        You're logged in as: <strong><?php echo htmlspecialchars(string: $_SESSION['username']); ?></strong> (<?php echo $_SESSION['user_tier']; ?>)
        <?php if (isset($_SESSION['last_activity'])): ?>
        <p>Last activity: <strong><?php echo date('Y-m-d H:i:s', (int)$_SESSION['last_activity']); ?></strong></p>
    <?php endif; ?>
    </div>
    
    <p>Session will timeout after 10 seconds of inactivity.</p>
    
    <?php if ($_SESSION['user_tier'] === 'Regular'): ?>
        <h2>Basic Workouts</h2>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Bodyweight Squats</h5>
                <p class="card-text">3 sets of 10-15 reps</p>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Walking Lunges</h5>
                <p class="card-text">3 sets of 10-15 reps "per leg"</p>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Bent-Over Rows</h5>
                <p class="card-text">3 sets of 10-15 reps</p>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Plank</h5>
                <p class="card-text">3 sets of 60s reps</p>
            </div>
        </div>


    <?php elseif ($_SESSION['user_tier'] === 'VIP'): ?>
        <h2>Advanced Tailored Workouts</h2>
         <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Bodyweight Squats</h5>
                <p class="card-text">3 sets of 10-15 reps</p>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Walking Lunges</h5>
                <p class="card-text">3 sets of 10-15 reps "per leg"</p>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Bent-Over Rows</h5>
                <p class="card-text">3 sets of 10-15 reps</p>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Plank</h5>
                <p class="card-text">3 sets of 60s reps</p>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">30 Minute Full Body Dumbbell Workout</h5>
                <p class="card-text">30 minute FULL BODY dumbbell workout that will challenge your overall strength and conditioning! </p>
                <a href="https://youtu.be/4sUGg9mcMGU?si=6Y0gfAcD0XEQ_RiY" target="_blank" class="btn btn-sm btn-primary">Watch Video</a>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Calisthenics Workout | No equipments</h5>
                <p class="card-text">This routine is designed to build muscle, increase strength and develop flexibility. </p>
                <a href="https://youtu.be/wKMy9FEpOhw?si=St0DaMWyLVdIrpgR" target="_blank" class="btn btn-sm btn-primary">Watch Video</a>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Stretching Routine for the Lower Body</h5>
                <p class="card-text">Ease up your muscles and improve flexibility in your legs and hips.</p>
                <a href="https://www.youtube.com/watch?v=UJ04zchVHIE" target="_blank" class="btn btn-sm btn-primary">Watch Video</a>
            </div>
        </div>
    <?php endif; ?>
    
    <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
</body>
</html>
