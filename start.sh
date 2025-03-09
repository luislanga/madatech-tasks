#!/bin/bash

composer require agungsugiarto/codeigniter4-cors
composer install
php spark cors:publish
