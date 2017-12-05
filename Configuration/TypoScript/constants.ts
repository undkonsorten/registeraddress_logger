
module.tx_registeraddresslogger_logentry {
    view {
        # cat=module.tx_registeraddresslogger_logentry/file; type=string; label=Path to template root (BE)
        templateRootPath = EXT:registeraddress_logger/Resources/Private/Backend/Templates/
        # cat=module.tx_registeraddresslogger_logentry/file; type=string; label=Path to template partials (BE)
        partialRootPath = EXT:registeraddress_logger/Resources/Private/Backend/Partials/
        # cat=module.tx_registeraddresslogger_logentry/file; type=string; label=Path to template layouts (BE)
        layoutRootPath = EXT:registeraddress_logger/Resources/Private/Backend/Layouts/
    }
    persistence {
        # cat=module.tx_registeraddresslogger_logentry//a; type=string; label=Default storage PID
        storagePid =
    }
}
