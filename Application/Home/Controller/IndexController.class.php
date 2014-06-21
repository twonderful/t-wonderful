<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$Tag = M('Tag');
        $tags = $Tag->where('status=1')->select();
        $this->assign('Tags',$tags);
        $Web = D('Web');
        import('ORG.Util.Page');
        $count      = $Web->where('status=1')->count();
        $Page       = new \Think\Page($count,10);
        $list = $Web->where('status=1')->relation(true)->order('date DESC ')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
		$this->display();
    }
    public function addMore(){

    }
}