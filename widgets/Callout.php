<?php
namespace blackho1e\adminlte\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class Callout extends Widget
{
    const TYPE_SUCCESS = 'success';
    const TYPE_INFO = 'info';
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';

    public $options = [];

    public $type;

    public $body;

    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        Html::addCssClass($this->options, 'callout' . (!empty($this->type) ? ' callout-' . $this->type : ''));
        echo Html::beginTag('div', $this->options);
    }

    public function run()
    {
        echo $this->body;
        echo Html::endTag('div');
    }
}
