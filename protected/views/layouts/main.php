<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset; ?>">
	<meta name="language" content="<?php echo Yii::app()->language; ?>">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
        <!-- CSS DatePicker -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datepicker.css">
        <!-- JQuery -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/lib/jquery.js"></script>
        <!-- JQueryUI -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/lib/jquery-ui.js"></script>
        <!-- JQueryUI Timepicker Addon (http://trentrichardson.com)-->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/lib/jquery-ui-timepicker-addon.js"></script>
        <!-- Javascript Places Autocomplete (https://developers.google.com/maps/documentation/javascript/places?csw=1)-->
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
            <div id="logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
        
        <!-- Login -->
        <?php //$this->widget('application.modules.user.components.LoginWidget'); ?>
        
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
                                array('label'=>'Registration', 'url'=>array('/registration/registration'), 'visible'=>Yii::app()->user->isGuest),
                                array('label'=>'Login', 'url'=>array('/user/user'), 'visible'=>Yii::app()->user->isGuest),//(Module)
				//array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Create event', 'url'=>array('/event/create')),
				array('label'=>'Event list', 'url'=>array('/event/index')),
				//array('label'=>'Saludo', 'url'=>array('/saludo/index')),
				//array('label'=>'FormTest', 'url'=>array('/formtest/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				//array('label'=>'Registration', 'url'=>array('/registration/registration')),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by<br/>Moisés Aguilar Miranda & Alexandre Vidal Casanovas.<br/>
		All Rights Reserved.<br/>
		<?php // echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
