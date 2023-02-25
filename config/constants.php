<?php
return [
    "generic" => [
        'not_allowed' => 'generic-0000',
        'parsing_error' => 'generic-0010',
        'validation_rules' => 'generic-0010'
    ],
    "author" => [
        'generic_error' => 'author-0000',
        'not_allowed' => [
            'get'       => 'author-not-allowed-0010',
            'update'    => 'author-not-allowed-0020',
            'post'      => 'author-not-allowed-0030',
            'delete'    => 'author-not-allowed-0040',
            'create'    => 'author-not-allowed-0050',
        ],
        'get'       => 'author-0010',
        'update'    => 'author-0020',
        'post'      => 'author-0030',
        'delete'    => 'author-0040',
    ],
    "book" => [
        'generic_error' => 'book-0000',
        'not_allowed' => [
            'get'       => 'book-not-allowed-0010',
            'update'    => 'book-not-allowed-0020',
            'post'      => 'book-not-allowed-0030',
            'delete'    => 'book-not-allowed-0040',
            'create'    => 'book-not-allowed-0050',
        ],
        'get'       => 'book-0010',
        'update'    => 'book-0020',
        'post'      => 'book-0030',
        'delete'    => 'book-0040',
    ]
];
