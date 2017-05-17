<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends Controller {
    public function index(){
       $this->display(THINK_PATH."Tpl/404.html");
    }
}