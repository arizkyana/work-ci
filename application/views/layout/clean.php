<html>
<head>
    <title>Clean Layout | Codeigniter</title>

    <!--stylesheet-->
    <link rel="stylesheet" href="<?php echo bower_url('bootstrap/dist/css/bootstrap.min.css') ?>">

    <!--end stylesheet-->

    <!--css from bower files-->
    <?php if (count($css_bower_files) > 0) : ?>
        <?php foreach ($css_bower_files as $key => $val) : ?>
            <link rel="stylesheet" href="<?php echo bower_url($val)?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <!--end css from bower files-->

    <!--css files-->
    <?php if (count($css_files) > 0) : ?>
        <?php foreach ($css_files as $key => $val) : ?>
            <link rel="stylesheet" href="<?php echo css_url($val)?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <!--end css files-->

    <script type="text/javascript">
        var site_url = "<?php echo site_url()?>" + '/';
        var base_url = "<?php echo base_url()?>";
    </script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Welcome to Work-CI</h3>
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