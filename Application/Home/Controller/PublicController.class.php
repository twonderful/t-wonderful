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
    public function blog_tag(){
        $tagStr = "";
        $Tag = M('Tag');
        $tags = $Tag->where('status=1')->select();
        if($tags){
            foreach ($tags as $tag) {
                # code...
            }
        }
        for ($i=1; $i <$count ; $i++) { 
            $websiteStr.= "<a href='javascript:systemWebsite(\"".$data[$i]['dbid']."\",\"".$data[$i]['name']."\",\"".$data[$i]['link']."\")' class='btn btn-default'>".$data[$i]['name']."</a> ";
        }
        return $websiteStr;
    }
    function time_tran($the_time){
        $now_time = date("Y-m-d H:i:s",time()+8*60*60); 
        $now_time = strtotime($now_time);
        $show_time = strtotime($the_time);
        $dur = $now_time - $show_time;
        if($dur < 0){
            return $the_time; 
        }else{
            if($dur < 60){
                return $dur.'秒前'; 
            }else{
                if($dur < 3600){
                    return floor($dur/60).'分钟前'; 
                }else{
                    if($dur < 86400){
                        return floor($dur/3600).'小时前'; 
                    }else{
                        if($dur < 259200){//3天内
                            return floor($dur/86400).'天前';
                        }else{
                            return $the_time; 
                        }
                    }
                }
            }
            }
         }
        }