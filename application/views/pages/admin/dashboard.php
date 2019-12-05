<div class="container page-container dashboard-container">
    <h2>Admin Dashboard</h2>
    
    <?php if ($this->session->flashdata('success')): ?><!-- Put in a template fragment -->
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif ?>

        <div class="object-overveiw-container">
            <div class="object-overview category">
                <a href="/categories" class="figure">
                    <div>
                        <i class="material-icons">category</i>
                    </div>
                </a>
                <div class="detail">
                    <div class="label">Categories</div>
                    <div class="count"><?= $category_count ?></div>
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
                    <div class="count"><?= $product_count ?></div>
                </div>
            </div>
        </div>
    <br>
    <a href="/~manage/seed">Seed DB</a>
</div>

<style>
    
</style>