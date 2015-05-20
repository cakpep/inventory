<?php
namespace backend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class Panel extends Widget{


		public $title = '';
		public $type = self::TYPE_DEFAULT;
		CONST TYPE_DEFAULT = 'panel-default';
		CONST TYPE_PRIMARY = 'panel-primary';
		CONST TYPE_SUCCESS = 'panel-success';
		CONST TYPE_WARNING = 'panel-warning';
		CONST TYPE_DANGER = 'panel-danger';


		public function init(){			
			parent::init();
			ob_start();
		}
		
		public function run()
		{
			$start = '<div class="panel '.$this->type.'" >';
			$start .= '<div class="panel-heading">'.Html::encode($this->title).'</div>';
			$start .= '<div class="panel-content" style="margin:1%">';
			$ender = '</div></div>';
			$content = ob_get_clean();
			
			return $start.$content.$ender;
		}
} 