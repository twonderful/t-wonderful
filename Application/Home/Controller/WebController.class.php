<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class WebController extends Controller {
	public function _initialize(){
        $url = $_SERVER['PHP_SELF']
        
		echo $url."<br>";

	}

    public function index(){
    	$Tag = M('Tag');
        $tags = $Tag->where('status=1')->select();
        $this->assign('Tags',$tags);
        $Web = M('Web');
        $Webs = $Web->where('status=1')->select();
        $this->assign('Webs',$Webs);
		//$this->display();
    }
}