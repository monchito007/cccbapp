<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
/*
$this->menu=array(
	array('label'=>'List Event', 'url'=>array('index')),
	array('label'=>'Create Event', 'url'=>array('create')),
	array('label'=>'View Event', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Event', 'url'=>array('admin')),
);
*/
?>

<h1>Update Event <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<br />
<img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/7b96b912/gridview/view.png">
<?php echo CHtml::link('View detail',Yii::app()->request->baseUrl.'/index.php/event/'.$model->id); ?>

<br />
<img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/7b96b912/detailview/arrow_undo.png">
<?php echo CHtml::link('Return to event list',Yii::app()->request->baseUrl.'/index.php/event/index'); ?>