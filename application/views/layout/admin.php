<html>
<head>
    <title><?php echo $this->config->item('title') ?></title>

    <!--stylesheet-->
    <link rel="stylesheet" href="<?php echo css_url('style.css') ?>"/>
    <!--end stylesheet-->

    <!--plugins stylesheets-->
    <link rel="stylesheet" href="<?php echo bower_url('animate.css/animate.css') ?>"/>
    <link rel="stylesheet" href="<?php echo bower_url('font-awesome/css/font-awesome.min.css') ?>"/>
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
<div id="wrapper" class="toggled">

    <?php
    // fake menu

    $_menus = [
        [
            'id' => 1,
            'name' => 'Dashboard',
            'link' => 'dashboard',
            'children' => [],
        ],
        [
            'id' => 2,
            'name' => 'User Management',
            'link' => '',
            'children' => [
                [
                    'id' => 3,
                    'name' => 'Role',
                    'link' => 'user/role',
                    'children' => []
                ],
                [
                    'id' => 4,
                    'name' => 'Resource',
                    'link' => 'user/resource',
                    'children' => []
                ]
            ]
        ]
    ];

    function create_menu($menus){
        foreach($menus as $key => $val) {
            echo "<li><a href='".$val['link']."'>".$val['name']."</a></li>";
        }
    }

    ?>

    <!-- sidebar-wrapper -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="<?php echo base_url('dashboard') ?>">
                    <?php echo $this->config->item('title') ?>
                </a>
            </li>

            <?php foreach ($_menus as $key => $val) : ?>

                <?php if (empty($val['children'])) { ?>
                    <li><a href="<?php echo $val['link'] ?>"><?php echo $val['name'] ?></a></li>
                <?php } else { ?>

                <?php } ?>
            <?php endforeach; ?>

            <!--            <li>-->
            <!--                <a href="#"> Dashboard</a>-->
            <!--            </li>-->
            <!--            <li data-toggle="collapse" data-target="#user-management">-->
            <!--                <a href="#">User Management</a>-->
            <!--            </li>-->
            <!--            <li class="collapse" id="user-management">-->
            <!--                <ul>-->
            <!--                    <li><a href="">tes</a></li>-->
            <!--                    <li><a href="">tes</a></li>-->
            <!--                    <li><a href="">tes</a></li>-->
            <!--                </ul>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <a href="#">System Logs</a>-->
            <!--            </li>-->

        </ul>
    </div>
    <!-- /sidebar-wrapper -->

    <!-- page content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-default" style="position: absolute; top: 0; left:0; right: 0">
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

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"
                               style="border:none; padding-top: 1.3em">
                                <i class="fa fa-align-justify"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false"> <i class="fa fa-user-circle"></i> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><?php echo $this->session->userdata('user')->username ?></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('auth/login/logout') ?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo $title; ?></h1>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a class="active" href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
                    </ol>
                    <?php $this->load->view($content) ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /page-content-wrapper -->


    <script type="text/javascript" src="<?php echo bower_url('jquery/dist/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo bower_url('bootstrap/dist/js/bootstrap.min.js') ?>"></script>

    <script>
        $("#menu-toggle").click(function (e) {
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