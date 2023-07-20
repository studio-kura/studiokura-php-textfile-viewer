<?php
$entries = include('api/listfiles.php');
$config = include('config.php');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <title><?php echo $config['title']; ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
    body {
      font-family: sans-serif
    }
  </style>
</head>

<body>
  <!-- Page content -->
  <div class="w3-content" style="max-width:2000px;margin-top:46px">

    <!-- Main Section -->
    <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
      <h2 class="w3-wide"><?php echo $config['title']; ?></h2>
      <div class="w3-padding-64">
        <?php foreach ($entries as $entry) : ?>
          <a href="view.php?s=<?php echo $entry['filename']; ?>" class="w3-button w3-block w3-hover-dark-grey w3-padding-16">
            <?php echo $entry['title']; ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- End Page Content -->
  </div>

</body>

</html>