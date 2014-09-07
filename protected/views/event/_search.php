<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php //echo $form->label($model,'id'); ?>
		<?php //echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100,'placeholder'=>'Type the name of the event')); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>250,'placeholder'=>'Type the URL')); ?>
	</div>

        <div class="row">
		<?php echo $form->label($model,'event_type_id'); ?>
		<?php //echo $form->textField($model,'event_type_id'); ?>
                <?php echo $form->dropDownList($model,'event_type_id', EventTypes::getEventTypes()); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('maxlength'=>19,'placeholder'=>'YYYY-MM-DD hh:mm:ss')); ?>
	</div>
    
	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows' => 6, 'cols' => 50,'maxlength'=>250,'placeholder'=>'Description of the event')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>50,'maxlength'=>50,'placeholder'=>'Where is it?')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>200,'placeholder'=>'Direction of the event')); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'category_list_json'); ?>
		<?php //echo $form->dropDownList($model,'category_list_json', Categories::getCategoriesSearchForm()); ?>
	</div>

        
    
        <div class="row">
		<?php //echo $form->label($model,'related_event_list_json'); ?>
		<?php //echo $form->dropDownList($model,'related_event_list_json', RelatedEvents::getRelatedEventsSearchForm()); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model,'suggest_another_event_related'); ?>
		<?php echo $form->textField($model,'suggest_another_event_related',array('size'=>50,'maxlength'=>250,'placeholder'=>"Suggestion of event related")); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model,'promotor_id'); ?>
		<?php echo $form->dropDownList($model,'promotor_id', Promotors::getPromotors()); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model,'discipline'); ?>
		<?php echo $form->textField($model,'discipline',array('size'=>50,'maxlength'=>100,'placeholder'=>'Discipline of the event')); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model,'creator_username'); ?>
		<?php echo $form->textField($model,'creator_username',array('size'=>50,'maxlength'=>150,'placeholder'=>'User who created the event')); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->

<script type="text/javascript">
   //Function for autocomplete cities in Location field.
   function initialize() {
      var input = document.getElementById('Event_location');
      var options = {
            types: ['(cities)']
      };

      var autocomplete = new google.maps.places.Autocomplete(input, options);
   }
   google.maps.event.addDomListener(window, 'load', initialize);
</script>