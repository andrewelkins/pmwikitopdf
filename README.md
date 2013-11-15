# PMWiki to PDF

This is a recipe for PMWiki that outputs a page to PDF.

##Navigate to the cookbook directory
        cd /path/to/pmwiki/cookbook

##Checkout PMWikiToPdf

        git clone git://github.com/andrew13/pmwikitopdf.git pmwikitopdf

## Use Composer to install dependencies
### Option 1: Composer is not installed globally

    cd laravel
        curl -s http://getcomposer.org/installer | php
        php composer.phar install
### Option 2: Composer is installed globally

    cd laravel
        composer install

## Add Parameters to local/config.php

        //PMWiki To PDF
        include_once('cookbook/pmwikitopdf/pdf.php');
        //$ActionSkin['pdf'] = 'print'; // Skin used in output

## Add action pdf to any url and the pdf will be created

        http://example.org/?action=pdf

Based on [GeneratePDF](http://www.pmwiki.org/wiki/Cookbook/GeneratePDF)

