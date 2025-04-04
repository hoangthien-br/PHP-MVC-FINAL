<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 fw-bold text-uppercase">Đăng ký</h2>
                    <p class="text-center text-muted mb-4">Tạo tài khoản mới để bắt đầu mua sắm!</p>

                    <!-- Hiển thị thông báo lỗi nếu có -->
                    <?php if (isset($errors) && !empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="/account/save" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="username" class="form-label">Tên đăng nhập</label>
                                <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Nhập tên đăng nhập" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="fullname" class="form-label">Họ và tên</label>
                                <input type="text" name="fullname" id="fullname" class="form-control form-control-lg" placeholder="Nhập họ và tên" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Nhập mật khẩu" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="confirmpassword" class="form-label">Xác nhận mật khẩu</label>
                                <input type="password" name="confirmpassword" id="confirmpassword" class="form-control form-control-lg" placeholder="Xác nhận mật khẩu" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Đăng ký</button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0">Đã có tài khoản? <a href="/account/login" class="text-primary fw-bold">Đăng nhập ngay</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>