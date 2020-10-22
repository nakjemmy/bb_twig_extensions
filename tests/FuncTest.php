<?php

use Uhg\BoxBillingAddonsExtensions;

require_once '../vendor/autoload.php';


$extensions = new BoxBillingAddonsExtensions();
print_r($extensions->getFunctions());