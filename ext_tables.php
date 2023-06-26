<?php
defined('TYPO3') || die('Access denied.');

call_user_func(
    function()
    {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_registeraddresslogger_domain_model_logentry', 'EXT:registeraddress_logger/Resources/Private/Language/locallang_csh_tx_registeraddresslogger_domain_model_logentry.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_registeraddresslogger_domain_model_logentry');
    }
);
