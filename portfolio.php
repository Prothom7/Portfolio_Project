<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Prothom's Portfolio</title>
  <link rel="stylesheet" href="navigation.css" />
  <link rel="stylesheet" href="home.css" />
</head>
<body>
  <?php
    echo file_get_contents('navigation.html');
  ?>

  <main>
    <section id="home">
    <?php
      echo file_get_contents('home.html');
    ?>
    </section>
  </main>
</body>
</html>
