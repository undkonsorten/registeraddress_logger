<?php

namespace Undkonsorten\RegisteraddressLogger\EventListener;

use AFM\Registeraddress\Event\AfterDeleteEvent;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * @todo Consider possibility to disable the event to keep logs
 * for deleted addresses
 */
class DeleteEventListener
{

    protected const LISTEN_TO_TABLE = 'tt_address';

    protected const TABLE_NAME = 'tx_registeraddresslogger_domain_model_logentry';

    protected const REMOTE_FIELD = 'address';

    public function __invoke(AfterDeleteEvent $event): void
    {
        $records = $event->getRecords();
        $tableName = $event->getTableName();
        $forceDelete = $event->isForceDelete();
        if ($tableName === self::LISTEN_TO_TABLE) {
            $this->deleteLogEntries($records, $forceDelete);
        }
    }

    protected function deleteLogEntries(array $records, bool $forceDelete = false): ?int
    {
        $uidList = array_map(function (array $record): int {
            return $record['uid'];
        }, $records);
        /** @var $queryBuilder \TYPO3\CMS\Core\Database\Query\QueryBuilder **/
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(self::TABLE_NAME);
        $condition = $queryBuilder->expr()->in(
            self::REMOTE_FIELD,
            $uidList
        );
        if ($forceDelete) {
            $queryBuilder->delete(self::TABLE_NAME)
                ->where($condition);
        } else {
            $deleteField = $GLOBALS['TCA'][self::TABLE_NAME]['ctrl']['delete'];
            $queryBuilder->update(self::TABLE_NAME)
                ->set($deleteField, 1)
                ->where($condition);
        }
        return $queryBuilder->execute();
    }

}
