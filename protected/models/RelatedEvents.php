<?php

/**
 * This is the model class for table "related_events".
 *
 * The followings are the available columns in table 'related_events':
 * @property integer $id
 * @property string $related_event
 */
class RelatedEvents extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'related_events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, related_event', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('related_event', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, related_event', 'safe', 'on'=>'search'),
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
		);
	}
        
        /**
	 * @return array relational with Promotors Id and Promotors Name to use in dropDownList.
	 */
        public static function getRelatedEvents($key=null){
            
            $data = RelatedEvents::model()->findAll(array('order'=>'related_event'));
            
            $return=array();
            //$return=array(''=>'Select...');
            
            foreach($data as $s)
            {
                $return[$s->id] = ucfirst($s->related_event);
            }
            
            return $return;           
            
        }
        
        /**
	 * @return array relational with Category Id and Category Name to use in dropDownList.
	 */
        public static function getRelatedEventsSearchForm($key=null){
            
            $data = RelatedEvents::model()->findAll(array('order'=>'related_event'));
            
            //$return=array();
            $return=array(''=>'Select...');
            
            foreach($data as $s)
            {
                $return[$s->id] = ucfirst($s->related_event);
            }
            
            return $return;           
            
        }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'related_event' => 'Related Event',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('related_event',$this->related_event,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RelatedEvents the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
