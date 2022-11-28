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
 * Theme mooveuv functions and service definitions.
 *
 * @package   theme_mooveuv
 * @author     2022 Iader E. Garcia Gomez <iadergg@gmail.com>
 * @copyright  2022 Área de Nuevas Tecnologías - DINTEV - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$functions = array(
    'theme_mooveuv_get_course' => array(
        'classname'   => 'theme_mooveuv_external',
        'methodname'  => 'get_course',
        'classpath'   => 'theme/mooveuv/externallib.php',
        'description' => 'Get data course',
        'type'        => 'read',
        'ajax'          => true,
        'loginrequired' => true,
        'services' => [MOODLE_OFFICIAL_MOBILE_SERVICE]
    ),
);
