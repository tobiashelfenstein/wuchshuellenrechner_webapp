<?php

require_once __DIR__ . '/lib/private/Session.php';

$session = \Wuchshuellenrechner\Library\Session::getInstance();
$session->destroy();

echo "Session zurückgesetzt!";
