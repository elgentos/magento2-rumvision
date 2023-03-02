# Elgentos RumVision Frontend implementation module

    `elgentos/module-rumvision`

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)


## Main Functionalities
Magento2 extension for the frontend implementation of RUMvision

## Installation
 - Install the module composer by running `composer(2) require elgentos/module-rumvison`
 - enable the module by running `php bin/magento module:enable Elgentos_Rumvison`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

## Configuration
Next is to set the correct database settings for the module. From RUMvision you need the TrackingID and the hostname configured in the tool

- Go to: `Stores > Configuration > Elgentos > RUMvision`
- Enabled the frontend implementation
- Set the Tracking ID
- Set the hostname
