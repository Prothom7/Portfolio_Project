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
  <link rel="stylesheet" href="aboutme.css" />
  <link rel="stylesheet" href="contact.css" />
</head>
<body>
  <!-- Navigation Bar -->
  <?php echo file_get_contents('navigation.html'); ?>

  <main>
    <!-- Home Section -->
    <section id="home">
      <?php echo file_get_contents('home.html'); ?>
    </section>

    <!-- About Me Section -->
    <section id="about-me">
      <?php echo file_get_contents('aboutme.html'); ?>
    </section>

    <!-- Projects Section -->
    <section id="projects">
      <?php echo file_get_contents('projects.html'); ?>
    </section>

    <!-- Contact Section -->
    <section id="contact">
      <?php echo file_get_contents('contact.html'); ?>
    </section>
  </main>

  <!-- JavaScript -->
  <script src="home.js"></script>         <!-- 👈 Added for image effects -->
  <script src="projects.js"></script>
  <script src="aboutme.js"></script>
  <script src="contact.js"></script>
</body>
</html>