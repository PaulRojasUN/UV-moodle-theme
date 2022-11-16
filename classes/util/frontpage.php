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
 * Theme helper to load frontpage configuration.
 *
 * @package     theme_mooveuv
 * @author      2022 Iader E. Garcia Gomez <iadergg@gmail.com>
 * @copyright   2022 Área de Nuevas Tecnologías - DINTEV - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_mooveuv\util;

use theme_config;

/**
 * Helper to load front page configuration.
 *
 * @author  2022 Iader E. Garcia Gomez <iadergg@gmail.com>
 */
class frontpage {

    /** @var array  Image files */
    protected $files = [
        'sliderimage1',
        'sliderimage2',
        'sliderimage3',
        'sliderimage4',
        'sliderimage5',
        'sliderimage6',
        'sliderimage7',
        'sliderimage8',
        'sliderimage9',
        'sliderimage10',
        'sliderimage11',
        'sliderimage12'
    ];

    /**
     * Class constructor.
     */
    public function __construct() {
        $this->theme = theme_config::load('mooveuv');
    }

    /**
     * Magic method to get theme settings
     *
     * @param   string $name
     * @return  false|string|null
     * @author  2022 Iader E. Garcia Gomez <iadergg@gmail.com>
     */
    public function __get(string $name) {
        if (in_array($name, $this->files)) {
            return $this->theme->setting_file_url($name, $name);
        }

        if (empty($this->theme->settings->$name)) {
            return false;
        }

        return $this->theme->settings->$name;
    }

    /**
     * Returns template context for the frontpage slider.
     *
     * @return  array $templatecontext
     * @author  2022 Iader E. Garcia Gomez <iadergg@gmail.com>
     */
    public function frontpage_slideshow() {

        $templatecontext['slidercount'] = $this->slidercount;

        $defaultimage = new \moodle_url('/theme/mooveuv/pix/default_slide.jpg');
        for ($i = 1, $j = 0; $i <= $templatecontext['slidercount']; $i++, $j++) {
            $sliderimage = "sliderimage{$i}";
            $sliderurl = "sliderurl{$i}";
            $imagealt = "imagealt{$i}";

            $templatecontext['slides'][$j]['key'] = $j;
            $templatecontext['slides'][$j]['active'] = $i === 1;
            $templatecontext['slides'][$j]['image'] = $this->$sliderimage ?: $defaultimage->out();
            $templatecontext['slides'][$j]['sliderurl'] = $this->$sliderurl;
            $templatecontext['slides'][$j]['alt'] = $this->$imagealt;
        }

        return $templatecontext;
    }

    /**
     * Returns template context for the information section of the frontpage.
     *
     * @return  array $templatecontext
     * @author  2022 Iader E. Garcia Gomez <iadergg@gmail.com>
     */
    public function frontpage_info_section() {

        $templatecontext = [];

        // Customer service.
        $templatecontext['customer_service'] = array();
        $templatecontext['customer_service']['phone_icon'] = new \moodle_url('/theme/mooveuv/pix/icon/phone.png');
        $templatecontext['customer_service']['email_icon'] = new \moodle_url('/theme/mooveuv/pix/icon/email.png');
        $templatecontext['customer_service']['clock_icon'] = new \moodle_url('/theme/mooveuv/pix/icon/clock.png');
        $templatecontext['customer_service']['monday_office_hours'] = $this->monday_office_hours;
        $templatecontext['customer_service']['tuesday_office_hours'] = $this->tuesday_office_hours;
        $templatecontext['customer_service']['wednesday_office_hours'] = $this->wednesday_office_hours;
        $templatecontext['customer_service']['thursday_office_hours'] = $this->thursday_office_hours;
        $templatecontext['customer_service']['friday_office_hours'] = $this->friday_office_hours;
        $templatecontext['customer_service']['enable_text_about_customer_service'] = $this->about_customer_service;
        $templatecontext['customer_service']['text_about_customer_service'] = $this->about_customer_service_text;

        // Quick help.
        $helpcounter = $this->help_counter;
        $templatecontext['quick_help'] = array();

        for ($i = 1; $i <= $helpcounter; $i++) {
            $quickhelpname = "quick_help_name_{$i}";
            $quickhelpurl = "quick_help_url_{$i}";

            $templatecontext['quick_help'][$i - 1]['name'] = $this->$quickhelpname;
            $templatecontext['quick_help'][$i - 1]['url'] = $this->$quickhelpurl;
        }

        // Topics of interest.
        $topicofinterestcounter = $this->topics_of_interest_counter;
        $templatecontext['topics_of_interest'] = array();

        for ($i = 1; $i <= $topicofinterestcounter; $i++) {
            $topicofinterestname = "topic_of_interest_name_{$i}";
            $topicofinteresturl = "topic_of_interest_url_{$i}";

            $templatecontext['topics_of_interest'][$i - 1]['name'] = $this->$topicofinterestname;
            $templatecontext['topics_of_interest'][$i - 1]['url'] = $this->$topicofinteresturl;
        }

        return $templatecontext;
    }

    /**
     * Returns template context for the software licenses section of the frontpage.
     *
     * @return  array $templatecontext
     * @author  2022 Iader E. Garcia Gomez <iadergg@gmail.com>
     */
    public function frontpage_softwarelicenses_section() {
        $templatecontext = [];

        $softwarelicensescounter = $this->software_licenses_counter;
        $templatecontext['software_licenses'] = array();

        for ($i = 1; $i <= $softwarelicensescounter; $i++) {
            $softwarelicenseimage = "software_license_image_" . $i;
            $softwarelicenseurl = "software_license_url_" . $i;

            $templatecontext['software_licenses'][$i - 1]['image'] = $this->theme->setting_file_url($softwarelicenseimage,
                                                                                                    $softwarelicenseimage);
            $templatecontext['software_licenses'][$i - 1]['url'] = $this->$softwarelicenseurl;
            $templatecontext['software_licenses'][$i - 1]['is_first'] = 0;

            if ($i - 1 == 0) {
                $templatecontext['software_licenses'][$i - 1]['is_first'] = 1;
            }
        }

        return $templatecontext;
    }
}
