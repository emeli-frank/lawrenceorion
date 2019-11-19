<div class="container page-container">
    <div class="product-add-container">
        <h2 style="margin-bottom: 50px">Add product</h2>

        <!-- <form method="POST" action="/categories/<?=$category_id?>/products/add"> -->
        <?php echo form_open_multipart('/categories/' . $category_id . '/products/add');?>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" maxlength="64">
                    <small class="form-text text-muted">Product name should not be more than 128 characters</small>
                </div>

                <div class="form-group col-sm-6">
                    <label for="category-input">Category</label>
                    <select id="category-input" required class="form-control" required name="category_id">
                        <option selected>Choose...</option>
                        <?php foreach ($categories as $category): ?>
                            <?php $selected = ($category->id == $category_id) ? "selected" : ""; ?>
                            <option value="<?=$category->id?>" <?= $selected ?>><?=$category->name?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="product-description">Short desciption</label>
                <!-- <input type="text" class="form-control" id="product-description" name="product-description" placeholder="Enter Jumia product url"> -->
                <textarea class="form-control" id="product-description" rows="3" name="product-description" placeholder="Describe the product briefly"></textarea>
                <small class="form-text text-muted">Describe the product briefly</small>
            </div>

            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image-upload-input" name="product-image">
                <label class="custom-file-label" for="image-upload-input">Choose image</label>
            </div>

            <!-- <input type="file" name="product-image" size="20" /> -->
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
                </div>

                <div class="form-group col-sm-6">
                    <label for="old-price">Old price</label>
                    <input type="text" class="form-control" id="old-price" name="old-price" placeholder="Enter old-price">
                    <small class="form-text text-muted">You can leave this field empty</small>
                </div>
            </div>

            <div class="form-group">
                <label for="jumia-product-url">Jumia link</label>
                <input type="text" class="form-control" id="jumia-product-url" name="jumia-product-url" placeholder="Enter Jumia product url">
                <small class="form-text text-muted">Enter the url users are redirected to when the click your product</small>
            </div>

            <section>
            <input id="custom-field-data" name="custom-field-data" type="hidden" value="[]">
            <h3>Custom field</h3>
                <!-- Button trigger modal -->
                <div id="custom-fields">
    <!--                 <div class="custom-field">
                        <div class="label">Test label</div>
                        <div class="body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Test label
                        </div>
                        <div class="card-body">
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div> -->



                </div>

                <button type="button" class="btn btn-outline-primary d-flex justify-content-center align-content-between my-3" 
                    data-toggle="modal" data-target="#categoryModel">
                    <i class="material-icons mr-1">add</i> <span>Add</span>
                </button>
            </section>


            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div> <!-- end of product-add-container -->

</div>





<!-- Modal -->
<div class="modal fade" id="categoryModel" tabindex="-1" role="dialog" aria-labelledby="categoryModel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add new custom field</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        
      <form>
        <div class="form-group">
            <label for="customFieldLabel">Input name</label>
            <input type="text" class="form-control" id="customFieldLabel" placeholder="Field Label">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->

            <label for="customFieldDescription">Description</label>
            <textarea class="form-control" id="customFieldDescription" placeholder="Field description"></textarea>
        </div>
        <button type="button" class="btn" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onClick="addCustomField()">Save</button>
        </form>

      </div>
    </div>
  </div>
</div>





<script>
    class CustomField {
        id;
        label;
        body;

        constructor(id, label, body) {
            this.id = id;
            this.label = label;
            this.body = body;
        }
    }

    fields = [];
    nextId = 1;

    /* function generateNext() {
        next = 1;
        
        return function() {
            return next++;
        }
    }

    let next = generateNext(); */

    function deleteCustomField(id) {
        for (var i = 0; i < fields.length; i++) {
                console.warn('fields[i] = ' + fields[i].id);
                console.warn('id = ' + id);
            if (fields[i].id == id) {
                fields.splice(i, 1);
            }
        }
    }

    function addCustomField() {
        let labelElem = document.querySelector('#customFieldLabel');
        let bodyElem = document.querySelector('#customFieldDescription');

        makeCustomField(
            labelElem.value,
            bodyElem.value
        );

        // console.log(fields);

        labelElem.value = "";
        bodyElem.value = "";

        $('#categoryModel').modal('hide');
    }

    function makeCustomField(label, body) {
        id = nextId++;
        fields.push(new CustomField(id, label, body))

        build();
    }

    function build() {
        var parent = document.querySelector('#custom-fields');
        while(parent.firstChild){
            parent.removeChild(parent.firstChild);
        }


        for (let i = 0; i < fields.length; i++) {
            id = fields[i].id;

            var labelElem = document.createElement('div');
            labelElem.classList.add('card-header');
            labelElem.classList.add('custom-field-header');
            labelElem.setAttribute('data-id', id)
            // labelElem.textContent = fields[i].label;
            foo = document.createElement('span');
            foo.classList.add('header-label');
            foo.textContent = fields[i].label;
            bar = document.createElement('span');
            bar.classList.add('header-icon');
            deleteIcon = document.createElement('i');
            deleteIcon.classList.add('material-icons');
            deleteIcon.setAttribute('data-id', id)
            deleteIcon.textContent = "delete";
            bar.appendChild(deleteIcon);
            labelElem.appendChild(foo);
            labelElem.appendChild(bar);

            var bodyElem = document.createElement('div');
            bodyElem.classList.add('card-body');

            var pElem = document.createElement('p');
            pElem.textContent = fields[i].body;
            pElem.classList.add('card-text');

            bodyElem.appendChild(pElem);

            var customFieldContainer = document.createElement('div');
            customFieldContainer.classList.add('card');
            customFieldContainer.classList.add('my-3');
            customFieldContainer.appendChild(labelElem);
            customFieldContainer.appendChild(bodyElem);
            // customFieldContainer.classList.add('custom-field');

            parent.appendChild(customFieldContainer);

            deleteIcon.addEventListener('click', function(event){ 
                console.log(fields);
                deleteCustomField(event.target.getAttribute('data-id'));
                console.log(fields);
                build();
            });
        }

        document.querySelector('#custom-field-data').setAttribute('value', JSON.stringify(fields))
    }
</script>

<style>
    .custom-field {
        border: 1px solid grey;
        padding: 15px;
        margin: 15px 0;
    }

    .custom-field-header {
        display: flex;
        justify-content: space-between;
    }

    .product-add-container {
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }
</style>