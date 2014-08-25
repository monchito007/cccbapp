<?php

class FormTestController extends Controller{
    
    public function actionIndex() {
        
        
        $FormTest = 'Form Test';
        /*
        $this->render('index',array('FormTest'=>$FormTest));
        */
        
        $model = new LoginForm;
        $form = new CForm('application.views.site.login', $model);
        if($form->submitted('login') && $form->validate())
            $this->redirect(array('site/index'));
        else
            $this->render('index', array('FormTest'=>$FormTest,'form'=>$form));
        
        
    }
    
}

