<?php include 'auth_check.php'; ?>
<?php include 'header.php'; ?>
<div class="container mt-5">
        <h1>資管一日營介紹</h1>
        <div class="mb-4">
            <p>
                🚀 資管一日營介紹 🚀<br>
                👋 歡迎大一新生參加資管一日營！<br>
                這是一個專為新生設計的全日活動，讓你深入了解資管系的課程、生活與未來發展。<br>
                透過豐富的內容與互動，幫助你快速適應大學生活，建立人脈與信心。<br><br>
                ✨ 活動內容包含：<br>
                - 常用網站介紹：掌握學習資源與系上重要平台。<br>
                - 校園導覽與學長姐座談：認識校園環境，聆聽經驗分享。<br>
                - 闖關遊戲：團隊合作、趣味挑戰，增進同儕情誼。<br>
                - 午餐交流：與同學、學長姐輕鬆互動。<br><br>
                🎯 你能收穫什麼？<br>
                - 熟悉資管系課程與學習重點。<br>
                - 認識同學、學長姐，建立人脈。<br>
                - 提前適應大學生活，減少迷惘。<br>
                - 參與有趣活動，留下美好回憶！<br>
            </p>
        </div>
        <h4>費用計算方式</h4>
        <ul class="list-group my-4">
                <li class="list-group-item">老師：<span>免費</span></li>
                <li class="list-group-item">學生（上午場）：<span>150元</span></li>
                <li class="list-group-item">學生（下午場）：<span>100元</span></li>
                <li class="list-group-item">午餐：<span>50元</span></li>
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
                    $student = $_POST['student2'] ?? [];
                    $price = 0;
                    if (in_array('上午場', $student)) $price += 150;
                    if (in_array('下午場', $student)) $price += 100;
                    if (in_array('午餐', $student)) $price += 50;
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
            <label for="email2" class="form-label">Email</label>
            <input type="email" class="form-control" id="email2" name="email2" required>
        </div>
        <div class="mb-3">
            <label class="form-label">活動選擇</label><br>
            <div id="student_options2" style="margin-top:10px;">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="student2[]" id="role2_morning" value="上午場">
                    <label class="form-check-label" for="role2_morning">上午場(150元)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="student2[]" id="role2_afternoon" value="下午場">
                    <label class="form-check-label" for="role2_afternoon">下午場(100元)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="student2[]" id="role2_lunch" value="午餐">
                    <label class="form-check-label" for="role2_lunch">加購午餐(50元)</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">送出報名</button>
    </form>
    <?php if ($price !== null): ?>
        <div class="alert alert-info mt-4">您需繳費用：<strong><?php echo $price; ?> 元</strong></div>
    <?php endif; ?>
</div>
<?php include 'footer.php'; ?>
</body>
</html>