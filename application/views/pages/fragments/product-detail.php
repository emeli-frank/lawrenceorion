<div id="custom-fields-data" class="hidden"><?= $custom_fields ?></div>

<div class="product-detail-bg" style="background-image: url('/product-images/<?=$image_path?>');"></div>

<div class="container page-container product-detail-container">
    <div>
        <div><img class="image" src="/product-images/<?=$image_path?>" alt=""></div>
        <div>
            <!-- <div class="image" style="background-image: url('/assets/images/products/<?=$image_path?>')"></div> -->
            <div class="detail">
                <!-- <h2>Product detail</h2> -->
                <!-- <div>id: <?=$id?></div> -->
                <h2 class="product-name"><?=$name?></h2>
                <div class="price-container">
                    <h2 class="product-price"><span data-currency-iso="NGN">₦</span><?=$price?></h2>
                    <div class="product-price-old"><?=$old_price?></div>
                </div>

                <div class="product-category-name">category name</div>

                <ul class="nav nav-tabs my-3" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="Description" data-toggle="tab" href="#customer-view" role="tab" aria-controls="customer-view" aria-selected="true">Descripton</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="manage-view-tab" data-toggle="tab" href="#manage-view" role="tab" aria-controls="manage-view" aria-selected="false">Tab label</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-1" role="tab" aria-controls="manage-view" aria-selected="false">Tab label</a>
                    </li> -->
                </ul>
                <div class="bar">
                    
                        <div id="tab-body"  class="tab-content my-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="customer-view" role="tabpanel" aria-labelledby="Description">
                                <div>short description: <?=$short_description?></div>
                                <div>jumia url: <?=$jumia_product_url?></div>

                                <div>
                                    <a href="" class="btn btn-outline-primary my-3">
                                        Buy at jumia
                                    </a>
                                    <?php if ($this->authservice->isLoggedIn()) { ?>
                                    <a href="/products/<?= $id ?>/delete/" class="btn btn-outline-primary my-3">
                                        Delete
                                    </a>
                                    <a href="/products/<?= $category_id ?>/edit/" class="btn btn-outline-primary my-3">
                                        Edit
                                    </a>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- <div class="tab-pane fade" id="manage-view" role="tabpanel" aria-labelledby="manage-view-tab"></div> -->
                            <!-- <div class="tab-pane fade" id="tab-1" role="tabpanel">Hello</div> -->

                        </div>
                </div>
                </div>
        </div>
        </div>
    </div>
</div>

<style>
    .product-detail-bg {
        /* background-image: url("/assets/images/products/product-placeholder-image.jpg"); */
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
        padding: 30px 30px;

    }

    .image {
        width: 200px;
        height: 200px;
        margin-right: 30px;
    }

    .image > img {
        width: 100%;
    }
    
    .price-container {
        display: flex;
        align-items: center;
    }

    .price-container > .product-price {
        margin-right: 10px;
    }

    .price-container > .product-price-old {
        text-decoration: line-through;
    }

    .product-category-name {
        background-color: brown;
        color: white;
        border-radius: 15px;
        width: fit-content;
        /* padding: 3px 12px; */
        font-size: 12px;
        padding: 2px 10px 3px 10px;
    }
</style>

<script>
    /* window.onload(foo);

    function foo() {
        alert('hello');
    } */

    fields = JSON.parse(document.querySelector('#custom-fields-data').textContent);
    console.log(fields);
    build();

    function build() {
        var tab = document.querySelector('#myTab');
        var tabBodyContainer = document.querySelector('#tab-body');

        for (i = 0; i < fields.length; i++) {
            var list = document.createElement('li');
            list.classList.add('nav-item');

            var a = document.createElement('a');
            a.classList.add('nav-link');
            // a.setAttribute('id', 'tab-' + i);
            a.setAttribute('data-toggle', 'tab');
            a.setAttribute('href', '#href-' + i);
            a.setAttribute('role', 'tab');
            a.textContent = fields[i].label;

            list.appendChild(a);
            tab.appendChild(list);


            var tabBody = document.createElement('div');
            tabBody.classList.add('tab-pane');
            tabBody.classList.add('fade');
            tabBody.setAttribute('id', 'href-' + i);
            tabBody.textContent = fields[i].body;

            tabBodyContainer.appendChild(tabBody);
        }

    }
</script>