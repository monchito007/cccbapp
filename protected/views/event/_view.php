<?php
/* @var $this EventController */
/* @var $data Event */
?>

<div class="view">
        
    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::link($data->url,$data->url, array('target'=>'_blank')); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('event_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->Event_type->event_type); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

        <b><?php //echo CHtml::encode($data->getAttributeLabel('related_event_list_json')); ?></b>
	<?php  //echo CHtml::encode($data->related_event_list_json); ?>
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('related_event_list_json')); ?>:</b>
	<?php echo CHtml::encode($this->getRelatedEventsString($data->id)); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('suggest_another_event_related')); ?>:</b>
	<?php echo CHtml::encode($data->suggest_another_event_related); ?>
	<br />
        
	<b><?php //echo CHtml::encode($data->getAttributeLabel('category_list_json')); ?></b>
	<?php //echo CHtml::encode($this->getCategoriesString($data->id)); ?>
	
        <b><?php echo CHtml::encode($data->getAttributeLabel('promotor_id')); ?>:</b>
	<?php 
            //If promotor_id is different to 0, show the value.
            if($data->promotor_id){
                echo CHtml::encode($data->Promotor->promotor);
            }
        ?>
	<?php //echo CHtml::encode($data->Promotor->promotor); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('discipline')); ?>:</b>
	<?php echo CHtml::encode($data->discipline); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('creator_username')); ?>:</b>
	<?php echo CHtml::encode($data->creator_username); ?>
	<br />

</div>