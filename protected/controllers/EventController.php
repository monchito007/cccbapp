<?php

class EventController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	/**
	 * @param string change date and time format to insert into the database in the correct format. (2014-07-01 06:31:45)
	 */
	public function changeDateTimeFormat($datetime)
	{
		
            if(strstr($datetime,'/')){
            
                $event_hour = array();
                        
                $event_hour = explode(" ", $datetime);

                $date = $event_hour[0];
                $time = $event_hour[1];

                $dateparts = array();
                
                $dateparts = explode("/", $date);
                
                $day=$dateparts[0];
                $month=$dateparts[1];
                $year=$dateparts[2];

                $datetime = $year."-".$month."-".$day." ".$time;
            
            }
            
            return $datetime;
                
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Event;

		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['Event']))
		{
			$model->attributes=$_POST['Event'];
                        
                        //print_r($model->attributes);
                        
                        //Convert array of related event to JSON.
                        $model->related_event_list_json = json_encode($model->related_event_list_json);
                        
                        //Change date and time format to insert into the database.
                        $model->date = $this->changeDateTimeFormat($model->date);
                        
                        //Add id of user who created the event.
                        $model->creator_username = Yii::app()->user->name;
                        
                        //phpinfo();
                        
                        if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Event']))
		{
			$model->attributes=$_POST['Event'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            
                $model=new Event('search');
                
                $model->unsetAttributes();  // clear any default values
                if(isset($_GET['Event'])){
                    
                    $model->attributes=$_GET['Event'];
                    
                }
                
                /*
                //If field are using id
                if(isset($model->category_id)){
                    
                    //Create query for through results
                    $data=Yii::app()->db->createCommand("SELECT * FROM categories")->queryAll();
                    
                    foreach($data as $s)
                    {
                        
                        //If the field category_id contains the text of any category, get the id.
                        if(stripos($s['category'], $model->category_id) !== FALSE){
                            
                            $model->category_id = $s['id'];
                            
                        }
                        
                    }
                    
                }
                */
            
		$dataProvider=new CActiveDataProvider('Event');
		$this->render('index',array(
			//'dataProvider'=>$dataProvider,
                        'dataProvider'=>$model->search(),
                        'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Event('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Event']))
			$model->attributes=$_GET['Event'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * @return string with list of Related Events to read by user in Event/index.
	 */
	 public static function getRelatedEventsString($id){
            
            $model=Event::model()->findByPk($id);
                
            //Convert related_event_list_json to string list of Related Events
            $model_related_events=RelatedEvents::model()->findAll();
            //print_r($model);
            
            $related_events_list = json_decode($model->related_event_list_json);
            $related_events_list_string = "";
            
            
            foreach ($related_events_list as $related_events_id) {
                
                foreach ($model_related_events as $key => $value) {

                    if($related_events_id==$value['id']){$related_events_list_string = $related_events_list_string.', '.$value['related_event'];}

                }
                
            }
            
            
            //remove first comma
            $related_events_list_string = substr($related_events_list_string, 2, strlen($related_events_list_string));
            
            return $related_events_list_string;
            
        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Event the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Event::model()->findByPk($id);
                
                //Obtain string with list of Categories to read by user in Event/index.
                $model->related_event_list_json = $this->getRelatedEventsString($id);
                
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Event $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='event-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
