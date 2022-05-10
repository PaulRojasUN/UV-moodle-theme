<?php
// This file is part of Moodle - http://moodle.org/
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Settings file
 *
 * @package    theme_mooveuv
 * @since      Moodle 4.0
 * @author     Iader E. García Gómez <iadergg@gmail.com>
 * @copyright  2022 Área de Nuevas Tecnologías - DINTEV - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#0f47ad');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Variable $navbar-header-color.
    // We use an empty default value because the default colour should come from the preset.
    $name = 'theme_mooveuv/secondarymenucolor';
    $title = get_string('secondarymenucolor', 'theme_mooveuv');
    $description = get_string('secondarymenucolor_desc', 'theme_mooveuv');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '#0f47ad');
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

    // Disable bottom footer.
    $name = 'theme_mooveuv/disablefrontpageloginbox';
    $title = get_string('disablefrontpageloginbox', 'theme_mooveuv');
    $description = get_string('disablefrontpageloginboxdesc', 'theme_mooveuv');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Disable teachers from cards.
    $name = 'theme_mooveuv/disableteacherspic';
    $title = get_string('disableteacherspic', 'theme_mooveuv');
    $description = get_string('disableteacherspicdesc', 'theme_mooveuv');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    // Headerimg file setting.
    $name = 'theme_mooveuv/headerimg';
    $title = get_string('headerimg', 'theme_mooveuv');
    $description = get_string('headerimgdesc', 'theme_mooveuv');
    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'));
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'headerimg', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Homepage alert.
    $name = 'theme_mooveuv/alertmsg';
    $title = get_string('alert', 'theme_mooveuv');
    $description = get_string('alert_desc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Bannerheading.
    $name = 'theme_mooveuv/bannerheading';
    $title = get_string('bannerheading', 'theme_mooveuv');
    $description = get_string('bannerheadingdesc', 'theme_mooveuv');
    $default = 'Perfect Learning System';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Bannercontent.
    $name = 'theme_mooveuv/bannercontent';
    $title = get_string('bannercontent', 'theme_mooveuv');
    $description = get_string('bannercontentdesc', 'theme_mooveuv');
    $default = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_mooveuv/displaymarketingbox';
    $title = get_string('displaymarketingbox', 'theme_mooveuv');
    $description = get_string('displaymarketingboxdesc', 'theme_mooveuv');
    $default = 1;
    $choices = array(0 => 'No', 1 => 'Yes');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $page->add($setting);

    // Marketing1icon.
    $name = 'theme_mooveuv/marketing1icon';
    $title = get_string('marketing1icon', 'theme_mooveuv');
    $description = get_string('marketing1icondesc', 'theme_mooveuv');
    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'));
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing1icon', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing1heading.
    $name = 'theme_mooveuv/marketing1heading';
    $title = get_string('marketing1heading', 'theme_mooveuv');
    $description = get_string('marketing1headingdesc', 'theme_mooveuv');
    $default = 'We host';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing1subheading.
    $name = 'theme_mooveuv/marketing1subheading';
    $title = get_string('marketing1subheading', 'theme_mooveuv');
    $description = get_string('marketing1subheadingdesc', 'theme_mooveuv');
    $default = 'your MOODLE';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing1content.
    $name = 'theme_mooveuv/marketing1content';
    $title = get_string('marketing1content', 'theme_mooveuv');
    $description = get_string('marketing1contentdesc', 'theme_mooveuv');
    $default = 'Moodle hosting in a powerful cloud infrastructure';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing1url.
    $name = 'theme_mooveuv/marketing1url';
    $title = get_string('marketing1url', 'theme_mooveuv');
    $description = get_string('marketing1urldesc', 'theme_mooveuv');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing2icon.
    $name = 'theme_mooveuv/marketing2icon';
    $title = get_string('marketing2icon', 'theme_mooveuv');
    $description = get_string('marketing2icondesc', 'theme_mooveuv');
    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'));
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing2icon', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing2heading.
    $name = 'theme_mooveuv/marketing2heading';
    $title = get_string('marketing2heading', 'theme_mooveuv');
    $description = get_string('marketing2headingdesc', 'theme_mooveuv');
    $default = 'Consulting';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing2subheading.
    $name = 'theme_mooveuv/marketing2subheading';
    $title = get_string('marketing2subheading', 'theme_mooveuv');
    $description = get_string('marketing2subheadingdesc', 'theme_mooveuv');
    $default = 'for your company';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing2content.
    $name = 'theme_mooveuv/marketing2content';
    $title = get_string('marketing2content', 'theme_mooveuv');
    $description = get_string('marketing2contentdesc', 'theme_mooveuv');
    $default = 'Moodle consulting and training for you';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing2url.
    $name = 'theme_mooveuv/marketing2url';
    $title = get_string('marketing2url', 'theme_mooveuv');
    $description = get_string('marketing2urldesc', 'theme_mooveuv');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing3icon.
    $name = 'theme_mooveuv/marketing3icon';
    $title = get_string('marketing3icon', 'theme_mooveuv');
    $description = get_string('marketing3icondesc', 'theme_mooveuv');
    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'));
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing3icon', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing3heading.
    $name = 'theme_mooveuv/marketing3heading';
    $title = get_string('marketing3heading', 'theme_mooveuv');
    $description = get_string('marketing3headingdesc', 'theme_mooveuv');
    $default = 'Development';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing3subheading.
    $name = 'theme_mooveuv/marketing3subheading';
    $title = get_string('marketing3subheading', 'theme_mooveuv');
    $description = get_string('marketing3subheadingdesc', 'theme_mooveuv');
    $default = 'themes and plugins';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing3content.
    $name = 'theme_mooveuv/marketing3content';
    $title = get_string('marketing3content', 'theme_mooveuv');
    $description = get_string('marketing3contentdesc', 'theme_mooveuv');
    $default = 'We develop themes and plugins as your desires';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing3url.
    $name = 'theme_mooveuv/marketing3url';
    $title = get_string('marketing3url', 'theme_mooveuv');
    $description = get_string('marketing3urldesc', 'theme_mooveuv');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing4icon.
    $name = 'theme_mooveuv/marketing4icon';
    $title = get_string('marketing4icon', 'theme_mooveuv');
    $description = get_string('marketing4icondesc', 'theme_mooveuv');
    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'));
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing4icon', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing4heading.
    $name = 'theme_mooveuv/marketing4heading';
    $title = get_string('marketing4heading', 'theme_mooveuv');
    $description = get_string('marketing4headingdesc', 'theme_mooveuv');
    $default = 'Support';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing4subheading.
    $name = 'theme_mooveuv/marketing4subheading';
    $title = get_string('marketing4subheading', 'theme_mooveuv');
    $description = get_string('marketing4subheadingdesc', 'theme_mooveuv');
    $default = 'we give you answers';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing4content.
    $name = 'theme_mooveuv/marketing4content';
    $title = get_string('marketing4content', 'theme_mooveuv');
    $description = get_string('marketing4contentdesc', 'theme_mooveuv');
    $default = 'MOODLE specialized support';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Marketing4url.
    $name = 'theme_mooveuv/marketing4url';
    $title = get_string('marketing4url', 'theme_mooveuv');
    $description = get_string('marketing4urldesc', 'theme_mooveuv');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Enable or disable Slideshow settings.
    $name = 'theme_mooveuv/sliderenabled';
    $title = get_string('sliderenabled', 'theme_mooveuv');
    $description = get_string('sliderenableddesc', 'theme_mooveuv');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    // Enable slideshow on frontpage guest page.
    $name = 'theme_mooveuv/sliderfrontpage';
    $title = get_string('sliderfrontpage', 'theme_mooveuv');
    $description = get_string('sliderfrontpagedesc', 'theme_mooveuv');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_mooveuv/slidercount';
    $title = get_string('slidercount', 'theme_mooveuv');
    $description = get_string('slidercountdesc', 'theme_mooveuv');
    $default = 1;
    $options = array();
    for ($i = 0; $i < 13; $i++) {
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
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_mooveuv/slidertitle' . $sliderindex;
        $title = get_string('slidertitle', 'theme_mooveuv');
        $description = get_string('slidertitledesc', 'theme_mooveuv');
        $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_TEXT);
        $page->add($setting);

        $name = 'theme_mooveuv/slidercap' . $sliderindex;
        $title = get_string('slidercaption', 'theme_mooveuv');
        $description = get_string('slidercaptiondesc', 'theme_mooveuv');
        $default = '';
        $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
        $page->add($setting);
    }

    // Enable or disable Slideshow settings.
    $name = 'theme_mooveuv/numbersfrontpage';
    $title = get_string('numbersfrontpage', 'theme_mooveuv');
    $description = get_string('numbersfrontpagedesc', 'theme_mooveuv');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    // Enable sponsors on frontpage guest page.
    $name = 'theme_mooveuv/sponsorsfrontpage';
    $title = get_string('sponsorsfrontpage', 'theme_mooveuv');
    $description = get_string('sponsorsfrontpagedesc', 'theme_mooveuv');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_mooveuv/sponsorstitle';
    $title = get_string('sponsorstitle', 'theme_mooveuv');
    $description = get_string('sponsorstitledesc', 'theme_mooveuv');
    $default = get_string('sponsorstitledefault', 'theme_mooveuv');
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $page->add($setting);

    $name = 'theme_mooveuv/sponsorssubtitle';
    $title = get_string('sponsorssubtitle', 'theme_mooveuv');
    $description = get_string('sponsorssubtitledesc', 'theme_mooveuv');
    $default = get_string('sponsorssubtitledefault', 'theme_mooveuv');
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $page->add($setting);

    $name = 'theme_mooveuv/sponsorscount';
    $title = get_string('sponsorscount', 'theme_mooveuv');
    $description = get_string('sponsorscountdesc', 'theme_mooveuv');
    $default = 1;
    $options = array();
    for ($i = 0; $i < 5; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // If we don't have an slide yet, default to the preset.
    $sponsorscount = get_config('theme_mooveuv', 'sponsorscount');

    if (!$sponsorscount) {
        $sponsorscount = 1;
    }

    for ($sponsorsindex = 1; $sponsorsindex <= $sponsorscount; $sponsorsindex++) {
        $fileid = 'sponsorsimage' . $sponsorsindex;
        $name = 'theme_mooveuv/sponsorsimage' . $sponsorsindex;
        $title = get_string('sponsorsimage', 'theme_mooveuv');
        $description = get_string('sponsorsimagedesc', 'theme_mooveuv');
        $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, $fileid, 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_mooveuv/sponsorsurl' . $sponsorsindex;
        $title = get_string('sponsorsurl', 'theme_mooveuv');
        $description = get_string('sponsorsurldesc', 'theme_mooveuv');
        $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_TEXT);
        $page->add($setting);
    }

    // Enable clients on frontpage guest page.
    $name = 'theme_mooveuv/clientsfrontpage';
    $title = get_string('clientsfrontpage', 'theme_mooveuv');
    $description = get_string('clientsfrontpagedesc', 'theme_mooveuv');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_mooveuv/clientstitle';
    $title = get_string('clientstitle', 'theme_mooveuv');
    $description = get_string('clientstitledesc', 'theme_mooveuv');
    $default = get_string('clientstitledefault', 'theme_mooveuv');
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $page->add($setting);

    $name = 'theme_mooveuv/clientssubtitle';
    $title = get_string('clientssubtitle', 'theme_mooveuv');
    $description = get_string('clientssubtitledesc', 'theme_mooveuv');
    $default = get_string('clientssubtitledefault', 'theme_mooveuv');
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
    $page->add($setting);

    $name = 'theme_mooveuv/clientscount';
    $title = get_string('clientscount', 'theme_mooveuv');
    $description = get_string('clientscountdesc', 'theme_mooveuv');
    $default = 1;
    $options = array();
    for ($i = 0; $i < 5; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // If we don't have an slide yet, default to the preset.
    $clientscount = get_config('theme_mooveuv', 'clientscount');

    if (!$clientscount) {
        $clientscount = 1;
    }

    for ($clientsindex = 1; $clientsindex <= $clientscount; $clientsindex++) {
        $fileid = 'clientsimage' . $clientsindex;
        $name = 'theme_moove/clientsimage' . $clientsindex;
        $title = get_string('clientsimage', 'theme_mooveuv');
        $description = get_string('clientsimagedesc', 'theme_mooveuv');
        $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $title, $description, $fileid, 0, $opts);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $page->add($setting);

        $name = 'theme_mooveuv/clientsurl' . $clientsindex;
        $title = get_string('clientsurl', 'theme_mooveuv');
        $description = get_string('clientsurldesc', 'theme_mooveuv');
        $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_TEXT);
        $page->add($setting);
    }

    $settings->add($page);

    /*
    * --------------------
    * Footer settings tab
    * --------------------
    */
    $page = new admin_settingpage('theme_mooveuv_footer', get_string('footersettings', 'theme_mooveuv'));

    $name = 'theme_mooveuv/getintouchcontent';
    $title = get_string('getintouchcontent', 'theme_mooveuv');
    $description = get_string('getintouchcontentdesc', 'theme_mooveuv');
    $default = 'Conecti.me';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Website.
    $name = 'theme_mooveuv/website';
    $title = get_string('website', 'theme_mooveuv');
    $description = get_string('websitedesc', 'theme_mooveuv');
    $default = 'http://conecti.me';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Mobile.
    $name = 'theme_mooveuv/mobile';
    $title = get_string('mobile', 'theme_mooveuv');
    $description = get_string('mobiledesc', 'theme_mooveuv');
    $default = 'Mobile : +55 (98) 00123-45678';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Mail.
    $name = 'theme_mooveuv/mail';
    $title = get_string('mail', 'theme_mooveuv');
    $description = get_string('maildesc', 'theme_mooveuv');
    $default = 'willianmano@conecti.me';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Facebook url setting.
    $name = 'theme_mooveuv/facebook';
    $title = get_string('facebook', 'theme_mooveuv');
    $description = get_string('facebookdesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Twitter url setting.
    $name = 'theme_mooveuv/twitter';
    $title = get_string('twitter', 'theme_mooveuv');
    $description = get_string('twitterdesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Linkdin url setting.
    $name = 'theme_mooveuv/linkedin';
    $title = get_string('linkedin', 'theme_mooveuv');
    $description = get_string('linkedindesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Youtube url setting.
    $name = 'theme_mooveuv/youtube';
    $title = get_string('youtube', 'theme_mooveuv');
    $description = get_string('youtubedesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Instagram url setting.
    $name = 'theme_mooveuv/instagram';
    $title = get_string('instagram', 'theme_mooveuv');
    $description = get_string('instagramdesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Whatsapp url setting.
    $name = 'theme_mooveuv/whatsapp';
    $title = get_string('whatsapp', 'theme_mooveuv');
    $description = get_string('whatsappdesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Telegram url setting.
    $name = 'theme_mooveuv/telegram';
    $title = get_string('telegram', 'theme_mooveuv');
    $description = get_string('telegramdesc', 'theme_mooveuv');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
