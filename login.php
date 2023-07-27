<?php
session_start();
$config = include('config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $submitted_password = $_POST['password'];
  $original_password_hash = $config['password'];
  if (password_verify($submitted_password, $original_password_hash)) {
    $_SESSION['token'] = $original_password_hash;
    // Redirect to the home page
    header('Location: /');
    exit();
  } else {
?>
    Invalid username or password.
  <?php
  }
}
if (!isset($_SESSION['token'])) :
  ?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>パスワード入力 | <?php echo $config['title']; ?></title>
  </head>

  <body>
    <h1>パスワード入力</h1>
    <form method="post" action="login.php">
      <label for="password">パスワード</label>
      <input type="password" name="password" required><br><br>
      <button type="submit">送信</button>
    </form>
  </body>

  </html>
<?php
endif;
header('Location: /');
exit();
