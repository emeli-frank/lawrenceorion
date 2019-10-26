<div class="container page-container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Category name</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Name</li>
        </ol>
    </nav>

    <h2>Product detail</h2>
    <div>id: <?=$id?></div>
    <div>name: <?=$name?></div>
    <div>category id: <?=$category_id?></div>

    <div>
        <a href="/admin/manage/categories/<?=$category_id?>/products/<?=$id?>/edit">Edit</a>
    </div>

</div>