<?php if ($this->authservice->isLoggedIn()) { ?>
  <a href="/categories" class="btn btn-outline-primary my-3">
      Manage Categories
  </a>
<?php } ?>

<ul class="list-group my-3">
    <a href="/categories/all" class="list-group-item d-flex justify-content-between align-items-center <?= $all_category_class ?>">
        All
        <!-- <span class="badge badge-primary badge-pill">*</span> -->
    </a>
    <?php foreach ($categories as $category): ?>
        <?php $is_active_class = ($category->id == $current_category_id) ? "active" : "" ?>
        <a href="/categories/<?=$category->id?>" class="category-tile list-group-item d-flex justify-content-between align-items-center <?= $is_active_class ?>">
            <?=$category->name?>
            <?php if ($this->authservice->isLoggedIn()): ?>
            <span class="badge badge-primary badge-pill"><?=$category->product_count?></span>
            <?php endif ?>
        </a>
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