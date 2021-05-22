<h1 class="mt-5 text-center">Login</h1>
<div class="card">
    <div class="card-body">
        <?php include '../components/message.php'; ?>
        <form action="/account/signin" method="post">
            <div class="row mB-40">
                <div class="col-sm-9">
                    <div class="bgc-white p-20 bd">
                        <div class="form-group">
                            <label for="my-name">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" id="my-name" required />
                        </div>
                        <div class="form-group">
                            <label for="my-password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" id="my-password" required />
                        </div>
                        <div class="form-group">
                            <input name="submit" type="submit" value="Login" class="btn btn-success" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <p>Not registered yet? <a href='/account/register'>Register Here</a></p>
    </div>
</div>