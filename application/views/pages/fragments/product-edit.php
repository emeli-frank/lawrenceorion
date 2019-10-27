<div class="container page-container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Category name</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="">Product Name</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <h2>Product detail</h2>
    <div>id: <?=$id?></div>
    <div>name: <?=$name?></div>
    <div>category id: <?=$category_id?></div>

    <form method="POST" action="edit">
        <input name="name" type="text">
        <input type="hidden" name="product_id" value="<?=$id?>">
        <input type="hidden" name="category_id" value="<?=$id?>">
        <input type="submit" value="Save">
    </form>

</div>