<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class TagController extends Controller {
    public function _initialize(){
        if(!isset($_SESSION['admin'])){
            $this->redirect('Index/login');
        }
    }
    public function addInfo(){

		$this->display();
    }

    /*验证网站名*/
    public function validName(){
    	$tag =  $_POST["param"];
    	$Tag = M('Tag');
    	$map['tag'] = $tag;
    	$result = $Tag->where($map)->select();
    	if(empty($result)){
    		echo "y";
    	}else{
    		echo "<i class='icon-warning-sign'></i> 此标签已存在";
    	}
    }
    public function editInfo($_id){
        if($_id>0){
            $Tag = M('Tag');
            $data = $Tag->find($_id);
            $this->tag=$data;
        }else{
             $this->error('数据错误！');
        } 
        $this->display('editInfo');
    }
    /*  addinfo save ajax处理函数*/
    public function saveInfo(){
        $Tag   =   D('Tag');
        $dbid = I('post.dbid','','htmlspecialchars');
        $tag = I('post.tag','','htmlspecialchars');
        $data = array();
        $data["tag"] = $tag;
        $data["date"]    = date('Y-m-d H:i:s');
        if($dbid!=null&&$dbid!=""){
             $editResult = $Tag->where("dbid=%d",$dbid)->save($data);
            if($editResult) {
              $arr = array("status"=>'1',"message"=>"修改标签成功","url"=>"listall/status/3");
            }else{
                 $arr = array("status"=>'0',"message"=>"修改标签失败");
            }
            
        }else{
            $data["status"] = 0;
           $addResult =   $Tag->add($data);
            if($addResult) {
              $arr = array("status"=>'1',"message"=>"添加标签成功","url"=>"listall/status/3");
            }else{
                 $arr = array("status"=>'0',"message"=>"添加标签失败");
            }
        }
        $json_str = json_encode($arr);
        echo $json_str;
    }
    /* 列表 所有 正常显示*/
    public function listAll($status){
        $Tag = M('Tag');
        $status=($status!=null&&$status!="") ? $status : 3;
        $condition = array();
        $status==3? '':$condition['status']=$status;
        /*分页操作*/
        $count      = $Tag->where($condition)->count();
        $Page       = new \Think\Page($count,15);
        $list = $Tag->where($condition)->order('date DESC ')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $map = array('status' =>$status);
        $Page->parameter=$map;
        $show = $Page->show();
        $this->assign('page',$show);
        $this->assign('status',$status);
        /*  不同类型统计*/
        $allCount = $Tag->where()->count();
        $auditCount = $Tag->where('status=0')->count();
        $enableCount = $Tag->where('status=1')->count();
        $disableCount = $Tag->where('status=2')->count();

        $statusCount = array('allCount' => $allCount,'auditCount' => $auditCount,'enableCount'=> $enableCount,'disableCount'=> $disableCount);
        $this->assign('statusCount',$statusCount);
        $this->display(); // 输出模板
    }
        /* 批量删除 ids*/
    public function checkDeletes($dbids){
        $Tag = M('Tag');
        if($dbids!=null&&$dbids.length>0){
            $result = $Tag->delete($dbids);
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
        if(IS_AJAX){
           if($dbid!=null&&$dbid>0){
                 $Tag   =   D('Tag');
                 $Tag->status = $status;
                 $map['dbid']=$dbid;
                 $result = $Tag->where($map)->save();
                 if ($result) {
                     $arr = array("status"=>'1',"message"=>'修改状态成功！');
                 } else {
                     $arr = array("status"=>'0',"message"=>'修改状态失败！');
                 }
             }else{
                $arr = array("status"=>'0',"message"=>'获取数据错误！');
             }
        }else{
            $arr = array("status"=>'0',"message"=>'提交方式错误！');
        }
        
         $json_str = json_encode($arr);
         echo $json_str;
    }
    /*批量 修改为回收站*/
    public function checkChanges($status,$dbids){
        if(IS_AJAX){
              if($dbids!=null&&$dbids!=""){
                   $Tag = D("Tag");
                   $sql = "UPDATE Tag set `status`= ".$status." WHERE dbid in(".$dbids.")";
                   $result=$Tag->execute($sql);
                   if ($result) {
                         $arr = array("status"=>'1',"message"=>'批量操作成功！');
                    } else {
                         $arr = array("status"=>'0',"message"=>'批量操作失败');
                    }
                }else{
                     $arr = array("status"=>'0',"message"=>'获取数据错误！');
                }
        }else{
            $arr = array("status"=>'0',"message"=>'提交方式错误！');
        }
        $json_str = json_encode($arr);
        echo $json_str;
    }
}