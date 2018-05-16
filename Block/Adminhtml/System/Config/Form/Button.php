<?php
/**
 * @category       MageDawg
 * @package        Magento 2 Custom Maintenance
 * @copyright      Copyright (c) 2018 MageDawg
 * @license        http://opensource.org/licenses/osl-3.0.php
 */

namespace MageDawg\CustomMaintenance\Block\Adminhtml\System\Config\Form;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Button extends Field
{
    protected function _getElementHtml(AbstractElement $element)
    {
        $url = $this->getUrl('adminhtml/rebuild/rebuild');

        $button = $this->getLayout()->createBlock('Magento\Backend\Block\Widget\Button')
            ->setData([
                'id' => 'rebuild_button',
                'label' => __('Rebuild'),
                'onclick' => "window.location='{$url}';",
            ]);

        return $button->toHtml();
    }
}
