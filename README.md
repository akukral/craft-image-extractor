# Image Extractor

Extract every image from existing asset fields from an entry or field recursivley including nested matrix fields.

## Requirements

This plugin requires Craft CMS 5.2.0 or later, and PHP 8.2 or later.

## Installation

You can install this plugin from the Plugin Store or with Composer.

#### From the Plugin Store

Go to the Plugin Store in your project’s Control Panel and search for “Image Extrator”. Then press “Install”.

#### With Composer

Open your terminal and run the following commands:

```bash
# go to the project directory
cd /path/to/my-project.test

# tell Composer to load the plugin
composer require akukral/craft-image-extratcor

# tell Craft to install the plugin
./craft plugin/install image-extractor
```


### Usage

In your Twig templates:

```
{% set entry = craft.entries.id(123).one() %}
{% set allImages = entry.getAllImages() %}

{% for image in allImages %}
    <img src="{{ image.url }}" alt="{{ image.title }}">
{% endfor %}
```
