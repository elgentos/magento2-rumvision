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
use Magento\Framework\App\State;

class Config implements ConfigurationInterface
{
    public function __construct(
        private ScopeConfigInterface $config,
        private StoreManagerInterface $storeManager,
        private State $appState,
    ) {}

    public function isEnabled(?int $storeId = null): bool
    {
        if ($this->appState->getMode() === State::MODE_DEVELOPER) {
            // Don't run in developer mode
            return false;
        }

        return (bool)$this->config->getValue(
            self::CONFIG_RUMVISION_ENABLED,
            ScopeInterface::SCOPE_STORE,
            $this->getStoreId($storeId)
        );
    }

    public function getTrackingId(?int $storeId = null): string
    {
        return (string)$this->config->getValue(
            self::CONFIG_RUMVISION_TRACKING_ID,
            ScopeInterface::SCOPE_STORE,
            $this->getStoreId($storeId)
        );
    }

    public function getHostName(?int $storeId = null): string
    {
        return (string)$this->config->getValue(
            self::CONFIG_RUMVISION_HOST_NAME,
            ScopeInterface::SCOPE_STORE,
            $this->getStoreId($storeId)
        );
    }

    public function getSamplingRate(?int $storeId = null): int
    {
        $value = (int)$this->config->getValue(
            self::CONFIG_RUMVISION_SAMPLING_RATE,
            ScopeInterface::SCOPE_STORE,
            $this->getStoreId($storeId)
        );

        return ($value > 0 && $value <= 100) ? $value : 100;
    }

    public function getStoreId(?int $storeId = null) :int
    {
        return (int)$this->storeManager
            ->getStore($storeId)
            ->getId();
    }

}
