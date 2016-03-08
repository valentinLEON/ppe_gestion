<?php

namespace ppe_gestion\Controller;

use ppe_gestion\Domain\Evaluation;
use Silex\Application;

use Symfony\Component\HttpFoundation\Request;

use ppe_gestion\Domain\Examen;
//use ppe_gestion\Domain\StudentToClass;
//use ppe_gestion\Domain\Student;
//use ppe_gestion\Domain\DisciplineToClass;
//use ppe_gestion\Domain\ClassName;
//use ppe_gestion\Domain\Discipline;



class ExamenController {
 
    
    public function indexAction(Request $request ,Application $app)  {
        
      
    }
    
    // AFFICHE INDEX 
   
     public function listIndexAction(Request $request ,Application $app)  {
    
      
     }
     
    // AFFICHE LISTE
    
     public function listAction(Request $request ,Application $app) {    

         $students = $app['dao.student']->findAll();

          return $app['twig']->render('ListTemplate/examlist.html.twig', array(
              'students' => $students,
          ));
    }
     
    
     //  FONCTION  AJOUT INDEX
     //  //  Récupère via l'url les examens
    public function addIndexAction(Request $request ,Application $app) {

        $classes = $app['dao.classNames']->findAll();

        return $app['twig']->render('FormTemplate/addexam.html.twig', array(
                'classNames' => $classes,
            )
        );
    }
    
    //  FONCTION AJOUT TRAITEMENT
     // Récupère les données en post et insère en base de données
    
    public function addAction(Request $request ,Application $app) {
          
        $name = $request->request->get('name');
        $date = $request->request->get('date');
        $id_class = $request->request->get('id_class');

        $description = $request->request->get('description');
        
        $newExamen = new Examen();

        $newExamen->setExamenName($name);
        $newExamen->setDateExamen($date);
        $newExamen->setDescriptionExamen($description);
        $newExamen->setClass($id_class);

        $newExamen->setDtCreate(date('Y-m-d H:i:s'));
        $newExamen->setDtUpdate(date('Y-m-d H:i:s'));

        $testsave=$app['dao.examen']->saveExamen($newExamen);
        
        if($testsave){
             $app['session']->getFlashBag()->add('success', 'Examen ajouté avec succès !');
        }
        
        return $app['twig']->render('FormTemplate/addexam.html.twig', [
                'name'              => $name,
                'classes'          => $id_class,
                'date'              => $date ,
                'description'       => $description, 
             ]);
    }

    public function editStudentIndexAction(Request $request, Application $app) {

        $id_student = $request->request->get('id_student');
        $disciplines = $app['dao.discipline']->findAll();

        $studentById = $app['dao.student']->findStudent($id_student);

        return $app['twig']->render('FormTemplate/addnote.html.twig', array(
            //'classe'        =>$classes,
            'discipline'      =>$disciplines,
            //'user'          =>$users,
            'id_student'      =>$id_student,
            'studentById'     =>$studentById,

        ));


    }

    public function editStudentAction(Request $request, Application $app) {

        //$classes = $app['dao.classNames']->findAll();
        $disciplines = $app['dao.discipline']->findAll();
        //$users = $app['dao.user']->findAll();

        $id_evaluation = $request->request->get('id_user');
        $grade_student = $request->request->get('username');
        $judgment = $request->request->get('name');
        $coef_discipline = $request->request->get('firstname');
        $id_discipline = $request->request->get('id_discipline');
        $id_student = $request->request->get('id_role');
        $date_create = date('Y-m-d H:i:s');

        $studentById=$app['dao.student']->findStudent($id_student);


        $newEvaluation = new Evaluation();

        $newEvaluation->setIdEvaluation($id_evaluation);
        $newEvaluation->setGradeStudent($grade_student);
        $newEvaluation->setCoefDiscipline($coef_discipline);
        $newEvaluation->setJudgement($judgment);
        $newEvaluation->setDiscipline($id_discipline);
        $newEvaluation->setDtUpdate($date_create);
        $newEvaluation->setIdStudent($id_student);

        $app['dao.evaluation']->saveUser($newEvaluation);

        $app['session']->getFlashBag()->add('success', 'La note est bien enregistrée ');

        return $app['twig']->render('FormTemplate/addnote.html.twig', array(
            'discipline'    =>$disciplines,
            'grade'         =>$grade_student,
            'id_discipline' =>$id_discipline,
            'coef'          =>$coef_discipline,
            'jugement'      => $judgment,
            'id_evaluation' =>$id_evaluation,
            'studentById'   =>$studentById,

        ));
    }

    
    // STAT
    public function statAction(Request $request ,Application $app) {    
  
         
    }
    
     // TABLEAU DE BORD
    
     public function tabAction(Request $request ,Application $app) {    
  
          
    }
         

    
}

