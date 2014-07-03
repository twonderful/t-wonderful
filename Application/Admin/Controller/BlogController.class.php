<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class BlogController extends Controller {
    public function _initialize(){
        if(!isset($_SESSION['admin'])){
            $this->redirect('Index/login');
        }else{
            $this->assign('controller','Blog');
        }
    }
    /*添加*/
    public function addInfo(){
        
        $this->display(); 
    }
     public function editInfo($_id){
        if($_id>0){
            $Blog = D('Blog');
            $data = $Blog->relation(true)->find($_id);
            $this->blog=$data;
        }else{
             $this->error('数据错误！');
        } 
        $this->display('editInfo');
    }
     /* 管理员列表 待审核 */
    public function listAll(){
        $status = I('get.status','','htmlspecialchars');
        $Blog = M('Blog');
        $status=($status!=null&&$status!="") ? $status : 3;
        $condition = array();
        $status==3? '':$condition['status']=$status;
        /*分页操作*/
        $count      = $Blog->where($condition)->count();
        $Page       = new \Think\Page($count,2);
        $list = $Blog->where($condition)->order('date DESC ')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $map = array('status' =>$status);
        $Page->parameter=$map;
        $show = $Page->show();
        $this->assign('page',$show);
        $this->assign('status',$status);
        /*  不同类型统计*/
        $allCount = $Blog->where()->count();
        $auditCount = $Blog->where('status=0')->count();
        $enableCount = $Blog->where('status=1')->count();
        $disableCount = $Blog->where('status=2')->count();

        $statusCount = array('allCount' => $allCount,'auditCount' => $auditCount,'enableCount'=> $enableCount,'disableCount'=> $disableCount);
        $this->assign('statusCount',$statusCount);
        $this->display(); // 输出模板
    }

    /*  save ajax处理函数*/
    public function saveInfo(){
        $Blog   =   D('Blog');
        $dbid = I('post.dbid','','htmlspecialchars');
        $title = I('post.title','','htmlspecialchars');
        $content = I('post.content','','');
        $introduction = I('post.introduction','','htmlspecialchars');
        $Blog_types = I('post.Blog_types','','htmlspecialchars');
        $image_url = I('post.image_url','','htmlspecialchars');
        $data = array();
        $data["title"]  = $title;
        $data["content"]  = $content;
        $data["introduction"] = $introduction;
        $data["Blog_types"] = $Blog_types;
        $data["image_url"] = $image_url;
        $data["date"]    = date('Y-m-d');
        $data["datetime"]    = date('Y-m-d H:i:s');
       
        if($dbid!=null&&$dbid!=""){
            $data["content"]    = array(
              'blog_id' => $dbid,
             'content' => $content,
            );
             $editResult = $Blog->where("dbid=%d",$dbid)->relation(true)->save($data);
            if($editResult) {
              $arr = array("status"=>'1',"message"=>"修改博客成功","url"=>"listAll");
            }else{
                 $arr = array("status"=>'0',"message"=>"修改博客失败");
            }
        }else{
           $data["count"]    = array(
             'click' =>'0',
             'favorite' =>'0',
             'comment' =>'0',
           );
           $data["content"]    = array(
             'content' => $content,
           );
          $data["status"] = 0;
          $addResult =   $Blog->relation(true)->add($data);
          if($addResult) {
              $arr = array("status"=>'1',"message"=>"添加博客成功","url"=>"listAll");
          }else{
              $arr = array("status"=>'0',"message"=>"添加博客失败");
          }
        }
        echo json_encode($arr);
    }

    /* 批量删除 ids*/
    public function checkDeletes($dbids){
        $Blog = M('Blog');
        if($dbids!=null&&$dbids.length>0){
            $result = $Blog->delete($dbids);
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
             $Blog   =   D('Blog');
             $Blog->status = $status;
             $map['dbid']=$dbid;
             $result = $Blog->where($map)->save();
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
           $Blog = D("Blog");
           $sql = "UPDATE Blog set `status`= ".$status." WHERE dbid in(".$dbids.")";
           $result=$Blog->execute($sql);
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
    public function addType(){
       
        $this->display();
    }
    public function edittype($_id){
        if($_id>0){
            $Blog_type = M('Blog_type');
            $data = $Blog_type->find($_id);
            $this->blog_type=$data;
        }else{
             $this->error('数据错误！');
        } 
        $this->display("addType");
    }
    public function listType($status){
        $Blog_type = M('Blog_type');
        $status=($status!=null&&$status!="") ? $status : 3;
        $condition = array();
        $status==3? '':$condition['status']=$status;
        /*分页操作*/
        $count      = $Blog_type->where($condition)->count();
        $Page       = new \Think\Page($count,15);
        $list = $Blog_type->where($condition)->order('date DESC ')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $map = array('status' =>$status);
        $Page->parameter=$map;
        $show = $Page->show();
        $this->assign('page',$show);
        $this->assign('status',$status);
       
        $this->display(); 
    }
    public function saveType(){
        $Blog_type   =   D('Blog_type');
        $dbid = I('post.dbid','','htmlspecialchars');
        $type = I('post.type','','htmlspecialchars');
        $data = array();
        $data["type"] = $type;
        $data["date"]    = date('Y-m-d H:i:s');
        if($dbid!=null&&$dbid!=""){
             $editResult = $Blog_type->where("dbid=%d",$dbid)->save($data);
            if($editResult) {
              $arr = array("status"=>'1',"message"=>"修改分类成功","url"=>"listtype/status/3");
            }else{
                 $arr = array("status"=>'0',"message"=>"修改分类失败");
            }
            
        }else{
            $data["status"] = 0;
           $addResult =   $Blog_type->add($data);
            if($addResult) {
              $arr = array("status"=>'1',"message"=>"添加分类成功","url"=>"listtype/status/3");
            }else{
                 $arr = array("status"=>'0',"message"=>"添加分类失败");
            }
        }
        $json_str = json_encode($arr);
        echo $json_str;
    }
    public function validName(){
      $type =  $_POST["param"];
      $Blog_type = M('Blog_type');
      $map['type'] = $type;
      $result = $Blog_type->where($map)->select();
      if(empty($result)){
        echo "y";
      }else{
        echo "<i class='icon-warning-sign'></i> 此标签已存在";
      }
    }
}