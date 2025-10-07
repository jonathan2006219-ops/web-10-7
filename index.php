<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>首頁</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="globle.css">
</head>
<body>
<?php include 'header.php'; ?>
<?php
session_start();
$user_name = $_SESSION['user_name'] ?? '';
$user_role = $_SESSION['user_role'] ?? '';
?>
<div class="container mt-5">
  <h1 class="text-center mb-4">輔仁大學資訊管理學系歡迎您</h1>
  <?php if ($user_name): ?>
    <div class="alert alert-success text-center">歡迎 <?= htmlspecialchars($user_name) ?>（<?= htmlspecialchars($user_role) ?>）登入！</div>
  <?php endif; ?>
  <p class="text-center">歡迎加入輔仁大學資訊管理學系，成為其中的一分子！</p>
  <div class="row justify-content-center my-5">
    <!-- 迎新茶會卡片 -->
    <div class="col-md-6 mb-4">
      <div class="card h-100 bg-white text-dark">
        <div class="card-body d-flex flex-column">
          <h2 class="card-title">迎新茶會</h2>
          <p class="card-text">歡迎新生參加迎新茶會，認識同學與師長，快速融入大學生活！</p>
          <a href="status.php" class="btn btn-primary mb-3">前往迎新茶會介紹</a>
          <hr>
        </div>
      </div>
    </div>
    <!-- 資管一日營卡片 -->
    <div class="col-md-6 mb-4">
      <div class="card h-100 bg-white text-dark">
        <div class="card-body d-flex flex-column">
          <h2 class="card-title">資管一日營</h2>
          <p class="card-text">資管一日營邀請大一新生透過一整天的活動更大學資管系的課程與生活。活動內容包含常用網站介紹、校園導覽與學長姐座談、闖關遊戲，讓參加者為未來四年作好準備。</p>
          <a href="conference.php" class="btn btn-primary mb-3">前往資管一日營介紹</a>
          <hr>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>