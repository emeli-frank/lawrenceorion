<a href="/categories/<?=$product->category_id?>/products/<?=$product->id?>" class="product-tile">
    <div class="card" _style="width: 12rem;">
        <div class="image-container" style="background-image: url(/product-images/<?= $product->image_path ?>)"></div>
        <div class="card-body">
            <div class="product-name" title=""><?= $product->name ?></div>
            <div class="price">
                <span class="price-current">
                    <span data-currency-iso="NGN">₦</span>
                    <span>1500</span>
                </span>
                <span class="price-old ">
                    <span data-currency-iso="NGN">₦</span>
                    <span>2300</span>
                </span>
            </div>
        </div>
    </div>
</a>
