<h2>Category list</h2>

<?php foreach ($categories as $category): ?>
    <div><a href="/admin/manage/categories/<?=$category->id?>"><?=$category->name?></a></div>
<?php endforeach; ?>