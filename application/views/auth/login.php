<div style="width: 50%; margin: 0 auto;">
    <h2 class="text-center">Sign In</h2>
    <br />
    <form action="" method="post">

        <div class="form-group">
            <div class="row">
                <label class="col-md-3">Email</label>
                <div class="col-md-9">
                    <input type="email" class="form-control " name="email" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-md-3">Password</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-md-3">&nbsp;</label>
                <div class="col-md-9 text-right">
                    <a href="<?php echo base_url('auth/forgot')?>">Forgot Password?</a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Sign In</button>
                </div>
            </div>
        </div>
    </form>
</div>