<h1 class="mt-5 text-center">Task Create</h1>
<div class="card">
    <div class="card-body">
        <form action="/task/store" method="POST">
            <div class="row mB-40">
                <div class="col-sm-9">
                    <div class="bgc-white p-20 bd">
                        <div class="form-group">
                            <label for="my-name">Name</label>
                            <input id="my-name" class="form-control" required type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" id="email" class="form-control" type="email" >
                        </div>
                        <div class="form-group">
                            <label for="my-body">Text</label><br>
                            <textarea name="body" id="my-body" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>