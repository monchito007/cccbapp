<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1><i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>This space aims to be one of knowledge and exchanges about public space. Public space is something shared by all those who live in a community. It is physical, like the street or a square, but it is also political as it is a space of discussion and the necessary expression to ensure that the place we live in is shared and democratic.
<br><br>Share with all members of this community the information you believe is relevant to this theme. Once you have registered, you only need to fill in a simple form in order to contribute whatever you like. You may do so as often as you like and can also consult, whenever you like, the information shared by anyone else using this space.
<br><br>This is an open tool and one that is still being constructed. Hence, we wholeheartedly invite you to suggest any change or make any contribution regarding the tool in general, or the form to be filled in when sharing an event or information, in particular. Without your active participation, this tool will not be able to acquire its fullest sense.
<br><br>Here is the form by means of which you can offer your information about public space. As you can see, it has been prepared with a great variety of issues in mind. However, if you find it still lacks nuances, please let us know here or in the Contact section.</p>

<ul>
    <li>If you are new, register <?php echo CHtml::link('here',Yii::app()->request->baseUrl.'/index.php?r=registration/registration'); ?>.</li>
    <li>If you already have an account login <?php echo CHtml::link('here',Yii::app()->request->baseUrl.'/index.php?r=registration/registration'); ?>.</li>
    <li>Colaborate in creating this project and contact <?php echo CHtml::link('here',Yii::app()->request->baseUrl.'/index.php?r=site/contact'); ?>.</li>
    <li>To create an event click <?php echo CHtml::link('here',Yii::app()->request->baseUrl.'/index.php?r=event/create'); ?>.</li>
    <li>To check the event list click <?php echo CHtml::link('here',Yii::app()->request->baseUrl.'/index.php?r=event/index'); ?>.</li>
    <li>If you want invite somebody click <?php echo CHtml::link('here',Yii::app()->request->baseUrl.'/index.php?r=inviteFriend/create'); ?>.</li>
</ul>
