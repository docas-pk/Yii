<?php
namespace app\behaviors;

use yii\base\Behavior;

class EatBehavior extends Behavior
{
    public $height;
    public function eat()
    {
        echo 'dog eat';
    }
}