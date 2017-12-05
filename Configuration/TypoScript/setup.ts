
# Module configuration
module.tx_registeraddresslogger_tools_registeraddressloggerlogentry {
    persistence {
        storagePid = {$module.tx_registeraddresslogger_logentry.persistence.storagePid}
    }
    view {
        templateRootPaths.0 = EXT:registeraddress_logger/Resources/Private/Backend/Templates/
        templateRootPaths.1 = {$module.tx_registeraddresslogger_logentry.view.templateRootPath}
        partialRootPaths.0 = EXT:registeraddress_logger/Resources/Private/Backend/Partials/
        partialRootPaths.1 = {$module.tx_registeraddresslogger_logentry.view.partialRootPath}
        layoutRootPaths.0 = EXT:registeraddress_logger/Resources/Private/Backend/Layouts/
        layoutRootPaths.1 = {$module.tx_registeraddresslogger_logentry.view.layoutRootPath}
    }
}
