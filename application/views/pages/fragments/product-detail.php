<div id="custom-fields-data" class="hidden"><?= $product->custom_fields ?></div>

<!-- <div class="product-detail-bg" style="background-image: url('/product-images/<?=$product->image_path?>');"></div> -->
<!-- <div class="product-detail-overlay"></div> -->

<div class="container _page-container product-detail-container">
    <div id="image-detail-container">
        <div class="image-container">
            <img class="image" src="/product-images/<?=$product->image_path?>" alt="">
        </div>
        <div class="detail-container">
            <!-- <div class="image" style="background-image: url('/assets/images/products/<?=$product->image_path?>')"></div> -->
            <div class="detail">
                <!-- <h2>Product detail</h2> -->
                <!-- <div>id: <?=$id?></div> -->
                <h2 class="product-name"><?=$product->name?></h2>
                <div class="price-container">
                    <h2 class="product-price"><span data-currency-iso="NGN">₦</span><?=$product->price?></h2>
                    <div class="product-price-old"><?=$product->old_price?></div>
                </div>

                <a href="/categories/<?= $category->id ?>" class="product-category-name"><?= $category->name ?></a>

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
                            <div class="tab-pane fade show active custom-field-body" id="customer-view" role="tabpanel" aria-labelledby="Description">
                                <div>short description: <?=$product->short_description?></div>
                            </div>
                            <!-- <div class="tab-pane fade" id="manage-view" role="tabpanel" aria-labelledby="manage-view-tab"></div> -->
                            <!-- <div class="tab-pane fade" id="tab-1" role="tabpanel">Hello</div> -->

                        </div>
                        <div>
                            <a href="<?= $product->jumia_product_url ?>" class="btn btn-outline-primary my-3">
                                Buy at jumia
                            </a>
                            <?php if ($this->authservice->isLoggedIn()) { ?>
                            <a href="/products/<?= $product->id ?>/delete/" class="btn btn-outline-primary my-3">
                                Delete
                            </a>
                            <a href="/products/<?= $product->id ?>/edit/" class="btn btn-outline-primary my-3">
                                Edit
                            </a>
                            <?php } ?>
                        </div>
                </div>
                </div>
        </div>
        </div>
    </div>
</div>

<!-- <style>






    @media screen and (max-width: 768px) {
        .product-detail-container > div {
            flex-direction: column;
        }
    }


</style> -->

<style>
    @media screen and (min-width: 768px) {
        .product-detail-container > div {
            /* background-color: white;
            align-self: center;
            width: 100%; */
            display: flex;
            padding: 30px 30px;
            min-height: 450px;
            /* max-height: 600px; */
            overflow: auto;
        }

        .image-container {
            width: 200px;
            margin-right: 30px;
            flex-shrink: 0;
        }
    }

    .image-container > .image {
        width: 100%;
    }

    .product-detail-container {
        margin-top: 100px;
    }

    .price-container {
        display: flex;
        align-items: center;
        margin-top: 20px;
        margin-bottom: 20px;
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
        font-size: 12px;
        padding: 2px 10px 3px 10px;
        display: block;
    }

    .product-category-name:hover {
        color: white;
        text-decoration: none;
    }

    .product-category-name:focus {
        box-shadow: 0px 1px 6px grey;
    }

    @media screen and (min-width: 768px) {
        .custom-field-body {
            max-height: 150px;
            overflow: auto;
        }
    }

    .product-name {
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>

<script>
    /* window.onload(foo);

    function foo() {
        alert('hello');
    } */

    fields = JSON.parse(document.querySelector('#custom-fields-data').textContent);
    // console.log(fields);
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
            tabBody.classList.add('custom-field-body');
            tabBody.setAttribute('id', 'href-' + i);
            tabBody.textContent = fields[i].body;

            tabBodyContainer.appendChild(tabBody);
        }

    }

    /* window.onload = function () {
        let h = window.innerHeight;
        let foo = document.querySelector('#image-detail-container');

        console.log(h)

        foo.style.height = (h - 400 -36) + 'px';
    } */
</script>