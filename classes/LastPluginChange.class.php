<?php
class LastPluginChange {

    public function save() {
        DBManager::get()->query(sprintf("INSERT INTO last_plugin_change (date) VALUES ('%s')",time()));
    }
   
    public function load() {
        $db = DBManager::get();
        $r = $db->query(sprintf("SELECT date FROM last_plugin_change order by id desc limit 1"))->fetchAll();
        if (count($r)) return $r[0]['date'];
        else return "";
    }
}	
?>