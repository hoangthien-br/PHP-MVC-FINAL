<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .navbar-brand img {
            height: 40px;
        }
        .navbar {
            background-color: #007bff; /* Màu xanh dương */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .nav-link {
            color: #fff !important; /* Đổi màu chữ thành trắng để dễ nhìn */
            font-weight: 500;
        }
        .nav-link:hover {
            color: #ffdd57 !important; /* Màu vàng khi hover */
        }
        .search-bar {
            max-width: 500px;
            margin: 0 auto;
        }
        .cart-icon {
            position: relative;
        }
        .cart-icon .badge {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/Product">
                VuaHaiTacSTORE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex search-bar mx-auto my-2 my-lg-0">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/Product"><i class="fas fa-home me-1"></i> Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Product/cart"><i class="fas fa-shopping-cart me-1"></i> Giỏ hàng
                            <span class="badge"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
                        </a>
                    </li>
                    <?php if (SessionHelper::isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/Product/add"><i class="fas fa-plus me-1"></i> Thêm sản phẩm</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <?php if (SessionHelper::isLoggedIn()): ?>
                            <a class="nav-link" href="#"><i class="fas fa-user me-1"></i> <?php echo htmlspecialchars($_SESSION['username']) . " (" . SessionHelper::getRole() . ")"; ?></a>
                        <?php else: ?>
                            <a class="nav-link" href="/account/login"><i class="fas fa-sign-in-alt me-1"></i> Đăng nhập</a>
                        <?php endif; ?>
                    </li>
                    <?php if (SessionHelper::isLoggedIn()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/account/logout"><i class="fas fa-sign-out-alt me-1"></i> Đăng xuất</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>