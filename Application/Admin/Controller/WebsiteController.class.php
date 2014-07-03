<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class WebsiteController extends Controller {
    public function _initialize(){
        if(!isset($_SESSION['admin'])){
            $this->redirect('Index/login');
        }else{
            $this->assign('controller','Website');
        }
    }
    public function addInfo(){

		$this->display();
    }

    /*验证网站名*/
    public function validName(){
    	$webName =  $_POST["param"];
    	$Website = M('Website');
    	$map['name'] = array('like','%'.$webName.'%');
    	$result = $Website->where($map)->select();
    	if(empty($result)){
    		echo "y";
    	}else{
    		echo "<i class='icon-warning-sign'></i> 此网站已存在";
    	}    
    }
    public function editInfo($_id){
        if($_id>0){
            $Website = D('Website');
            $data = $Website->find($_id);
            $this->website=$data;
        }else{
             $this->error('数据错误！');
        } 
        $this->display('editInfo');
    }
    /*  addinfo save ajax处理函数*/
    public function saveInfo(){
        $Website   =   D('Website');
        $dbid = I('post.dbid','','htmlspecialchars');
        $name = I('post.wsName','','htmlspecialchars');
        $link = I('post.wsLink','','htmlspecialchars');
        $data = array();
        $data["name"] = $name;
        $data["link"] = $link;
        $data["date"]    = date('Y-m-d H:i:s');
        if($dbid!=null&&$dbid!=""){
            $editResult = $Website->where("dbid=%d",$dbid)->save($data);
            if($editResult) {
              $arr = array("status"=>'1',"message"=>"修改热门网站成功","url"=>"listenable");
            }else{
                 $arr = array("status"=>'0',"message"=>"修改热门网站失败");
            }
        }else{
           $data["status"] = 0;
           $addResult =   $Website->relation("count")->add($data);
            if($addResult) {
              $arr = array("status"=>'1',"message"=>"添加热门网站成功","url"=>"listaudit");
            }else{
                 $arr = array("status"=>'0',"message"=>"添加热门网站失败");
            }
        }
        $json_str = json_encode($arr);
        echo $json_str;
    }
    /* 列表 所有 正常显示*/
    public function listAll($status){
        $Website = M('Website');
        $status=($status!=null&&$status!="") ? $status : 3;
        $condition = array();
        $status==3? '':$condition['status']=$status;
        /*分页操作*/
        $count      = $Website->where($condition)->count();
        $Page       = new \Think\Page($count,2);
        $list = $Website->where($condition)->order('date DESC ')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $map = array('status' =>$status);
        $Page->parameter=$map;
        $show = $Page->show();
        $this->assign('page',$show);
        $this->assign('status',$status);
        /*  不同类型统计*/
        $allCount = $Website->where()->count();
        $auditCount = $Website->where('status=0')->count();
        $enableCount = $Website->where('status=1')->count();
        $disableCount = $Website->where('status=2')->count();

        $statusCount = array('allCount' => $allCount,'auditCount' => $auditCount,'enableCount'=> $enableCount,'disableCount'=> $disableCount);
        $this->assign('statusCount',$statusCount);
        $this->display(); // 输出模板
    }
    

     /* 批量删除 ids*/
    public function checkDeletes($dbids){
        $Website = M('Website');
        if($dbids!=null&&$dbids.length>0){
            $result = $Web->delete($dbids);
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
             $Website   =   D('Website');
             $Website->status = $status;
             $map['dbid']=$dbid;
             $result = $Website->where($map)->save();
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
           $Website = D("Website");
           $sql = "UPDATE Website set `status`= ".$status." WHERE dbid in(".$dbids.")";
           $result=$Website->execute($sql);
          
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