<?php

class SaludoController extends Controller{
    
    public function actionIndex() {
        
        //http://www.yiiframework.com/extension/mailer/
        
        $message = 'Hello World!';
        Yii::app()->mailer->Host = 'smtp.yiiframework.com';
        Yii::app()->mailer->IsSMTP();
        Yii::app()->mailer->From = 'wei@pradosoft.com';
        Yii::app()->mailer->FromName = 'Wei';
        Yii::app()->mailer->AddReplyTo('wei@pradosoft.com');
        Yii::app()->mailer->AddAddress('qian@yiiframework.com');
        Yii::app()->mailer->Subject = 'Yii rulez!';
        Yii::app()->mailer->Body = $message;
        Yii::app()->mailer->Send();
        
        $saludo = 'Hola que tal como estas?';
        $this->render('index',array('saludo'=>$saludo));
        
    }
    
}

