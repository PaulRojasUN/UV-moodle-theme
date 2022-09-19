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
 * Theme helper to load front page configuration.
 *
 * @package    theme_mooveuv
 * @author     2022 Iader E. Garcia Gomez <iadergg@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_mooveuv\util;

use theme_config;

/**
 * Helper to load front page configuration.
 *
 * @package    theme_mooveuv
 * @since      Moodle 4.0
 * @author     2022 Iader E. Garcia Gomez <iadergg@gmail.com>
 * @copyright  2022 Área de Nuevas Tecnologías - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 */
class frontpage {

    /** @var array  Image files */
    protected $files = [
        'sliderimage1',
        'sliderimage2',
        'sliderimage3',
        'sliderimage4'
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
     * @param string $name
     * @return false|string|null
     * @author Iader E. Garcia Gomez <iadergg@gmail.com>
     * @since  Moodle 4.0
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
     * @return array $templatecontext
     * @author Iader E. Garcia Gomez <iadergg@gmail.com>
     * @since  Moodle 4.0
     */
    public function frontpage_slideshow() {

        $templatecontext['slidercount'] = $this->slidercount;

        $defaultimage = new \moodle_url('/theme/mooveuv/pix/default_slide.jpg');
        for ($i = 1, $j = 0; $i <= $templatecontext['slidercount']; $i++, $j++) {
            $sliderimage = "sliderimage{$i}";

            $templatecontext['slides'][$j]['key'] = $j;
            $templatecontext['slides'][$j]['active'] = $i === 1;
            $templatecontext['slides'][$j]['image'] = $this->$sliderimage ?: $defaultimage->out();
        }

        return $templatecontext;
    }

    /**
     * Returns template context for the information section of the frontpage.
     *
     * @return array $templatecontext
     * @author Iader E. Garcia Gomez <iadergg@gmail.com>
     * @since  Moodle 4.0
     */
    public function frontpage_infosection() {

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
}
