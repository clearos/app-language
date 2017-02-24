<?php

///////////////////////////////////////////////////////////////////////////////
// B O O T S T R A P
///////////////////////////////////////////////////////////////////////////////

$bootstrap = getenv('CLEAROS_BOOTSTRAP') ? getenv('CLEAROS_BOOTSTRAP') : '/usr/clearos/framework/shared';
require_once $bootstrap . '/bootstrap.php';

///////////////////////////////////////////////////////////////////////////////
// T R A N S L A T I O N S
///////////////////////////////////////////////////////////////////////////////

clearos_load_language('base');

///////////////////////////////////////////////////////////////////////////////
// D A T A
///////////////////////////////////////////////////////////////////////////////

// Translation codes
//
// The following is a mapping of Unify language codes to glibc locales.

$translation_codes = array(
	'af' => array('description' => 'Afrikaans'),
	'ar' => array('description' => 'Arabic'),
	'az' => array('description' => 'Azerbaijani'),
	'be' => array('description' => 'Belarusian'),
	'bg' => array('description' => 'Bulgarian'),
	'bn' => array('description' => 'Bengali'),
	'bs' => array('description' => 'Bosnian'),
	'ca' => array('description' => 'Catalan'),
	'cs' => array('description' => 'Czech'),
	'cy' => array('description' => 'Welsh'),
	'da' => array('description' => 'Danish'),
	'de' => array('description' => 'German'),
	'el' => array('description' => 'Greek'),
	'en' => array('description' => 'English'),
	'eo' => array('description' => 'Esperanto'),
	'es' => array('description' => 'Spanish'),
	'et' => array('description' => 'Estonian'),
	'eu' => array('description' => 'Basque'),

	'fa' => array('description' => 'Persian'),
	'fi' => array('description' => 'Finnish'),
	'fr' => array('description' => 'French'),
	'ga' => array('description' => 'Irish'),
	'gl' => array('description' => 'Galician'),
	'gu' => array('description' => 'Gujarati'),
	'ha' => array('description' => 'Hausa'),
	'hi' => array('description' => 'Hindi'),
	'hr' => array('description' => 'Croatian'),
	'ht' => array('description' => 'Haitian'),
	'hu' => array('description' => 'Hungarian'),
	'hy' => array('description' => 'Armenian'),
	'id' => array('description' => 'Indonesian'),
	'ig' => array('description' => 'Igbo'),
	'is' => array('description' => 'Icelandic'),
	'it' => array('description' => 'Italian'),
	'ja' => array('description' => 'Japanese'),
	'ka' => array('description' => 'Georgian'),
	'km' => array('description' => 'Central Khmer'),
	'kk' => array('description' => 'Kazakh'),
	'kn' => array('description' => 'Kannada'),
	'ko' => array('description' => 'Korean'),
	'la' => array('description' => 'Latin'),
	'lo' => array('description' => 'Lao'),
	'lt' => array('description' => 'Lithuanian'),
	'lv' => array('description' => 'Latvian'),
	'mg' => array('description' => 'Malagasy'),
	'mi' => array('description' => 'Maori'),
	'mk' => array('description' => 'Macedonian'),
	'ml' => array('description' => 'Malayalam'),
	'mn' => array('description' => 'Mongolian'),
	'mr' => array('description' => 'Marathi'),
	'ms' => array('description' => 'Malay'),
	'mt' => array('description' => 'Maltese'),
	'my' => array('description' => 'Burmese'),
	'ne' => array('description' => 'Nepali'),
	'nl' => array('description' => 'Dutch'),
	'no' => array('description' => 'Norwegian'),
	'ny' => array('description' => 'Nyanja'),
	'pa' => array('description' => 'Punjabi'),
	'pl' => array('description' => 'Polish'),
	'pt' => array('description' => 'Portuguese'),
	'ro' => array('description' => 'Romanian'),
	'ru' => array('description' => 'Russian'),
	'si' => array('description' => 'Sinhalese'),
	'sk' => array('description' => 'Slovak'),
	'sl' => array('description' => 'Slovene'),
	'so' => array('description' => 'Somali'),
	'st' => array('description' => 'Southern Sotho'),
	'sq' => array('description' => 'Albanian'),
	'sr' => array('description' => 'Serbian'),
	'su' => array('description' => 'Sundanese'),
	'sv' => array('description' => 'Swedish'),
	'sw' => array('description' => 'Swahili'),
	'ta' => array('description' => 'Tamil'),
	'te' => array('description' => 'Telugu'),
	'tg' => array('description' => 'Tajik'),
	'th' => array('description' => 'Thai'),
	'tl' => array('description' => 'Tagalog'),
	'tr' => array('description' => 'Turkish'),
	'uk' => array('description' => 'Ukrainian'),
	'ur' => array('description' => 'Urdu'),
	'uz' => array('description' => 'Uzbek'),
	'vi' => array('description' => 'Vietnamese'),
	'yi' => array('description' => 'Yiddish'),
	'yo' => array('description' => 'Yoruba'),
	'zh' => array('description' => 'Chinese'),
	'zu' => array('description' => 'Zulu'),
);

// Grub codes
//
// The following is a mapping of grub language codes to glibc locales.

$grub_codes = array(
	'ca' => 'ca_ES',
	'da' => 'da_DK',
	'de' => 'de_DE',
	'de@hebrew' => 'de_DE',
	'de_CH' => 'de_CH',
	'en' => 'en_US',
	'en@arabic' => 'en_US',
	'en@cyrillic' => 'en_US',
	'en@greek' => 'en_US',
	'en@hebrew' => 'en_US',
	'en@piglatin' => 'en_US',
	'en@quot' => 'en_US',
	'es' => 'es_ES',
	'fi' => 'fi_FI',
	'fr' => 'fr_FR',
	'gl' => 'gl_ES',
	'hu' => 'hu_HU',
	'id' => 'id_ID',
	'it' => 'it_IT',
	'ja' => 'ja_JP',
	'lt' => 'lt_LT',
	'nl' => 'nl_NL',
	'pa' => 'pa_PK',
	'pl' => 'pl_PL',
	'pt_BR' => 'pt_BR',
	'ru' => 'ru_RU',
	'sl' => 'sl_SI',
	'sv' => 'sv_SE',
	'tr' => 'tr_TR',
	'uk' => 'uk_UA',
	'vi' => 'vi_VN',
	'zh_CN' => 'zh_CN',
	'zh_TW' => 'zh_TW',
);

// Locales
//
// /etc/locale.conf locales supported by ClearOS

$locales = array(
	'af_ZA' => array(
        'translation_code' => 'af',
        'description' => lang('language_code_af_za'),
        'native_description' => 'Afrikaans',
        'default_keyboard' => '',
        'default_time_zone' => 'Africa/Johannesburg',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => 'latarcyrheb-sun16'
    ),
	'ar_SA' => array(
        'translation_code' => 'ar',
        'description' => lang('language_code_ar_sa'),
        'native_description' => 'العَرَبِيَّة',
        'default_keyboard' => '',
        'default_time_zone' => 'Asia/Riyadh',
        'text_direction' => 'RTL',
        'encoding' => 'UTF-8',
        'font' => 'latarcyrheb-sun16'
    ),
	'az_AZ' => array(
        'translation_code' => 'az',
        'description' => lang('language_code_az_az'),
        'native_description' => 'Azərbaycan dili',
        'default_keyboard' => '',
        'default_time_zone' => '',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => ''
    ),
	'be_BY' => array(
        'translation_code' => 'be',
        'description' => lang('language_code_be_by'),
        'native_description' => 'беларуская мова',
        'default_keyboard' => '',
        'default_time_zone' => '',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => ''
    ),
	'bg_BG' => array(
        'translation_code' => 'bg',
        'description' => lang('language_code_bg_bg'),
        'native_description' => 'български',
        'default_keyboard' => 'bg',
        'default_time_zone' => 'Europe/Sofia',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => 'latarcyrheb-sun16'
    ),
	'bn_BD' => array(
        'translation_code' => 'bn',
        'description' => lang('language_code_bn_bd'),
        'native_description' => 'বাংলা',
        'default_keyboard' => 'bg',
        'default_time_zone' => 'Asia/Dhaka',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => ''
    ),
	'bs_BA' => array(
        'translation_code' => 'bs',
        'description' => lang('language_code_bs_ba'),
        'native_description' => 'bosanski',
        'default_keyboard' => '',
        'default_time_zone' => '',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => ''
    ),
    'ca_ES' => array(
        'translation_code' => 'ca',
        'description' => lang('language_code_ca_es'),
        'native_description' => 'Català',
        'default_keyboard' => 'es',
        'default_time_zone' => 'Europe/Madrid',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => 'latarcyrheb-sun16'
    ),
    'cs_CZ' => array(
        'translation_code' => 'cs',
        'description' => lang('language_code_cs_cz'),
        'native_description' => 'čeština',
        'default_keyboard' => 'cz-lat2',
        'default_time_zone' => 'Europe/Prague',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => 'latarcyrheb-sun16'
    ),
    'cy_GB' => array(
        'translation_code' => 'cy',
        'description' => lang('language_code_cy_gb'),
        'native_description' => 'Cymraeg',
        'default_keyboard' => 'uk',
        'default_time_zone' => 'Europe/London',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => 'latarcyrheb-sun16'
    ),
    'da_DK' => array(
        'translation_code' => 'da',
        'description' => lang('language_code_da_dk'),
        'native_description' => 'Dansk',
        'default_keyboard' => 'dk',
        'default_time_zone' => 'Europe/Copenhagen',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => 'latarcyrheb-sun16'
    ),
    'de_DE' => array(
        'translation_code' => 'de',
        'description' => lang('language_code_de_de'),
        'native_description' => 'Deutsch',
        'default_keyboard' => 'de-latin1-nodeadkeys',
        'default_time_zone' => 'Europe/Berlin',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => 'latarcyrheb-sun16'
    ),
    'el_GR' => array(
        'translation_code' => 'el',
        'description' => lang('language_code_el_gr'),
        'native_description' => 'Ελληνικά',
        'default_keyboard' => 'gr',
        'default_time_zone' => 'Europe/Athens',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => 'iso07u-16'
    ),
    'en_US' => array(
        'translation_code' => 'en',
        'description' => lang('language_code_en_us'),
        'native_description' => 'English (US)',
        'default_keyboard' => 'us',
        'default_time_zone' => 'America/New_York',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => 'latarcyrheb-sun16'
    ),
    'eo' => array(
        'translation_code' => 'eo',
        'description' => lang('language_code_eo'),
        'native_description' => 'Esperanto',
        'default_keyboard' => 'us',
        'default_time_zone' => '',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => 'latarcyrheb-sun16'
    ),
    'es_ES' => array(
        'translation_code' => 'es',
        'description' => lang('language_code_es_es'),
        'native_description' => 'Español',
        'default_keyboard' => 'es',
        'default_time_zone' => 'Europe/Madrid',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => 'latarcyrheb-sun16'
    ),
    'et_EE' => array(
        'translation_code' => 'et',
        'description' => lang('language_code_et_ee'),
        'native_description' => 'eesti keel',
        'default_keyboard' => 'et',
        'default_time_zone' => 'Europe/Tallinn',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => 'latarcyrheb-sun16'
    ),
    'eu_ES' => array(
        'translation_code' => 'eu',
        'description' => lang('language_code_eu_es'),
        'native_description' => 'Euskara',
        'default_keyboard' => '',
        'default_time_zone' => '',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
        'font' => 'latarcyrheb-sun16'
    ),







    'fa_IR' => array(
        'translation_code' => 'fa',
        'description' => lang('language_code_fa_ir'),
        'native_description' => 'پارسی',
        'default_keyboard' => 'us',
        'default_time_zone' => 'Asia/Tehran',
        'text_direction' => 'RTL',
        'encoding' => 'UTF-8'
    ),

    'fi_FI' => array(
        'translation_code' => 'fi',
        'description' => lang('language_code_fi_fi'),
        'native_description' => 'Suomi',
        'default_keyboard' => 'fi',
        'default_time_zone' => 'Europe/Helsinki',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8'
    ),

    'fr_FR' => array(
        'translation_code' => 'fr',
        'description' => lang('language_code_fr_fr'),
        'native_description' => 'Français',
        'default_keyboard' => 'fr_latin1',
        'default_time_zone' => 'Europe/Paris',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'hu_HU' => array(
        'translation_code' => 'hu',
        'description' => lang('language_code_hu_hu'),
        'native_description' => 'Magyar',
        'default_keyboard' => 'hu',
        'default_time_zone' => 'Europe/Budapest',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'id_ID' => array(
        'translation_code' => 'id',
        'description' => lang('language_code_id_id'),
        'native_description' => 'Bahasa Indonesia',
        'default_keyboard' => 'us',
        'default_time_zone' => 'Asia/Jakarta',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'it_IT' => array(
        'translation_code' => 'it',
        'description' => lang('language_code_it_it'),
        'native_description' => 'Italiano',
        'default_keyboard' => 'it',
        'default_time_zone' => 'Europe/Rome',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'my_MM' => array(
        'translation_code' => 'my',
        'description' => lang('language_code_my_mm'),
        'native_description' => 'မြန်မာစာ',
        'default_keyboard' => 'us',
        'default_time_zone' => 'Asia/Rangoon',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'nl_NL' => array(
        'translation_code' => 'nl',
        'description' => lang('language_code_nl_nl'),
        'native_description' => 'Nederlands',
        'default_keyboard' => 'nl',
        'default_time_zone' => 'Europe/Amsterdam',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'no_NO' => array(
        'translation_code' => 'no',
        'description' => lang('language_code_no_no'),
        'native_description' => 'Norsk',
        'default_keyboard' => 'no',
        'default_time_zone' => 'Europe/Oslo',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'pl_PL' => array(
        'translation_code' => 'pl',
        'description' => lang('language_code_pl_pl'),
        'native_description' => 'Polski',
        'default_keyboard' => 'pl2',
        'default_time_zone' => 'Europe/Warsaw',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'pt_BR' => array(
        'translation_code' => 'pt',
        'description' => lang('language_code_pt_br'),
        'native_description' => 'Português (Brasil)',
        'default_keyboard' => 'br-abnt2',
        'default_time_zone' => 'America/Sao_Paulo',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'pt_PT' => array(
        'translation_code' => 'pt',
        'description' => lang('language_code_pt_pt'),
        'native_description' => 'Português',
        'default_keyboard' => 'pt-latin1',
        'default_time_zone' => 'Europe/Lisbon',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'sk_SK' => array(
        'translation_code' => 'sk',
        'description' => lang('language_code_sk_SK'),
        'native_description' => 'Slovenčina',
        'default_keyboard' => 'sk-qwerty',
        'default_time_zone' => 'Europe/Bratislava',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'sl_SL' => array(
        'translation_code' => 'sl',
        'description' => lang('language_code_sl_sl'),
        'native_description' => 'Slovaščina',
        'default_keyboard' => 'slovene',
        'default_time_zone' => 'Europe/Ljubljana',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'sv_SE' => array(
        'translation_code' => 'sv',
        'description' => lang('language_code_sv_se'),
        'native_description' => 'Svenska',
        'default_keyboard' => 'sv-latin1',
        'default_time_zone' => 'Europe/Stockholm',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'tl_PH' => array(
        'translation_code' => 'tl',
        'description' => lang('language_code_tl_ph'),
        'native_description' => 'Tagalog',
        'default_keyboard' => 'us',
        'default_time_zone' => 'Asia/Manila',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'tr_TR' => array(
        'translation_code' => 'tr',
        'description' => lang('language_code_tr_tr'),
        'native_description' => 'Türkçe',
        'default_keyboard' => 'trq',
        'default_time_zone' => 'Europe/Istanbul',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'ro_RO' => array(
        'translation_code' => 'ro',
        'description' => lang('language_code_ro_ro'),
        'native_description' => 'Română',
        'default_keyboard' => 'us',
        'default_time_zone' => 'Europe/Bucharest',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'ru_RU' => array(
        'translation_code' => 'ru',
        'description' => lang('language_code_ru_ru'),
        'native_description' => 'Русский',
        'default_keyboard' => 'ru',
        'default_time_zone' => 'Europe/Moscow',
        'text_direction' => 'LTR',
        'encoding' => 'UTF-8',
    ),

    'zh_CN' => array(
        'translation_code' => 'zh',
        'description' => lang('language_code_zh_cn'),
        'native_description' => '中文',
        'default_keyboard' => 'us',
        'default_time_zone' => 'Asia/Shanghai',
        'text_direction' => 'LTR',
        'encoding' => 'GB2312',
    ),
);
