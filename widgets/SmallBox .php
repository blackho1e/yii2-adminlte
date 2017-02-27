<?php
namespace blackho1e\adminlte\widgets;

use yii\bootstrap\Widget;
use yii\helpers\Html;
use blackho1e\fontawesome\FontAwesome as FA;

class SmallBox extends Widget
{
    public $color;

    public $icon;

    public $header;

    public $linkLabel = 'More info <i class="fa fa-arrow-circle-right"></i>';

    public $linkRoute = '#';

    public $text;

    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'small-box');
        if (!empty($this->color)) {
            Html::addCssClass($this->options, $this->color);
        }
    }

    public function run()
    {
        echo Html::beginTag('div', $this->options);
        echo Html::tag(
            'div',
            Html::tag('h3', $this->header) . Html::tag('p', $this->text),
            ['class' => 'inner']
        );
        if (!empty($this->icon)) {
            echo Html::tag('div', FA::icon($this->icon), ['class' => 'icon']);
        }
        if (!empty($this->linkLabel)) {
            echo Html::a($this->linkLabel, $this->linkRoute, ['class' => 'small-box-footer']);
        }
        echo Html::endTag('div');
        parent::run();
    }
}
