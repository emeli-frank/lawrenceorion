<div class="container page-container">
    <h1>Admin Login</h2>
    <form method="POST" action="/login">
        <div class="row">
            <div class="form-group col-sm">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter product email" maxlength="64">
            </div>
            <div class="form-group col-sm">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter product password" maxlength="64">
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>