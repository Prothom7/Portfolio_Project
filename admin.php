<?php
session_start();

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Connect to database
  $conn = new mysqli("localhost", "root", "", "projects");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Check credentials
  $stmt = $conn->prepare("SELECT * FROM adimin WHERE username = ? AND password = ?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $_SESSION['admin_user'] = $username;

    // ✅ Set cookie to remember username for 7 days
    setcookie("remembered_username", $username, time() + (7 * 24 * 60 * 60), "/");

    header("Location: adminpanel.php");
    exit();
  } else {
    $login_error = "❌ Invalid username or password.";
  }

  $stmt->close();
  $conn->close();
}
?>

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
    <form method="POST" class="admin-form">
      <input type="text" name="username" placeholder="Username"
        value="<?php echo isset($_COOKIE['remembered_username']) ? htmlspecialchars($_COOKIE['remembered_username']) : ''; ?>" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
    <p class="login-status" id="login-status">
      <?php if (isset($login_error)) echo $login_error; ?>
    </p>
    <div class="signup-link">
      <p>Don't have an account?</p>
      <a href="signup.php"><button class="signup-button">Sign Up</button></a>
    </div>
  </div>
</body>
</html>