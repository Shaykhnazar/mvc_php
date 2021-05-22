<h1 class="mt-5 text-center">Register</h1>
<div class="card">
    <div class="card-body">
        <?php include "../components/message.php"; ?>
        <form action="/account/signup" method="post">
            <div class="row mB-40">
                <div class="col-sm-9">
                    <div class="bgc-white p-20 bd">
                        <div class="form-group">
                            <label for="my-name">Username</label>
                            <input type="text" name="username" value="<? echo isset($valUsername) ?? '' ?>" class="form-control" placeholder="Username" id="my-name"  />
                        </div>
                        <div class="form-group">
                            <label for="my-email">Email</label>
                            <input type="email" name="username" value="<? echo isset($valEmail) ?? '' ?>" class="form-control" placeholder="Email" id="my-email"  />
                        </div>
                        <div class="form-group">
                            <label for="my-password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" id="my-password"  />
                        </div>
                        <div class="form-group">
                            <input name="submit" type="submit" value="Register" class="btn btn-success"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>