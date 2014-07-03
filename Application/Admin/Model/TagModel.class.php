<?php
namespace Admin\Model;
use Think\Model;
class TagModel extends RelationModel {
	protected $_link = array(
            'Type'=>array(
            	'mapping_type'    =>self::HAS_ONE,
                'class_name'    =>'type',
                'foreign_key'=>'type_id',
                'mapping_name' =>'type',
              ),
    );
}
