<div class="product-detail-bg"></div>

<div class="container page-container product-detail-container">
    <div>
        <!-- <div class="image"><img src="/assets/images/products/<?=$image_path?>"></div> -->
        <div class="image" style="background-image: url('/assets/images/products/<?=$image_path?>')"></div>
        <div class="detail">
            <!-- <h2>Product detail</h2> -->
            <!-- <div>id: <?=$id?></div> -->
            <h2 class="product-name"><?=$name?></h2>
            <div class="foo">
                <h2 class="product-price"><?=$price?></h2>
                <div class="product-price-old"><?=$old_price?></div>
            </div>
            

            










            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="Description" data-toggle="tab" href="#customer-view" role="tab" aria-controls="customer-view" aria-selected="true">Descripton</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="manage-view-tab" data-toggle="tab" href="#manage-view" role="tab" aria-controls="manage-view" aria-selected="false">Tab label</a>
                </li>
            </ul>
            <div class="bar">
                <div class="product-category-name">category name</div>
                <div class="tab-content my-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="customer-view" role="tabpanel" aria-labelledby="Description">
                    <div>category id: <?=$category_id?></div>
                    <div>short description: <?=$short_description?></div>
                    <div>image path: <?=$image_path?></div>
                    <div>jumia url: <?=$jumia_product_url?></div>
                    </div>
                    <div class="tab-pane fade" id="manage-view" role="tabpanel" aria-labelledby="manage-view-tab">    
                </div>
            </div>
            </div>














            <div>
                <a href="/categories/<?=$category_id?>/products/<?=$id?>/edit">Edit</a>
            </div>
            <div>
                <a href="/products/<?=$id?>/delete">Delete</a>
            </div>
        </div>
    </div>
</div>

<style>
    .product-detail-bg {
        background-image: url("/assets/images/products/product-placeholder-image.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        filter: blur(8px);
        -webkit-filter: blur(15px);
        position: absolute;
        z-index: 1;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }

    .product-detail-container {
        position: absolute;
        z-index: 2;
        background-color: transparent;
        left: 0; 
        right: 0;
        bottom: 0;
        top: 0;
        display: flex;
        margin-left: auto; 
        margin-right: auto;
        justify-content: center;
        /* Override boostrap padding on container */
        padding-left: 0;
        padding-right: 0;
    }

    .product-detail-container > div {
        background-color: white;
        align-self: center;
        width: 100%;
        display: flex;
    }

    .product-detail-container > div > .image {
        background-color: grey;
        width: 50%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .product-detail-container > div > .detail {
        width: 50%;
    }

    .foo {
        display: flex;
        align-item: baseline;
    }

    .product-name {
        /* font-weight: 500; */
        margin-right: 8px;
    }

    .product-price {
        /* font-size: 24px; */
    }

    .product-price-old {
        font-size: 14px;
        text-decoration: line-through;
    }


    .product-category-name {
        background-color: brown;
        color: white;
        border-radius: 12px;
        /* transform: rotate(90deg); */
        /* transform-origin: 10% 100%; */
        /* transform-origin: left; */
        display: inline-block;
        padding: 3px 9px;
    }

    .bar {
        display: flex;
    }
</style>