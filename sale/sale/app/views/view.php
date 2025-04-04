<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h1 class="display-4">Giỏ hàng của bạn</h1>
    
    <div class="row">
        <div class="col">
            <?php if (empty($cartItems)): ?>
                <p>Giỏ hàng đang trống</p>
            <?php else: ?>
                <p>Có sản phẩm trong giỏ (chưa triển khai logic hiển thị)</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>