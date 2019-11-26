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


<style>
    .home-container {
        margin-top: 56px;
    }
    .hero-image-container {
        /* display: block; */
    }

    .hero-image {
        background-image: url('/assets/images/hero-image.jpg');
        background-position: top;
        background-repeat: no-repeat;
        background-size: cover;
        height: 160px;
    }

    @media screen and (min-width: 400px) {
        .hero-image {
            height: 200px
        }
    }

    @media screen and (min-width: 600px) {
        .hero-image {
            height: 220px
        }
    }

    @media screen and (min-width: 768px) {
        .hero-image {
            height: 300px
        }
    }

    .product-link {
        height: 48px;
        background-color: #232f3e; /* Consider setting this hash to secondary color */
        color: white;
        display: flex;
        align-items: center;
        padding: 0 20px;
        justify-content: space-between;
    }

    .product-link:hover, .product-link:focus {
        color: white;
        text-decoration: none;
    }

    .product-link > span {
        margin-right: 16px;
    }

    .product-slide {
        margin-top: 20px;
    }

    .product-slide-container {
        display: flex;
    }

    /* REPEATED */

    .image-container {
        height: 200;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .product-tile {
        flex-grow: 1;
        flex-basis: 50%;
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

    .carousel-side-text-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 60px;
        margin-bottom: 30px;
    }

    .carousel-side-text-container > .carousel {
        /* flex-grow: 2; */
        width: 100%
    }

    @media screen and (min-width: 768px) {
        .carousel-side-text-container {
            display: flex;
            flex-direction: row-reverse;
            align-items: center;
        }
        .carousel-side-text-container > .carousel {
            /* flex-grow: 2; */
            flex-basis: 100%
        }
    }

    .carousel-side-text-container > .text {
        /* flex-grow: 1; */
        flex-basis: 100%;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    @media screen and (min-width: 768px) {
        .carousel-side-text-container > .text {
            padding-left: 30px;
        }
    }

    .carousel-side-text-container .icon {
        width: 60px;
    }

    @media screen and (min-width: 768px) {
        .carousel-side-text-container .icon {
            width: 100px;
        }
    }

    .h-spacer-home {
        margin-right: 8px;
        margin-left: 8px;
    }

    /* @media screen and (min-width: 768px) {
        .h-spacer-home {
            margin-right: 32px;
            margin-left: 32px;
        }
    }

    @media screen and (min-width: 900px) {
        .h-spacer-home {
            margin-right: 32px;
            margin-left: 32px;
            max-width: 900px;
        }
    } */

    .about-and-contact {
        margin-right: auto;
        margin-left: auto;
    }

    .about, .contact {
        position: relative;
        /* margin-top: 30px;
        margin-bottom: 30px; */
        margin: auto;
        width: 85%;
    }

    .icon-container {
        height: 60px;
        display: relative;
    }

    .icon-container > .icon {
        width: 60px;
        height: 60px;
        border-radius: 30px;
        position: absolute;
        background-color: #37A0AC;
        z-index: 2;
        margin-left: -30px;
        top: 30px;
        left: 50%;
        border: 7px solid white;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contact .icon-container > .icon {
        background-color: #E86E2F;
    }

    .text-container {
        padding-top: 25px;
        background-color: rgba(55, 160, 172, 0.05);
        padding-top: 40px;
        top: 30px;
        padding: 46px 16px 16px 16px;
        border-radius: 5px;
        color: #37A0AC;
        text-align: center;
    }

    .text-container > .btn {
        color: #37A0AC;
        border-color: #37A0AC;
        margin-top: 20px;
    }

    .text-container > .btn:focus {
        background-color: transparent !important;
    }
    
    .contact .text-container > .btn {
        color: #E86E2F;
        border-color: #E86E2F;
    }

    .contact .text-container {
        background-color: rgba(232, 110, 47, 0.05);
        color: #E86E2F;
    }
</style>

<script>
    function navigateTo(location) {
        console.log(location);
        window.location.href = location;
    }
</script>
