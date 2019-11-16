<div class="page-container container">
    <h1>Add Category</h2>
    <form action="/categories/add" method="POST">
        <input type="text" name="category-name">
        <?php if (isset($category_id)): ?>
        <input type="hidden" name="category-id" value="<?=$category_id?>"><!-- TODO:: id if editing -->
        <?php endif ?>
        <input type="submit">
    </form>
</div>