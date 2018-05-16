<?php
/**
 * @category       MageDawg
 * @package        Magento 2 Custom Maintenance
 * @copyright      Copyright (c) 2018 MageDawg
 * @license        http://magedawg.com/license/
 */

namespace MageDawg\CustomMaintenance\Controller\Adminhtml\Rebuild;

use MageDawg\CustomMaintenance\Controller\Adminhtml\AbstractAction;

class Rebuild extends AbstractAction
{
    public function execute()
    {
        try {
            $this->maintenance->rebuild();

            $this->messageManager->addSuccessMessage('Custom Maintenance Page successfully rebuilt');
        } catch (\Exception $e) {
            $this->errorHandler->handle($e, 'Unknown problem with rebuilding maintenance views');
        }

        return $this->redirectReferralResponse();
    }
}
