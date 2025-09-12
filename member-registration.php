<?php
require 'ClassAutoload.php';
$layout = new layouts();
$forms = new forms();
$layout->header($conf);
$forms->member_registration();
$layout->footer($conf);
?>
