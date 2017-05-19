<?php
namespace Admin\Controller;
use Think\Controller;
use think\Request;
class BaseController extends Controller {
    public function _initialize(){
        getUser();
    }

    
}