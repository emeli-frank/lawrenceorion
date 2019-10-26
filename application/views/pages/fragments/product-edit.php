<div class="container page-container">
    <h2>Product detail</h2>
    <div>id: <?=$id?></div>
    <div>name: <?=$name?></div>
    <div>category id: <?=$category_id?></div>

    <form method="POST" action="/admin/manage/categories/<?=$category_id?>/products/<?=$id?>/edit">
        <input name="name" type="text">
        <input type="hidden" name="product_id" value="<?=$id?>">
        <input type="hidden" name="category_id" value="<?=$id?>">
        <input type="submit" value="Save">
    </form>

</div>