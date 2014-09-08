<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

        <p>
            This form has been designed bearing in mind the people who have started to create this tool. 
            Yet it is something that needs to be in permanent transformation. 
            And this is a process that should be undertaken collectively. 
            We are therefore looking forward to receiving any proposal that might add a category to it, or remove one, or enrich one with more sub-categories. 
            Please contribute any ideas you may have <?php echo CHtml::link('here',Yii::app()->request->baseUrl.'/index.php/site/contact'); ?>.
        </p>
    
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100,'placeholder'=>'Give a name to the event')); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>250,'placeholder'=>'Tip an URL')); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'event_type_id'); ?>
		<?php echo $form->dropDownList($model,'event_type_id', EventTypes::getEventTypes()); ?>
		<?php echo $form->error($model,'event_type_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('placeholder'=>'When?')); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows' => 6, 'cols' => 50,'maxlength'=>250,'placeholder'=>'Descrive event')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<!-- Location Field -->
        
	<div class="row location_select" >
		<?php //echo $form->labelEx($model,'location'); ?>
		<?php //echo $form->dropDownList($model,'location', EventTypes::getEventTypes()); ?>
		<?php //echo $form->error($model,'location'); ?>
	</div>
        
	<div class="row location_textbox">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>50,'maxlength'=>50,'placeholder'=>'Where?')); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>
        
        <!-- End Location Field -->

        <div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>200,'placeholder'=>'Indicate the direction')); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'related_event_list_json'); ?>
                <?php echo $form->ListBox($model,'related_event_list_json', RelatedEvents::getRelatedEvents(),array('multiple' => 'multiple')); ?>
		<i>(hold Ctrl and click the options you want to select)</i>
                <?php echo $form->error($model,'related_event_list_json'); ?>
	</div>
        
	<div class="row">
                <i><?php echo $form->labelEx($model,'suggest_another_event_related'); ?></i>
		<?php echo $form->textField($model,'suggest_another_event_related',array('size'=>60,'maxlength'=>250,'placeholder'=>"If the previous options didn't satisfy you suggest a new one")); ?>
		<?php echo $form->error($model,'suggest_another_event_related'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'promotor_id'); ?>
		<?php echo $form->dropDownList($model,'promotor_id', Promotors::getPromotors()); ?>
		<?php echo $form->error($model,'promotor_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'discipline'); ?>
		<?php echo $form->textField($model,'discipline',array('size'=>60,'maxlength'=>100,'placeholder'=>'Architecture, Sociology, Urban Planning, History, Philosophy, Law, Economics')); ?>
		<?php echo $form->error($model,'discipline'); ?>
	</div>
        
        <!-- Cateogries multiple list -->

        <div class="row">
		<?php //echo $form->labelEx($model,'category_id'); ?>
		<?php //echo $form->dropDownList($model,'category_id', Categories::getCategories()); ?>
		<?php //echo $form->error($model,'category_id'); ?>
	</div>
        
        <div class="row">
		<?php //echo $form->labelEx($model,'category_list_json'); ?>
		<?php //echo $form->ListBox($model,'category_list_json', Categories::getCategories(),array('multiple' => 'multiple')); ?>
		<?php //echo $form->error($model,'category_list_json'); ?>
	</div>
        
        <div class="row"><!-- This field is automatically filled -->
		<?php //echo $form->labelEx($model,'creator_username'); ?>
		<?php //echo $form->textField($model,'creator_username',array('size'=>60,'maxlength'=>150)); ?>
		<?php //echo $form->error($model,'creator_username'); ?>
	</div>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">


$(document).ready(function () {
    
    //Get current path
    //var pathname = window.location.pathname;
    //alert(pathname);
    
    //Jquery  Calendar for Date field (DateTimePicker)
    //$('#Event_date').datetimepicker();
    
    $('#Event_date').datetimepicker({
	timeFormat: 'HH:mm:ss' //2014-07-01 06:31:45
    });
    
    
    //Enable and Disable fields Location//
    
    //Disable location textbox field by default
    //$('.location_textbox > input').attr('disabled', true);
    
    //When location textbox is clicked, enable this and disable location select.
    $('.location_textbox').click(function(){
        
        $('.location_textbox > input').prop('disabled', false);
        $('.location_select > input').prop('disabled', true);
        
    });
    
    //When location select is clicked, enable this and disable location textbox.
    $('.location_select').click(function(){
        
        $('.location_textbox > input').prop('disabled', true);
        $('.location_select > input').prop('disabled', false);
        
    });
    
});

</script>
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


