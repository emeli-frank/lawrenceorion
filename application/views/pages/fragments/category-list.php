<!-- Modal -->
<div class="modal fade" id="categoryModel" tabindex="-1" role="dialog" aria-labelledby="categoryModel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Category</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        
      <form>
        <div class="form-group">
            <label for="categoryNameInput">Category Name</label>
            <input type="email" class="form-control" id="categoryNameInput" placeholder="Category name">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <button type="button" class="btn" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>

      </div>
    </div>
  </div>
</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-flex justify-content-center align-content-between my-3" 
    data-toggle="modal" data-target="#categoryModel">
    <i class="material-icons mr-1">add</i> <span>Add Category</span>
</button>

<ul class="list-group my-3">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="/categories/all">
            All
        </a>
        <!-- <span class="badge badge-primary badge-pill">*</span> -->
    </li>
    <?php foreach ($categories as $category): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="/categories/<?=$category->id?>" class="category-tile">
                <?=$category->name?>
            </a>
            <span class="badge badge-primary badge-pill"><?=$category->product_count?></span>
        </li>
    <?php endforeach; ?>
</ul>


<style>
    #category > .section-title {
        font-weight: bold;
        font-weight: 700;
        color: #707070;
        letter-spacing: 0.2em;
        /* margin-top: 20px;
        margin-bottom: 20px; */
    }

    a.button:hover {
        text-decoration: none;
    }

    .button.button-primary {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        color: #E86E2F; /* todo:: change to variable (primary-color) */
        background-color: transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        position: relative;
    }

    .button.button-primary::after {
        background-color: #E86E2F;
        content: "";
        opacity: 0.15;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: -1;   
    }
</style>