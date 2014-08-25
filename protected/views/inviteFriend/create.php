<?php
/* @var $this InviteFriendController */
/* @var $model InviteFriend */

$this->breadcrumbs=array(
	'Invite Friends'=>array('create'),
	
);
/*
$this->menu=array(
	array('label'=>'List InviteFriend', 'url'=>array('index')),
	array('label'=>'Manage InviteFriend', 'url'=>array('admin')),
);
*/
?>

<h1>Invite a friend</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>