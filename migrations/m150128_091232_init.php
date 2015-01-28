<?php

use yii\db\Schema;
use yii\db\Migration;

class m150128_091232_init extends Migration
{
    public function up()
    {
    	$this->createTable('{{%sys_entity_type}}', [
    			'ID'                   => Schema::TYPE_PK,
    			'type'           	 => Schema::TYPE_STRING . '(255) NOT NULL',
    	]);
    	$this->createTable('{{%sys_entity_editor}}', [
    			'ID'                   => Schema::TYPE_PK,
    			'entity_type_ID'       => Schema::TYPE_INTEGER . ' NOT NULL',
    			'name'           	   => Schema::TYPE_STRING . '(255) NOT NULL',
    			'editor'           	 => Schema::TYPE_STRING,
    	]);
    	$this->createTable('{{%sys_entity_formatter}}', [
    			'ID'                   => Schema::TYPE_PK,
    			'entity_type_ID'       => Schema::TYPE_INTEGER . ' NOT NULL',
    			'name'           	   => Schema::TYPE_STRING . '(255) NOT NULL',
    			'formatter'            => Schema::TYPE_STRING,
    	]);
    	$this->addForeignKey('fk_sys_entity_editor_entity_type', '{{%sys_entity_editor}}', 'entity_type_ID', '{{%sys_entity_type}}', 'ID', 'CASCADE');
    	$this->addForeignKey('fk_sys_entity_formatter_entity_type', '{{%sys_entity_formatter}}', 'entity_type_ID', '{{%sys_entity_type}}', 'ID', 'CASCADE');
    }

    public function down()
    {
    	$this->dropTable('{{%sys_parameter}}');
    }
}
