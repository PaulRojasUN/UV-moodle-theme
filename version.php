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
 * Plugin version and other meta-data are defined here.
 * Note: the block courselistuv itself is not needed, but some overridden views in the
 *       theme (e.g. user profile) use its function that renders the list of courses.
 *
 * @package    theme_mooveuv
 * @since      Moodle 4.0
 * @author     Iader E. García Gómez <iadergg@gmail.com>
 * @copyright  2022 Área de Nuevas Tecnologías - DINTEV - Universidad del Valle <desarrollo.ant@correounivalle.edu.co>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->version = 2022112801;
$plugin->release = 'alpha1';
$plugin->requires = 2022041900;
$plugin->component = 'theme_mooveuv';
$plugin->dependencies = [
    'theme_boost' => 2022041900,
    'theme_moove' => 2022041200,
    'block_courselistuv' => 2022081300
];
