<a href="/admin/manage/categories/<?=$category_id?>/products/add" class="btn btn-primary my-3">
    Add Products
</a>

<div class=""><?=$pagination_view?></div>

<div class="product-list-containter">
    <?php foreach ($products as $product): ?>
        <a href="/admin/manage/categories/<?=$category_id?>/products/<?=$product->id?>" class="product-tile">
            <div class="card" style="width: 12rem;">
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

<div class=""><?=$pagination_view?></div>

<style>




    .product-list-containter {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .product-tile {
        display: flex-item;
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
</style>