<?php include 'app/views/shares/header.php'; ?>
<div class="container my-5">
    <h1 class="text-center mb-4">Danh sách sản phẩm</h1>
    <?php if (SessionHelper::isAdmin()): ?>
        <div class="text-end mb-3">
            <a href="/Product/add" class="btn btn-success"><i class="fas fa-plus me-1"></i> Thêm sản phẩm mới</a>
        </div>
    <?php endif; ?>
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100 shadow-sm">
                    <?php if ($product->image): ?>
                        <img src="/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" style="height: 200px; object-fit: cover;">
                    <?php else: ?>
                        <img src="/images/no-image.png" class="card-img-top" alt="No Image" style="height: 200px; object-fit: cover;">
                    <?php endif; ?>
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <a href="/Product/show/<?php echo $product->id; ?>" class="text-dark text-decoration-none"><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></a>
                        </h5>
                        <p class="text-danger fw-bold"><?php echo number_format($product->price, 0, ',', '.'); ?> VNĐ</p>
                        <p class="text-muted"><?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary btn-sm"><i class="fas fa-cart-plus me-1"></i> Thêm vào giỏ</a>
                            <?php if (SessionHelper::isAdmin()): ?>
                                <a href="/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit me-1"></i> Sửa</a>
                                <a href="/Product/delete/<?php echo $product->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');"><i class="fas fa-trash me-1"></i> Xóa</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>

<style>
    .product-card {
        transition: all 0.3s;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    .card-title a:hover {
        color: #007bff;
    }
</style>