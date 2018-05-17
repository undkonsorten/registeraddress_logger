<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:registeraddress_logger/Resources/Private/Language/locallang_db.xlf:tx_registeraddresslogger_domain_model_logentry',
        'label' => 'email',
        'label_alt' => 'action',
        'label_alt_force' => 1,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'readOnly' => 1,
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'email,action,pid_of_action',
        'iconfile' => 'EXT:registeraddress_logger/Resources/Public/Icons/tx_registeraddresslogger_domain_model_logentry.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, email, action, pid_of_action, address, consent, ip',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, email, action, pid_of_action,address, consent,ip, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_registeraddresslogger_domain_model_logentry',
                'foreign_table_where' => 'AND tx_registeraddresslogger_domain_model_logentry.pid=###CURRENT_PID### AND tx_registeraddresslogger_domain_model_logentry.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:registeraddress_logger/Resources/Private/Language/locallang_db.xlf:tx_registeraddresslogger_domain_model_logentry.email',
            'config' => [
                'type' => 'input',
                'readOnly' => 1,
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'action' => [
            'exclude' => true,
            'label' => 'LLL:EXT:registeraddress_logger/Resources/Private/Language/locallang_db.xlf:tx_registeraddresslogger_domain_model_logentry.action',
            'config' => [
                'type' => 'input',
                'readOnly' => 1,
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'ip' => [
            'exclude' => true,
            'label' => 'LLL:EXT:registeraddress_logger/Resources/Private/Language/locallang_db.xlf:tx_registeraddresslogger_domain_model_logentry.ip',
            'config' => [
                'type' => 'input',
                'readOnly' => 1,
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pid_of_action' => [
            'exclude' => true,
            'label' => 'LLL:EXT:registeraddress_logger/Resources/Private/Language/locallang_db.xlf:tx_registeraddresslogger_domain_model_logentry.pid_of_action',
            'config' => [
                'readOnly' => 1,
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'address' => [
            'exclude' => true,
            'label' => 'LLL:EXT:registeraddress_logger/Resources/Private/Language/locallang_db.xlf:tx_registeraddresslogger_domain_model_logentry.address',
            'config' => [
                'overrideChildTca' => [
                    'columns' => [
                        'log' => [
                            'config' =>[
                                'type' => 'passthrough',
                            ]
                        ]
                    ]
                ],
                'type' => 'inline',
                'foreign_table' => 'tt_address',
                'size' => 2,
            ]
        ],
        'consent' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:registeraddress/Resources/Private/Language/locallang_db.xml:tx_registeraddress_domain_model_address.consent',
            'config' => array(
                'type'     => 'text',
                'readOnly' => 1,
                'size'     => 30,
                'eval' => 'trim'
            ),
        ),


    ],
];
