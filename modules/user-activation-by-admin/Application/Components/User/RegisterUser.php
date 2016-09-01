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

    /**
     * Registration confirmation functionality. If registration
     * succeded - redirects to success page, if not - returns
     * exception informing about expired confirmation link
     *
     * @return mixed
     */
    public function confirmRegistration()
    {
        $user = oxNew('oxuser');

        $deactivateUser = false;
        if ($user->loadUserByUpdateId($this->getUpdateId())) {
            $deactivateUser = $user->getFieldData('oxuser__oxactive') === '0';
        }

        $redirect = parent::confirmRegistration();

        if ($deactivateUser) {
            $updateUser = oxNew('oxuser');
            $updateUser->load($user->getFieldData('oxuser__oxid'));
            $updateUser->oxuser__oxactive = new oxField(0);
            $updateUser->save();

            $redirect = 'home';
        }

        return $redirect;
    }
}
