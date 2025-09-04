<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "projects";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM projectlist ORDER BY number ASC";
$result = $conn->query($sql);

$projects = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $projects[] = [
      "title" => $row["name"],
      "description" => $row["description"],
      "image" => $row["picture"],
      "link" => $row["link"]
    ];
  }
}

echo json_encode($projects);
$conn->close();
?>