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
    
    
//                     INDEX
    
   public function indexAction(Application $app) {
       
        return $app['twig']->render('TabTemplate/studenttab.html.twig');
   }

   //                   LISTE
   
    public function listIndexAction(Request $request ,Application $app) {

       $etudiants = $app['dao.student']->findAll();

        return $app['twig']->render('ListTemplate/studentslist.html.twig', array(
            'students' => $etudiants,
        ));
    }

    public function deleteIndexAction(Request $request, Application $app){
        $id_student = $request->request->get('$id_student');

        $app['dao.student']->deleteStudent($id_student);

        return $app->redirect($app['url_generator']->generate('studentslist'));
    }
    
    public function addIndexAction(Request $request ,Application $app) {
        $classes = $app['dao.classNames']->findAll();

        return $app['twig']->render('FormTemplate/addstudent.html.twig', array(
            'classes' => $classes
        ));
    }

    
    public function addAction(Request $request ,Application $app){
    
        $newStudent = new Student();

        $class = $app['dao.classNames']->findClassname($request->request->get('classname'));

        $newStudent->setName($request->request->get('name'));
        $newStudent->setFirstname($request->request->get('firstname'));
        $newStudent->setBirthday($request->request->get('birthday'));
        $newStudent->setAddress($request->request->get('address'));
        $newStudent->setTel($request->request->get('phone'));
        $newStudent->setEmail($request->request->get('email'));
        $newStudent->setStudentStatut($request->request->get('statut'));
        $newStudent->setDtCreate(date('Y-m-d H:i:s'));
        $newStudent->setDtUpdate(date('Y-m-d H:i:s'));
        $newStudent->setClass($class);

        $app['dao.student']->saveStudent($newStudent);

        $classes = $app['dao.classNames']->findAll();

        $app['session']->getFlashBag()->add('success', 'L Etudiant a bien été ajouté !'); //message flash success si réussi

        return $app['twig']->render('FormTemplate/addstudent.html.twig', array(
            'classes' => $classes
        ));
    }
    
    //              STATS
    public function studentStatIndex(Request $request ,Application $app){
        return $app['twig']->render('StatTemplate/studentstats.html.twig');
    }
 }
