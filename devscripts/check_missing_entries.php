#!/usr/bin/env php
<?php

/**
 * This will compare the function and class/trait/interface names found anywhere in syntax/php.vim
 * against the function names installed in the php binary used to run this script.
 */

function load_php_vim_syntax(): string {
    $path = dirname(__DIR__) . '/syntax/php.vim';
    $contents = file_get_contents($path);
    if (!is_string($contents)) {
        throw new RuntimeException("Failed to load $path");
    }
    return $contents;
}

function dump_missing_functions() {
    $contents = load_php_vim_syntax();
    echo <<<EOT
================================================================================
Missing functions
================================================================================

EOT;
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
    $contents = load_php_vim_syntax();
    echo <<<EOT
================================================================================
Missing classes
================================================================================

EOT;
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
            if (strpos($class_name, '\\') !== false) {
                continue;
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
