<?php

/**
 * This is the model class for table "event".
 *
 * The followings are the available columns in table 'event':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $date
 * @property string $address
 * @property string $url
 * @property integer $event_type_id
 * @property string $location
 * @property string $related_event_list_json
 * @property string $suggest_another_event_related
 * @property integer $promotor_id
 * @property string $discipline
 * @property string $creator_username
 */
class Event extends CActiveRecord
{
        /**
	 * @property string to search attribute to related model. (Tutorial -> http://www.yiiframework.com/wiki/281/searching-and-sorting-by-related-model-in-cgridview/)
	 */
        //public $Creator_user_search;
        
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('title, description, date, address, url, involved_user_id, involvement_mode_id, event_type_id, location, category_list_json, public_space_type_list_json, suggestion_public_space, promotor_list_json, discipline, denounce_conflicts_list_json, suggestion_denounce_conflict, creator_username', 'required'),
			array('title, date, event_type_id, location, related_event_list_json', 'required'),
			array('id, event_type_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('description', 'length', 'max'=>250),
			array('address', 'length', 'max'=>200),
			array('url', 'length', 'max'=>250),
                        array('url', 'url', 'defaultScheme' => 'http://'),//This rule defines that url field should be a valid url.
			array('location', 'length', 'max'=>50),
			//array('category_list_json', 'length', 'max'=>200),
			array('related_event_list_json', 'length', 'max'=>200),
			array('suggest_another_event_related', 'length', 'max'=>250),
			array('discipline', 'length', 'max'=>100),
			array('creator_username', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, date, address, url, event_type_id, location, promotor_id, discipline, creator_username', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    //'User'=>array(self::BELONGS_TO,'User','involved_user_id'),
                    //'Involvement_mode'=>array(self::BELONGS_TO,'InvolvementModes','involvement_mode_id'),
                    'Event_type'=>array(self::BELONGS_TO,'EventTypes','event_type_id'),
                    'Promotor'=>array(self::BELONGS_TO,'Promotors','promotor_id'),
                    //'Category'=>array(self::BELONGS_TO,'Categories','category_id'),
                    //'Creator_user'=>array(self::BELONGS_TO,'User','creator_user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'date' => 'Date',
			'address' => 'Direction',
			'url' => 'Link',
			'event_type_id' => 'Event Type',
			'location' => 'Location',
			'related_event_list_json' => 'This event is related with...',
			'suggest_another_event_related' => 'Suggest another (Event related)',
			'promotor_id' => 'Promotor',
			'discipline' => 'Discipline',
			'creator_username' => 'Creator User',
                    
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                
                //$criteria->with = array('Creator_user');

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
                $criteria->compare('url',$this->url,true);
                $criteria->compare('event_type_id',$this->event_type_id);
                $criteria->compare('date',$this->date,true);
                $criteria->compare('description',$this->description,true);
		$criteria->compare('location',$this->location,true);
                $criteria->compare('address',$this->address,true);
		$criteria->compare('related_event_list_json',$this->related_event_list_json);
		$criteria->compare('suggest_another_event_related',$this->suggest_another_event_related,true);
		$criteria->compare('promotor_id',$this->promotor_id);
                //$criteria->compare('category_id',$this->Category->category);
                $criteria->compare('discipline',$this->discipline,true);
                $criteria->compare('creator_username',$this->creator_username,true);
                //$criteria->compare('Creator_user.user.username',$this->Creator_user_search, true);
                //$criteria->addCondition( 't.id IN (SELECT id FROM user WHERE username LIKE :uname)' );
                //$criteria->params[':uname'] = '%' . $this->creator_user_id . '%';
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Event the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
