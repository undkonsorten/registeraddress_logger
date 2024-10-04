#
# Table structure for table 'tx_registeraddresslogger_domain_model_logentry'
#
CREATE TABLE tx_registeraddresslogger_domain_model_logentry (
	email varchar(255) DEFAULT '' NOT NULL,
	action varchar(255) DEFAULT '' NOT NULL,
	pid_of_action int(11) DEFAULT '0' NOT NULL,
	address int(11) DEFAULT '0' NOT NULL,
	consent text,
	ip varchar(255) DEFAULT '' NOT NULL
);

#
# Table structure for table 'tt_address'
#
CREATE TABLE tt_address (
    log tinyint(3) unsigned NOT NULL DEFAULT '0'
);
