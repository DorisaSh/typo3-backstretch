<?php

/**
 * Extension Manager/Repository config file for ext "speeddemo".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'speeddemo',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-9.5.99',
            'fluid_styled_content' => '9.5.0-9.5.99',
            'rte_ckeditor' => '9.5.0-9.5.99'
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'W3dev\\Speeddemo\\' => 'Classes'
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Dorisa Shehi',
    'author_email' => 'doris.shehi2@gmail.com',
    'author_company' => 'w3dev',
    'version' => '1.0.0',
];
