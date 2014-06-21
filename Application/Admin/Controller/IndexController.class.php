<?php
// 本类由系统自动生成，仅供测试用途
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	
    public function index(){
        if(isset($_SESSION['admin'])){
            $this->display();
        }else{
            $this->redirect('Index/login');
        }
		
    }
    public function login(){
        if(isset($_SESSION['admin'])){
            $this->redirect('Index/index');
        }else{
            $this->display();
        }
    }

    public function checkLogin(){
        $User = M('User');
        $uemail = I('post.uemail','','htmlspecialchars');
        $upassword = I('post.upassword','','htmlspecialchars');
        $password=md5("t".$upassword);
        $map['email']=$uemail;
        $result= $User->where($map)->find();
        if(!empty($result)){
            if($result['password']===$password){
                if($result['status']!=2&&$result['type']==2){
                    $_SESSION['admin']=$result;
                    $arr = array("status"=>'1',"message"=>'登录成功。',"url"=>'index');
                }else{
                    $arr = array("status"=>'0',"message"=>"限制登录。");
                }   
            }else{
                $arr = array("status"=>'0',"message"=>"密码错误。");
            }      
        }else{
        	$arr = array("status"=>'0', "message"=>"邮箱不存在。");
        }
        $json_str = json_encode($arr);
        echo $json_str;
    }

    public function loginOut(){
        unset($_SESSION['admin']);
        $this->redirect('/admin');
    }
}