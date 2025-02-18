<div class="container page-container login-form">
    <h1>Admin Login</h2>
    <?php if ($this->session->flashdata('error')): ?><!-- Put in a template fragment -->
    <div class="alert alert-danger" role="alert">
        <?= $this->session->flashdata('error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif ?>
    <form method="POST" action="/login">
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter product email" maxlength="64">
            </div>
            <div class="form-group col-sm-12">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter product password" maxlength="64">
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>

<style>
    .login-form {
        margin-right: auto;
        margin-left: auto;
        max-width: 600px;
    }
</style>