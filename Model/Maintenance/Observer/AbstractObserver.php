<?php
/**
 * @category       MageDawg
 * @package        Magento 2 Custom Maintenance
 * @copyright      Copyright (c) 2018 MageDawg
 * @license        http://opensource.org/licenses/osl-3.0.php
 */

namespace MageDawg\CustomMaintenance\Model\Maintenance\Observer;

use MageDawg\CustomMaintenance\Model\Adminhtml\Error\Handler;
use MageDawg\CustomMaintenance\Model\Maintenance;
use Magento\Framework\Event\ObserverInterface;

abstract class AbstractObserver implements ObserverInterface
{
    /** @var Maintenance */
    protected $maintenance;

    /** @var Handler */
    protected $errorHandler;

    public function __construct(Maintenance $maintenance, Handler $errorHandler)
    {
        $this->maintenance = $maintenance;
        $this->errorHandler = $errorHandler;
    }
}
