<?php

/**
 * Locale class.
 *
 * @category   apps
 * @package    language
 * @subpackage libraries
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2006-2011 ClearFoundation
 * @license    http://www.gnu.org/copyleft/lgpl.html GNU Lesser General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/language/
 */

///////////////////////////////////////////////////////////////////////////////
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Lesser General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Lesser General Public License for more details.
//
// You should have received a copy of the GNU Lesser General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
///////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////
// N A M E S P A C E
///////////////////////////////////////////////////////////////////////////////

namespace clearos\apps\language;

///////////////////////////////////////////////////////////////////////////////
// B O O T S T R A P
///////////////////////////////////////////////////////////////////////////////

$bootstrap = getenv('CLEAROS_BOOTSTRAP') ? getenv('CLEAROS_BOOTSTRAP') : '/usr/clearos/framework/shared';
require_once $bootstrap . '/bootstrap.php';

///////////////////////////////////////////////////////////////////////////////
// T R A N S L A T I O N S
///////////////////////////////////////////////////////////////////////////////

clearos_load_language('language');

///////////////////////////////////////////////////////////////////////////////
// D E P E N D E N C I E S
///////////////////////////////////////////////////////////////////////////////

// Classes
//--------

use \clearos\apps\base\Engine as Engine;
use \clearos\apps\base\File as File;

clearos_load_library('base/Engine');
clearos_load_library('base/File');

// Exceptions
//-----------

use \Exception as Exception;
use \clearos\apps\base\Engine_Exception as Engine_Exception;
use \clearos\apps\base\File_No_Match_Exception as File_No_Match_Exception;
use \clearos\apps\base\File_Not_Found_Exception as File_Not_Found_Exception;
use \clearos\apps\base\Validation_Exception as Validation_Exception;

clearos_load_library('base/Engine_Exception');
clearos_load_library('base/File_No_Match_Exception');
clearos_load_library('base/File_Not_Found_Exception');
clearos_load_library('base/Validation_Exception');

///////////////////////////////////////////////////////////////////////////////
// C L A S S
///////////////////////////////////////////////////////////////////////////////

/**
 * Locale class.
 *
 * @category   apps
 * @package    language
 * @subpackage libraries
 * @author     ClearFoundation <developer@clearfoundation.com>
 * @copyright  2006-2011 ClearFoundation
 * @license    http://www.gnu.org/copyleft/lgpl.html GNU Lesser General Public License version 3 or later
 * @link       http://www.clearfoundation.com/docs/developer/apps/language/
 */

class Locale extends Engine
{
    ///////////////////////////////////////////////////////////////////////////////
    // C O N S T A N T S
    ///////////////////////////////////////////////////////////////////////////////

    const FILE_LOCALE_CONFIG = '/etc/locale.conf';
    const FILE_FRAMEWORK = '/etc/clearos/framework/language.php';
    const FILE_CONFIG = '/etc/clearos/language.conf';
    const FILE_KEYBOARD = '/etc/sysconfig/keyboard';
    const FILE_GRUB_STATE = '/var/clearos/language/set_by_grub';
    const DEFAULT_ENCODING = 'UTF-8';
    const DEFAULT_KEYBOARD = 'us';
    const DEFAULT_TRANSLATION_CODE = 'en';
    const DEFAULT_LANGUAGE_CODE = 'en_US';
    const DEFAULT_TEXT_DIRECTION = 'LTR';

    ///////////////////////////////////////////////////////////////////////////////
    // V A R I A B L E S
    ///////////////////////////////////////////////////////////////////////////////

    protected $locales = array();
    protected $grub_codes = array();
    protected $translation_codes = array();

    ///////////////////////////////////////////////////////////////////////////////
    // M E T H O D S
    ///////////////////////////////////////////////////////////////////////////////

    /**
     * Locale constructor.
     */

    public function __construct()
    {
        clearos_profile(__METHOD__, __LINE__);

        include clearos_app_base('language') . '/deploy/locales.php';

        $this->locales = $locales;
        $this->grub_codes = $grub_codes;
        $this->translation_codes = $translation_codes;
    }

    /**
     * Returns the character encoding for the current locale.
     *
     * @param string $code language code
     *
     * @return string character encoding
     * @throws Engine_Exception
     */

    public function get_encoding($code = '')
    {
        clearos_profile(__METHOD__, __LINE__);

        if (empty($code))
            $code = $this->get_language_code();

        if (isset($this->locales[$code]) && isset($this->locales[$code]['encoding']))
            $encoding = $this->locales[$code]['encoding'];
        else
            $encoding = self::DEFAULT_ENCODING;

        return $encoding;
    }

    /**
     * Returns the system keyboard setting.
     *
     * @return string keyboard setting
     * @throws Engine_Exception
     */

    public function get_keyboard()
    {
        clearos_profile(__METHOD__, __LINE__);

        try {
            $file = new File(self::FILE_KEYBOARD);
            if ($file->exists())
                $keyboard = $file->lookup_value('/^KEYTABLE=/');
            else
                $keyboard = self::DEFAULT_KEYBOARD;
        } catch (File_Not_Found_Exception $e) {
            $keyboard = self::DEFAULT_KEYBOARD;
        } catch (Exception $e) {
            throw new Engine_Exception(clearos_exception_message($e));
        }

        return preg_replace('/\"/', '', $keyboard);
    }

    /**
     * Returns the list of available keyboards supported by the system.
     *
     * @return array list of keyboard layouts
     * @throws Engine_Exception
     */

    public function get_keyboards()
    {
        clearos_profile(__METHOD__, __LINE__);

        $keyboards = array();

        foreach ($this->locales as $locale => $details)
            $keyboards[] = $details['default_keyboard'];

        sort($keyboards);

        return array_unique($keyboards);
    }

    /**
     * Returns the system language code.
     *
     * The language code format is: en_US, fr_FR, etc.
     *
     * @return string language code 
     * @throws Engine_Exception
     */

    public function get_language_code()
    {
        clearos_profile(__METHOD__, __LINE__);

        $file = new File(self::FILE_LOCALE_CONFIG);

        try {
            if ($file->exists()) {
                $code = $file->lookup_value('/^LANG=/');
                $code = preg_replace('/\..*/', '', $code);
                $code = preg_replace('/\"/', '', $code);
            } else {
                $code = self::DEFAULT_LANGUAGE_CODE;
            }
        } catch (File_Not_Found_Exception $e) {
            $code = self::DEFAULT_LANGUAGE_CODE;
        } catch (File_No_Match_Exception $e) {
            $code = self::DEFAULT_LANGUAGE_CODE;
        } catch (Exception $e) {
            throw new Engine_Exception(clearos_exception_message($e));
        }

        return $code;
    }

    /**
     * Returns language list in their native language.
     *
     * This method returns a hash array of languages keyed on the code. 
     *
     * @return array list of languages
     * @throws Engine_Exception
     */

    public function get_languages()
    {
        clearos_profile(__METHOD__, __LINE__);

        $locales = $this->get_locales();

        $languages = array();

        foreach ($locales as $code => $details)
            $languages[$code] = $details['native_description'] . ' - ' . $code;

        return $languages;
    }

    /**
     * Returns the list of installed locales used in the framework.
     *
     * The information is an array keyed on the language code (e.g. en_US)
     * - description
     * - native_description e.g. Français instead of French
     * - default_keyboard
     * - default_time_zone
     * - text_direction
     * - encoding
     * - enabled
     *
     * @return array hash array of locales
     * @throws Engine_Exception
     */

    public function get_locales()
    {
        clearos_profile(__METHOD__, __LINE__);

        return $this->locales;
    }

    /**
     * Returns the text direction for the current locale.
     *
     * @param string $code language code
     *
     * @return string direction, RTL or LTR
     * @throws Engine_Exception
     */

    public function get_text_direction($code = '')
    {
        clearos_profile(__METHOD__, __LINE__);

        if (empty($code))
            $code = $this->get_language_code();

        if (isset($this->locales[$code]) && isset($this->locales[$code]['text_direction']))
            $text_direction = $this->locales[$code]['text_direction'];
        else
            $text_direction = self::DEFAULT_TEXT_DIRECTION;

        return $text_direction;
    }

    /**
     * Returns the translation code used by the framework.
     *
     * @param string $code language code
     *
     * The translation system in ClearOS uses a different set of
     * language codes from the translation service.  This method
     * returns the translation code for the configured locale.conf
     * language.
     *
     * @return string character encoding
     * @throws Engine_Exception
     */

    public function get_translation_code($code = '')
    {
        clearos_profile(__METHOD__, __LINE__);

        if (empty($code))
            $code = $this->get_language_code();

        if (isset($this->locales[$code]) && isset($this->locales[$code]['translation_code']))
            $translation_code = $this->locales[$code]['translation_code'];
        else
            $translation_code = self::DEFAULT_TRANSLATION_CODE;

        return $translation_code;
    }

    /**
     * Sets locale from grub configuration.
     *
     * @param boolean $force force the change
     *
     * @return void
     * @throws Engine_Exception, Validation_Exception
     */

    public function set_from_grub($force = FALSE)
    {
        clearos_profile(__METHOD__, __LINE__);

        // Priority order
        $configs = array(
            '/boot/efi/EFI/install/grubenv',
            '/boot/efi/EFI/clearos/grubenv',
            '/boot/grub2/grubenv'
        );

        $state_file = new File(self::FILE_GRUB_STATE);

        if (!$force && $state_file->exists())
            return;

        foreach ($configs as $config) {
            $file = new File($config, TRUE);

            if ($file->exists()) {
                try {
                    $grub_code = $file->lookup_value('/language=/');
                    if (array_key_exists($grub_code, $this->grub_codes)) {
                        $lang_code = $this->grub_codes[$grub_code];
                        $this->set_language_code($lang_code);

                        if (!$state_file->exists())
                            $state_file->create('root', 'root', '0644');

                        clearos_log('app-language', 'set locale from grub');
                        // We're done on the first match
                        return;
                    }
                } catch (File_No_Match_Exception $e) {
                    // Not fatal
                }
            }
        }
    }

    /**
     * Sets the keyboard.
     *
     * @param string $keyboard keyboard code
     *
     * @return void
     * @throws Engine_Exception, Validation_Exception
     */

    public function set_keyboard($keyboard)
    {
        clearos_profile(__METHOD__, __LINE__);

        Validation_Exception::is_valid($this->validate_keyboard($keyboard));

        $file = new File(self::FILE_KEYBOARD);

        if ($file->exists()) {
            $file->replace_lines('/^KEYTABLE=/', "KEYTABLE=\"$keyboard\"\n");
        } else {
            $file->create('root', 'root', '0644');
            $file->add_lines("KEYTABLE=\"$keyboard\"\n");
        }
    }

    /**
     * Sets the language.
     *
     * @param string $code language code
     *
     * @return void
     * @throws Engine_Exception, Validation_Exception
     */

    public function set_language_code($code)
    {
        clearos_profile(__METHOD__, __LINE__);

        Validation_Exception::is_valid($this->validate_language_code($code));

        $file = new File(self::FILE_LOCALE_CONFIG);
        $encoding = $this->locales[$code]['encoding'];

        if ($file->exists()) {
            $file->replace_lines('/^LANG=/', "LANG=\"$code.$encoding\"\n");
        } else {
            $file->create('root', 'root', '0644');
            $file->add_lines("LANG=\"$code.$encoding\"\n");
        }
    }

    /**
     * Sets the locale.
     *
     * @param string $code language code
     *
     * @return void
     * @throws Engine_Exception, Validation_Exception
     */

    public function set_locale($code)
    {
        clearos_profile(__METHOD__, __LINE__);

        Validation_Exception::is_valid($this->validate_language_code($code));

        // Language
        $this->set_language_code($code);

        // Set /etc/vconsole.conf
        //-----------------------
        // TODO
        // if (isset($this->locales[$code]) && isset($this->locales[$code]['default_keyboard']))
        //    $this->set_keyboard($this->locales[$code]['default_keyboard']);
    }

    ///////////////////////////////////////////////////////////////////////////////
    // V A L I D A T I O N   R O U T I N E S
    ///////////////////////////////////////////////////////////////////////////////

    /**
     * Validation routine for keyboard.
     *
     * @param string $keyboard keyboard
     *
     * @return string error message if keyboard is invalid
     * @throws Engine_Exception
     */

    public function validate_keyboard($keyboard)
    {
        clearos_profile(__METHOD__, __LINE__);

        foreach ($this->locales as $code => $details) {
            if ($details['default_keyboard'] === $keyboard)
                return;
        }

        return lang('language_keyboard_is_invalid');
    }

    /**
     * Validation routine for language code.
     *
     * @param string $code language code
     *
     * @return string error message if language code is invalid
     * @throws Engine_Exception
     */

    public function validate_language_code($code)
    {
        clearos_profile(__METHOD__, __LINE__);

        if (!array_key_exists($code, $this->locales))
            return lang('language_language_is_invalid');
    }
}
