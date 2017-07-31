<div style="width: 50%; margin: 0 auto;">
    <h2 class="text-center">Forgot Password</h2>
    <br />
    <?php echo validation_errors(); ?>
    <?php echo form_open(); ?>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo set_value('email')?>" autofocus />
        </div>

        <div class="form-group">
            <label for="">&nbsp;</label>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Send Request</button>
        </div>
    </form>
</div>