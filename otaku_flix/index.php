<?php
session_start();

$name = $_SESSION['name'] ?? null;
$alerts = $_SESSION['alerts'] ?? [];
$active_form = $_SESSION['active_form'] ?? '';

session_unset();

if($name !== null) $_SESSION['name'] = $name;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>OtakuFlix</title>
</head>
<body>

<header>
  <a href="#" class="logo">OtakuFlix</a>
  <nav>
    <a href="#"><i class='bx bxs-home'></i> Home</a>
    <a href="#"><i class='bx bx-collection'></i> Anime List</a>
    <a href="#"><i class='bx bxs-hot'></i> Trending</a>
    <a href="#"><i class='bx bx-category'></i> Genres</a>
    <a href="#"><i class='bx bxs-envelope'></i> Contact</a>
  </nav>
  <div class="user-auth">
    <?php if(!empty($name)): ?>
      <div class="profile-box">
        <div class="avatar-circle"><?= strtoupper($name[0]); ?></div>
        <div class="dropdown">
          <a href="#">My Account</a>
          <a href="logout.php">Logout</a>
        </div>
      </div>
    <?php else: ?>
      <button type="button" class="login-btn-modal">Login</button>
    <?php endif; ?>
  </div>
</header>

<section class="hero">
  <div class="hero-content">
    <h1 class="hero-title">Hey <?= $name ?? 'OTAKU' ?>!</h1>
    <p class="hero-subtitle">Welcome to OtakuFlix – Your Gateway to Anime Worlds</p>
    <a href="#collection" class="hero-btn">Explore Collection</a>
  </div>
</section>


<?php if(!empty($alerts)): ?>
  <div class="alert-box">
    <?php foreach($alerts as $alert): ?>
      <div class="alert <?= $alert['type'] ?>">
        <i class='bx <?= $alert['type'] === 'success' ? 'bxs-check-circle' : 'bxs-x-circle'; ?>'></i>
        <span><?= $alert['message']; ?></span>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<div class="auth-modal <?= $active_form === 'register' ? 'show slide' : ($active_form === 'login' ? 'show' : '') ?>">
  <button class="close-btn-modal"><i class='bx bx-x'></i></button>

  <div class="form-box login">
    <h2>Login</h2>
    <form action="auth_process.php" method="post">
      <div class="input-box">
        <input type="email" name="email" placeholder="Email" required>
        <i class='bx bxs-envelope'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock'></i>
      </div>
      <button type="submit" name="login_btn" class="btn">Login</button>
      <p>Don't Have An Account? <a href="#" class="register-link">Register</a></p>
    </form>
  </div>

  <div class="form-box register">
    <h2>Register</h2>
    <form action="auth_process.php" method="post">
      <div class="input-box">
        <input type="text" name="name" placeholder="Username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="email" name="email" placeholder="Email" required>
        <i class='bx bxs-envelope'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock'></i>
      </div>
      <button type="submit" name="register_btn" class="btn">Register</button>
      <p>Already Have An Account? <a href="#" class="Login-link">Login</a></p>
    </form>
  </div>
</div>

<script src="script.js"></script>
</body>
</html>
