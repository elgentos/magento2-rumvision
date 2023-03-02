<?php declare(strict_types=1);
/**
 * Copyright © Elgentos. All rights reserved.
 * https://elgentos.nl
 */

namespace Elgentos\Rumvision\ViewModel;

use Elgentos\Rumvision\Model\Config;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Rumvision implements ArgumentInterface
{
    public function __construct(
        private Config $config
    )
    {}

    public function shouldIncludeScript(): ?bool
    {
        return (bool)$this->config->isEnabled()
            && (bool)$this->config->getTrackingId();
    }

    public function getTrackingId() :string
    {
        return $this->config->getTrackingId();
    }

    public function getHostName() :string
    {
        return $this->config->getHostName();
    }
}
