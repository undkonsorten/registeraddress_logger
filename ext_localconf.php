<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}


$signalSlotDispatcher = TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
$signalSlotDispatcher->connect(
    \AFM\Registeraddress\Controller\AddressController::class,
    'createBeforePersist',
    \Undkonsorten\RegisteraddressLogger\Slot\Logger::class,
    'logCreate'
);
$signalSlotDispatcher->connect(
    \AFM\Registeraddress\Controller\AddressController::class,
    'updateBeforePersist',
    \Undkonsorten\RegisteraddressLogger\Slot\Logger::class,
    'logUpdate'
);
$signalSlotDispatcher->connect(
    \AFM\Registeraddress\Controller\AddressController::class,
    'deleteBeforePersist',
    \Undkonsorten\RegisteraddressLogger\Slot\Logger::class,
    'logDelete'
);
$signalSlotDispatcher->connect(
    \AFM\Registeraddress\Controller\AddressController::class,
    'approveBeforePersist',
    \Undkonsorten\RegisteraddressLogger\Slot\Logger::class,
    'logApprove'
);