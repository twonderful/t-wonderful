<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class BlogController extends Controller {
    public function _initialize(){
        if(!isset($_SESSION['admin'])){
            $this->redirect('Index/login');
        }
    }
    /*添加*/
    public function addInfo(){
        
        $this->display(); 
    }
     public function editInfo($_id){
        if($_id>0){
            $Blog = D('Blog');
            $data = $Blog->find($_id);
            $this->blog=$data;
        }else{
             $this->error('数据错误！');
        } 
        $this->display('editInfo');
    }
    /* 会员列表 所有 正常显示*/
    public function listMember($status){
        $Blog = M('Blog');
        $condition= array();
        $condition['type'] = 1;
        $condition['status'] =$status;
        $count      = $Blog->where($condition)->count(); 
        $Page       = new \Think\Page($count,2);
        $list = $Blog->where($condition)->order('date DESC ')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $show = $Page->show();
        $this->assign('page',$show);
        $this->assign('status',$status);  
        $this->display();
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
        $tags = I('post.tags','','htmlspecialchars');
        $request_url = I('post.request_url','','htmlspecialchars');
        $image_url = I('post.image_url','','htmlspecialchars');
        $data = array();
        $data["title"]    = $title;
        $data["content"]    = $content;
        $data["introduction"] = $introduction;
        $data["tags"] = $tags;
        $data["request_url"] = $request_url;
        $data["image_url"] = $image_url;
        $data["date"]    = date('Y-m-d');
        $data["datetime"]    = date('Y-m-d H:i:s');
        $data["count"]    = array(
           'click' =>'0',
           'favorite' =>'0',
           'comment' =>'0',
        );
        if($dbid!=null&&$dbid!=""){
             $editResult = $Blog->where("dbid=%d",$dbid)->save($data);
            if($editResult) {
              $arr = array("status"=>'1',"message"=>"修改博客成功","url"=>"");
            }else{
                 $arr = array("status"=>'0',"message"=>"修改博客失败");
            }
        }else{
          $data["status"] = 0;
          $addResult =   $Blog->relation("count")->add($data);
          if($addResult) {
              $arr = array("status"=>'1',"message"=>"添加博客成功","url"=>"listAll");
          }else{
              $arr = array("status"=>'0',"message"=>"添加博客失败");
          }
        }
        $json_str = json_encode($arr);
        echo $json_str;
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
}