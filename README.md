# Elgentos RumVision Frontend implementation module

    ``elgentos/module-rumvison``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)


## Main Functionalities
Magento2 extension for the frontend implementation of RUMVision

## Installation
\* = in production please use the `--keep-generated` option

 - Install the module composer by running `composer(2) require elgentos/module-rumvison`
 - enable the module by running `php bin/magento module:enable Elgentos_Rumvison`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

## Configuration

Next is to set the correct database settings for the module. From RUMVision you need the TrackingID and the hostname configured in the tool

- Go to: `Systeem > Configuration > Elgentos > Rumvision`
- Enabled the frontend implementation
- Set the Tracking ID
- Set the hostname
