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
 * Lang strings 'en'.
 *
 * @package    theme_mooveuv
 * @since      Moodle 4.0
 * @author     Iader E. García Gómez <iadergg@gmail.com>
 * @copyright  2022 Área de Nuevas Tecnologías - DINTEV - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Moove UV';
$string['configtitle'] = 'Moove UV';
$string['choosereadme'] = 'Moove UV is customised theme made for the Campus Virtual at Universidad del Valle. It is a child theme based on its parent Moove theme.';

$string['currentinparentheses'] = '(current)';
$string['region-side-pre'] = 'Right';
$string['prev_section'] = 'Previous section';
$string['next_section'] = 'Next section';
$string['themedevelopedby'] = 'This theme was developed by';
$string['access'] = 'Access';
$string['prev_activity'] = 'Previous activity';
$string['next_activity'] = 'Next activity';
$string['donthaveanaccount'] = 'Don\'t have an account?';
$string['signinwith'] = 'Sign in with';

// General settings tab.
$string['generalsettings'] = 'General';
$string['logo'] = 'Logo';
$string['logodesc'] = 'The logo is displayed in the header.';
$string['favicon'] = 'Custom favicon';
$string['favicondesc'] = 'Upload your own favicon.  It should be an .ico file.';
$string['preset'] = 'Theme preset';
$string['preset_desc'] = 'Pick a preset to broadly change the look of the theme.';
$string['presetfiles'] = 'Additional theme preset files';
$string['presetfiles_desc'] = 'Preset files can be used to dramatically alter the appearance of the theme. See <a href="https://docs.moodle.org/dev/Boost_Presets">Boost presets</a> for information on creating and sharing your own preset files.';
$string['loginbgimg'] = 'Login page background';
$string['loginbgimg_desc'] = 'Upload your custom background image for the login page.';
$string['brandcolor'] = 'Brand colour';
$string['brandcolor_desc'] = 'The accent colour.';
$string['secondarymenucolor'] = 'Secondary menu color';
$string['secondarymenucolor_desc'] = 'Secondary menu background color';
$string['navbarbg'] = 'Navbar color';
$string['navbarbg_desc'] = 'The left navbar color';
$string['navbarbghover'] = 'Navbar hover color';
$string['navbarbghover_desc'] = 'The left navbar hover color';
$string['fontsite'] = 'Site font';
$string['fontsite_desc'] = 'Default font site. You can try out the fonts on <a href="https://fonts.google.com">Google Fonts site</a>.';
$string['enablecourseindex'] = 'Enable course index';
$string['enablecourseindex_desc'] = 'You can show/hide course index navigation';

// Advanced settings tab.
$string['advancedsettings'] = 'Advanced';
$string['rawscsspre'] = 'Raw initial SCSS';
$string['rawscsspre_desc'] = 'In this field you can provide initialising SCSS code, it will be injected before everything else. Most of the time you will use this setting to define variables.';
$string['rawscss'] = 'Raw SCSS';
$string['rawscss_desc'] = 'Use this field to provide SCSS or CSS code which will be injected at the end of the style sheet.';
$string['googleanalytics'] = 'Google Analytics V4 Code';
$string['googleanalyticsdesc'] = 'Please enter your Google Analytics V4 code to enable analytics on your website. The code format shold be like [G-XXXXXXXXXX]';

// Frontpage settings tab.
$string['frontpagesettings'] = 'Frontpage';
$string['displaymarketingboxes'] = 'Show front page marketing boxes';
$string['displaymarketingboxesdesc'] = 'If you want to see the boxes, select yes <strong>then click SAVE</strong> to load the input fields.';
$string['marketingsectionheading'] = 'Marketing section heading title';
$string['marketingsectioncontent'] = 'Marketing section content';
$string['marketingicon'] = 'Marketing Icon {$a}';
$string['marketingheading'] = 'Marketing Heading {$a}';
$string['marketingcontent'] = 'Marketing Content {$a}';

$string['disableteacherspic'] = 'Disable teachers picture';
$string['disableteacherspicdesc'] = 'This setting hides the teachers\' pictures from the course cards.';

$string['sliderfrontpageloggedin'] = 'Show slideshow in frontpage after login?';
$string['sliderfrontpageloggedindesc'] = 'If enabled, the slideshow will be showed in the frontpage page replacing the header image.';
$string['slidercount'] = 'Slider count';
$string['slidercountdesc'] = 'Select how many slides you want to add <strong>then click SAVE</strong> to load the input fields.';
$string['sliderimage'] = 'Slider picture';
$string['sliderimagedesc'] = 'Add an image for your slide. Recommended size is 1500px x 540px or higher.';
$string['sliderurl'] = 'Slider URL';
$string['sliderurldesc'] = 'Add an URL for your slide.';
$string['imagealt'] = 'Image alt';
$string['imagealtdesc'] = 'Add an alt label for your slide.';

$string['default_url'] = 'https://campusvirtual.univalle.edu.co/moodle';

$string['customer_service_heading'] = 'Personalized service hours';
$string['customer_service_heading_desc'] = 'Enter the personalized attention schedules.';
$string['office_hours_per_day'] = '{$a} office hours';
$string['office_hours_per_day_desc'] = 'Hours of attention for {$a}';

$string['quickhelp_heading'] = 'Quick help';
$string['quickhelp_heading_desc'] = 'Links to quick help.';
$string['help_counter'] = 'Quick help counter';
$string['help_counter_desc'] = 'Select the number of help that will be linked on the frontpage.';
$string['quick_help_name'] = 'Name of quick help {$a}';
$string['quick_help_name_desc'] = 'Enter the name of the quick help {$a}';
$string['default_quick_help_name'] = 'Name of quick help {$a}';
$string['quick_help_url'] = 'URL to quick help {$a}';
$string['quick_help_url_desc'] = 'Enter the URL to the quick help {$a}';

$string['topics_of_interest_heading'] = 'Topics of interest';
$string['topics_of_interest_heading_desc'] = 'Links to topics of interest.';
$string['topics_of_interest_counter'] = 'Topics of interest counter';
$string['topics_of_interest_counter_desc'] = 'Select the number of topics that will be linked on the frontpage.';
$string['topic_of_interest_name'] = 'Name of topic of interest {$a}';
$string['topic_of_interest_name_desc'] = 'Enter the name of the topic of interest {$a}';
$string['default_topic_of_interest_name'] = 'Name of topic of interest {$a}';
$string['topic_of_interest_url'] = 'URL to topic of interest {$a}';
$string['topic_of_interest_url_desc'] = 'Enter the URL to the topic of interest {$a}';

$string['software_licenses_heading'] = 'Sotware licenses';
$string['software_licenses_heading_desc'] = 'Links to software licenses.';
$string['software_licenses_counter'] = 'Software licenses counter';
$string['software_licenses_counter_desc'] = 'Select the number of software licenses that will be linked on the frontpage.';
$string['software_license_image'] = 'Software license image';
$string['software_license_image_desc'] = 'Add software license image.';
$string['software_license_url'] = 'URL to software license {$a}';
$string['software_license_url_desc'] = 'Enter the URL to the software license {$a}';

$string['open_courses'] = 'Open courses';
$string['open_courses_heading_desc'] = 'Settings for open courses';
$string['open_courses_title'] = 'Open courses title';
$string['open_courses_title_desc'] = 'Enter open courses title';
$string['open_courses_subtitle'] = 'Open courses subtitle';
$string['open_courses_subtitle_desc'] = 'Enter open courses subtitle';
$string['open_courses_category'] = 'Open courses category';
$string['open_courses_category_desc'] = 'Select open courses category';

// Footer settings tab.
$string['footersettings'] = 'Footer';
$string['website'] = 'Website URL';
$string['websitedesc'] = 'Main company Website';
$string['mobile'] = 'Mobile';
$string['mobiledesc'] = 'Enter Mobile No. Ex: +5598912341234';
$string['mail'] = 'E-Mail';
$string['maildesc'] = 'Company support e-mail';
$string['facebook'] = 'Facebook URL';
$string['facebookdesc'] = 'Enter the URL of your Facebook. (i.e http://www.facebook.com/myinstitution)';
$string['twitter'] = 'Twitter URL';
$string['twitterdesc'] = 'Enter the URL of your twitter. (i.e http://www.twitter.com/myinstitution)';
$string['linkedin'] = 'Linkedin URL';
$string['linkedindesc'] = 'Enter the URL of your Linkedin. (i.e http://www.linkedin.com/myinstitution)';
$string['youtube'] = 'Youtube URL';
$string['youtubedesc'] = 'Enter the URL of your Youtube. (i.e https://www.youtube.com/user/myinstitution)';
$string['instagram'] = 'Instagram URL';
$string['instagramdesc'] = 'Enter the URL of your Instagram. (i.e https://www.instagram.com/myinstitution)';
$string['whatsapp'] = 'Whatsapp number';
$string['whatsappdesc'] = 'Enter your whatsapp number for contact.';
$string['telegram'] = 'Telegram';
$string['telegramdesc'] = 'Enter your Telegram contact or group link.';
$string['contactus'] = 'Contact us';
$string['followus'] = 'Follow us';

// Frontpage.
$string['aboutme'] = 'About me';
$string['personalinformation'] = 'Personal information';
$string['addcontact'] = 'Add contact';
$string['removecontact'] = 'Remove contact';
$string['customer_service_title'] = 'Customer service';
$string['business_hours'] = 'Business hours';
$string['no_attention'] = 'No attention';
$string['quick_help_title'] = 'Quick help';
$string['topics_of_interest_title'] = 'Topics of interest';
$string['institutional_licensed_software_title'] = 'Institutional licensed software';
$string['institutional_licensed_software_subtitle'] = 'for the use of the academic community of the Universidad del Valle';

// Theme settings.
$string['themesettings:accessibility'] = 'Accessibility';
$string['themesettings:fonttype'] = 'Font type';
$string['themesettings:defaultfont'] = 'Default font';
$string['themesettings:dyslexicfont'] = 'Dyslexic font';
$string['themesettings:enableaccessibilitytoolbar'] = 'Enable accessibility toolbar';
$string['themesettingg:successfullysaved'] = 'Accessibility settings successfully saved';

// Accessibility features.
$string['accessibility:fontsize'] = 'Font size';
$string['accessibility:decreasefont'] = 'Decrease font size';
$string['accessibility:resetfont'] = 'Reset font size';
$string['accessibility:increasefont'] = 'Increase font size';
$string['accessibility:sitecolor'] = 'Site color';
$string['accessibility:resetsitecolor'] = 'Reset site color';
$string['accessibility:sitecolor2'] = 'Low contrast 1';
$string['accessibility:sitecolor3'] = 'Low contrast 2';
$string['accessibility:sitecolor4'] = 'High contrast';

// Data privacy.
$string['privacy:metadata:preference:accessibilitystyles_fontsizeclass'] = 'The user\'s preference for font size.';
$string['privacy:metadata:preference:accessibilitystyles_sitecolorclass'] = 'The user\'s preference for site color.';
$string['privacy:metadata:preference:thememoovesettings_fonttype'] = 'The user\'s preference for font type.';
$string['privacy:metadata:preference:thememoovesettings_enableaccessibilitytoolbar'] = 'The user\'s preference for enable the accessibility toolbar.';

$string['privacy:accessibilitystyles_fontsizeclass'] = 'The current preference for the font size is: {$a}.';
$string['privacy:accessibilitystyles_sitecolorclass'] = 'The current preference for the site color is: {$a}.';
$string['privacy:thememoovesettings_fonttype'] = 'The current preference for the font type is: {$a}.';
$string['privacy:thememoovesettings_enableaccessibilitytoolbar'] = 'The current preference for enable accessibility toolbar is to show it.';

// Days of the week.
$string['monday'] = 'Monday';
$string['tuesday'] = 'Tuesday';
$string['wednesday'] = 'Wednesday';
$string['thursday'] = 'Thursday';
$string['friday'] = 'Friday';

// Footer.
$string['footer_title'] = 'Vicerrectoría Académica';
$string['footer_subtitle'] = 'Dirección de Nuevas Tecnologías y Educación Virtual - DINTEV';
$string['footer_uv_address'] = 'Edificio E18 Oficina 2004 / Campus Meléndez';
$string['footer_privacy_policy_desc'] = 'Privacy policy';
$string['footer_privacy_policy_url'] = 'https://campusvirtual.univalle.edu.co/moodle/local/infocvuv/privacidad-campus-virtual.php';

// User profile (mypublic template).
$string['user_profile_details'] = 'Details';

// Dashboard.
$string['dashboard_admin_disk_usage'] = 'Disk usage (moodledata)';
$string['dashboard_admin_disk_usage_not_calculated'] = 'Not calculated yet';
$string['dashboard_admin_total_users'] = 'Active / Suspended users';
$string['dashboard_admin_total_courses'] = 'Total courses';
$string['dashboard_admin_online_users'] = 'Online users (last 5 min)';
$string['dashboard_regularuser_library'] = 'Library';
$string['dashboard_regularuser_email'] = 'E-Mail';
$string['dashboard_regularuser_regulations'] = 'Regulations';
$string['dashboard_regularuser_techtoolbox'] = 'Tech Toolbox';
$string['dashboard_regularuser_affairdivision'] = 'Affair Division';

// Tasks.
$string['task_calculate_moodledata_disk_usage'] = 'Task to calculate the moodledata directory disk usage';
$string['cachedef_moodledatadiskusage'] = 'Stores moodledata directory disk usage for admin users in the dashboard';

// Mycourses: myoverview block.
$string['current_semester'] = 'Current semester';
$string['past_semesters'] = 'Past semesters';
$string['non_regular'] = 'Non-regular';
$string['no_courses_current_semester'] = 'You have no courses enrolled in the current semester.';
$string['no_courses_past_semesters'] = 'You have no courses enrolled in past semesters.';
$string['no_courses_non_regular'] = 'You have no non-regular courses enrolled.';
