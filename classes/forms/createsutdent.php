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
 * Extended standard form Moodle class to register a new student.
 *
 * @package     local_gcplugin
 * @author      2022 Matheus Delgado <https://github.com/matheusdelg>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class create_student_form extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG, $DB;
        
        $mform = $this->_form; // Don't forget the underscore! 

        // Cabeçalho e descrição (informações do estudante):
        $mform->addElement('header', 'studentinfo', get_string('studentinfo','local_gcplugin')); 
        $mform->addElement('static', 'studentinfodescription', get_string('studentinfodescription','local_gcplugin')); 

        // Nome completo do aluno:
        $mform->addElement('text', 'studentname', get_string('studentname', 'local_gcplugin')); 
        $mform->setType('studentname', PARAM_NOTAGS);                  
        $mform->setDefault('studentname', get_string('studentname', 'local_gcplugin'));   
        
        // E-mail de contato do aluno:
        $mform->addElement('text', 'studentemail', get_string('studentemail', 'local_gcplugin')); 
        $mform->setType('studentemail', PARAM_NOTAGS);                  
        $mform->setDefault('studentemail', get_string('studentemail', 'local_gcplugin'));   
        
        // Telefone de contato do aluno:
        $mform->addElement('text', 'studentphonenumber', get_string('studentphonenumber', 'local_gcplugin')); 
        $mform->setType('studentphonenumber', PARAM_NOTAGS);                  
        $mform->setDefault('studentphonenumber', get_string('studentphonenumber', 'local_gcplugin'));   

        // Data de nascimento do aluno:
        $mform->addElement('date_selector', 'studentbirthdate', get_string('studentbirthdate', 'local_gcplugin')); 
        $mform->setType('studentbirthdate', PARAM_NOTAGS);                  
        $mform->setDefault('studentbirthdate', get_string('studentbirthdate', 'local_gcplugin'));   
        
        // Cabeçalho e descrição (informações da escola):
        $mform->addElement('header', 'schoolinfo', get_string('schoolinfo','local_gcplugin')); 
        $mform->addElement('static', 'schoolinfodescription', get_string('schoolinfodescription','local_gcplugin')); 
            
        // Ano letivo do aluno:
        $sy_ids  = $DB->get_records('gcplugin_schoolyear', null, '', 'id');
        $sy_desc = $DB->get_records('gcplugin_schoolyear', null, '', 'desc');
        $schoolyears = array_combine($sy_ids, $sy_desc);

        $mform->addElement('select', 'schoolyear', get_string('schoolyear', 'local_gcplugin'), $schoolyears); 
        $mform->setType('schoolyear', PARAM_NOTAGS);                  
        $mform->setDefault('schoolyear', get_string('schoolyear', 'local_gcplugin'));    
    }

    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}