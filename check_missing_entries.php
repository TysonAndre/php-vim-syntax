<?php

function dump_missing_functions() {
    echo <<<EOT
================================================================================
Missing functions
================================================================================

EOT;
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
    echo "\n\n";
}

function dump_missing_classes() {
    echo <<<EOT
================================================================================
Missing classes
================================================================================

EOT;
    $contents = file_get_contents('php.vim');
    $token_set = array_flip(array_map('strtolower', preg_split('/\s+/', $contents)));
    $extensions = get_loaded_extensions();
    sort($extensions);
    foreach ($extensions as $extension) {
        $class_names = (new ReflectionExtension($extension))->getClassNames();
        if (!$class_names) {
            continue;
        }
        sort($class_names);
        $missing = [];
        $found = [];
        foreach ($class_names ?: [] as $class_name) {
            if (isset($token_set[strtolower($class_name)])) {
                $found[] = $class_name;
                continue;
            }
            if (class_exists($class_name)) {
                $type = 'class';
            } elseif (interface_exists($class_name)) {
                $type = 'interface';
            } else {
                $type = 'trait';
            }
            $missing[$type][] = $class_name;
        }
        if ($missing) {
            echo "For extension $extension\n";
            if ($found) {
                echo "Exists:  " . implode(' ', $found) . "\n";
            }
            foreach ($missing as $type => $missing_names) {
                printf("Missing %9s: %s\n", $type, implode(' ', $missing_names));
            }
        }
    }
    echo "\n\n";
}

dump_missing_functions();
dump_missing_classes();
