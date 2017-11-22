<?php

/////////////////////////////////////////////////////////////////////////////
// General information
/////////////////////////////////////////////////////////////////////////////

$app['basename'] = 'language';
$app['version'] = '2.3.27';
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
    'clearos-framework >= 7.3.6',
    'grub2',
    'google-noto-kufi-arabic-fonts',
    'google-noto-sans-armenian-fonts',
    'google-noto-sans-bengali-fonts',
    'google-noto-sans-bengali-ui-fonts',
    'google-noto-sans-devanagari-fonts', // Hindi
    'google-noto-sans-devanagari-ui-fonts',
    'google-noto-sans-georgian-fonts',
    'google-noto-sans-gujarati-fonts',
    'google-noto-sans-gujarati-ui-fonts',
    'google-noto-sans-gurmukhi-fonts', // Panjabi
    'google-noto-sans-gurmukhi-ui-fonts',
    'google-noto-sans-hebrew-fonts',
    'google-noto-sans-kannada-fonts',
    'google-noto-sans-kannada-ui-fonts',
    'google-noto-sans-khmer-fonts',
    'google-noto-sans-khmer-ui-fonts',
    'google-noto-sans-korean-fonts',
    'google-noto-sans-lao-fonts',
    'google-noto-sans-lao-ui-fonts',
    'google-noto-sans-malayalam-fonts',
    'google-noto-sans-malayalam-ui-fonts',
    'google-noto-sans-myanmar-fonts',
    'google-noto-sans-myanmar-ui-fonts',
    'google-noto-sans-simplified-chinese-fonts',
    'google-noto-sans-sinhala-fonts',
    'google-noto-sans-tamil-fonts',
    'google-noto-sans-tamil-ui-fonts',
    'google-noto-sans-telugu-fonts',
    'google-noto-sans-telugu-ui-fonts',
    'google-noto-sans-thai-fonts',
    'google-noto-sans-thai-ui-fonts',
    'google-noto-serif-armenian-fonts',
    'google-noto-serif-georgian-fonts',
    'google-noto-serif-khmer-fonts',
    'google-noto-serif-lao-fonts',
    'google-noto-serif-thai-fonts',
    'google-noto-serif-fonts'
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

