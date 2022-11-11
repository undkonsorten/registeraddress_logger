<?php
defined('TYPO3') || die('Access denied.');

call_user_func(
    function()
    {

        if (TYPO3_MODE === 'BE') {

            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'RegisteraddressLogger',
                'tools', // Make module a submodule of 'tools'
                'logentry', // Submodule key
                '', // Position
                [
                    \Undkonsorten\RegisteraddressLogger\Controller\LogentryController::class => 'list',
                    
                ],
                [
                    'access' => 'user,group',
                    'icon'   => 'EXT:registeraddress_logger/Resources/Public/Icons/user_mod_logentry.svg',
                    'labels' => 'LLL:EXT:registeraddress_logger/Resources/Private/Language/locallang_logentry.xlf',
                ]
            );

        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('registeraddress_logger', 'Configuration/TypoScript', 'Registeraddress Logger');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_registeraddresslogger_domain_model_logentry', 'EXT:registeraddress_logger/Resources/Private/Language/locallang_csh_tx_registeraddresslogger_domain_model_logentry.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_registeraddresslogger_domain_model_logentry');

    }
);
