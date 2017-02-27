<?php
namespace blackho1e\adminlte\widgets;

use Yii;
use yii\base\Widget;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use blackho1e\fontawesome\FontAwesome as FA;

class FlashAlert extends Widget
{
    public $options = [];

    public $flashes = [
        'success' => [
            'class' => 'success',
            'header' => 'Success!',
            'icon' => 'check',
        ],
        'info' => [
            'class' => 'info',
            'header' => 'Info!',
            'icon' => 'info-circle',
        ],
        'warning' => [
            'class' => 'warning',
            'header' => 'Warning!',
            'icon' => 'warning',
        ],
        'error' => [
            'class' => 'error',
            'header' => 'Error!',
            'icon' => 'ban',
        ],
    ];

    public $showHeader = false;

    public function run()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        echo Html::beginTag('div', $this->options);
        foreach ($this->flashes as $flashName => $alert) {
            if (Yii::$app->session->hasFlash($flashName)) {
                $header = '';
                if ($this->showHeader) {
                    $header = Html::tag(
                        'h4',
                        (isset($alert['icon']) ? FA::icon($alert['icon']) . '&nbsp;' : '') . $alert['header']
                    );
                }
                echo Alert::widget(
                    [
                        'body' => $header . Yii::$app->session->getFlash($flashName),
                        'options' => [
                            'class' => 'alert alert-' . $alert['class'],
                        ],
                    ]
                );
            }
        }
        echo Html::endTag('div');
    }
}
