<?php

namespace ppe_gestion\Controller;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;

use ppe_gestion\Domain\User;
use ppe_gestion\Domain\StudentToClass;
use ppe_gestion\Domain\Student;
use ppe_gestion\Domain\DisciplineToClass;
use ppe_gestion\Domain\Evaluation;
use ppe_gestion\Domain\Discipline;
use ppe_gestion\Domain\ClassName;

use ppe_gestion\Form\Type\addNoteForm;



class AdminController {


    /**

     * Admin home page controller.

     *

     * @param Application $app Silex application

     */

    public function indexAction(Application $app) {

     $users = $app['dao.user']->findAll();
     $users_total = $app['dao.user']->countAll(); 

     $classes = $app['dao.classNames']->findAll();
     $classes_total = $app['dao.classNames']->countAll();
      
     $students = $app['dao.student']->findAll();
     $students_total = $app['dao.student']->countAll();
          
     $disciplines = $app['dao.discipline']->findAll();
     $disciplines_total = $app['dao.discipline']->countAll();
     
     $date = date("d/m/Y");
    
    return $app['twig']->render('TabTemplate/admintab.html.twig', array(
        
        'users'                 =>$users,
        'users_number'          =>$users_total,
        'disciplines'           =>$disciplines,
        'disciplines_number'    =>$disciplines_total,
        'absences_number'       =>'1',
        'retards_number'        =>'1',
        'retards_number'        =>'1',
        'classes'               =>$classes,
        'disciplines'           =>$disciplines,
        'students'              =>$students,
        'students_number'       =>$students_total,
        'classes_number'        =>$classes_total,
        'disciplines_number'    =>$disciplines_total,
        'date'                  =>$date,
        
    ));
    

    }


}

