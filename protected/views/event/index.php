<?php
/* @var $this EventController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Events',
);
/*
$this->menu=array(
	array('label'=>'Create Event', 'url'=>array('create')),
	array('label'=>'Manage Event', 'url'=>array('admin')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiListView.update('blogslistview', { 
        //this entire js section is taken from admin.php. w/only this line diff
        data: $(this).serialize()
    });
    return false;
});
");
?>

<h1>Events</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<br>
<?php echo CHtml::link('All Results',Yii::app()->request->baseUrl.'/index.php?r=event/index'); ?> 
<div class="search-form" style="display:none">
<?php  $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'sortableAttributes'=>array(
            'id',
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

