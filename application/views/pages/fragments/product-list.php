<!-- <a href="/categories/<?=$category_id?>/products/add?return_url<?= $return_url ?>" class="btn btn-primary my-3">
    Add Products
</a> -->

<?php if ($this->authservice->isLoggedIn() && $category_id) { ?>
    <a href="/categories/<?=$category_id?>/products/add" class="btn btn-outline-primary my-3">
        Add Products
    </a>
<?php } ?>

<div class=""><?=$pagination_view?></div>

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
                            <span><?=$product->price?></span>
                        </span>
                        <span class="price-old ">
                            <span data-currency-iso="NGN">₦</span>
                            <span><?=$product->old_price?></span>
                        </span>
                    </div>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>
        </a>
    <?php endforeach; ?>
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