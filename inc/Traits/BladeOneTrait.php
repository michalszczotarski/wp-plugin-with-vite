<?php

namespace App\Traits;

use eftec\bladeone\BladeOne;

/**
 * Summary of BladeOneTrait
 */
trait BladeOneTrait {
    protected static $bladeOne;
    protected BladeOne $blade;

    /**
     * 
     * @return void
     */
    public function initializeBlade() {
        $this->blade = self::getBladeInstance();
    }

    /**
     * Summary of getBladeInstance
     * @return \eftec\bladeone\BladeOne
     */
    final public static function getBladeInstance(): BladeOne 
    {
        if (!isset(self::$bladeOne)) {
            self::$bladeOne = new BladeOne(VIEW_PATH,CACHE_PATH,BladeOne::MODE_DEBUG); 
            // Możesz dodać tutaj konfigurację ścieżek do widoków, cache, itp.
        }

        return self::$bladeOne;
    }

}