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

namespace theme_mooveuv\output;
use theme_mooveuv\util\myoverview;
use block_myoverview\output\main;
use block_courselistuv\user_course_manager;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/blocks/courselistuv/renderer.php');

/**
 * Override myoverview block renderer class.
 *
 * @package     theme_mooveuv
 * @author      2022 Juan Felipe Orozco Escobar <juanfe.ores@gmail.com>
 * @copyright   2022 Área de Nuevas Tecnologías - DINTEV - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_myoverview_renderer extends \block_myoverview\output\renderer {

    /**
     * Return the main content for the block overview.
     *
     * @param   main $main The main renderable
     * @return  string HTML string
     */
    public function render_main(main $main) {

        global $CFG, $USER;

        $templatecontext = [];
        $templatecontext['moodlecourseurl'] = $CFG->wwwroot . "/course/view.php?id=";
        // Get user courses.
        $usercoursemanager = new user_course_manager($USER->id);
        $usercourses = $usercoursemanager->get_courses();
        $templatecontext['regular_courses'] = $usercourses['regular_courses'];
        $templatecontext['non_regular_courses'] = $usercourses['non_regular_courses'];
        // Get courses images.
        $myoverviewutil = new myoverview();
        $myoverviewutil->set_course_images_from_list_of_courses($templatecontext['regular_courses']['current_semester']);
        $myoverviewutil->set_course_images_from_list_of_courses($templatecontext['non_regular_courses']);

        return $this->render_from_template('theme_mooveuv/myoverview_main', $templatecontext);
    }
}
