<?php

namespace ppe_gestion\Controller;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;

use ppe_gestion\Domain\Student;
//use ppe_gestion\Domain\User;
//use ppe_gestion\Domain\StudentToClass;
//use ppe_gestion\Domain\Student;
//use ppe_gestion\Domain\DisciplineToClass;
//use ppe_gestion\Domain\Evaluation;
//use ppe_gestion\Domain\Discipline;
//use ppe_gestion\Domain\ClassName;

/**
 * Description of StudentController
 *
 * @author ajj
 */
class StudentController {
    
    
//    INDEX
   public function indexAction(Application $app) {
       
        return $app['twig']->render('TabTemplate/studenttab.html.twig');
   }

   // LISTE
    public function listIndexAction(Request $request ,Application $app) {

       $etudiants = $app['dao.student']->findAll();

        return $app['twig']->render('ListTemplate/studentslist.html.twig', array(
            'students' => $etudiants,
        ));
    }
    
    public function addIndexAction(Request $request ,Application $app) {
        $classes = $app['dao.classNames']->findAll();

        return $app['twig']->render('FormTemplate/addstudent.html.twig', array(
            'classes' => $classes
        ));
    }
    
    
 }
