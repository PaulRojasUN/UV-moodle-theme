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
 * @copyright  2022 Iader E. Garcia Gomez <iadergg@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_mooveuv\util;

use theme_config;

/**
 * Helper to load front page configuration.
 *
 * @package    theme_mooveuv
 * @copyright  2022 Iader E. Garcia Gomez <iadergg@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
     * Class constructor
     */
    public function __construct() {
        $this->theme = theme_config::load('mooveuv');
    }

    /**
     * Magic method to get theme settings
     *
     * @param string $name
     *
     * @return false|string|null
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
     * Returns template context for the front page slider.
     *
     * @return void
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
}
