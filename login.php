<?php
// Include the class file
require 'ClassAutoload.php';

// Create instances when needed
$layout = new layouts();
$forms = new forms();

$layout->header($conf);
$forms->signin();
$layout->footer($conf);