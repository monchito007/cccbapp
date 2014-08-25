<?php

Yii::import('application.modules.profile.models.YumProfile');
class Profile extends YumProfile {
 
    function rules() {
        $rules = parent::rules();
        //$rules[] = array('about', 'required');
        return $rules;
    }
    
    /**
    * @return array relational with Profiles Id and Profiles First Name and Last Name to use in dropDownList.
    */
    public static function getProfiles($key=null){

        $data = Profile::model()->findAll();

        $return=array(''=>'Select...');

        foreach($data as $s)
        {
            $return[$s->user_id] = ucfirst($s->firstname).' '.ucfirst($s->lastname);
        }

        return $return;           

    }
    
}

