<?php
/**
 * @category       MageDawg
 * @package        Magento 2 Custom Maintenance
 * @copyright      Copyright (c) 2018 MageDawg
 * @license        http://opensource.org/licenses/osl-3.0.php
 */

namespace MageDawg\Error;

use Magento\Framework\App\Bootstrap;

require_once BP . '/app/bootstrap.php';
require_once BP . '/pub/errors/processor.php';
require_once BP . '/pub/errors/magedawg_maintenance/processor.php';

class ProcessorFactory
{    
    public function createProcessor()
    {
        $objectManagerFactory = Bootstrap::createObjectManagerFactory(BP, $_SERVER);
        $objectManager = $objectManagerFactory->create($_SERVER);
        $request = $objectManager->create('Magento\Framework\App\Request\Http');
        $response = $objectManager->create('Magento\Framework\App\Response\Http');
        $logger = $objectManager->create('Psr\Log\LoggerInterface');

        return new Processor($request, $response, $logger);
    }
}
