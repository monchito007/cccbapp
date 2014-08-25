<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
                //Obtenim la llista d'usuaris de la base de dades
                //$list_users=Yii::app()->db->createCommand('SELECT user, password FROM users')->queryAll();
                
                $users=array();
                /*
                //Afegim el usuaris a la llista d'usuaris
                foreach($list_users as $item){
                    //process each item here
                    $users[$item['user']]=$item['password'];
                    
                }
                */
                /*
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
                */
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
}