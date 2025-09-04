<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
  header("Location: admin.php");
  exit();
}

$conn = new mysqli("localhost", "root", "", "projects");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle Add
if (isset($_POST['add'])) {
  $stmt = $conn->prepare("INSERT INTO projectlist (picture, name, description, link) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $_POST['picture'], $_POST['name'], $_POST['description'], $_POST['link']);
  $stmt->execute();
  $stmt->close();
}

// Handle Update
if (isset($_POST['update'])) {
  $stmt = $conn->prepare("UPDATE projectlist SET picture=?, name=?, description=?, link=? WHERE number=?");
  $stmt->bind_param("ssssi", $_POST['picture'], $_POST['name'], $_POST['description'], $_POST['link'], $_POST['number']);
  $stmt->execute();
  $stmt->close();
}

// Handle Delete
if (isset($_POST['delete'])) {
  $stmt = $conn->prepare("DELETE FROM projectlist WHERE number=?");
  $stmt->bind_param("i", $_POST['number']);
  $stmt->execute();
  $stmt->close();
}

// Fetch emails
$emailResult = $conn->query("SELECT email FROM adimin");

// Fetch projects
$projectResult = $conn->query("SELECT * FROM projectlist");

// Fetch messages
$messageResult = $conn->query("SELECT * FROM message");
$messages = [];
while ($row = $messageResult->fetch_assoc()) {
  $messages[] = $row;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel</title>
  <link rel="stylesheet" href="adminpanel.css" />
</head>
<body>
  <div class="admin-panel-container">
    <h2>👋 Welcome, <?php echo $_SESSION['admin_user']; ?></h2>

    <section class="email-section">
      <h3>📧 Registered Emails</h3>
      <ul>
        <?php while ($row = $emailResult->fetch_assoc()) {
          echo "<li>" . htmlspecialchars($row['email']) . "</li>";
        } ?>
      </ul>
    </section>

    <section class="project-section">
      <h3>🛠️ Manage Projects</h3>
      <form method="POST" class="project-form">
        <input type="number" name="number" placeholder="Project Number (for update/delete)" />
        <input type="text" name="picture" placeholder="Image URL" required />
        <input type="text" name="name" placeholder="Project Name" required />
        <textarea name="description" placeholder="Project Description" required></textarea>
        <input type="text" name="link" placeholder="Project Link" required />
        <div class="button-group">
          <button type="submit" name="add">Add</button>
          <button type="submit" name="update">Update</button>
          <button type="submit" name="delete">Delete</button>
        </div>
      </form>

      <table class="project-table">
        <tr>
          <th>Number</th>
          <th>Picture</th>
          <th>Name</th>
          <th>Description</th>
          <th>Link</th>
        </tr>
        <?php while ($row = $projectResult->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['number']}</td>
                  <td><img src='{$row['picture']}' alt='Image' /></td>
                  <td>{$row['name']}</td>
                  <td>{$row['description']}</td>
                  <td><a href='{$row['link']}' target='_blank'>Visit</a></td>
                </tr>";
        } ?>
      </table>
    </section>

    <section class="message-section">
      <h3>📨 Messages</h3>
      <div class="message-viewer">
        <button id="prev-btn">⬅️</button>
        <div id="message-content"></div>
        <button id="next-btn">➡️</button>
      </div>
    </section>

    <form method="POST" action="logout.php">
      <button type="submit" class="logout-button">Logout</button>
    </form>
  </div>

  <script>
    const messages = <?php echo json_encode($messages); ?>;
    let currentIndex = 0;

    function renderMessage(index) {
      const msg = messages[index];
      document.getElementById("message-content").innerHTML = `
        <div class="message-card">
          <img src="resources/message.png" alt="Message Image" />
          <h4>${msg.name}</h4>
          <p>${msg.description}</p>
          <a href="${msg.link}" target="_blank">🔗 Visit Link</a>
          <p class="counter">Message ${index + 1} of ${messages.length}</p>
        </div>
      `;
    }

    document.getElementById("prev-btn").onclick = () => {
      if (currentIndex > 0) renderMessage(--currentIndex);
    };
    document.getElementById("next-btn").onclick = () => {
      if (currentIndex < messages.length - 1) renderMessage(++currentIndex);
    };

    renderMessage(currentIndex);
  </script>
</body>
</html>