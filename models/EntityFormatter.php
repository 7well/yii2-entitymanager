<?php
/*
 * This file is part of the chd7well project.
 *
 * (c) chd7well project <http://github.com/chd7well/> by CHD Electronic Engineering
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace chd7well\entitymanager\models;

use Yii;

/**
 * This is the model class for table "{{%sys_entity_formatter}}".
 *
 * @property integer $ID
 * @property integer $entity_type_ID
 * @property string $name
 * @property string $formatter
 *
 * @property SysEntityType $entityType
 * @author Christian Dumhart <christian.dumhart@chd.at>
 */
class EntityFormatter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sys_entity_formatter}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entity_type_ID', 'name'], 'required'],
            [['entity_type_ID'], 'integer'],
            [['name', 'formatter'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('smartmenu', 'ID'),
            'entity_type_ID' => Yii::t('smartmenu', 'Entity Type  ID'),
            'name' => Yii::t('smartmenu', 'Name'),
            'formatter' => Yii::t('smartmenu', 'Formatter'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntityType()
    {
        return $this->hasOne(SysEntityType::className(), ['ID' => 'entity_type_ID']);
    }
}