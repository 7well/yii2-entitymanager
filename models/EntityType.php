<?php
/*
 * This file is part of the julatools project.
 *
 * (c) julatools project <http://github.com/julatools/> by CHD Electronic Engineering
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace julatools\entitymanager\models;

use Yii;

/**
 * This is the model class for table "{{%sys_entity_type}}".
 *
 * @property integer $ID
 * @property string $type
 *
 * @property SysEntityEditor[] $sysEntityEditors
 * @property SysEntityFormatter[] $sysEntityFormatters
 * @author Christian Dumhart <christian.dumhart@chd.at>
 */
class EntityType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sys_entity_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('entitymanager', 'ID'),
            'type' => Yii::t('entitymanager', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSysEntityEditors()
    {
        return $this->hasMany(EntityEditor::className(), ['entity_type_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSysEntityFormatters()
    {
        return $this->hasMany(EntityFormatter::className(), ['entity_type_ID' => 'ID']);
    }
}