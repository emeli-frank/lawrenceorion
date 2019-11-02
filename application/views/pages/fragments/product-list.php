<!-- <a href="/categories/<?=$category_id?>/products/add?return_url<?= $return_url ?>" class="btn btn-primary my-3">
    Add Products
</a> -->

<?php if ($category_id) { ?>
    <a href="/categories/<?=$category_id?>/products/add" class="btn btn-outline-primary my-3">
        Add Products
    </a>
<?php } ?>

<div class=""><?=$pagination_view?></div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="customer-view-tab" data-toggle="tab" href="#customer-view" role="tab" aria-controls="customer-view" aria-selected="true">Grid View</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="manage-view-tab" data-toggle="tab" href="#manage-view" role="tab" aria-controls="manage-view" aria-selected="false">List View</a>
    </li>
</ul>
<div class="tab-content my-3" id="myTabContent">
    <div class="tab-pane fade show active" id="customer-view" role="tabpanel" aria-labelledby="customer-view-tab">
        <div class="product-list-containter">
            <?php foreach ($products as $product): ?>
                <a href="/categories/<?=$product->category_id?>/products/<?=$product->id?>" class="product-tile">
                    <div class="card" _style="width: 12rem;">
                        <img src="/assets/images/products/product-placeholder-image.jpg" class="card-img-top">
                        <div class="card-body">
                            <!-- <h5 class="card-title"><?=$product->name?></h5> -->
                            <div class="product-name"><?=$product->name?></div>
                            <div class="price">
                                <span class="price-current">
                                    <span data-currency-iso="NGN">₦</span>
                                    <span>4,500</span>
                                </span>
                                <span class="price-old ">
                                    <span data-currency-iso="NGN">₦</span>
                                    <span>10,000</span>
                                </span>
                            </div>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="tab-pane fade" id="manage-view" role="tabpanel" aria-labelledby="manage-view-tab">
        <ul class="list-group manage-tile-tab">
            <?php foreach ($products as $product): ?>
                <a href="/categories/<?=$product->category_id?>/products/<?=$product->id?>" class="product-tile list-group-item">
                    <li class="d-flex justify-content-between align-items-center">
                        <?=$product->name?>
                        <span class="badge badge-primary badge-pill">14</span>
                    </li>
                </a>
            <?php endforeach; ?>
        </ul>
    </div>

<!--     <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> -->
</div>

<div class=""><?=$pagination_view?></div>

<style>




    .product-list-containter {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .product-tile {
        display: flex-item;

        flex: 1 18%;
    }

    .product-tile, :hover {
        text-decoration: none !important;
    }

    .product-name {
        font-weight: 500;
        line-height: 1.2;
        color: inherit;
    }

    .price {
        display: flex;
        align-items: center;
    }

    .price-current {
        margin-right: 10px;
        font-size: 09.em;
    }

    .price-old {
        text-decoration: line-through;
        font-size: 0.8em;
    }

    /* .manage-tile-tab {
        margin-top: 20px;
    } */

    @media screen and (min-width: 768px) {
        .manage-tile-tab {
            max-width: 600px;
            margin-left: 30px;
        }
    }
</style>