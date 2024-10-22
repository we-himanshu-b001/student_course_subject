<?php

return [
    "name"=> "Subject",
    "title"=> "Subject details",
    "slug"=> "subject",
    "thumbnail"=> "https://img.site/p/300/160",
    "is_dev" => env('MODULE_SUBJECT_ENV')?true:false,
    "excerpt"=> "List of Subject details",
    "description"=> "List of Subject details",
    "download_link"=> "",
    "author_name"=> "vaah",
    "author_website"=> "https://vaah.dev",
    "version"=> "0.0.1",
    "is_migratable"=> true,
    "is_sample_data_available"=> true,
    "db_table_prefix"=> "vh_subject_",
    "providers"=> [
        "\\VaahCms\\Modules\\Subject\\Providers\\SubjectServiceProvider"
    ],
    "aside-menu-order"=> null
];
