<?php include 'app/views/shares/header.php'; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 fw-bold text-uppercase">Đăng nhập</h2>
                    <p class="text-center text-muted mb-4">Vui lòng nhập tên đăng nhập và mật khẩu của bạn!</p>

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

                    <form action="/account/checklogin" method="post">
                        <div class="mb-4">
                            <label for="username" class="form-label">Tên đăng nhập</label>
                            <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Nhập tên đăng nhập" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Nhập mật khẩu" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <a href="#!" class="text-primary text-decoration-none">Quên mật khẩu?</a>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Đăng nhập</button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0">Chưa có tài khoản? <a href="/account/register" class="text-primary fw-bold">Đăng ký ngay</a></p>
                    </div>

                    <!-- Đăng nhập bằng mạng xã hội (tạm thời để lại, có thể thêm chức năng sau) -->
                    <div class="text-center mt-4">
                        <p class="text-muted">Hoặc đăng nhập bằng:</p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#!" class="text-primary"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <a href="#!" class="text-info"><i class="fab fa-twitter fa-lg"></i></a>
                            <a href="#!" class="text-danger"><i class="fab fa-google fa-lg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>