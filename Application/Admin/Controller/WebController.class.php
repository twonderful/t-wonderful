<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class WebController extends Controller {
    /*status  0:审核 ;1:enable ; 2 disable; 3 all*/
    /*type  0:all ; 1:video ; 2:image ; 3:words ; 4:music ;*/
    public function _initialize(){
        if(!isset($_SESSION['admin'])){
            $this->redirect('Index/login');
        }
    }
    /*添加*/
    public function addInfo(){
        
        $this->display(); 
    }
    /* 列表 所有 正常显示*/
    public function listAll(){
        $status = I('get.status','','htmlspecialchars');
        $type = I('get.type','','htmlspecialchars');
        $Web = M('Web');
        $status=($status!=null&&$status!="") ? $status : 3;
        $type=($type!=null&&$type!="") ? $type : 0;
        $condition = array();
        $type==0?'' :$condition['type']=$type;
        $status==3? '':$condition['status']=$status;
        /*分页操作*/
        $count      = $Web->where($condition)->count();// 查询满足要求的总记录数 $map表示查询条件
        $Page       = new \Think\Page($count,2);// 实例化分页类 传入总记录数
        $Page->setConfig('header','个会员');
        //$Page->parameter="test";
        // 进行分页数据查询
        $list = $Web->where($condition)->order('date DESC ')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $map = array('status' =>$status,'type'=>$type);
        $Page->parameter=$map;
        $show = $Page->show();// 分页显示输出*/
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('status',$status);
        /*  不同类型统计*/
        $statuStr = ($status==3) ?'' :' and status='.$status;
        $allCount = $Web->where('1=1'.$statuStr)->count();
        $videoCount = $Web->where('type=1'.$statuStr)->count();
        $imageCount = $Web->where('type=2'.$statuStr)->count();
        $wordsCount = $Web->where('type=3'.$statuStr)->count();
        $musicCount = $Web->where('type=4'.$statuStr)->count();
        $typeCount = array('allCount' => $allCount,'videoCount' => $videoCount,'imageCount'=> $imageCount,'wordsCount'=> $wordsCount,'musicCount'=> $musicCount);
         /* 当前的参数 type ,status*/
        $this->assign('paramType',$type);  
        $this->assign('typeCount',$typeCount);
        $this->display(); // 输出模板
    }
    public function editInfo($_id){
        if($_id>0){
            $Web = D('Web');
            $data = $Web->relation(true)->find($_id);
            $this->web=$data;
        }else{
             $this->error('数据错误！');
        } 
        $this->display('editInfo');
    }
    public function viewInfo($_id){
        if($_id>0){
            $Web = D('Web');
            $data = $Web->relation(true)->find($_id);
            $title = $data['title'];
            $introduction = $data['introduction'];
            $image_url = $data['image_url'];
            $type= $data['type'];
            switch ($type) {
              case 1:
                  $typeStr="<i class='icon-film'></i> 视频 ";
                  break;
              case 2:
                  $typeStr="<i class='icon-picture'></i> 图片 ";
                  break;
              case 3:
                  $typeStr="<i class='icon-book'></i> 文字 ";
                  break;
              case 4:
                  $typeStr="<i class='icon-headphones'></i> 音乐 ";
                  break;   
              default:
                  $tagStr="<i class='icon-book'></i> 文字 ";
                  break; 
          } 
            $source_link=$data["source_link"];
            $websiteLink=$data['website']['link'];
            $websiteName=$data['website']['name'];
            $date= $data['date'];
            $tags = $data['tags'];
            $arrTags=array();
            $tagStr="";
            if($tags!=null&&$tags!=""){
                $arrTags= explode(",", $data['tags']);
                for ($i=0; $i <count($arrTags); $i++) {
                     switch ($i) {
                          case 0:
                              $tagStr.="<span class='label label-danger'>".$arrTags[0]."</span> ";
                              break;
                          case 1:
                              $tagStr.="<span class='label label-success'>".$arrTags[1]."</span> ";
                              break;
                          case 2:
                              $tagStr.="<span class='label label-info'>".$arrTags[2]."</span> ";
                              break;
                           case 3:
                              $tagStr.="<span class='label label-primary'>".$arrTags[3]."</span> ";
                              break;   
                          default:
                              $tagStr.="<span class='label label-default'>".$arrTags[$i]."</span> ";
                              break; 
                      } 
                }
            }
            $titleStr = "<a href='".$source_link."' title='".$title."' target='_blank'>".$title."</a>";
            $viewChar="<div class='row'>".
                            "<div class='col-sm-12'>".
                                "<div class='thumbnail'>".
                                  "<div class='caption'>".
                                    "<p>".$typeStr." <a href='".$websiteLink."'>".$websiteName."</a> <span> ".$date." </span></p>".   
                                   "</div>". 
                                   "<a href='".$source_link."' title='".$title."' target='_blank'><img class='lazy' src='".$image_url."' width='95%' height='180' alt='".$title."'></a>".
                                   "<div class='introduction'>".     
                                     "<p>".$introduction."</p>".
                                      "<p>".$tagStr."</p>".
                                      "<p>".
                                        "<a href='' class='btn btn-default' role='button'>喜欢 (".$data['count']['favorite'].")</a> ".
                                        "<a href='' class='btn btn-default' role='button'>收藏 (".$data['count']['collect'].")</a> ".
                                        "<a href='' class='btn btn-info' role='button'>评论 (".$data['count']['comment'].")</a> ".
                                        "<a href='' class='btn btn-primary' role='button'>阅读 (".$data['count']['click'].")</a> ".
                                      "</p>".   
                                    "</div>".
                                "</div>".
                            "</div>".
                        "</div>";                      
            $arr=array("viewChar"=>$viewChar,"title"=>$titleStr);
        }else{
             $this->error('数据错误！');
        } 
        $json_str = json_encode($arr);
        echo $json_str;
    }

    /*  addinfo save ajax处理函数*/
    public function saveInfo(){
        $Web   =   D('Web');
        $dbid = I('post.dbid','','htmlspecialchars');
        $title = I('post.title','','htmlspecialchars');
        $type = I('post.type','','htmlspecialchars');
        $source_link = I('post.source_link','','htmlspecialchars');
        $source_web = I('post.source_web','','htmlspecialchars');
        $introduction =I('post.introduction','','htmlspecialchars');
        $tags =I('post.tags',' ','htmlspecialchars');
        $image_url = I('post.image_url','','htmlspecialchars');
        $user_id = '0';  /* $_SESSION['user']['dbid']*/
        $data = array();
        $data["title"]    = $title;
        $data["type"]    = $type;
        $data["source_link"] = $source_link;
        $data["introduction"] = $introduction;
        $data["source_web"] = $source_web;
        $data["tags"] = $tags;
        $data["image_url"] = $image_url;
        $data["user_id"] =  $user_id;
        $data["date"]    = date('Y-m-d H:i:s');
        $data["count"]    = array(
           'click' =>'0',
           'favorite' =>'0',
           'comment' =>'0',
        );
        if($dbid!=null&&$dbid!=""){
             $editResult = $Web->where("dbid=%d",$dbid)->save($data);
            if($editResult) {
              $arr = array("status"=>'1',"message"=>"修改文章成功","url"=>"listall");
            }else{
                 $arr = array("status"=>'0',"message"=>"修改文章失败");
            }
            
        }else{
            $data["status"] = 0;
           $addResult =   $Web->relation("count")->add($data);
            if($addResult) {
              $arr = array("status"=>'1',"message"=>"添加文章成功","url"=>"listall");
            }else{
                 $arr = array("status"=>'0',"message"=>"添加文章失败");
            }
        }
        $json_str = json_encode($arr);
        echo $json_str;
    }

    /*系统选择 website website_all*/
    public function website_all(){
        $Website = M('Website');
        $data = $Website->select();
        $arr = array("website"=>$data);
        $json_str = json_encode($arr);
        echo $json_str;
    }
    /*自定义website customWebsite*/
    public function customWebsite(){
        $name = I('post.name','','htmlspecialchars');
        $link = I('post.link','','htmlspecialchars');
        /*检测是否已存在同样的name like*/
        $Website = D('Website');
        $map['name'] = $name;
        $result = $Website->where($map)->select();
        if(empty($result)){
            //不存在，即执行添加，return dbid
            $data = array();
            $data["name"] = $name;
            $data["link"] = $link;
            $data["date"]    = date('Y-m-d H:i:s');
            $data["status"] = '0';
            $addResult = $Website->add($data);
            if($addResult) {
                $arr = array("status"=>'1',"dbid"=>$addResult,"wsName"=>$name,"wsLink"=>$link);
            }else{
                $arr = array("status"=>'0');
            }
        }else{
            //存在，即直接返回此ID，
            $arr = array("status"=>'1',"dbid"=>$result[0]['dbid'],
                "wsName"=>$result[0]['name'],"wsLink"=>$result[0]['link']
                );
        }    
        $json_str = json_encode($arr);
        echo $json_str;
    }
    /* 批量删除 ids*/
    public function checkDeletes($dbids){
        $Web = M('Web');
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
             $Web   =   D('Web');
             $Web->status = $status;
             $map['dbid']=$dbid;
             $result = $Web->where($map)->save();
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
           $Web = D("Web");
           $sql = "UPDATE Web set `status`= ".$status." WHERE dbid in(".$dbids.")";
           $result=$Web->execute($sql);
          
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