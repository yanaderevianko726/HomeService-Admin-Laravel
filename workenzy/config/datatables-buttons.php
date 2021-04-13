<?php
/*
 * File name: datatables-buttons.php
 * Last modified: 2021.01.20 at 18:41:05
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2021
 */

return [
    /*
     * Namespaces used by the generator.
     */
    'namespace' => [
        /*
         * Base namespace/directory to create the new file.
         * This is appended on default Laravel namespace.
         * Usage: php artisan datatables:make User
         * Output: App\DataTables\UserDataTable
         * With Model: App\User (default model)
         * Export filename: users_timestamp
         */
        'base' => 'DataTables',

        /*
         * Base namespace/directory where your model's are located.
         * This is appended on default Laravel namespace.
         * Usage: php artisan datatables:make Post --model
         * Output: App\DataTables\PostDataTable
         * With Model: App\Post
         * Export filename: posts_timestamp
         */
        'model' => '',
    ],

    /*
     * Set Custom stub folder
     */
    //'stub' => '/resources/custom_stub',

    /*
     * PDF generator to be used when converting the table to pdf.
     * Available generators: excel, snappy
     * Snappy package: barryvdh/laravel-snappy
     * Excel package: maatwebsite/excel
     */
    'pdf_generator' => 'dom',

    /*
     * Snappy PDF options.
     */
    'snappy' => [
        'options' => [
            'no-outline' => true,
            'margin-left' => '0',
            'margin-right' => '0',
            'margin-top' => '10mm',
            'margin-bottom' => '10mm',
        ],
        'orientation' => 'landscape',
    ],

    /*
     * Default html builder parameters.
     */
    'parameters' => [
        'dom' => '<".row"<".col-lg-4 col-xs-12"l><".ml-auto"f>>rtip',
        'order' => [[0, 'desc']],
        'buttons' => [
            'create',
            'export',
            'print',
            'reset',
            'reload',
            'colvis'
        ],
        'colReorder' => true,
        'responsive' => false,
        'stateSave' => true,
        'scrollX' => true,
        'fixedColumns' => [
            'leftColumns' => 0,
            'rightColumns' => 1
        ],
        "initComplete" => "function(settings){renderButtons( settings.sTableId)}",
    ],

    /*
     * Generator command default options value.
     */
    'generator' => [
        /*
         * Default columns to generate when not set.
         */
        'columns' => 'id,add your columns,created_at,updated_at',

        /*
         * Default buttons to generate when not set.
         */
        'buttons' => 'create,export,print,reset,reload',

        /*
         * Default DOM to generate when not set.
         */
        'dom' => 'Bfrtip',
    ],
];
