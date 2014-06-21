<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class BlogModel extends RelationModel {
    protected $_link = array(
            'Count'=>array(
            	'mapping_type'    =>self::HAS_ONE,
                'class_name'    =>'blog_count',
                'foreign_key'=>'blog_id',
                'mapping_name' =>'count',
              ),
            'Content'=>array(
              'mapping_type'    =>self::HAS_ONE,
                'class_name'    =>'blog_content',
                'foreign_key'=>'blog_id',
                'mapping_name' =>'content',
              ),
    );
}
