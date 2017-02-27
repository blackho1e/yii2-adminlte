<?php
namespace blackho1e\adminlte\widgets;

use yii\bootstrap\Widget;
use yii\helpers\Html;
use blackho1e\fontawesome\FontAwesome as FA;

class Box extends Widget
{
    const TYPE_DANGER = 'danger';
    const TYPE_INFO = 'info';
    const TYPE_PRIMARY = 'primary';
    const TYPE_SUCCESS = 'success';
    const TYPE_WARNING = 'warning';

    protected $tools;

    public $header;

    public $icon;

    public $type = 'default';

    public $expandable = false;

    public $collapsable = false;

    public $removable = false;

    public $filled = false;

    protected function initTools()
    {
        if ($this->expandable || $this->collapsable) {
            $this->tools .= Html::button(
                FA::icon($this->expandable ? 'plus' : 'minus'),
                [
                    'class' => 'btn btn-box-tool',
                    'data-widget' => 'collapse',
                ]
            );
            if ($this->expandable) {
                Html::addCssClass($this->options, 'collapsed-box');
            }
        }
        if ($this->removable) {
            $this->tools .= Html::button(
                FA::icon('times'),
                [
                    'class' => 'btn btn-box-tool',
                    'data-widget' => 'remove',
                ]
            );
        }
    }

    public function init()
    {
        parent::init();
        $this->initTools();
        Html::addCssClass($this->options, 'box box-' . $this->type);
        if ($this->filled) {
            Html::addCssClass($this->options, 'box-solid');
        }
        echo Html::beginTag('div', $this->options);
        if (isset($this->header)) {
            echo Html::beginTag('div', ['class' => 'box-header']);
            echo Html::tag(
                'h3',
                (isset($this->icon) ? FA::icon($this->icon) . '&nbsp;' : '') . $this->header,
                ['class' => 'box-title']
            );
            if (!empty($this->tools)) {
                echo Html::tag('div', $this->tools, ['class' => 'box-tools pull-right']);
            }
            echo Html::endTag('div');
        }
        echo Html::beginTag('div', ['class' => 'box-body']);
    }

    public function run()
    {
        echo Html::endTag('div');
        echo Html::endTag('div');
        parent::run();
    }
}
