<?php include 'auth_check.php'; ?>
<?php include 'header.php'; ?>
<div class="container mt-5">
        <h1>迎新茶會介紹</h1>
        <div class="mb-4">
            <p>
                🎉 迎新茶會介紹 🎉<br>
                👋 親愛的新同學們，歡迎加入我們的大家庭！<br>
                為了讓大家能更快認識彼此、熟悉環境，我們特別準備了迎新茶會。<br>
                這是一個輕鬆自在、充滿歡笑的活動，讓你不只交到朋友，也能更了解系上、社團以及未來的學習生活。<br><br>
                ✨ 活動內容包含：<br>
                - 暖心開場：輕鬆破冰小遊戲，幫助大家快速熟絡。<br>
                - 學長姐分享：帶你認識校園資源、讀書祕訣與生活小技巧。<br>
                - 趣味團康：充滿笑聲的團隊遊戲，培養默契與友誼。<br>
                - 茶點時光：邊享用小點心邊交流，認識更多新朋友。<br><br>
                🎯 你能收穫什麼？<br>
                - 認識同學與學長姐，快速融入新環境。<br>
                - 得到實用的校園資訊與課業建議。<br>
                - 一起留下美好回憶，為大學生活揭開序幕！<br>
            </p>
        </div>
        <h4>費用計算方式</h4>
        <ul class="list-group my-4">
                <li class="list-group-item">老師：<span>免費</span></li>
                <li class="list-group-item">學生（用餐）：<span>60元</span></li>
                <li class="list-group-item">學生（不用餐）：<span>免費</span></li>
        </ul>
        <p class="text-muted">如有疑問請洽主辦單位。</p>
</div>
<div class="container mb-5">
    <h4 class="mb-3">線上報名表單</h4>
    <?php
            session_start();
            $user_name = $_SESSION['user_name'] ?? '';
            $user_role = $_SESSION['user_role'] ?? '';
            $price = null;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $role = $user_role;
                if ($role === '老師') {
                    $price = 0;
                } elseif ($role === '學生') {
                    $meal = $_POST['meal1'] ?? '';
                    if ($meal === '用餐') {
                        $price = 60;
                    } else {
                        $price = 0;
                    }
                }
            }
    ?>
    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label">姓名</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($user_name) ?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">身分</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($user_role) ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="email1" class="form-label">Email</label>
            <input type="email" class="form-control" id="email1" name="email1" required>
        </div>
        <?php if ($user_role === '學生'): ?>
        <div class="mb-3">
            <label class="form-label">用餐選擇</label><br>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="meal1" id="role1_student_meal" value="用餐" checked>
                <label class="form-check-label" for="role1_student_meal">用餐(60元)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="meal1" id="role1_student_no_meal" value="不用餐">
                <label class="form-check-label" for="role1_student_no_meal">不用餐(免費)</label>
            </div>
        </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-success">送出報名</button>
    </form>
    <?php if ($price !== null): ?>
        <div class="alert alert-info mt-4">您需繳費用：<strong><?php echo $price; ?> 元</strong></div>
    <?php endif; ?>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
