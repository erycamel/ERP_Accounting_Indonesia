<?php
$this->breadcrumbs=array(
		'Purchase Order'=>array('index'),
		'Create',
);$this->menu=array(
		array('label'=>'Home', 'url'=>array('/bPorderInventory')),
);

$this->menu1=bPorder::getTopUpdated(1);
$this->menu2=bPorder::getTopCreated(1);
?>

<div class="page-header">
	<h1>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/icon/shopcart.png') ?>
		New PO
	</h1>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

