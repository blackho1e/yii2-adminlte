<?php
namespace blackho1e\adminlte\widgets;

use yii\bootstrap\Widget;
use yii\helpers\Html;
use blackho1e\fontawesome\FontAwesome as FA;

class InfoBox extends Widget
{
    public $color;

    public $icon;

    public $text;

    public $number;

    public $filled = false;

    public $progress;

    public $progressDescription;

    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'info-box');
        if ($this->filled && !empty($this->color)) {
            Html::addCssClass($this->options, $this->color);
        }
        if ($this->progress !== null) {
            if ($this->progress > 100) {
                $this->progress = 100;
            } elseif ($this->progress < 0) {
                $this->progress = 0;
            }
        }
    }

    public function run()
    {
        echo Html::beginTag('div', $this->options);
        if (!empty($this->icon)) {
            echo Html::tag(
                'span',
                FA::icon($this->icon),
                [
                    'class' => 'info-box-icon ' . (!$this->filled && !empty($this->color) ? $this->color : ''),
                ]
            );
        }
        echo Html::beginTag('div', ['class' => 'info-box-content']);
        echo Html::tag('span', $this->text, ['class' => 'info-box-text']);
        echo Html::tag('span', $this->number, ['class' => 'info-box-number']);
        if ($this->progress !== null) {
            echo Html::tag(
                'div',
                Html::tag('div', '', ['class' => 'progress-bar', 'style' => 'width: ' . (int) $this->progress . '%']),
                ['class' => 'progress']
            );
        }
        echo Html::tag('span', $this->progressDescription, ['class' => 'progress-description']);
        echo Html::endTag('div');
        echo Html::endTag('div');
    }
}
