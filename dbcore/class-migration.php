<?php

namespace LSD\Migration;



/**
 * Kit Buat Berhubungan dengan Database
 * 
 */
abstract class Migration
{
    public $table_name;
	public $version;
    
    public function create_table()
    {
    }

    public function drop_table()
    {
		
    }

    public function empty_table()
    {
		
    }

    public function setup_rest_api()
    {
        // add_action('rest_api_init', function () 
        // {
        //     register_rest_route('migration/v1', '/msg=(?P<message_id>\d+)', array(
        //         'methods'  => 'GET',
        //         'callback' => array($this, 'run_migrate')
        //     ));
        // } );
        //  echo sprintf("Name of class: %s",get_class());

    }

    /**
     * Migrasi Data dari Skema Lama ke Skema Baru
     */
    public function migrate(MigrateTable $table)
    {
       
    }

    /**
     * Source data Dari ORM, bisa by Date, Selected
     * Harus bisa di Export, ke CSV, Excel, JSON
     */
    public function export(ExportInterface $export)
    {
    }

    /**
     * Replace Import | Fresh Import
     * Bisa Import dari JSON, CSV, Excel
     */
    public function import(ImportInterface $import)
    {
    }
	
	/**
     * 
     * Custom migration proses 
     */
	public function run()
    {
    } 
	
	
}
