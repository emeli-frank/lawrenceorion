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
                <!-- <img src="/assets/images/products/product-placeholder-image.jpg" class="card-img-top"> -->
                <!-- <img src="/product-images/<?=$product->image_path?>" class="card-img-top"> -->
                <div class="image-container" style="background-image: url(/product-images/<?=$product->image_path?>)"></div>
                <!-- <img src="/product-images/product-placeholder-image.jpg" class="card-img-top"> -->
                <div class="card-body">
                    <!-- <h5 class="card-title"><?=$product->name?></h5> -->
                    <div class="product-name" title="<?=$product->name?>"><?=$product->name?></div>
                    <div class="price">
                        <span class="price-current">
                            <span data-currency-iso="NGN">₦</span>
                            <span><?=number_format($product->price, 2) ?></span>
                        </span>
                        <span class="price-old ">
                            <span data-currency-iso="NGN">₦</span>
                            <span><?=number_format($product->old_price, 2) ?></span>
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

    .image-container {
        height: 200;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .product-list-containter {
        display: flex;
        flex-wrap: wrap;
    }

    @media screen and (min-width: 768px) {
        /* .product-list-containter {
            flex-wrap: wrap;
        } */
    }

    @media screen and (max-width: 900px) {
        .product-list-containter {
            justify-content: space-around;
        }
    }

    .product-tile {
        /* flex: 1 12%; */
        flex-grow: 1;
        flex-basis: 50%;
    }

    @media screen and (min-width: 768px) {
        .product-tile {
            flex: 1 18%;
            max-width: 250px;
            min-width: 180px;
        }
    }

    @media screen and (min-width: 576px) {
        .product-tile {
            flex: 1 18%;
            max-width: 250px;
            min-width: 180px;
        }

        .product-name {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }
    }

    .product-tile, :hover {
        text-decoration: none !important;
    }

    .product-name {
        font-weight: 500;
        line-height: 1.2;
        color: inherit;
/*         white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden; */
    }

    .price {
        display: flex;
        align-items: center;
    }

    .price-current, .price-old {
        white-space: nowrap;
    }

    .price-current {
        margin-right: 10px;
        font-size: 09.em;
    }

    .price-old {
        text-decoration: line-through;
        font-size: 0.8em;
    }

</style>