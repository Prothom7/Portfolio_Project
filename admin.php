<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <link rel="stylesheet" href="admin.css" />
</head>
<body>
  <div class="admin-login-container">
    <h2>🔐 Admin Login</h2>
    <form action="admin-dashboard.php" method="POST" class="admin-form">
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
    <p class="login-status" id="login-status"></p>
    <div class="signup-link">
      <p>Don't have an account?</p>
      <a href="signup.php"><button class="signup-button">Sign Up</button></a>
    </div>
  </div>
</body>
</html>