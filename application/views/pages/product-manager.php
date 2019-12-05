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

<style>
    #product-category-container {
        display: flex;
    }
    
    #product-list-container {
        margin-left: 10px;
        margin-right: 10px;
        
    }

    #product {
        padding-left: 10px;
        padding-right: 10px;
        width: 100%;
    }

    @media screen and (max-width: 768px) {
        #category {
            display: none;
        }
    }

    #category {
        padding-left: 10px;
        padding-right: 10px;
        width: 300px;
        flex-shrink: 0;
        /* border: 1px solid black; */
    }

    #fab {
        width: 48px;
        height: 48px;
        border-radius: 24px;
        background-color: #E86E2F;
        color: white;
        position: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        bottom: 16px;
        right: 16px;
        box-shadow: 0px 2px 3px 1px #747474;
        cursor: pointer;
        z-index: 10001;
    }

    @media screen and (min-width: 768px) {
        #fab {
            disaplay: none;
        }
    }

    #floating-filter {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        background-color: white;
        display: block;
        z-index: 10000;
        padding-left: 16px;
        padding-right: 16px;
        overflow: auto;
        overflow: auto;
        padding-top: 20px;
    }

</style>

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