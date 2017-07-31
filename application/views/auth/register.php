<div style="width: 50%; margin: 0 auto;">
    <h2 class="text-center">Register</h2>
    <br />
    <?php echo validation_errors(); ?>
    <?php echo form_open(); ?>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" />
        </div>
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" />
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password"  />
        </div>
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" class="form-control" name="confirm"  />
        </div>
        <div class="form-group">
            <label for="">&nbsp;</label>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
        </div>
    </form>
</div>