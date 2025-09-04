<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect form data
  $fullname = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];

  // Basic password match check
  if ($password !== $confirm_password) {
    echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
    exit();
  }

  // Connect to MySQL
  $conn = new mysqli("localhost", "root", "", "projects");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute insert query
  $stmt = $conn->prepare("INSERT INTO adimin (`full name`, `username`, `email`, `password`, `adress`, `phone`, `date of birth`) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssis", $fullname, $username, $email, $password, $address, $phone, $dob);

  if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    // Redirect to admin.php
    header("Location: admin.php");
    exit();
  } else {
    echo "<script>alert('Error during signup.'); window.history.back();</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
  <link rel="stylesheet" href="signup.css" />
</head>
<body>
  <div class="signup-container">
    <h2>📝 Create Admin Account</h2>
    <form method="POST" class="signup-form">
      <input type="text" name="name" placeholder="Full Name" required />
      <input type="text" name="username" placeholder="Username" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <input type="password" name="confirm_password" placeholder="Confirm Password" required />
      <input type="text" name="address" placeholder="Address" required />
      <input type="tel" name="phone" placeholder="Phone Number" required />
      <input type="date" name="dob" required />
      <button type="submit">Sign Up</button>
    </form>
  </div>
</body>
</html>