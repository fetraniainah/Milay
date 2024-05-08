<?php

use App\Milay\Utils\Messages;
$errors = Messages::getErrors();
$success = Messages::getSuccesses();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_title()?></title>
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>assets/css/app.css">
    <script src="<?php echo BASE_PATH; ?>assets/js/jq.js"></script>
    <script src="<?php echo BASE_PATH; ?>assets/js/htmx.min.js"></script>
</head>

<body>