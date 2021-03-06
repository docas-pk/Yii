<?php

namespace app\modules\article;

/**
 * article module definition class
 */
class Article extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\article\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $this->modules = [
            'category' => [
                'class' => 'app\modules\article\modules\category\Category',
            ],
        ];
        // custom initialization code goes here
    }
}
