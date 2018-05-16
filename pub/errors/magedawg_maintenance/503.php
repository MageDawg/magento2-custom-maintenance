<?php

require_once 'processorFactory.php';
$processorFactory = new \MageDawg\Error\ProcessorFactory;
$processor = $processorFactory->createProcessor();
$response = $processor->process();
$response->sendResponse();
