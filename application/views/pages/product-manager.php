<div id ="product-list-container" class="page-container">
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif ?>
    <div class=" flex-container">
        <section id="category"><?=$category_view?></section>
        <section id="product"><?=$product_view?></section>
    </div>
</div>

<style>
    #product-list-container {
        margin-left: 10px;
        margin-right: 10px;
        
    }

    #product {
        padding-left: 10px;
        padding-right: 10px;
        width: 100%;
    }

    #category {
        padding-left: 10px;
        padding-right: 10px;
        width: 300px;
        flex-shrink: 0;
        /* border: 1px solid black; */
    }
</style>