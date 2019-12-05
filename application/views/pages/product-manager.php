<div id ="product-list-container" class="page-container">
    <?php if ($this->session->flashdata('success')): ?><!-- Put in a template fragment -->
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif ?>
    <?php if ($this->session->flashdata('error')): ?><!-- Put in a template fragment -->
    <div class="alert alert-danger" role="alert">
        <?= $this->session->flashdata('error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif ?>
    <div id="product-category-container">
        <section id="category"><?=$category_view?></section>
        <section id="product"><?=$product_view?></section>
    </div>
</div>

<div id="fab" onclick="toggleFilter()"><i class="material-icons">filter_list</i></div>

<script>
    let filterOpened = false;
    let cln;
    let filter = document.querySelector('#category');
    let body = document.querySelector('body');

    function toggleFilter() {
        if (filterOpened) {
            closeFilter();
        }
        else {
            openFilter();
        }

        function openFilter() {
            if (!cln) {
                cln = filter.cloneNode(true);
                cln.setAttribute("id" , "floating-filter");
                cln.classList.add('floating');

                let closeBtn = document.createElement('div');
                closeBtn.classList.add("btn");
                closeBtn.classList.add("btn-outline-primary");
                closeBtn.textContent = "Close";
                
                closeBtn.addEventListener('click', closeFilter);
                cln.insertBefore(closeBtn, cln.childNodes[0]);
                body.appendChild(cln);
            }
            else {
                cln.classList.remove('hidden');
            }
            filterOpened = true;
        }

        function closeFilter() {
            document.querySelector('#floating-filter').classList.add('hidden');
            filterOpened = false;
        }
    }

</script>