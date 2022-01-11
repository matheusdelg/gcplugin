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
// along with Moodle. If not, see <http://www.gnu.org/licenses/>.

/**
 * Index page of plugin.
 *
 * @package     local_gcplugin
 * @author      2022 Matheus Delgado <https://github.com/matheusdelg>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');

require_login();

$context = context_system::instance();
$PAGE->set_url('/local/gcplugin/index.php');
$PAGE->set_title(get_string('plugintitle', 'local_gcplugin'));
$PAGE->set_heading(get_string('plugintitle', 'local_gcplugin'));
$PAGE->set_context($context);

$PAGE->navbar->add(get_string('plugintitle', 'local_gcplugin'),
                   get_string('indexurl', 'local_gcplugin'));

$pageContext = [
    'pugintitle' => get_string('plugintitle', 'local_gcplugin'),
    'registerheading' => get_string('plugintitle', 'local_gcplugin'),
    'registerdescription' => get_string('registerdescription', 'local_gcplugin'),
    'registerurl' => get_string('registerurl', 'local_gcplugin'),
];

echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_gcplugin/index', $pageContext);
echo $OUTPUT->footer();