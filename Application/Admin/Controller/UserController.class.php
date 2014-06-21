<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function _initialize(){
        if(!isset($_SESSION['admin'])){
            $this->redirect('Index/login');
        }
    }
    /*添加*/
    public function addInfo(){
        
        $this->display(); 
    }
    
    public function checkLogin(){
        $User = M('User');
        $uemail = I('post.uemail','','htmlspecialchars');
        $upassword = I('post.upassword','','htmlspecialchars');
        $password=md5($upassword);
        $map=array();
        $map['email']=$uemail;
        $checkEmail=$User->where($map);
        if(!empty($checkEmail)){
            $arr=array('status' =>1 ,'message'=>'存在');
        }
        $json_str = json_encode($arr);
        echo $json_str;
       
    }
     /* 管理员列表 待审核 */
    public function listAll(){
        $status = I('get.status','','htmlspecialchars');
        $type = I('get.type','','htmlspecialchars');
        $User = M('User');
        $status=($status!=null&&$status!="") ? $status : 3;
        $type=($type!=null&&$type!="") ? $type : 0;
        $condition = array();
        $type==0?'' :$condition['type']=$type;
        $status==3? '':$condition['status']=$status;
        $count      = $User->where($condition)->count();
        $Page       = new \Think\Page($count,2);
        $Page->setConfig('header','个会员');
       
        $list = $User->where($condition)->order('date DESC ')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $map = array('status' =>$status,'type'=>$type);
        $Page->parameter=$map;
        $show = $Page->show();
        $this->assign('page',$show);
        $this->assign('status',$status);
        /*  不同类型统计*/
        $statuStr = ($status==3) ?'' :' and status='.$status;
        $allCount = $User->where('1=1'.$statuStr)->count();
        $memberCount = $User->where('type=1'.$statuStr)->count();
        $adminCount = $User->where('type=2'.$statuStr)->count();
        $typeCount = array('allCount' => $allCount,'memberCount' => $memberCount,'adminCount'=> $adminCount);
         /* 当前的参数 type ,status*/
        $this->assign('paramType',$type);  
        $this->assign('typeCount',$typeCount);
        $this->display(); // 输出模板
    }

    /*  save ajax处理函数*/
    public function saveInfo(){
        $User   =   D('User');
        $dbid = I('post.dbid','','htmlspecialchars');
        $email = I('post.uemail','','htmlspecialchars');
        $type = I('post.type','','htmlspecialchars');
        $name = I('post.uname','','htmlspecialchars');
        $password = I('post.upassword','','htmlspecialchars');
        $data = array();
        $data["email"]    = $email;
        $data["type"]    = $type;
        $data["name"] = $name;
        $data["date"]    = date('Y-m-d H:i:s');
        if($dbid!=null&&$dbid!=""){
             $editResult = $User->where("dbid=%d",$dbid)->save($data);
            if($editResult) {
              $arr = array("status"=>'1',"message"=>"修改用户成功","url"=>"");
            }else{
                 $arr = array("status"=>'0',"message"=>"修改用户失败");
            }
        }else{
          $data["password"] = md5("t".$password);
          $data["status"] = 0;
          $addResult =   $User->add($data);
          if($addResult) {
              $arr = array("status"=>'1',"message"=>"添加用户成功","url"=>"listAll/status/3/type/0");
          }else{
              $arr = array("status"=>'0',"message"=>"添加用户失败");
          }
        }
        $json_str = json_encode($arr);
        echo $json_str;
    }

    /* 批量删除 ids*/
    public function checkDeletes($dbids){
        $User = M('User');
        if($dbids!=null&&$dbids.length>0){
            $result = $User->delete($dbids);
            if ($result) {
                 $arr = array("status"=>'1',"message"=>'删除数据成功！');
            } else {
                 $arr = array("status"=>'0',"message"=>'删除数据失败！');
            }
        }else{
             $arr = array("status"=>'0',"message"=>'获取数据错误！');
        }
        $json_str = json_encode($arr);
        echo $json_str;
    }
    /* 修改当前状态status*/
    public function changeStatus($dbid,$status){
        if($dbid!=null&&$dbid>0){
             $User   =   D('User');
             $User->status = $status;
             $map['dbid']=$dbid;
             $result = $User->where($map)->save();
             if ($result) {
                 $arr = array("status"=>'1',"message"=>'修改状态成功！');
             } else {
                 $arr = array("status"=>'0',"message"=>'修改状态失败！');
             }
         }else{
            $arr = array("status"=>'0',"message"=>'获取数据错误！');
         }
        
         $json_str = json_encode($arr);
         echo $json_str;
    }
    /*批量 修改为回收站*/
    public function checkChanges($status,$dbids){
      if($dbids!=null&&$dbids!=""){
           $User = D("User");
           $sql = "UPDATE User set `status`= ".$status." WHERE dbid in(".$dbids.")";
           $result=$User->execute($sql);
           if ($result) {
                 $arr = array("status"=>'1',"message"=>'批量操作成功！');
            } else {
                 $arr = array("status"=>'0',"message"=>'批量操作失败');
            }
        }else{
             $arr = array("status"=>'0',"message"=>'获取数据错误！');
        }
        $json_str = json_encode($arr);
        echo $json_str;
    }
}