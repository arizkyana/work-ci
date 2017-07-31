<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 5/17/2017
 * Time: 9:43 AM
 *
 * NOTES : Compatible with Bower
 */
class Template
{

    protected $CI;

    protected $js = [];
    protected $css = [];
    protected $bower_js = [];
    protected $bower_css = [];

    protected $title = "";

    protected $layout = "";
    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function set_title($title) {
        $this->title = $title;
        return $this;
    }

    public function set_layout($layout_name){
        $this->layout = $layout_name;
        return $this;
    }

    public function set_js($_js){
        array_push($this->js, $_js);
        return $this;
    }

    public function set_css($_css){
        array_push($this->css, $_css);
        return $this;
    }

    public function set_bower_js($_js){
        array_push($this->bower_js, $_js);
        return $this;
    }

    public function set_bower_css($_css){
        array_push($this->bower_css, $_css);
        return $this;
    }

    public function generate($view){
        $data['content'] = $view;
        $data['js_files'] = $this->js;
        $data['css_files'] = $this->css;
        $data['js_bower_files'] = $this->bower_js;
        $data['css_bower_files'] = $this->bower_css;
        $data['title'] = $this->title;
        $this->CI->load->view($this->layout, $data);
    }

}