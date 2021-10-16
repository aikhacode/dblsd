<?php


$settings = json_decode(file_get_contents(__DIR__ . '/settingstea.json'));
require_once $settings->abspath . '/wp-config.php';

global $wpdb;
$tblname = $settings->tblname;
$tblmeta = $settings->tblmeta;


// insert to meta first then drop column anonim dan message on report 
$offset = 0;
$rownum = $wpdb->get_results('select count(report_id) as jml from ' . $tblname);
$jmlrow = $rownum[0]->jml;


while ($offset < $jmlrow) {
    $rows = $wpdb->get_results('select report_id,user_id,program_id,anonim,messages from ' . $tblname . ' limit 5 offset ' . $offset);
    foreach ($rows as $row) {
        $data = array(
            'report_id' => $row->report_id,
            'meta_key' => 'user_id',
            'meta_value' => $row->user_id
        );
        $wpdb->insert($tblmeta, $data);
        $data = array(
            'report_id' => $row->report_id,
            'meta_key' => 'program_id',
            'meta_value' => $row->program_id
        );
        $wpdb->insert($tblmeta, $data);
        $data = array(
            'report_id' => $row->report_id,
            'meta_key' => 'anonim',
            'meta_value' => $row->anonim
        );
        $wpdb->insert($tblmeta, $data);
        $data = array(
            'report_id' => $row->report_id,
            'meta_key' => 'messages',
            'meta_value' => $row->messages
        );
        $wpdb->insert($tblmeta, $data);
    }
    
    $offset = $offset + 5;
}

$wpdb->query('alter table '.$tblname.' drop column anonim, drop column messages');

// $opt = get_option('lsdd_migratea');
// $opt['run']=true;
// update_option('lsdd_migratea',$opt);
