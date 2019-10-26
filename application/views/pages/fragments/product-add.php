<div class="container page-container">
    <h2>Add product</h2>

    <form method="POST" action="/admin/manage/categories/<?=$category_id?>/products/add">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" maxlength="64">
            <small class="form-text text-muted">Product name should not be more than 128 characters</small>
        </div>

        <div class="form-group">
            <label for="category-input">Category</label>
            <select id="category-input" required class="form-control" required name="category_id">
                <option selected>Choose...</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?=$category->id?>"><?=$category->name?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="product-description">Short desciption</label>
            <!-- <input type="text" class="form-control" id="product-description" name="product-description" placeholder="Enter Jumia product url"> -->
            <textarea class="form-control" id="product-description" rows="3" name="product-description" placeholder="Describe the product briefly"></textarea>
            <small class="form-text text-muted">Describe the product briefly</small>
        </div>

        <div class="custom-file">
            <input type="file" class="custom-file-input" id="image-upload-input">
            <label class="custom-file-label" for="image-upload-input">Choose image</label>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
        </div>

        <div class="form-group">
            <label for="old-price">Old price</label>
            <input type="text" class="form-control" id="old-price" name="old-price" placeholder="Enter old-price">
            <small class="form-text text-muted">You can leave this field empty</small>
        </div>

        <div class="form-group">
            <label for="jumia-product-url">Old price</label>
            <input type="text" class="form-control" id="jumia-product-url" name="jumia-product-url" placeholder="Enter Jumia product url">
            <small class="form-text text-muted">Enter the url users are redirected to when the click your product</small>
        </div>


        <button type="submit" class="btn btn-primary">Save</button>
    </form>

</div>