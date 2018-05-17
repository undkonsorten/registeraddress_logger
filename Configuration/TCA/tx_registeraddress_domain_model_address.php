<?php
defined('TYPO3_MODE') or die();

$fields = array(
    'log' => array(
        'exclude' => 0,
        'label' => 'LLL:EXT:registeraddress_logger/Resources/Private/Language/locallang_db.xml:tx_registeraddresslogger_domain_model_logentry.log',
        'config' => array(
            'type'     => 'inline',
            'foreign_table' => 'tx_registeraddresslogger_domain_model_logentry',
            'foreign_field' => 'address',
            'size'     => 30,
            'eval' => 'trim',
        ),
    ),

);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_address', $fields, TRUE);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_address', 'log','','after:description');
