<h1 class="mt-5 text-center">Task list</h1>
<div class="card">
    <div class="card-header">
        <div class="row mB-3">
            <div class="col-lg-11">
            </div>
            <div class="col-lg-1 text-right">
                <a href="/task/create" class="btn btn-primary">
                    Create
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <?php include "../components/message.php"; ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Text</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($tasks as $i => $task){ ?>
                <tr>
                    <th scope="row"><?=$i;?></th>
                    <td><?=$task['username'];?></td>
                    <td><?=$task['email']?></td>
                    <td><?=$task['body'];?></td>
                    <td><?=$task['status'];?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>