<?php
/* @var $this InviteFriendController */
/* @var $model InviteFriend */

$this->breadcrumbs=array(
	'Invite somebody'=>array('create'),
	
);
/*
$this->menu=array(
	array('label'=>'List InviteFriend', 'url'=>array('index')),
	array('label'=>'Manage InviteFriend', 'url'=>array('admin')),
);
*/
?>

<h1>Invite somebody</h1>

<!-- If form success -->
<?php if(Yii::app()->user->hasFlash('success')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('success'); ?>
</div>

<?php else: ?>

    <?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php endif; ?>