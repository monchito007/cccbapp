<?php $this->pageTitle='Hola como estas?'; ?>
<?php $this->breadcrumbs=array('Saludo'); ?>
<h1><?php echo $saludo; ?></h1>

<?php
$message = 'Hello World!';
$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
$mailer->Host = 'smtp.gmail.com';
$mailer->IsSMTP();
$mailer->From = 'monchito007@gmail.com';
$mailer->AddReplyTo('monchito007@gmail.com');
$mailer->AddAddress('monchito007@gmail.com');
$mailer->FromName = 'Wei Yard';
$mailer->CharSet = 'UTF-8';
$mailer->Subject = Yii::t('demo', 'Yii rulez!');
$mailer->Body = $message;
$mailer->Send();
