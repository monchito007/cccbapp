<div class="span12">

<h1> <?php echo Yum::t('Registration'); ?> </h1>

<?php $this->breadcrumbs = array(Yum::t('Registration')); ?>



<?php $activeform = $this->beginWidget('CActiveForm', array(
  'id'=>'registration-form',
  'enableAjaxValidation'=>true,
  'enableClientValidation'=>true,
  'focus'=>array($form,'username'),
));
?>
    
<?php echo Yum::requiredFieldNote(); ?>
<?php echo CHtml::errorSummary(array($form, $profile)); ?>

<?php if(!Yum::module('registration')->registration_by_email) { ?>
<div class="row-fluid">
  <div class="span12"> <?php
echo $activeform->labelEx($form,'username');
echo $activeform->textField($form,'username');
?> </div></div>
<?php } ?>

<div class="row-fluid"><div class="span12"> <?php
echo $activeform->labelEx($profile,'firstname');
echo $activeform->textField($profile,'firstname');
?> </div></div>

<div class="row-fluid"><div class="span12"> <?php
echo $activeform->labelEx($profile,'lastname');
echo $activeform->textField($profile,'lastname');
?> </div></div>

<div class="row-fluid"><div class="span12"> <?php
echo $activeform->labelEx($profile,'email');
echo $activeform->textField($profile,'email');
?> </div></div>

<div class="row-fluid"><div class="span12"> <?php
echo $activeform->labelEx($profile,'organization');
echo $activeform->textField($profile,'organization');
?> </div></div>

<div class="row-fluid"><div class="span12"> <?php
echo $activeform->labelEx($profile,'location');
echo $activeform->textField($profile,'location');
?> </div></div>

<div class="row-fluid">
<div class="span12">
<?php echo $activeform->labelEx($form,'password'); ?>
<?php echo $activeform->passwordField($form,'password'); ?>
</div>
</div>

<div class="row-fluid">
<div class="span12">
<?php echo $activeform->labelEx($form,'verifyPassword'); ?>
<?php echo $activeform->passwordField($form,'verifyPassword'); ?>
</div></div>

<?php if(extension_loaded('gd')
&& !Yum::module()->debug
&& Yum::module('registration')->enableCaptcha): ?>
  <div class="row-fluid">
      <div class="span12">
    <?php echo CHtml::activeLabelEx($form,'verifyCode'); ?>
    <div>
    <?php $this->widget('CCaptcha'); ?>
    <?php echo CHtml::activeTextField($form,'verifyCode'); ?>
    </div>
    <p class="hint">
    <?php echo Yum::t('Please enter the letters as they are shown in the image above.'); ?>
    <br/><?php echo Yum::t('Letters are not case-sensitive.'); ?></p>
  </div></div>
  <?php endif; ?>

  <div class="row-fluid submit">
    <div class="span12">
    <?php echo CHtml::submitButton(Yum::t('Registration'), array('class'=>'btn')); ?>
    </div>
  </div>

</div>
    
<?php $this->endWidget(); ?>

<script type="text/javascript">
   //Function for autocomplete cities in Location field.
   function initialize() {
      var input = document.getElementById('YumProfile_location');
      var options = {
            types: ['(cities)']
      };

      var autocomplete = new google.maps.places.Autocomplete(input, options);
   }
   google.maps.event.addDomListener(window, 'load', initialize);
</script>