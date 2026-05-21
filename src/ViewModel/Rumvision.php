<?php declare(strict_types=1);
/**
 * Copyright © Elgentos. All rights reserved.
 * https://elgentos.nl
 */

namespace Elgentos\Rumvision\ViewModel;

use Elgentos\Rumvision\Api\ConfigurationInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Rumvision implements ArgumentInterface
{
    public function __construct(
        private ConfigurationInterface $configuration
    ) {}

    public function shouldIncludeScript(): bool
    {
        $isEnabled = $this->configuration
                ->isEnabled();
        $trackingId = $this->configuration
                ->getTrackingId();

        return $isEnabled && $trackingId;
    }

    public function getTrackingId() :string
    {
        $trackingId = $this->configuration->getTrackingId();
        return str_starts_with($trackingId, 'RUM-') ? $trackingId : sprintf('RUM-%s', $trackingId);
    }

    public function getHostName() :string
    {
        return $this->configuration
                ->getHostName();
    }

    public function getSamplingRate() :int
    {
        return $this->configuration->getSamplingRate();
    }

    public function getExcludedBotPatterns() :array
    {
        $patterns = $this->configuration->getExcludedBotPatterns();

        if (empty($patterns)) {
            return [];
        }

        return array_filter(array_map('trim', explode("\n", $patterns)));
    }
}
