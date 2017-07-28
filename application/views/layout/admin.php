<html>
<head>
    <title><?php echo $this->config->item('title')?></title>

    <!--stylesheet-->
    <link rel="stylesheet" href="<?php echo bower_url('bootstrap/dist/css/bootstrap.min.css') ?>">

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
<body>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

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