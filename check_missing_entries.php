<?php

$contents = file_get_contents('php.vim');
$token_set = array_flip(array_map('strtolower', preg_split('/\s+/', $contents)));
$extensions = get_loaded_extensions();
sort($extensions);
foreach ($extensions as $extension) {
    $functions = get_extension_funcs($extension);
    if (!$functions) {
        continue;
    }
    sort($functions);
    $missing = [];
    $found = [];
    foreach ($functions ?: [] as $function_name) {
        if (isset($token_set[strtolower($function_name)])) {
            $found[] = $function_name;
            continue;
        }
        $missing[] = $function_name;
    }
    if ($missing) {
        echo "For extension $extension\n";
        if ($found) {
            echo "Exists:  " . implode(' ', $found) . "\n";
        }
        echo "Missing: " . implode(' ', $missing) . "\n";
        echo "\n";
    }
}
