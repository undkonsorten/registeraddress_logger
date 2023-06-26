<?php

return [
    'registeraddress-logger' => [
        'parent' => 'tools',
        'position' => ['after' => 'recycler'],
        'access' => 'user,group',
        'icon'   => 'EXT:registeraddress_logger/Resources/Public/Icons/user_mod_logentry.svg',
        'labels' => 'LLL:EXT:registeraddress_logger/Resources/Private/Language/locallang_logentry.xlf',
        'workspaces' => 'live',
        'path' => 'registeraddress-logger',
        'extensionName' => 'RegisteraddressLogger',
        'controllerActions' => [
            \Undkonsorten\RegisteraddressLogger\Controller\LogentryController::class => [
                'list'
            ],
        ],
    ]
];
