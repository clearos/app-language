<?php

/////////////////////////////////////////////////////////////////////////////
// General information
/////////////////////////////////////////////////////////////////////////////

$app['basename'] = 'language';
$app['version'] = '2.3.20';
$app['release'] = '1';
$app['vendor'] = 'ClearFoundation';
$app['packager'] = 'ClearFoundation';
$app['license'] = 'GPLv3';
$app['license_core'] = 'LGPLv3';
$app['summary'] = lang('language_app_name');
$app['description'] = lang('language_app_description');

/////////////////////////////////////////////////////////////////////////////
// App name and categories
/////////////////////////////////////////////////////////////////////////////

$app['name'] = lang('language_app_name');
$app['category'] = lang('base_category_system');
$app['subcategory'] = lang('base_subcategory_settings');
$app['menu_enabled'] = FALSE;

/////////////////////////////////////////////////////////////////////////////
// Packaging
/////////////////////////////////////////////////////////////////////////////

$app['core_requires'] = array(
    'app-events-core >= 1:2.3.0',
    'clearos-framework >= 7.3.3',
    'grub2'
);

$app['core_file_manifest'] = array(
    'language.conf' => array(
        'target' => '/etc/clearos/language.conf',
        'config' => TRUE,
        'config_params' => 'noreplace',
    ),
    'onboot-event'=> array(
        'target' => '/var/clearos/events/onboot/language',
        'mode' => '0755'
    ),
);

$app['core_directory_manifest'] = array(
    '/var/clearos/language' => array()
);

