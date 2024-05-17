<?php

namespace Elgentos\Rumvision\Api;

interface ConfigurationInterface
{
    public const CONFIG_RUMVISION_ENABLED       = 'elgentos_rumvision/general/enabled',
                 CONFIG_RUMVISION_TRACKING_ID   = 'elgentos_rumvision/general/tracking_id',
                 CONFIG_RUMVISION_HOST_NAME     = 'elgentos_rumvision/general/hostname';

    public function isEnabled(int $storeId = null): bool;

    public function getTrackingId(int $storeId = null) :string;

    public function getHostName(int $storeId = null) :string;

}