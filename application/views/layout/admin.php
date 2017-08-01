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

    <!-- sidebar-wrapper -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="<?php echo base_url('dashboard') ?>">
                    <?php echo $this->config->item('title') ?>
                </a>
            </li>

            <?php


            function display_menu($menu, $key, $curr_uri)
            {
                $uri = "#";
                if (empty($curr_uri)) $curr_uri = 'dashboard';
                $has_children = isset($menu['children']) and is_array($menu['children']);
                $is_allowed = $menu['allow'] ? '' : 'hide';


                if ($has_children) {
                    if (isset($menu['uri']) and !empty($menu['uri'])) $uri = site_url($menu['uri']);
                    echo "<li class='".$is_allowed."' data-toggle='collapse' data-target='#".$key."'><a href='".$uri."'>" . $menu['title'] . "</a></li>";
                    echo "<li class='collapse' id='" . $key . "'><ul>";

                    foreach ($menu['children'] as $key_child => $menu_child) {
                        display_menu($menu_child, $key_child,$curr_uri);
                    }

                    echo "</ul></li>";

                } else {
                    if (isset($menu['uri']) and !empty($menu['uri'])) $uri = site_url($menu['uri']);
                    echo "<li class='".$is_allowed."'><a href='".$uri."'>" . $menu['title'] . "</a></li>";
                }



            }

            function set_active_menu($menus, $acl, $user, $curr_uri){
                $_menus = [];
                $has_children = $has_children = isset($menu['children']) and is_array($menu['children']);
                foreach ($menus as $key => $val) {

                    $is_allow = false;
                    $is_active = false;

                    if ($has_children) {
                        $menus[$key]['children'] = set_active_menu($menus[$key]['children'], $acl, $user, $curr_uri);
                        foreach ($menus[$key]['children'] as $menu_item){

                        }
                    }

                    if ($acl->isAllowed($user->role_name, $val['title'])) {
                        $val['allow'] = true;
                    } else {
                        $val['allow'] = false;
                    }


                    if (!empty($val['uri']) and ($curr_uri == $val['uri'])) {
                        $val['active'] = true;
                    } else {
                        $val['active'] = false;
                    }
                    array_push($_menus, $val);
                }

                return $_menus;
            }

            $curr_uri = $this->uri->uri_string();
            $this->load->config('navigation');
            $menus = $this->config->item('navigation');

            $nav = set_active_menu($menus, $this->auth->getAcl(), $this->session->userdata('user'), $curr_uri);

            foreach ($nav as $key => $menu) {
                display_menu($menu, $key, $curr_uri);
            }

            ?>

        </ul>
    </div>
    <!-- /sidebar-wrapper -->

    <!-- page content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" >
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
                            <a href="#menu-toggle" class="btn btn-link" id="menu-toggle"
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
        <div class="container-fluid" style="padding-top: 20px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo $title; ?></h1>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a class="active" href="<?php echo base_url('dashboard') ?>">Dashboard</a></li>
                    </ol>


                </div>
            </div>

            <pre>
                <?php
                   var_dump($nav);
                ?>
            </pre>

            <?php $this->load->view($content) ?>
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