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
 * @package     local_gcplugin
 * @author      2022 Matheus Delgado <https://github.com/matheusdelg>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 
require_once('../../config.php');
require_once('classes/forms/createstudent.php');

require_login();

$context = context_system::instance();
$PAGE->set_url('/local/gcplugin/register.php', $param);
$PAGE->set_title(get_string('plugintitle', 'local_gcplugin'));
$PAGE->set_heading(get_string('registerheading', 'local_gcplugin'));
$PAGE->set_context($context);

$PAGE->navbar->add(get_string('registerheading', 'local_gcplugin'),
                   get_string('registerurl', 'local_gcplugin'));

$register_form = new createstudent();

if ($register_form->is_cancelled()) {
    //Handle form cancel operation, if cancel button is present on form
    echo "Ação cancelada"; die;

} else if ($fromform = $register_form->get_data()) {
    //In this case you process validated data. $mform->get_data() returns data posted in form.
    echo "Usuário registrado!"; die;
}