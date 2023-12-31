<div class="col-md-6 d-flex flex-column mx-auto">
    <div class="card flex-grow-1 mb-md-0">
        <div class="card-body">
            <h3 class="card-title">Login</h3>
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('login') ?>" method="post">

                <div class="form-group"><label>Email / Username</label>
                    <input type="text" name="user_email" class="form-control" value="<?= set_value('user_email'); ?>">
                    <?= form_error('user_email', '<small class="text-danger ml-1">', '</small>'); ?>
                </div>
                <div class=" form-group"><label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <?= form_error('password', '<small class="text-danger ml-1">', '</small>'); ?>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Login</button>

            </form>
        </div>
    </div>
</div>