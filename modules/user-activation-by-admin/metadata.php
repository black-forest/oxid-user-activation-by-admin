<?php

/**
 * Copyright (C) BlackForest
 *
 * @package   oxid-user-activation-by-admin
 * @author    Sven Baumann <baumann.sv@gmail.com>
 * @license   GNU/LGPL
 * @copyright Copyright 2014-2016 BlackForest
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.0';

/**
 * Module information
 */
$aModule = array
(
    'id'          => 'user-activation-by-admin',
    'title'       => array
    (
        'de' => 'Benutzer Aktivierung durch Administrator'
    ),
    'description' => array
    (
        'de' => 'Neue Benutzer werden nicht automatisch aktiviert. Der Administrator muss den Benutzer ' .
                'freischalten und dieser bekommt eine Email mit dem Hinweis zum freischalten des neuen Benutzers.'
    ),
    'version'     => '1.0',
    'author'      => 'Sven Baumann',
    'url'         => '',
    'email'       => 'baumann.sv@gmail.com',
    'files'       => array(),
    'extend'      => array
    (
        'Register' => 'user-activation-by-admin/Application/Components/User/RegisterUser',
    )
);
