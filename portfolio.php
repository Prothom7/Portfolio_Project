<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Prothom's Portfolio</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="navigation.css" />
  <link rel="stylesheet" href="home.css" />
  <link rel="stylesheet" href="projects.css" />
</head>
<body>
  <!-- Navigation Bar -->
  <?php
    echo file_get_contents('navigation.html');
  ?>

  <main>
    <!-- Home Section -->
    <section id="home">
      <?php
        echo file_get_contents('home.html');
      ?>
    </section>

    <!-- Projects Section -->
    <section id="projects">
      <?php
        echo file_get_contents('projects.html');
      ?>
    </section>
  </main>

  <!-- JavaScript -->
  <script src="projects.js"></script>
</body>
</html>