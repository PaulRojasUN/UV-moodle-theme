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
 * Course renderer.
 *
 * @package    theme_mooveuv
 * @since      Moodle 4.0
 * @author     Iader E. García Gómez <iadergg@gmail.com>
 * @copyright  2022 Área de Nuevas Tecnologías - DINTEV - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_mooveuv\output\core;

defined('MOODLE_INTERNAL') || die();

use core_course_renderer;
use core_course_category;
use moodle_url;
use stdClass;
use core_course_list_element;
use coursecat_helper;
use theme_moove\util\course;

/**
 * Renderers to customize the courses view in Campus Virtual.
 *
 * @package    theme_mooveuv
 * @since      Moodle 4.0
 * @author     Iader E. García Gómez <iadergg@gmail.com>
 * @copyright  2022 Área de Nuevas Tecnologías - DINTEV - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class course_renderer extends core_course_renderer {

    /**
     * Renderer for the available courses frontpage section
     *
     * @since  Moodle 4.0
     * @author Iader E. García Gómez <iadergg@gmail.com>
     * @return type|string
     */
    public function frontpage_available_courses() {

        $categoryid = get_config('theme_mooveuv', 'open_courses_category');

        $content = '';
        $coursecategory = core_course_category::get($categoryid);
        $courses = $coursecategory->get_courses();

        $templatecontext = ['open_courses_title' => get_config('theme_mooveuv', 'open_courses_title'),
                            'open_courses_subtitle' => get_config('theme_mooveuv', 'open_courses_subtitle'),
                            'courses' => []];

        $coursecathelper = new coursecat_helper();

        foreach ($courses as $course) {

            if ($course instanceof stdClass) {
                $course = new core_course_list_element($course);
            }

            $courseutil = new course($course);

            array_push($templatecontext['courses'], ['id' => $course->id,
                                                     'fullname' => $course->fullname,
                                                     'courseurl' => new moodle_url('/course/view.php', array('id' => $course->id )),
                                                     'image' => $courseutil->get_summary_image(),
                                                     'category' => $courseutil->get_category()]);
        }

        $content .= $this->render_from_template('theme_mooveuv/frontpage_opencourses', $templatecontext);

        return $content;
    }
}
