<div class="container page-container dashboard-container">
    <h2>Admin Dashboard</h2>
        <div class="object-overveiw-container">
            <div class="object-overview category">
                <a href="/categories" class="figure">
                    <div>
                        <i class="material-icons">category</i>
                    </div>
                </a>
                <div class="detail">
                    <div class="label">Categories</div>
                    <div class="count">23</div>
                </div>
            </div>

            <div class="object-overview product">
                <a href="/categories/all" class="figure">
                    <div>
                        <i class="material-icons">redeem</i>
                    </div>
                </a>
                <div class="detail">
                    <div class="label">Products</div>
                    <div class="count">456</div>
                </div>
            </div>
        </div>
    <br>
    <a href="/~manage/seed">Seed DB</a>
</div>

<style>
    .object-overveiw-container {
        display: flex;
        justify-content: space-evenly;
        margin-top: 60px;
    }
    .object-overview {
        width: 150px;
    }

    .object-overview a {
        text-decoration: none;
    }

    .object-overview .figure {
        width: 150px;
        height: 150px;
        border-radius: 75px;
        background-color: #E86E2F;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .object-overview .figure:hover {
        box-shadow: 0px 3px 12px rgb(160, 160, 160);
    }

    .object-overview.product .figure {
        background-color: #18d88a ;
    }

    .object-overview .figure > div {
        width: 120px;
        height: 120px;
        border-radius: 60px;
        background-color: #CF5516;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .object-overview.product .figure > div {
        background-color: #14b573;
    }

    .object-overview > .detail {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .object-overview .figure > div > i {
        color: white;
        weight: bold;
        font-size: 48px;
    }

    .dashboard-container {
        max-width: 800px;
        margin-right: auto;
        margin-left: auto;
    }
</style>