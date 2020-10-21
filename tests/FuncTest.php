<?php
require_once '../vendor/autoload.php';




use Main\BoxBillingAddonsExtensions;

$extensions = new BoxBillingAddonsExtensions();
print_r($extensions->getFunctions());