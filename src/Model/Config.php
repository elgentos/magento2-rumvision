<?php declare(strict_types=1);

/**
 * Copyright © Elgentos. All rights reserved.
 * https://elgentos.nl
 */

namespace Elgentos\Rumvision\Model;

use Elgentos\Rumvision\Api\ConfigurationInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

class Config implements ConfigurationInterface
{
    /**
     * @param ScopeConfigInterface $config
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        private ScopeConfigInterface $config,
        private StoreManagerInterface $storeManager,
    ) {}

    public function isEnabled(int $storeId = null): bool
    {
        return (bool)$this->config->getValue(self::CONFIG_RUMVISION_ENALBED, ScopeInterface::SCOPE_STORE, $this->getStoreId($storeId));
    }

    public function getTrackingId(int $storeId = null): string
    {
        return (string)$this->config->getValue(self::CONFIG_RUMVISION_TRACKING_ID, ScopeInterface::SCOPE_STORE, $this->getStoreId($storeId));
    }

    public function getHostName(int $storeId = null): string
    {
        return (string)$this->config->getValue(self::CONFIG_RUMVISION_HOST_NAME, ScopeInterface::SCOPE_STORE, $this->getStoreId($storeId));
    }

    public function getStoreId(int $storeId = null) :int
    {
        return (int)$this->storeManager
            ->getStore($storeId)
            ->getId();
    }

}
