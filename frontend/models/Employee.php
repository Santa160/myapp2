<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property string $name
 * @property int $department_id
 * @property int $emp_id
 * @property string $contact
 *
 * @property Department $department
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public $department_name;
    public function rules()
    {
        return [
            [['name', 'department_id', 'emp_id', 'contact'], 'required'],
            [['department_id', 'emp_id'], 'integer'],
            [['name','department_name'], 'string', 'max' => 255],
            [['contact'], 'string', 'max' => 225],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::class, 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'department_id' => 'Department Name',
            'emp_id' => 'Emp ID',
            'contact' => 'Contact',
            'department_name'=>'Department'
        ];
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::class, ['id' => 'department_id']);
    }
}
