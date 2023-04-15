<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $id
 * @property string $department
 *
 * @property Employees[] $employees
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department'], 'required'],
            [['department'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'department' => 'Department',
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employees::class, ['department_id' => 'id']);
    }
}
