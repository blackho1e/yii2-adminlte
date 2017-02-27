<?php
namespace blackho1e\adminlte\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use blackho1e\fontawesome\FontAwesome as FA;

class Menu extends \yii\widgets\Menu
{
    public $labelTemplate = '{label}';

    public $linkTemplate = '<a href="{url}">{icon}<span>{label}</span>{badge}</a>';

    public $submenuTemplate = "\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n";

    public $activateParents = true;

    public function init()
    {
        Html::addCssClass($this->options, 'sidebar-menu');
        parent::init();
    }

    protected function renderItem($item)
    {
        $renderedItem = parent::renderItem($item);
        if (isset($item['badge'])) {
            $badgeOptions = ArrayHelper::getValue($item, 'badgeOptions', []);
            Html::addCssClass($badgeOptions, 'label pull-right');
        } else {
            $badgeOptions = null;
        }
        return strtr(
            $renderedItem,
            [
                '{icon}' => isset($item['icon'])
                    ? FA::icon($item['icon'], ArrayHelper::getValue($item, 'iconOptions', []))
                    : '',
                '{badge}' => (
                    isset($item['badge'])
                        ? Html::tag('small', $item['badge'], $badgeOptions)
                        : ''
                    ) . (
                    isset($item['items']) && count($item['items']) > 0
                        ? FA::icon('fa fa-angle-left pull-right')
                        : ''
                    ),
            ]
        );
    }
}
