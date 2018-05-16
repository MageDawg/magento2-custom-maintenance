<?php

namespace MageDawg\CustomMaintenance\Setup;

use MageDawg\CustomMaintenance\Model\Maintenance;
use Magento\Framework\App\State;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @category       MageDawg
 * @package        Magento 2 Custom Maintenance
 * @copyright      Copyright (c) 2018 MageDawg
 * @license        http://opensource.org/licenses/osl-3.0.php
 */
class InstallData implements InstallDataInterface
{
    /** @var Maintenance */
    protected $maintenance;

    /** @var State */
    protected $appState;

    public function __construct(Maintenance $maintenance, State $appState)
    {
        $this->maintenance = $maintenance;
        $this->appState = $appState;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $this->appState->emulateAreaCode('frontend', function () {
            $this->maintenance->rebuild();
        });
    }
}
