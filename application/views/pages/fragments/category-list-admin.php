<div class="page-container container">
    <?php if ($this->session->flashdata('success')): ?><!-- Put in a template fragment -->
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>




    <ul class="list-group my-3 category-list">
        <a href="/categories/add" class="btn btn-outline-primary my-3" style="width: min-content">
            Add new category
        </a>

        <?php foreach ($categories as $category): ?>
        <div class="abc">
            <a href="/categories/<?=$category->id?>/edit" 
            class="category-tile list-group-item d-flex justify-content-between align-items-center tile">
                <?=$category->name?>
                <span class="badge badge-primary badge-pill"><?=$category->product_count?></span>
                <!-- <span class="badge badge-primary badge-pill"><a href="/categories/<?= $category->id ?>/delete">Delete</a></span> -->
            </a>
            <span class="delete-button" data-toggle="modal" data-target="#categoryModel"
                data-id="<?=$category->id ?>">
                <i class="material-icons">delete</i>
            </span>
        </div>
        <?php endforeach; ?>
    </ul>
</div>




<!-- Modal -->
<div class="modal fade" id="categoryModel" tabindex="-1" role="dialog" aria-labelledby="categoryModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure you want to delete this category</h5>
            </div>
            <div class="modal-body">
                <p>Deleting a category will <b>delete</b> all products associated with it</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="" class="btn btn-primary my-3 bar">
                    Delete
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    $('#categoryModel').on('show.bs.modal', function (event) {
        var id = event.relatedTarget.getAttribute("data-id");
        var button = $("category-tile")[0] // Button that triggered the modal
        var modal = $(this)
        modal.find('.bar')[0].setAttribute("href", "/categories/" + id + "/delete");
    })
</script>









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

    .abc {
        display: flex;
    }

    .abc > .delete-button {
        color: #E86E2F;
        cursor: pointer;
        align-self: center;
        padding-left: 15px;
    }

    .abc > .tile {
        flex-grow: 1;
    }

    .category-list {
        max-width: 800px;
        margin: auto;
    }
</style>