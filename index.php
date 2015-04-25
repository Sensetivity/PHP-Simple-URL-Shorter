<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Сервіс скорочення URL</title>
</head>
<body>
  <div class="container">
    <div class="login">
      <h1>Скоротити URL</h1>
      <div class="error_msg">Текст помилки</div>
      <form name="URL-form" action="make_url.php" method="POST">
        <p><input type="text" name="url" value="http://" placeholder="Уведіть URL"></p>
        <p class="submit"><input type="submit" value="Скоротити!"/></p>
      </form>
    </div>
  </div>
</body>
</html>

