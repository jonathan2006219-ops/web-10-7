<?php
ob_start();
session_start();
$users = [
  "root"  => ["password" => "password", "name" => "管理員", "role" => "teacher"],
  "413401027" => ["password" => "jona2006", "name" => "學生413401027", "role" => "student"],
];
$error = "";
$redirect = $_GET['redirect'] ?? '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = trim($_POST['password'] ?? '');
  if (isset($users[$username]) && $users[$username]['password'] === $password) {
    $_SESSION['user_role'] = $users[$username]['role'] === 'teacher' ? '老師' : '學生';
    $_SESSION['user_name'] = $users[$username]['name'];
    $_SESSION['user_account'] = $username;
    header("Location: index.php");
    exit;
  } else {
    $error = "帳號或密碼錯誤";
  }
}
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登入</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2 class="mb-4">登入</h2>
    <?php if ($error): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="post" action="login.php<?= $redirect ? '?redirect=' . urlencode($redirect) : '' ?>">
      <div class="mb-3">
        <label for="username" class="form-label">帳號</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">密碼</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <input type="hidden" name="redirect" value="<?= htmlspecialchars($redirect) ?>">
      <button type="submit" class="btn btn-primary">登入</button>
    </form>
  </div>
</body>
</html>
