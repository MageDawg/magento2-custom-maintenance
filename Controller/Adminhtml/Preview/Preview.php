<?php
/**
 * @category       MageDawg
 * @package        Magento 2 Custom Maintenance
 * @copyright      Copyright (c) 2018 MageDawg
 * @license        http://magedawg.com/license/
 */

namespace MageDawg\CustomMaintenance\Controller\Adminhtml\Preview;

use MageDawg\CustomMaintenance\Controller\Adminhtml\AbstractAction;
use MageDawg\CustomMaintenance\Block\Adminhtml\Maintenance\Page as MaintenancePage;

class Preview extends AbstractAction
{
    public function execute()
    {
        try {
            $output = $this->blockFactory
                ->createBlock(MaintenancePage::class, [
                    'data' => [
                        'store_id' => $this->getRequest()->getParam('store_id'),
                        'area' => 'frontend',
                    ],
                ])->toHtml();

            return $this->resultRawFactory->create()->setContents($output);
        } catch (\Exception $e) {
            $this->errorHandler->handle($e, 'Cannot generate preview');

            return $this->redirectReferralResponse();
        }
    }
}
