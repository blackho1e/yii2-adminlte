<?php
namespace blackho1e\adminlte\assets;

use yii\web\AssetBundle;

class AdminLteAsset extends AssetBundle
{
    public $skin = 'blue';
    public $sourcePath = '@vendor/almasaeed2010/adminlte/dist';
    public $css = [
        'css/AdminLTE.min.css',
    ];
    public $js = [
        'js/app.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'blackho1e\fontawesome\FontAwesomeAsset',
    ];

    public function init()
    {
        parent::init();
        $this->css[] = 'css/skins/skin-' . $this->skin . '.min.css';
    }
}
