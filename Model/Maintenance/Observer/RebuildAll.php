<?php
/**
 * @category       MageDawg
 * @package        Magento 2 Custom Maintenance
 * @copyright      Copyright (c) 2018 MageDawg
 * @license        http://opensource.org/licenses/osl-3.0.php
 */

namespace MageDawg\CustomMaintenance\Model\Maintenance\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class RebuildAll extends AbstractObserver
{
    public function execute(Observer $observer)
    {
        try {
            $this->maintenance->rebuild();
        } catch (\Exception $e) {
            $this->errorHandler->handle($e, 'Problem with rebuilding maintenance views');
        }
    }
}
