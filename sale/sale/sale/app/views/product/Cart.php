<?php include 'app/views/shares/header.php'; ?>
<div class="container my-5">
    <h1 class="text-center mb-4">Giỏ hàng của bạn</h1>
    <?php if (!empty($cart)): ?>
        <ul class="list-group">
            <?php $total = 0; ?>
            <?php foreach ($cart as $id => $item): ?>
                <li class="list-group-item" data-id="<?php echo $id; ?>" data-price="<?php echo htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <?php if ($item['image']): ?>
                                <img src="/<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?>" style="max-width: 100px;">
                            <?php else: ?>
                                <img src="/images/no-image.png" alt="No Image" style="max-width: 100px;">
                            <?php endif; ?>
                        </div>
                        <div class="flex-grow-1">
                            <h5><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h5>
                            <p>Giá: <?php echo number_format($item['price'], 0, ',', '.'); ?> VNĐ</p>
                            <p>Số lượng:
                                <button class="btn btn-sm btn-outline-secondary decrease">-</button>
                                <span class="quantity"><?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></span>
                                <button class="btn btn-sm btn-outline-secondary increase">+</button>
                            </p>
                        </div>
                    </div>
                </li>
                <?php $total += $item['price'] * $item['quantity']; ?>
            <?php endforeach; ?>
        </ul>
        <div class="mt-3 text-end">
            <h3>Tổng tiền: <span id="total"><?php echo number_format($total, 0, ',', '.'); ?></span> VNĐ</h3>
        </div>
        <div class="text-end mt-4">
            <a href="/Product" class="btn btn-secondary">Tiếp tục mua sắm</a>
            <a href="/Product/checkout" class="btn btn-primary ms-2">Thanh toán</a>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            <h4>Giỏ hàng của bạn đang trống!</h4>
            <a href="/Product" class="btn btn-primary mt-2">Tiếp tục mua sắm</a>
        </div>
    <?php endif; ?>
</div>

<!-- Thêm JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('.list-group-item');

    function updateTotal() {
        let total = 0;
        items.forEach(item => {
            if (!item.classList.contains('hidden')) {
                const qty = parseInt(item.querySelector('.quantity').textContent);
                const price = parseFloat(item.getAttribute('data-price'));
                total += qty * price;
            }
        });
        document.getElementById('total').textContent = total.toLocaleString('vi-VN');

        // Ẩn toàn bộ giỏ hàng nếu không còn sản phẩm nào hiển thị
        const visibleItems = document.querySelectorAll('.list-group-item:not(.hidden)');
        if (visibleItems.length === 0) {
            document.querySelector('.list-group').style.display = 'none';
            document.querySelector('.mt-3').style.display = 'none';
            document.querySelector('.text-end.mt-4').style.display = 'none';
            document.querySelector('.alert-info').style.display = 'block';
        }
    }

    items.forEach(item => {
        const decreaseBtn = item.querySelector('.decrease');
        const increaseBtn = item.querySelector('.increase');
        const quantitySpan = item.querySelector('.quantity');
        const id = item.getAttribute('data-id');

        // Giảm số lượng
        decreaseBtn.addEventListener('click', function() {
            fetch('/Product/decrease/' + id, { method: 'POST' })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (data.removed) {
                            item.classList.add('hidden');
                        } else {
                            quantitySpan.textContent = data.quantity;
                        }
                        updateTotal();
                    } else {
                        alert(data.message || 'Giảm số lượng về 0 sẽ xoá sản phẩm!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Giảm số lượng về 0 sẽ xoá sản phẩm!');
                });
        });

        // Tăng số lượng
        increaseBtn.addEventListener('click', function() {
            fetch('/Product/increase/' + id, { method: 'POST' })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        item.classList.remove('hidden');
                        quantitySpan.textContent = data.quantity;
                        updateTotal();
                    } else {
                        alert(data.message || 'Có lỗi xảy ra khi tăng số lượng');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi xảy ra khi tăng số lượng');
                });
        });
    });
});
</script>

<style>
.hidden {
    display: none;
}
.alert-info {
    display: <?php echo empty($cart) ? 'block' : 'none'; ?>;
}
</style>

<?php include 'app/views/shares/footer.php'; ?>