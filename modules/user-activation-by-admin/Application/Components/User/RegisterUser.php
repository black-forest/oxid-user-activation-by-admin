<?php

/**
 * Copyright (C) BlackForest
 *
 * @package   oxid-user-activation-by-admin
 * @author    Sven Baumann <baumann.sv@gmail.com>
 * @license   GNU/LGPL
 * @copyright Copyright 2014-2016 BlackForest
 */

class RegisterUser extends RegisterUser_parent
{
    /**
     * Checks if private sales is on
     *
     * @return bool
     */
    public function isEnabledPrivateSales()
    {
        if ($this->getConfig()->getRequestParameter('fnc') === 'registeruser') {
            $this->getConfig()->setConfigParam('blPsLoginEnabled', true);
        }

        return parent::isEnabledPrivateSales();
    }
}
