REM Workbench Table Data copy script
REM Workbench Version: 8.0.19
REM 
REM Execute this to copy table data from a source RDBMS to MySQL.
REM Edit the options below to customize it. You will need to provide passwords, at least.
REM 
REM Source DB: Mysql@gbws-reg-db.mysql.database.azure.com:3306 (MySQL)
REM Target DB: Mysql@127.0.0.1:3306


@ECHO OFF
REM Source and target DB passwords
set arg_source_password=
set arg_target_password=
set arg_source_ssh_password=
set arg_target_ssh_password=


REM Set the location for wbcopytables.exe in this variable
set "wbcopytables_path=C:\Program Files\MySQL\MySQL Workbench 8.0 CE"

if not [%wbcopytables_path%] == [] set wbcopytables_path=%wbcopytables_path%
set wbcopytables=%wbcopytables_path%\wbcopytables.exe

if not exist "%wbcopytables%" (
	echo "wbcopytables.exe doesn't exist in the supplied path. Please set 'wbcopytables_path' with the proper path(e.g. to Workbench binaries)"
	exit 1
)

IF [%arg_source_password%] == [] (
    IF [%arg_target_password%] == [] (
        IF [%arg_source_ssh_password%] == [] (
            IF [%arg_target_ssh_password%] == [] (
                ECHO WARNING: All source and target passwords are empty. You should edit this file to set them.
            )
        )
    )
)
set arg_worker_count=2
REM Uncomment the following options according to your needs

REM Whether target tables should be truncated before copy
REM set arg_truncate_target=--truncate-target
REM Enable debugging output
REM set arg_debug_output=--log-level=debug3


REM Creation of file with table definitions for copytable

set table_file=%TMP%\wb_tables_to_migrate.txt
TYPE NUL > %TMP%\wb_tables_to_migrate.txt
ECHO `gbws_reg`	`transactions`	`gbws_reg`	`transactions`	`id`	`id`	`id`, `txn_id`, `payer_id`, `payer_status`, `custom`, `payment_status`, `payer_email`, `first_name`, `last_name`, `address_name`, `address_street`, `address_city`, `address_state`, `address_zip`, `address_country`, `address_country_code`, `address_status`, `contact_phone`, `residence_country`, `payment_date`, `num_cart_items`, `mc_gross`, `mc_fee`, `mc_currency`, `ipn_track_id`, `verify_sign`, `txn_type`, `payment_type`, `receiver_email`, `receiver_id`, `notify_version`, `transaction_subject`, `charset`, `discount`, `test_ipn` >> %TMP%\wb_tables_to_migrate.txt
ECHO `gbws_reg`	`member_info`	`gbws_reg`	`member_info`	`mbr_id`	`mbr_id`	`mbr_id`, `first`, `last`, `address`, `city`, `state`, `zip`, `phone`, `email`, `boat`, `motor`, `trolling_motor`, `electronics`, `sub`, `paid`, `SSN` >> %TMP%\wb_tables_to_migrate.txt
ECHO `gbws_reg`	`transaction_items`	`gbws_reg`	`transaction_items`	`id`	`id`	`id`, `txn_id`, `item_number`, `item_name`, `partner1`, `partner2`, `quantity`, `mc_gross`, `team_id` >> %TMP%\wb_tables_to_migrate.txt
ECHO `gbws_reg`	`log`	`gbws_reg`	`log`	-	-	`message` >> %TMP%\wb_tables_to_migrate.txt
ECHO `gbws_reg`	`tourneyinfo`	`gbws_reg`	`tourneyinfo`	`tourney_id`	`tourney_id`	`tourney_id`, `location`, `start_date`, `second_date`, `third_date`, `entry_fee`, `option_fee`, `big_fish_fee`, `local`, `reg_deadline` >> %TMP%\wb_tables_to_migrate.txt
ECHO `gbws_reg`	`team_info`	`gbws_reg`	`team_info`	`team_id`	`team_id`	`team_id`, `partner1`, `partner2`, `sub1`, `sub2`, `paid`, `refund`, `boat`, `motor`, `trolling_motor`, `electronics` >> %TMP%\wb_tables_to_migrate.txt


"%wbcopytables%" ^
 --mysql-source="yami@gbws-reg-db@gbws-reg-db.mysql.database.azure.com:3306" ^
 --source-rdbms-type=Mysql ^
 --target="root@127.0.0.1:3306" ^
 --source-password="%arg_source_password%" ^
 --target-password="%arg_target_password%" ^
 --table-file="%table_file%" ^
 --source-ssh-port="22" ^
 --source-ssh-host="" ^
 --source-ssh-user="" ^
 --target-ssh-port="22" ^
 --target-ssh-host="" ^
 --target-ssh-user="" ^
 --source-ssh-password="%arg_source_ssh_password%" ^
 --target-ssh-password="%arg_target_ssh_password%" --thread-count=%arg_worker_count% ^
 %arg_truncate_target% ^
 %arg_debug_output%

REM Removes the file with the table definitions
DEL %TMP%\wb_tables_to_migrate.txt


