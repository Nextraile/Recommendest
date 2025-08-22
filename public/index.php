<?php

require_once __DIR__ . '/../app/autoload.php';
$Kepin = new user($conn);

echo $Kepin->getUser(5);

$browncanyon = new destinasi($conn);
echo $browncanyon->getDestinasi(1);