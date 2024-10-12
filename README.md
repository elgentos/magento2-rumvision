# Elgentos RUMvision Frontend implementation module

    composer require elgentos/magento2-rumvision

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)


## Main Functionalities
Magento2 extension for the frontend implementation of RUMvision. You can find more information about rumvision on this page: https://www.rumvision.com/.

## Installation
 - Install the module composer by running `composer(2) require elgentos/magento2-rumvision`
 - enable the module by running `php bin/magento module:enable Elgentos_Rumvision`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

## Configuration
Next is to set the correct database settings for the module. From RUMvision you need the TrackingID and the hostname configured in the tool at: https://insights.rumvision.com

- Go to: `Stores > Configuration > Elgentos > RUMvision`
- Enabled the frontend implementation
- Set the Tracking ID
- Set the hostname

Set this in the backend of magento:

![image](https://user-images.githubusercontent.com/5089604/222476330-62a2d3df-b91c-4311-946a-0fb2137b778c.png)

Output will be this script in the `before.body.end` container.

![image](https://user-images.githubusercontent.com/5089604/222476703-417395cc-4bd6-4025-b3ef-98ee10019130.png)
