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
 * Library that allows to render the info boxes of the dashboard page.
 *
 * @package    theme_mooveuv
 * @author     Juan Felipe Orozco Escobar <juanfe.ores@gmail.com>
 * @copyright  2022 Área de Nuevas Tecnologías - DINTEV - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_mooveuv\util;

/**
 * Allows to render the info boxes of the dashboard page.
 *
 * @package    theme_mooveuv
 * @author     Juan Felipe Orozco Escobar <juanfe.ores@gmail.com>
 * @copyright  2022 Área de Nuevas Tecnologías - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class dashboard {

    /**
     * Returns the total number of active users.
     *
     * @return int
     * @throws \dml_exception
     */
    public function get_total_active_users() {
        global $DB;
        return $DB->count_records('user', array('deleted' => 0, 'suspended' => 0)) - 1;
    }

    /**
     * Returns the total number of suspended users.
     *
     * @return int
     * @throws \dml_exception
     */
    public function get_total_suspended_users() {
        global $DB;
        return $DB->count_records('user', array('deleted' => 0, 'suspended' => 1));
    }

    /**
     * Returns the total number of courses.
     *
     * @return int
     * @throws \dml_exception
     */
    public function get_total_courses() {
        global $DB;
        return $DB->count_records('course') - 1;
    }

    /**
     * Returns the total number of online users in the last 5 minutes.
     *
     * @return int
     * @throws \dml_exception
     */
    public function get_total_online_users() {
        $onlineusers = new \block_online_users\fetcher(null, time(), 300, null, CONTEXT_SYSTEM, null);
        return $onlineusers->count_users();
    }

    /**
     * Returns the total moodledata directory disk usage.
     *
     * @return string
     * @throws \coding_exception
     */
    public function get_total_moodledata_disk_usage() {
        $cache = \cache::make('theme_mooveuv', 'moodledatadiskusage');
        $diskusage = $cache->get('moodledatadiskusage');

        if (!$diskusage) {
            return get_string('dashboard_admin_disk_usage_not_calculated', 'theme_mooveuv');
        }

        $units = ' MB';
        if ($diskusage > 1024) {
            $units = ' GB';
        }

        return $diskusage . $units;
    }
}
