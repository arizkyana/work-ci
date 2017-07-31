<div style="width: 50%; margin: 0 auto;">
    <h2 class="text-center">Sign In</h2>
    <br />
    <form method="post">

        <div class="form-group">
            <div class="row">
                <label class="col-md-3" for="username">Username</label>
                <div class="col-md-9">
                    <input type="username" class="form-control " name="username" autofocus />
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-md-3" for="password">Password</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" name="password" />
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