<?php
namespace Admin\Controller;
class IndexController extends BaseController {
    // public function index(){
//         $navlist = [
//             ['title'=>'订单','name'=>'Order/index','icon'=>'fa fa-reorder'],
//             ['title'=>'菜单',
//                 'child'=>[
//                     ['title'=>'菜品','name'=>'Goods/index','icon'=>'fa fa-bookmark-o'],
//                     ['title'=>'分类','name'=>'Category/index','icon'=>'fa fa-cube']
//                 ],
//                 'icon'=>'fa fa-book'
//             ],
//             ['title'=>'外卖',
//                 'child'=>[
//                     ['title'=>'商品','name'=>'Takeout/index','icon'=>'fa fa-calendar-check-o'],
//                     ['title'=>'设置','name'=>'Takeout/setOption','icon'=>'fa fa-gear'],
//                 ],
//                 'icon'=> 'fa fa-bicycle',
//             ],
//             ['title'=>'营销',
//                 'child'=>[
// //                    ['title'=>'活动','name'=>'Activity/index'],
//                     ['title'=>'代金券','name'=>'Coupon/index','icon'=>'fa fa-money']
//                 ],
//                 'icon'=>'fa fa-line-chart'
//             ],
//             ['title'=>'用户','name'=>'User/index','icon'=>'fa fa-users'],
//             ['title'=>'自动回复',
//                 'child'=>[
//                     ['title'=>'关键词','name'=>'Replay/index','icon'=>'fa fa-key'],
//                     ['title'=>'回复文章','name'=>'Article/index','icon'=>'fa fa-comment'],
//                 ],
//                 'icon'=>'fa fa-volume-up'
//             ],
//         ];
//         $user = getUser();
//         $this->assign('list', $navlist);
//         $this->assign('user', $user);
//         $this->display();
//     }
  
    public function step(){
      $De=M('Depart');
      $Cl=M('Class');
      $St=M('Student');
      $Te=M('Teacher');
      if($De->select()){
        $de=1;
        $this->assign('de',$de);
     }else{
     $this->display();
     exit;
     }
 
      if($Cl->select()){
        $cl=1;
        $this->assign('cl',$cl);
     }else{
     $this->display();
      exit; 
     }
    
      if($Te->select()){
        $te=1;
        $this->assign('te',$te);
     }else{
     
     $this->display();
     exit;
     }
      if($St->select()){
        $st=1;
        $this->assign('st',$st);
     }else{
        $this->display();
        exit;
     }
    $this->display();
     
    }
    public function settime(){
         $Da=M('Date');
        if(isset($_POST['starttime'])&& !empty($_POST['starttime'])){
            if(empty($_POST['endtime']))
            $this->error('请将时间填写完整');
           $condition['starttime']=strtotime($_POST['starttime']);
           $condition['endtime']=strtotime($_POST['endtime']);
           $Da->where('id>0')->save($condition);
           $this->success('恭喜您设置成功');
          }else{
        $Date=$Da->select();       
        $this->assign('Time',$Date[0]);
        $this->display();
        }
    }
     public function setlimitnum(){
         $Da=M('Limitnum');
        if(isset($_POST['num'])&& !empty($_POST['num'])){
           $Da->where('id>0')->setField('num',$_POST['num']);
           $this->success('恭喜您设置成功');
          }else{
        $Date=$Da->select();       
        $this->assign('data',$Date[0]);
        $this->display();
        }
    }
    

}