
# Module configuration
module.tx_registeraddresslogger_tools_registeraddressloggerlogging {
    persistence {
        storagePid = {$module.tx_registeraddresslogger_logging.persistence.storagePid}
    }
    view {
        templateRootPaths.0 = EXT:registeraddress_logger/Resources/Private/Backend/Templates/
        templateRootPaths.1 = {$module.tx_registeraddresslogger_logging.view.templateRootPath}
        partialRootPaths.0 = EXT:registeraddress_logger/Resources/Private/Backend/Partials/
        partialRootPaths.1 = {$module.tx_registeraddresslogger_logging.view.partialRootPath}
        layoutRootPaths.0 = EXT:registeraddress_logger/Resources/Private/Backend/Layouts/
        layoutRootPaths.1 = {$module.tx_registeraddresslogger_logging.view.layoutRootPath}
    }
}
