<?php
$path = __DIR__ . '/../storage/logs/';
$files = array_values(array_filter(scandir($path), function($file) {
    return !is_dir($file);
}));

$last = count($files) -1;

print_r (file_get_contents($path.$files[$last], NULL, NULL));
