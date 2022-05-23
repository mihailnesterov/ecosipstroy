<?php 

namespace app\traits;

use Yii;

/**
 * Migration's Trait
 */
trait MigrationTrait {

    /**
     * Set meta keywords
     * @param string
     */
    public function getTableOptions()
    {
        $tableOptions = null;
        
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        
        return $tableOptions;
    }

}