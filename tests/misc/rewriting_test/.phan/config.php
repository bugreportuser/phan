<?php

use \Phan\Issue;

/**
 * This configuration will be read and overlaid on top of the
 * default configuration. Command line arguments will be applied
 * after this file is read.
 *
 * @see src/Phan/Config.php
 * See Config for all configurable options.
 *
 * This is a config file which tests AST rewriting and phpdoc_type_mapping.
 */
return [

    // If true, missing properties will be created when
    // they are first seen. If false, we'll report an
    // error message.
    'allow_missing_properties' => false,

    // Allow null to be cast as any type and for any
    // type to be cast to null.
    'null_casts_as_any_type' => false,

    // If enabled, scalars (int, float, bool, string, null)
    // are treated as if they can cast to each other.
    'scalar_implicit_cast' => false,

    // If true, seemingly undeclared variables in the global
    // scope will be ignored. This is useful for projects
    // with complicated cross-file globals that you have no
    // hope of fixing.
    'ignore_undeclared_variables_in_global_scope' => false,

    // Backwards Compatibility Checking
    // Check for $$var[] and $foo->$bar['baz'] and Foo::$bar['baz']() and $this->$bar['baz']
    'backward_compatibility_checks' => false,

    // If enabled, check all methods that override a
    // parent method to make sure its signature is
    // compatible with the parent's. This check
    // can add quite a bit of time to the analysis.
    'analyze_signature_compatibility' => false,

    // Test dead code detection
    'dead_code_detection' => false,

    'quick_mode' => false,

    // If true, then try to simplify AST into a form which improves Phan's type inference.
    // E.g. rewrites `if (!is_string($foo)) { return; } b($foo);`
    // into `if (is_string($foo)) {b($foo);} else {return;}`
    // This may conflict with 'dead_code_detection'
    // This slows down analysis noticeably.
    'simplify_ast' => true,

    'generic_types_enabled' => true,

    'minimum_severity' => Issue::SEVERITY_LOW,

    'directory_list' => ['src'],

    'analyzed_file_extensions' => ['php'],

    // An unrelated form of rewriting to AST rewriting.
    'phpdoc_type_mapping' => [
        'number' => 'int|float',
        'unknown_type' => '',
    ],

    // A list of plugin files to execute
    'plugins' => [
        '../../../.phan/plugins/AlwaysReturnPlugin.php',  // may be affected by AST rewriting
    ]
];
