<?php
namespace Home\Model;
use Think\Model\RelationModel;
class WebModel extends RelationModel {
    protected $_link = array(
        /* web统计*/
            'Count'=>array(
            	'mapping_type'    =>self::HAS_ONE,
                'class_name'    =>'web_count',
                'foreign_key'=>'web_id',
                'mapping_name' =>'count',
              ),
            'webSite'=>array(
                'mapping_type'    =>self::BELONGS_TO,
                'class_name'    =>'Website',
                'foreign_key'=>'source_web',
                'mapping_name' =>'website',
              ),
        /*发布者 关联*/   
           /* 'web_user'=>array(
            	'mapping_type' =>self::BELONGS_TO ,
            	'class_name'=>'user',
            	'foreign_key'=>'user_id',
             ),*/
    );
}
