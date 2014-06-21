<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {

    public function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }

    //查询class所有，并以单选按钮显示出来
   public function website_all(){
	 	$websiteStr = "";
    	$Website = M('Website');
    	$count = $Website->count();
    	$data = $Website->select();
    	for ($i=1; $i <$count ; $i++) { 
    		$websiteStr.= "<a href='javascript:systemWebsite(\"".$data[$i]['dbid']."\",\"".$data[$i]['name']."\",\"".$data[$i]['link']."\")' class='btn btn-default'>".$data[$i]['name']."</a> ";
    	}
    	return $websiteStr;
    }
}