<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->title,
);
/*
$this->menu=array(
	array('label'=>'List Event', 'url'=>array('index')),
	array('label'=>'Create Event', 'url'=>array('create')),
	array('label'=>'Update Event', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Event', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Event', 'url'=>array('admin')),
);
*/
?>

<h1>View Event</h1>

<?php 
//Replace id values for its relational value.
$model->event_type_id = $model->Event_type->event_type;
//$model->promotor_id = $model->Promotor->promotor;
//If promotor_id is different to 0, show the value.
if($model->promotor_id){
    $model->promotor_id = $model->Promotor->promotor;
}else{
    $model->promotor_id = "No promotor";
}
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'title',
                'url',
                'event_type_id',
                'date',
		'description',
		'location',
		'address',
		'related_event_list_json',
		'suggest_another_event_related',
		'promotor_id',
            	'discipline',
		'creator_username',
	),
)); ?>

<?php if(Yii::app()->user->name == $model->creator_username): ?>

<br />
<img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/7b96b912/gridview/update.png">
<?php echo CHtml::link('Update event',Yii::app()->request->baseUrl.'/index.php/event/update/'.$model->id); ?>

<?php endif; ?>

<br />
<img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/7b96b912/detailview/arrow_undo.png">
<?php echo CHtml::link('Return to event list',Yii::app()->request->baseUrl.'/index.php/event/index'); ?>

