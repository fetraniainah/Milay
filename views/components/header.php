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
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    .load {
        transition: 1s ease-out;
        overflow: hidden;
    }
    </style>
    <script src="<?php echo BASE_PATH; ?>assets/js/jq.js"></script>
    <script src="<?php echo BASE_PATH; ?>assets/js/htmx.min.js"></script>
</head>

<body>
    <div class="load w-100 h-100 position-absolute bg-white d-flex justify-content-center align-items-center"
        style="z-index: 1;">
        <div class="d-flex justify-content-center align-items-center">
            <div class="spinner-border text-primary spinner-border-lg" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>