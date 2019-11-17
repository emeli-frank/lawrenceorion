<div class="page-container container create-page">
    <?php $title = (isset($category_id)) ? 'Edit category' : 'Add new category'; ?>
    <h1><?= $title ?></h1>
    <form 
        action="/categories/<?php echo (isset($category_id)) ? $category_id . '/edit' : 'add' ?>" 
        method="POST"
        class="create-form">
            <div>
            <!-- <input type="text" name="category-name"> -->
            <?php if (isset($category_id)): ?>
            <input type="hidden" name="category-id" value="<?=$category_id?>"><!-- TODO:: id if editing -->
            <?php endif ?>

            <div class="form-group">
                <label for="category-name">Category Name:</label>
                <input name="category-name" type="text" class="form-control" id="category-name" placeholder="Category name">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <button type="submit" class="btn btn-primary"><?php echo (isset($category_id)) ? 'Update' : 'add' ?></button>
        </div>
    </form>
</div>

<?= $category_id ?>

<style>
    .create-page {
        align-items: center;
        /* align-content: center; */
        /* justify-content: center;
        justify-items: center; */
        display: flex;
        flex-direction: column;
    }

    .create-form {
        /* display: flex;
        align-items: center;
        align-content: center;
        justify-content: center; */
        min-height: 300px;
        min-width: 450px;
        margin-top: 80px;
    }

    /* .flex.flex-column {
        flex-direction: column;
    }

    .flex.center-items {
        align-items: center;
        align-content: center;
        justify-items: center;
    } */
</style>