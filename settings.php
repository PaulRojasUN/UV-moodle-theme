<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Theme Moove UV settings file.
 *
 * @package    theme_mooveuv
 * @since      Moodle 4.0
 * @author     Iader E. García Gómez <iadergg@gmail.com>
 * @copyright  2022 Área de Nuevas Tecnologías - DINTEV - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// This is used for performance, we don't need to know about these settings on every page in Moodle, only when
// we are looking at the admin settings pages.
if ($ADMIN->fulltree) {

    // Boost provides a nice setting page which splits settings onto separate tabs. We want to use it here.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingmooveuv', get_string('configtitle', 'theme_mooveuv'));

    /*
    * ----------------------
    * General settings tab
    * ----------------------
    */
    $page = new admin_settingpage('theme_mooveuv_general', get_string('generalsettings', 'theme_mooveuv'));

    // Logo file setting.
    $name = 'theme_mooveuv/logo';
    $title = get_string('logo', 'theme_mooveuv');
    $description = get_string('logodesc', 'theme_mooveuv');
    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo', 0, $opts);
    $page->add($setting);

    // Favicon setting.
    $name = 'theme_mooveuv/favicon';
    $title = get_string('favicon', 'theme_mooveuv');
    $description = get_string('favicondesc', 'theme_mooveuv');
    $opts = array('accepted_types' => array('.ico'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0, $opts);
    $page->add($setting);

    // Preset.
    $name = 'theme_mooveuv/preset';
    $title = get_string('preset', 'theme_mooveuv');
    $description = get_string('preset_desc', 'theme_mooveuv');
    $default = 'default.scss';

    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_mooveuv', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    // These are the built in presets.
    $choices['default.scss'] = 'default.scss';
    $choices['plain.scss'] = 'plain.scss';

    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Preset files setting.
    $name = 'theme_mooveuv/presetfiles';
    $title = get_string('presetfiles', 'theme_mooveuv');
    $description = get_string('presetfiles_desc', 'theme_mooveuv');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
        array('maxfiles' => 10, 'accepted_types' => array('.scss')));
    $page->add($setting);

    // Login page background image.
    $name = 'theme_mooveuv/loginbgimg';
    $title = get_string('loginbgimg', 'theme_mooveuv');
    $description = get_string('loginbgimg_desc', 'theme_mooveuv');
    $opts = array('accepted_types' => array('.png', '.jpg', '.svg'));
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbgimg', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $brand-color.
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_mooveuv/brandcolor';
    $title = get_string('brandcolor', 'theme_mooveuv');
    $description = get_string('brandcolor_desc', 'theme_mooveuv');
    $default = '#0f47ad';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $navbar-header-color.
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_mooveuv/secondarymenucolor';
    $title = get_string('secondarymenucolor', 'theme_mooveuv');
    $description = get_string('secondarymenucolor_desc', 'theme_mooveuv');
    $default = '#0f47ad';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $fontsarr = [
        'Roboto' => 'Roboto',
        'Poppins' => 'Poppins',
        'Montserrat' => 'Montserrat',
        'Open Sans' => 'Open Sans',
        'Lato' => 'Lato',
        'Raleway' => 'Raleway',
        'Inter' => 'Inter',
        'Nunito' => 'Nunito',
        'Encode Sans' => 'Encode Sans',
        'Work Sans' => 'Work Sans',
        'Oxygen' => 'Oxygen',
        'Manrope' => 'Manrope',
        'Sora' => 'Sora',
        'Epilogue' => 'Epilogue'
    ];

    $name = 'theme_mooveuv/fontsite';
    $title = get_string('fontsite', 'theme_mooveuv');
    $description = get_string('fontsite_desc', 'theme_mooveuv');
    $setting = new admin_setting_configselect($name, $title, $description, 'Roboto', $fontsarr);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_mooveuv/enablecourseindex';
    $title = get_string('enablecourseindex', 'theme_mooveuv');
    $description = get_string('enablecourseindex_desc', 'theme_mooveuv');
    $default = 1;
    $choices = array(0 => get_string('no'), 1 => get_string('yes'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $page->add($setting);

    // Must add the page after definiting all the settings!
    $settings->add($page);

    /*
    * ----------------------
    * Advanced settings tab
    * ----------------------
    */
    $page = new admin_settingpage('theme_mooveuv_advanced', get_string('advancedsettings', 'theme_mooveuv'));

    // Raw SCSS to include before the content.
    $setting = new admin_setting_scsscode('theme_mooveuv/scsspre',
        get_string('rawscsspre', 'theme_mooveuv'), get_string('rawscsspre_desc', 'theme_mooveuv'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_scsscode('theme_mooveuv/scss', get_string('rawscss', 'theme_mooveuv'),
        get_string('rawscss_desc', 'theme_mooveuv'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Google analytics block.
    $name = 'theme_mooveuv/googleanalytics';
    $title = get_string('googleanalytics', 'theme_mooveuv');
    $description = get_string('googleanalyticsdesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    /*
    * -----------------------
    * Frontpage settings tab
    * -----------------------
    */
    $page = new admin_settingpage('theme_mooveuv_frontpage', get_string('frontpagesettings', 'theme_mooveuv'));

    // Disable teachers from cards.
    $name = 'theme_mooveuv/disableteacherspic';
    $title = get_string('disableteacherspic', 'theme_mooveuv');
    $description = get_string('disableteacherspicdesc', 'theme_mooveuv');
    $default = 1;
    $choices = array(0 => get_string('no'), 1 => get_string('yes'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $page->add($setting);

    // Slideshow.
    $name = 'theme_mooveuv/slidercount';
    $title = get_string('slidercount', 'theme_mooveuv');
    $description = get_string('slidercountdesc', 'theme_mooveuv');
    $default = 1;
    $options = array();
    for ($i = 1; $i < 13; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // If we don't have an slide yet, default to the preset.
    $slidercount = get_config('theme_mooveuv', 'slidercount');

    if (!$slidercount) {
        $slidercount = 1;
    }

    for ($sliderindex = 1; $sliderindex <= $slidercount; $sliderindex++) {
        $fileid = 'sliderimage' . $sliderindex;
        $name = 'theme_mooveuv/sliderimage' . $sliderindex;
        $title = get_string('sliderimage', 'theme_mooveuv');
        $description = get_string('sliderimagedesc', 'theme_mooveuv');
        $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, $fileid, 0, $opts);
        $page->add($setting);
    }

    $setting = new admin_setting_heading('slidercountseparator', '', '<hr>');
    $page->add($setting);

    $name = 'theme_mooveuv/displaymarketingbox';
    $title = get_string('displaymarketingboxes', 'theme_mooveuv');
    $description = get_string('displaymarketingboxesdesc', 'theme_mooveuv');
    $default = 1;
    $choices = array(0 => get_string('no'), 1 => get_string('yes'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $page->add($setting);

    $displaymarketingbox = get_config('theme_mooveuv', 'displaymarketingbox');

    if ($displaymarketingbox) {
        // Marketingheading.
        $name = 'theme_mooveuv/marketingheading';
        $title = get_string('marketingsectionheading', 'theme_mooveuv');
        $default = 'Awesome App Features';
        $setting = new admin_setting_configtext($name, $title, '', $default);
        $page->add($setting);

        // Marketingcontent.
        $name = 'theme_mooveuv/marketingcontent';
        $title = get_string('marketingsectioncontent', 'theme_mooveuv');
        $default = 'Moove is a Moodle template based on Boost with modern and creative design.';
        $setting = new admin_setting_confightmleditor($name, $title, '', $default);
        $page->add($setting);

        for ($i = 1; $i < 5; $i++) {
            $filearea = "marketing{$i}icon";
            $name = "theme_mooveuv/$filearea";
            $title = get_string('marketingicon', 'theme_mooveuv', $i . '');
            $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'));
            $setting = new admin_setting_configstoredfile($name, $title, '', $filearea, 0, $opts);
            $page->add($setting);

            $name = "theme_mooveuv/marketing{$i}heading";
            $title = get_string('marketingheading', 'theme_mooveuv', $i . '');
            $default = 'Lorem';
            $setting = new admin_setting_configtext($name, $title, '', $default);
            $page->add($setting);

            $name = "theme_mooveuv/marketing{$i}content";
            $title = get_string('marketingcontent', 'theme_mooveuv', $i . '');
            $default = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.';
            $setting = new admin_setting_confightmleditor($name, $title, '', $default);
            $page->add($setting);
        }

        $setting = new admin_setting_heading('displaymarketingboxseparator', '', '<hr>');
        $page->add($setting);
    }

    // Enable or disable Numbers sections settings.
    $name = 'theme_mooveuv/numbersfrontpage';
    $title = get_string('numbersfrontpage', 'theme_mooveuv');
    $description = get_string('numbersfrontpagedesc', 'theme_mooveuv');
    $default = 1;
    $choices = array(0 => get_string('no'), 1 => get_string('yes'));
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $page->add($setting);

    $numbersfrontpage = get_config('theme_mooveuv', 'numbersfrontpage');

    if ($numbersfrontpage) {
        $name = 'theme_mooveuv/numbersfrontpagecontent';
        $title = get_string('numbersfrontpagecontent', 'theme_mooveuv');
        $description = get_string('numbersfrontpagecontentdesc', 'theme_mooveuv');
        $default = get_string('numbersfrontpagecontentdefault', 'theme_mooveuv');
        $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
        $page->add($setting);
    }

    // Enable FAQ.
    $name = 'theme_mooveuv/faqcount';
    $title = get_string('faqcount', 'theme_mooveuv');
    $description = get_string('faqcountdesc', 'theme_mooveuv');
    $default = 0;
    $options = array();
    for ($i = 0; $i < 11; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $page->add($setting);

    $faqcount = get_config('theme_mooveuv', 'faqcount');

    if ($faqcount > 0) {
        for ($i = 1; $i <= $faqcount; $i++) {
            $name = "theme_mooveuv/faqquestion{$i}";
            $title = get_string('faqquestion', 'theme_mooveuv', $i . '');
            $setting = new admin_setting_configtext($name, $title, '', '');
            $page->add($setting);

            $name = "theme_mooveuv/faqanswer{$i}";
            $title = get_string('faqanswer', 'theme_mooveuv', $i . '');
            $setting = new admin_setting_confightmleditor($name, $title, '', '');
            $page->add($setting);
        }

        $setting = new admin_setting_heading('faqseparator', '', '<hr>');
        $page->add($setting);
    }

    $settings->add($page);

    /*
    * --------------------
    * Footer settings tab
    * --------------------
    */
    $page = new admin_settingpage('theme_mooveuv_footer', get_string('footersettings', 'theme_mooveuv'));

    // Website.
    $name = 'theme_mooveuv/website';
    $title = get_string('website', 'theme_mooveuv');
    $description = get_string('websitedesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Mobile.
    $name = 'theme_mooveuv/mobile';
    $title = get_string('mobile', 'theme_mooveuv');
    $description = get_string('mobiledesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Mail.
    $name = 'theme_mooveuv/mail';
    $title = get_string('mail', 'theme_mooveuv');
    $description = get_string('maildesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Facebook url setting.
    $name = 'theme_mooveuv/facebook';
    $title = get_string('facebook', 'theme_mooveuv');
    $description = get_string('facebookdesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Twitter url setting.
    $name = 'theme_mooveuv/twitter';
    $title = get_string('twitter', 'theme_mooveuv');
    $description = get_string('twitterdesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Linkdin url setting.
    $name = 'theme_mooveuv/linkedin';
    $title = get_string('linkedin', 'theme_mooveuv');
    $description = get_string('linkedindesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Youtube url setting.
    $name = 'theme_mooveuv/youtube';
    $title = get_string('youtube', 'theme_mooveuv');
    $description = get_string('youtubedesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Instagram url setting.
    $name = 'theme_mooveuv/instagram';
    $title = get_string('instagram', 'theme_mooveuv');
    $description = get_string('instagramdesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Whatsapp url setting.
    $name = 'theme_mooveuv/whatsapp';
    $title = get_string('whatsapp', 'theme_mooveuv');
    $description = get_string('whatsappdesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Telegram url setting.
    $name = 'theme_mooveuv/telegram';
    $title = get_string('telegram', 'theme_mooveuv');
    $description = get_string('telegramdesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $settings->add($page);
}
