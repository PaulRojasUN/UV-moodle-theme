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
 * Theme helper to load myoverview block content.
 *
 * @package     theme_mooveuv
 * @author      2022 Juan Felipe Orozco Escobar <juanfe.ores@gmail.com>
 * @copyright   2022 Área de Nuevas Tecnologías - DINTEV - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_mooveuv\util;

/**
 * Allows to render myoverview block content.
 *
 * @author  2022 Iader E. Garcia Gomez <iadergg@gmail.com>
 */
class myoverview {

    /**
     * Sets course images for a list of courses.
     *
     */
    public function set_course_images_from_list_of_courses($listofcourses) {

        global $CFG;

        foreach ($listofcourses as $course) {
            $courseurl = $CFG->wwwroot . "/course/view.php?id=" . $course->courseid;
            $course->courseimage = $this->get_course_image($course->courseid, $courseurl, $course->coursefullname);
        }
    }

    /**
     * Returns a course image.
     *
     * @param   int $courseid
     * @param   string $courseurl
     * @param   string $coursefullname
     */
    private function get_course_image($courseid, $courseurl, $coursefullname) {

        global $OUTPUT;

        $courseimageurl = \cache::make('core', 'course_image')->get($courseid);

        if ($courseimageurl) {
            $courseimage = \html_writer::link($courseurl, \html_writer::empty_tag('img', array(
                                                                    'src' => $courseimageurl,
                                                                    'alt' => $coursefullname,
                                                                    'class' => 'card-img-top w-100')));
        } else {
            $courseimageurl = $OUTPUT->get_generated_image_for_id($courseid);
            $courseimage = \html_writer::link($courseurl, \html_writer::empty_tag('img', array(
                                                                    'src' => $courseimageurl,
                                                                    'alt' => $coursefullname,
                                                                    'class' => 'card-img-top w-100')));
        }

        return $courseimage;
    }
}
