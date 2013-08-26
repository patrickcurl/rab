<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Directories
    |--------------------------------------------------------------------------
    |
    | Here, you can specify any directories you would like lessismore to watch
    | and compile to css when changes are made to the less files within
    |
    | '/absolute/path/to/less/directory => '/absolute/path/to/css/directory'
    |
    */
    'directories' => array(
           //             app('path') . '/less' => app('path.public') . '/css',
                    ),

    /*
    |--------------------------------------------------------------------------
    | Files
    |--------------------------------------------------------------------------
    |
    | Here, you can specify any files you would like lessismore to watch
    | and compile to css when changes are made to the file
    |
    | '/absolute/path/to/less/file.less => '/absolute/path/to/css/file.css'
    |
    */

    'files' => array(
                     '../app/less/application.less' => '../public/css/application.css'
                     ),

    /*
    |--------------------------------------------------------------------------
    | Snippets
    |--------------------------------------------------------------------------
    |
    | Here, you can specify any snippets you would like lessismore to compile
    | at runtime. Warning: These are not cached and are recompiled every run!
    |
    */
    'snippets' => array(),

    /*
    |--------------------------------------------------------------------------
    | Formatter
    |--------------------------------------------------------------------------
    |
    | Here, you can specify which formatter to pass to lessphp
    |
    | The formatter setting is completely optional, but it provides the ability to set the formatter used when
    | compiling the LESS files. The available options from lessphp are:
    |
    | * lessjs (default) — Same style used in LESS for JavaScript
    | * compressed — Compresses all the unrequired whitespace
    | * classic — lessphp’s original formatter
    |
    */
    'formatter' => 'lessjs',

    /*
    |--------------------------------------------------------------------------
    | Preserve Comments
    |--------------------------------------------------------------------------
    |
    | Here, you can specify whether comments should be preserved when compiling
    | to css.
    |
    */
    'preserveComments' => false,

    /*
    |--------------------------------------------------------------------------
    | Variables
    |--------------------------------------------------------------------------
    |
    | Variables are pretty handy and darn powerful. It simply consists of an array of key => value pairs that are
    | used by the compiler to replace @keys in the LESS files with the provided value. For example, say your
    | application had the ability to be branded based on a form that let you pick colors via a color chooser. If
    | those colors were then saved in the database you could dynamically inject those values into your LESS and in
    | turn into your compiled CSS files
    |
    | Your less files will only be recompiled if the variables change.
    |
    */
    'variables' => array(),

    /*
    |--------------------------------------------------------------------------
    | Force Recompile
    |--------------------------------------------------------------------------
    |
    | If you have the need you can force compilation on every request by setting the recompile setting to true.
    | This is not really advised but the option is there if you need it.
    |
    */
    'recompile' => false,
);