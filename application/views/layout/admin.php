<html>
<head>
    <title><?php echo $this->config->item('title') ?></title>

    <!--stylesheet-->
    <link rel="stylesheet" href="<?php echo css_url('style.css') ?>"/>
    <!--end stylesheet-->

    <!--plugins stylesheets-->
    <link rel="stylesheet" href="<?php echo bower_url('animate.css/animate.css')?>" />
    <link rel="stylesheet" href="<?php echo bower_url('font-awesome/css/font-awesome.min.css')?>" />
    <!--end plugins stylesheets-->

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
<div id="wrapper">
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
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user-circle"></i> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><?php echo $this->session->userdata('user')->username?></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url('auth/login/logout')?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!--end navbar-->
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Start Bootstrap
                </a>
            </li>
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="#">Shortcuts</a>
            </li>
            <li>
                <a href="#">Overview</a>
            </li>
            <li>
                <a href="#">Events</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Simple Sidebar</h1>
                    <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                    <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>

<script type="text/javascript" src="<?php echo bower_url('jquery/dist/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo bower_url('bootstrap/dist/js/bootstrap.min.js') ?>"></script>

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

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