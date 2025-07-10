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
<link rel="stylesheet" href="light-mode.css">
  <!-- Add this in your <head> before your script.js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <title>OtakuFlix</title>
</head>
<!-- Theme Toggle -->
<div class="theme-toggle">
  <input type="checkbox" id="theme-switch" />
  <label for="theme-switch" class="theme-label">
    <i class='bx bx-moon theme-icon dark'></i>
    <i class='bx bx-sun theme-icon light'></i>
  </label>
</div>

<body>

<header>
  <a href="#" class="logo">OtakuFlix</a>
  <nav>
  <a href="#"><i class='bx bxs-home'></i> Home</a>

  <!-- Anime List Dropdown -->
  <div class="dropdown-parent">
    <a href="#" class="dropdown-toggle"><i class='bx bx-collection'></i> Anime List <i class='bx bx-chevron-down'></i></a>
    <div class="dropdown-menu">
      <a href="#">Top Rated</a>
      <a href="#">Most Popular</a>
      <a href="#">Completed Series</a>
      <a href="#">Ongoing Series</a>
    </div>
  </div>

  <!-- Trending -->
  <a href="#"><i class='bx bxs-hot'></i> Trending</a>

  <!-- Genre Dropdown -->
  <div class="dropdown-parent">
    <a href="#" class="dropdown-toggle"><i class='bx bx-category'></i> Genres <i class='bx bx-chevron-down'></i></a>
    <div class="dropdown-menu">
      <a href="#">Action</a>
      <a href="#">Romance</a>
      <a href="#">Comedy</a>
      <a href="#">Horror</a>
      <a href="#">Fantasy</a>
    </div>
  </div>
</nav>


<!--  mobile nav dropdown (initially hidden) -->
<div class="mobile-nav">
  <a href="#"><i class='bx bxs-home'></i> Home</a>

  <!-- Anime List (Mobile Dropdown) -->
  <div class="mobile-dropdown-parent">
    <a href="#" class="mobile-dropdown-toggle"><i class='bx bx-collection'></i> Anime List <i class='bx bx-chevron-down'></i></a>
    <div class="mobile-dropdown-menu">
      <a href="#">Top Rated</a>
      <a href="#">Most Popular</a>
      <a href="#">Completed Series</a>
      <a href="#">Ongoing Series</a>
    </div>
  </div>

  <a href="#"><i class='bx bxs-hot'></i> Trending</a>

  <!-- Genres (Mobile Dropdown) -->
  <div class="mobile-dropdown-parent">
    <a href="#" class="mobile-dropdown-toggle"><i class='bx bx-category'></i> Genres <i class='bx bx-chevron-down'></i></a>
    <div class="mobile-dropdown-menu">
      <a href="#">Action</a>
      <a href="#">Romance</a>
      <a href="#">Comedy</a>
      <a href="#">Horror</a>
      <a href="#">Fantasy</a>
    </div>
  </div>

  <div class="mobile-search">
    <input type="text" class="mobile-search-input" placeholder="Search anime...">
    <i class='bx bx-search mobile-search-icon'></i>
  </div>
</div>


  <!-- Search -->
  <div class="search-container">
    <input type="text" class="search-input" placeholder="Search anime...">
    <i class='bx bx-search search-icon'></i></div>
  

  <!-- User login / profile -->
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

  <!-- Hamburger -->
  <div class="hamburger">
    <i class='bx bx-menu'></i>
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
