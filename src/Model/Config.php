<?php declare(strict_types=1);

/**
 * Copyright © Elgentos. All rights reserved.
 * https://elgentos.nl
 */

namespace Elgentos\Rumvision\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class Config
{
    private const CONFIG_RUMVISION_ENALBED = 'elgentos/rumvision';
    private const CONFIG_RUMVISION_TRACKING_ID = 'elgentos/rumvision/oauth2/state';
    private const CONFIG_RUMVISION_HOST_NAME = 'elgentos/rumvision/oauth2/state';

    /**
     * @param ScopeConfigInterface $config
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        private ScopeConfigInterface $config,
        private StoreManagerInterface $storeManager,
    ) {}

    public function isEnabled() :bool
    {
        return (bool)$this->config->getValue(self::CONFIG_RUMVISION_ENALBED, ScopeInterface::SCOPE_STORE, $this->getStoreId());
    }

    public function getTrackingId() :string
    {
        return $this->config->getValue(self::CONFIG_RUMVISION_TRACKING_ID, ScopeInterface::SCOPE_STORE, $this->getStoreId());
    }

    public function getHostName() :string
    {
        return $this->config->getValue(self::CONFIG_RUMVISION_HOST_NAME, ScopeInterface::SCOPE_STORE, $this->getStoreId());
    }

    public function getStoreId() :int
    {
        return (int)$this->storeManager->getStore()->getId();
    }
}
