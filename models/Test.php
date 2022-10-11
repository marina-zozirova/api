<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property string|null $info
 * @property string|null $name
 * @property string|null $author
 * @property int|null $stargazers
 * @property int|null $watchers
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stargazers', 'watchers'], 'integer'],
            [['info', 'name', 'author'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'info' => 'Info',
            'name' => 'Name',
            'author' => 'Author',
            'stargazers' => 'Stargazers',
            'watchers' => 'Watchers',
        ];
    }
}
