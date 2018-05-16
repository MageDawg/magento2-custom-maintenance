<?php
/**
 * @category       MageDawg
 * @package        Magento 2 Custom Maintenance
 * @copyright      Copyright (c) 2018 MageDawg
 * @license        http://opensource.org/licenses/osl-3.0.php
 */

namespace MageDawg\CustomMaintenance\Model\Adminhtml\Error;

use MageDawg\CustomMaintenance\Model\MaintenanceException;
use Magento\Framework\App\State;
use Magento\Framework\Message\ManagerInterface;
use Psr\Log\LoggerInterface;

class Handler
{
    /** @var LoggerInterface */
    protected $logger;

    /** @var State */
    protected $appState;

    /** @var ManagerInterface */
    protected $messageManager;

    public function __construct(LoggerInterface $logger, State $appState, ManagerInterface $messageManager)
    {
        $this->logger = $logger;
        $this->appState = $appState;
        $this->messageManager = $messageManager;
    }

    public function handle(\Exception $e, $message)
    {
        $causedBy = '';
        if ($e instanceof MaintenanceException || $this->isDeveloperMode()) {
            $causedBy .= "\n<br>\nCaused by: " . $e->getMessage();
        }

        $this->logger->critical($e);
        $this->messageManager->addErrorMessage($message . $causedBy);
    }

    protected function isDeveloperMode()
    {
        return $this->appState->getMode() == State::MODE_DEVELOPER;
    }
}
