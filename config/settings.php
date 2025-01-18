<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | Organization details
    |--------------------------------------------------------------------------
    |
    | Specify your Organization details for branding.
    |
    */

    'org' => [
        'name' => 'MyCompany',
        'email' => 'info@mycompany.com',
        'phone' => '+1234567890',
        'tagline' => 'My Awesome App',
    ],

    /*
    |--------------------------------------------------------------------------
    | Customize Reports
    |--------------------------------------------------------------------------
    |
    | Customize the look and feel of the Report (Print and PDF).
    |
    */
    'report' => [
        
        'include_header' => 'yes',
        'include_footer' => 'yes',
        'style' => [
            'font_name' => '"Courier New", Courier, monospace',
            'font_size' => '13px',
        ],
        'footer_content' => '© MyCompany All rights reserved. {YEAR}',
    ],
];
