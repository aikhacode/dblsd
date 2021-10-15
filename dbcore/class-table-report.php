<?php
namespace LSD\Migration;

class Report extends Migration
{
    // private $replaced_import = false;

    public function __construct()
    {
        global $wpdb;

        $this->table_name = $wpdb->prefix . 'lsddonation_reports';
        $this->version = '0.1';
        $this->setup_rest_api();
		
    }

    public function create_table()
    {
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        // Usually this would be done during a plugin install / activation routine. Running create_table() also works when you need to update the structure of the table after its been created
        $sql = "CREATE TABLE " . $this->table_name . " (
		report_id bigint(20) NOT NULL AUTO_INCREMENT,
		user_id bigint(20) NOT NULL,
		program_id bigint(20) NOT NULL,
        name mediumtext NOT NULL,
		phone mediumtext NOT NULL,
		email mediumtext NOT NULL,
		anonim tinytext NOT NULL,
		messages longtext NOT NULL,
		subtotal mediumtext NOT NULL,
		total mediumtext NOT NULL,
		currency tinytext NOT NULL,
		gateway tinytext NOT NULL,
		ip tinytext NOT NULL,
        status varchar(30) NOT NULL,
		date datetime NOT NULL,
		reference mediumtext NOT NULL,
		extra_fields longtext NOT NULL,
		PRIMARY KEY  (report_id)
		) CHARACTER SET utf8 COLLATE utf8_general_ci;";
        dbDelta($sql);

        
        update_option('lsdd_migration_db_version', $this->version);
    }

    public function export(ExportInterface $output)
    {
        return $output->export();
    }

    public function import(ImportInterface $input)
    {
        $source = $input->import();
        // Save to DB --replaced_import
    }
	

}

//Dependency Inversion
// $source = array("test" => "test");
// $report = new Report;
// var_dump($report->export(new Export_To_JSON($source)));
// var_dump($report->export(new Export_To_CSV($source)));

// $json = '{"test":"test"}';
// $csv = 'satu, dua, tiga';
// var_dump($report->import(new Import_From_JSON($json)));
// var_dump($report->import(new Import_From_CSV($csv)));
