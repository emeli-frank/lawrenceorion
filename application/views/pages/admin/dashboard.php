<div class="container page-container">
    <h2>Admin Dashboard</h2>
    <div class="object-overview">
        <a href="/categories" class="figure">
            <div>
                <i class="material-icons">category</i>
            </div>
        </a>
        <div>
            <div class="label">Categories</div>
            <div class="count">23</div>
        </div>
    </div>
    <a href="/categories/all">Manage Products</a>
    <br>
    <a href="/~manage/seed">Seed DB</a>
</div>

<style>
    .object-overview {
        
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

    .object-overview .figure > div {
        width: 120px;
        height: 120px;
        border-radius: 60px;
        background-color: #CF5516;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .object-overview .figure > div > i {
        color: white;
        weight: bold;
        font-size: 48px;
    }
</style>