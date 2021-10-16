<?php

namespace LSDDonation\DBMigrate;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

defined('LSDD_MIGRATEA') or define('LSDD_MIGRATEA', '0.0.1');

class DB_Migratea
{


    public $default_options = array(
        "done" => false,
        "run" => false,
        "version" => '0.0.1'
    );


    public function __construct()
    {

        //delete_option('lsdd_migratea');

        if (empty(get_option('lsdd_migratea')))
            update_option('lsdd_migratea', $this->default_options);

        $this->run();
    }

    public function run()
    {
        //echo  LSDD_PATH . 'core/database/';
        //require LSDD_PATH . 'core/utils/migratea-seed.php';
       // $this->backgroundProcess('/opt/lampp/bin/php ' . LSDD_PATH . 'core/utils/migratea-act.php');


        $opt = get_option('lsdd_migratea');
        if (!$opt['run']) {

            //backgroundProcess('php ' . LSDD_PATH . 'core/utils/migratea-seed.php --dbuser=' . DB_USER . ' --dbpass=' . DB_PASSWORD . ' --dbname=' . DB_NAME . ' --dbhost=' . DB_HOST . ' --tblname=' . $wpdb->prefix . 'lsddonation_reports');
            global $wpdb;

            $arg = array(
                'dbname' => DB_NAME,
                'dbhost' => DB_HOST,
                'dbuser' => DB_USER,
                'dbpass' => DB_PASSWORD,
                'abspath' => ABSPATH,
                'tblname' => $wpdb->prefix . 'lsddonation_reports',
                'tblmeta' => $wpdb->prefix . 'lsddonation_reportmeta',




            );

            file_put_contents(LSDD_PATH . 'core/utils/settingstea.json', json_encode($arg));

            //backgroundProcess('php ' . LSDD_PATH . 'core/utils/migratea-seed.php');
            $this->backgroundProcess('php ' . LSDD_PATH . 'core/utils/migratea-act.php');

            //make sure one time run  
            $opt['run'] = true;
            update_option('lsdd_migratea', $opt);
        }
    }

    public function sukses()
    {
        $opt =  get_option('lsdd_migratea');

        return $opt["run"];
    }

    public function backgroundProcess($cmd)
    {
        // windows
        if (substr(php_uname(), 0, 7) == "Windows") {
            pclose(popen("start /B " . $cmd . ' > err.txt', "r"));
            // linux
        } else {
            // require_once 'class-linux-backproc.php';
            // $proc = new BackgroundProcess();
            // $proc->setCmd('exec '.$cmd);
            // $proc->start();
            exec( $cmd . ' >/dev/null 2>err.txt &');
            
        }
    }
}

$mx = new DB_Migratea;



//echo (!$mx->sukses()) ? "<h1 style='color:red;'>MIGRATING RUNNING... Please wait....</h1>" : "MIGRATING SUKSES...";
