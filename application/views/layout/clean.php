<html>
<head>
    <title><?php echo $this->config->item('title') ?></title>

    <!--stylesheet-->
    <link rel="stylesheet" href="<?php echo css_url('style.css') ?>"/>

    <!--end stylesheet-->

    <!--css from bower files-->
    <?php if (count($css_bower_files) > 0) : ?>
        <?php foreach ($css_bower_files as $key => $val) : ?>
            <link rel="stylesheet" href="<?php echo bower_url($val) ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <!--end css from bower files-->

    <!--css files-->
    <?php if (count($css_files) > 0) : ?>
        <?php foreach ($css_files as $key => $val) : ?>
            <link rel="stylesheet" href="<?php echo css_url($val) ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <!--end css files-->

    <script type="text/javascript">
        var site_url = "<?php echo site_url()?>" + '/';
        var base_url = "<?php echo base_url()?>";
    </script>
</head>
<body style="padding-top: 60px;">

<!--navbar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url()?>"><?php echo $this->config->item('brand'); ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url('auth/login')?>">Sign In</a></li>
                <li><a href="<?php echo base_url('auth/register')?>">Register</a></li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--end navbar-->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php $this->load->view($content); ?>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo bower_url('jquery/dist/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo bower_url('bootstrap/dist/js/bootstrap.min.js') ?>"></script>

<!--js from bower-->
<?php if (count($js_bower_files) > 0) : ?>
    <?php foreach ($js_bower_files as $key => $val) : ?>
        <script type="text/javascript" src="<?php echo bower_url($val) ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
<!--end js from bower-->

<!--js files-->
<?php if (count($js_files) > 0) : ?>
    <?php foreach ($js_files as $key => $val) : ?>
        <script type="text/javascript" src="<?php echo js_url($val) ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
<!--end js files-->
</body>
</html>