# Vectra Add to cart popup module

`vectra/minicartslider`

- [Vectra Minicart slide out](#vectra-minicartslider)
    - [Main Functionalities](#main-functionalities)
    - [Installation](#installation)
    - [Configuration](#configuration)

## Main Functionalities

Brief description of what module does.

```bash
A module which provides a cart slide out from the right instead of the traditional cart hover. Module has the option to display a selected CMS block when minicart is empty. Content Manager can select a dropdown list of static blocks. for empty cart CMS block.
```

## Installation

Add the following to your main composer.json file:

```json
    "repositories": [
        ...
        {
            "type": "vcs",
            "url": "https://bitbucket.org/artcev/vectra-minicart-slider.git"
        }
    ]
```

Next, install the module via composer as follows:

```bash
$ composer require vectra/addtocartpopup:1.0.0
$ composer update -vvv
```

After the composer installation has finished, active the module by running the following commands from your Magento 2 root directory:

```bash
$ php bin/magento module:enable Vectra_MiniCartSlider

$ php bin/magento setup:upgrade;
$ php bin/magento di:compile;
```

## Configuration

Configuration needed for module to work.

```bash
Module can be enabled/disabled in admin. It display under Stores > Configuration > Vectra > Minicart slide out
```