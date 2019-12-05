<div class="home-container">
    <div class="hero-image-container">
        <div class="hero-image"></div>
        <a href="/categories/all" class="product-link">
            <span>SEE ALL PRODUCTS</span>
            <i class="material-icons">arrow_forward_ios</i>
        </a>
    </div>
    <div class="carousel-side-text-container container">
        <div class="text">
            <h1>
                <span>Welcome to </span><span>Lawrenceorion, </span><span>a Jumia affiliate platform</span>
            </h1>
            <div class="icon"><object type="image/svg+xml" data="/assets/images/icons/shopping-cart.svg"></object></div>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <h4 style="margin-top: 40px">Featrued</h4>
            <div class="carousel-inner">
                <?php 
                $counter = 0;
                while ($counter < count($product_views)): 
                ?>
                    <div class="carousel-item <?= ($counter > 0) ? '' : 'active' ?>">
                        <div class="product-slide">
                            <div class="product-slide-container">   
                                <?= $product_views[$counter] ?>
                                <?php $counter++ ?>
                                <?= $product_views[$counter] ?>
                                <?php $counter++ ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="about-and-contact container row">
        <div class="about col-sm-8">
            <div class="icon-container">
                <div class="icon"><i class="material-icons">assignment</i></div>
            </div>
            <div class="text-container">
                <h4>What we do</h4>
                <p>Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem 
                ipsum lorem ipsum lorem <p>
                <p>Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum <p>
                <p>Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem 
                ipsum lorem ipsum lorem <p>
                <div onClick="navigateTo('/about')" class="btn btn-outline-primary">Learn more</div>
            </div>
        </div>
        <div class="contact col-sm-4">
            <div class="icon-container">
                    <div class="icon"><i class="material-icons">room</i></div>
            </div>
            <div class="text-container">
                <h4>You can reach us at</h4>
                <p>Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem 
                ipsum lorem ipsum lorem ipsum<p>
                <p>Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem 
                ipsum<p>
                <div onClick="navigateTo('/contact')" class="btn btn-outline-primary">Learn more</div>
            </div>
        </div>
    </div>
</div>

<script>
    function navigateTo(location) {
        console.log(location);
        window.location.href = location;
    }
</script>
