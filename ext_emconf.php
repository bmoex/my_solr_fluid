<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Solr: Extend default marker template with Fluid objects',
    'description' => 'Use fluid functionality in ext:solr; template, partials and layouts!',
    'category' => 'module',
    'version' => '1.0.0',
    'state' => 'stable',
    'uploadFolder' => false,
    'clearCacheOnLoad' => true,
    'author' => 'Benjamin Serfhos',
    'author_email' => 'benjamin@serfhos.com',
    'author_company' => 'Serfhos.com',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-8.99.99',
            'solr' => '6.1.0-8.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Serfhos\\MySolrFluid\\' => 'Classes'
        ]
    ],
];
