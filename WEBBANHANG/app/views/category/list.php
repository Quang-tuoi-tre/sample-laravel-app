<?php include __DIR__ . '/../shares/header.php'; ?>

<h1>Danh sách danh mục</h1>
<a href="/WEBBANHANG/Category/add" class="btn btn-success mb-2">Thêm danh mục mới</a>
<ul class="list-group">
    <?php foreach ($categories as $category): ?>
        <li class="list-group-item">
            <h2>
                <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
            </h2>
            <p><?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?></p>

            <a href="/WEBBANHANG/Category/edit/<?php echo $category->id; ?>" class="btn btn-warning">Sửa</a>
            <a href="/WEBBANHANG/Category/delete/<?php echo $category->id; ?>"
               class="btn btn-danger"
               onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                Xóa
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php include __DIR__ . '/../shares/footer.php'; ?>
