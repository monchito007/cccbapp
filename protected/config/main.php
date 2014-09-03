<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Public Space App',
        'language'=>'en',
        'sourceLanguage'=>'en',
        'charset'=>'utf-8',
    

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.modules.user.models.*',                
	),
        /*
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'password',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
            'registration' => array(),
            
               
	),
        */
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        'loginUrl' => array('//user/user/login'),
                        'class' => 'application.modules.user.components.YumWebUser',
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=cccbapp',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '12345',
			'charset' => 'utf8',
                        'tablePrefix' => '',

		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
                'cache' => array('class' => 'system.caching.CDummyCache'),
                'Smtpmail'=>array(
                    'class'=>'application.extensions.smtpmail.PHPMailer',
                    'Host'=>"smtp.gmail.com",
                    'Username'=>'publicspaceapp@gmail.com',
                    'Password'=>'publicspaceapp2014',
                    'Mailer'=>'smtp',
                    'Port'=>465,
                    'SMTPAuth'=>true,
                    'SMTPSecure' => 'ssl',
                ),
                
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'publicspaceapp@gmail.com',
	),
        'modules' => array(
                'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'password',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
                /*
                'user' => array(
                        'debug' => true,
                        )
                ),
                */
                'user' => array(
                    'debug' => false,
                    'userTable' => 'user',
                    'translationTable' => 'translation',
                ),
                'usergroup' => array(
                    'usergroupTable' => 'usergroup',
                    'usergroupMessageTable' => 'user_group_message',
                ),
                'membership' => array(
                    'membershipTable' => 'membership',
                    'paymentTable' => 'payment',
                ),
                'friendship' => array(
                    'friendshipTable' => 'friendship',
                ),
                'profile' => array(
                    'privacySettingTable' => 'privacysetting',
                    'profileTable' => 'profile',
                    'profileCommentTable' => 'profile_comment',
                    'profileVisitTable' => 'profile_visit',
                ),
                'role' => array(
                    'roleTable' => 'role',
                    'userRoleTable' => 'user_role',
                    'actionTable' => 'action',
                    'permissionTable' => 'permission',
                ),
                'message' => array(
                    'messageTable' => 'message',
                ),
                'registration' => array(
                    'enableActivationConfirmation' => false,
                    'layout' => '//layouts/main',
                    'loginAfterSuccessfulActivation' => true,
                    'loginAfterSuccessfulRecovery' => true,
                    'registrationUrl' => array('//registration/registration/registration'),
                    'recoverPasswordView' => '//registration/registration/recovery',
                    'changePasswordView' => '//user/user/changepassword',
                    'registrationEmail' => 'register <register@website.com>',
                    'recoveryEmail' => 'recover <recover@website.com>',
                    'activationFailureView' => '//registration/registration/activation_failure',
                    
                ),
            ),
                
                
);