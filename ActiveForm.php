<?php

namespace softcommerce\bootstrap\material;

use yii\base\InvalidConfigException;
use yii\helpers\Html;

class ActiveForm extends \yii\bootstrap\ActiveForm
{
    const LAYOUT_DEFAULT = 'default';
    const LAYOUT_HORIZONTAL = 'horizontal';
    const LAYOUT_INLINE = 'inline';
    const LAYOUT_FLOATING = 'floating';

    public $layout = self::LAYOUT_FLOATING;
    public $fieldClass = 'softcommerce\bootstrap\material\ActiveField';

    public function init()
    {
        if (!in_array($this->layout, [
            self::LAYOUT_DEFAULT,
            self::LAYOUT_HORIZONTAL,
            self::LAYOUT_INLINE,
            self::LAYOUT_FLOATING,
        ])) {
            throw new InvalidConfigException('Invalid layout type: ' . $this->layout);
        }

        if ($this->layout !== self::LAYOUT_DEFAULT) {
            Html::addCssClass($this->options, 'form-' . $this->layout);
        }
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        echo Html::beginForm($this->action, $this->method, $this->options);
    }
}
