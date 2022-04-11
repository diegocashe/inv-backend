<?php
/**
 * @var \App\View\AppView $this
 * @var string $message
 * @var string $url
 */
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = null;
 
$responseBody = [
    'message' => $message,
    'code' => $code,
    'url' => $url,
    'error' => $error->getMessage()
];

echo json_encode($responseBody);

