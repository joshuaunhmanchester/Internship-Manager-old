<?php

    // Title: PDOWrapper.php
    // Author: Joshua Anderson
    // Date: 8/4/13
    // Description: This will be used to house db functions that are utilized frequently throughout the site
    // i.e - insert, update, select, delete queries


    class PDOWrapperModel {
        
        private function cleanup($bind) {
            if(!is_array($bind)) {
                if(!empty($bind)) {
                    $bind = array($bind);
                } else {
                    $bind = array();
                }
            }
            
            return $bind;
        }
        
        public function run($pdo, $sql, $bind, $type) {
            $sql = trim($sql);
            $bind = PDOWrapperModel::cleanup($bind);
            $error = "";
            try {
                $pdostmt = $pdo->prepare($sql);
                if($pdostmt->execute($bind) !== false) {
                    if($type == 'insert') {
                        return $pdo->lastInsertId();
                    }
                }
            } catch (PDOException $e) {
                $error = $e->getMessage();
                return false;
            }
        }
        
        static function insert($pdo, $table, $info) {
            if(isset($pdo)) {
                if(isset($info) && is_array($info) && isset($table)) {
                    $place_holders = implode(',', array_fill(0, count($info), '?'));
                    $sql = "INSERT INTO " . $table . " (".implode(", ", array_keys($info)).") VALUES (".$place_holders.");";
                    $bind = array();
                    foreach($info as $field) {
                        $bind[] = $field;
                    }
                    return PDOWrapperModel::run($pdo, $sql, $bind, 'insert');
                }
            }
        }
    }

?>