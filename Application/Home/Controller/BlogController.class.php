<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class BlogController extends Controller {

    public function index(){
        $Blog = D('Blog');
        import('ORG.Util.Page');
        $count      = $Blog->relation(true)->where('status=1')->count();
        $Page       = new \Think\Page($count,10);
        $list = $Blog->where('status=1')->relation(true)->order('date DESC ')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
		$this->display();
    }
    public function addMore(){

    }
    public function read($id){
        if($id>0){
            $Tag = M('Tag');
            $tags = $Tag->where('status=1')->select();
            $this->assign('Tags',$tags);
            $Blog = D('Blog');
            $data = $Blog->relation(true)->find($id);
            $this->blog=$data;
        }else{
             $this->error('数据错误！');
        } 
        $this->display();
    }
}