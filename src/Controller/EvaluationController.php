<?php

namespace ppe_gestion\Controller;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;

use ppe_gestion\Domain\Evaluation;
//use ppe_gestion\Domain\StudentToClass;
//use ppe_gestion\Domain\Student;
//use ppe_gestion\Domain\DisciplineToClass;
//use ppe_gestion\Domain\ClassName;
//use ppe_gestion\Domain\Discipline;



class EvaluationController {
   
    
    public function indexAction(Request $request ,Application $app)  {
        
   
    }
    
    // INDEX
     public function listIndexAction(Request $request ,Application $app)  {
    
      
     }
     
     // AJOUT INDEX
    public function addIndexAction(Request $request ,Application $app) {
        
        $classes = $app['dao.classNames']->findAll();
        $discipline = $app['dao.discipline']->findAll();
        $student = $app['dao.student']->findAll();

        return $app['twig']->render('FormTemplate/addnote.html.twig', array(
            'classNames' => $classes,
            'matieres' => $discipline,
            'students' => $student
            )
       );
    }
    
    
    
    // AJOUT TRAITEMENT
    public function addAction(Request $request ,Application $app) {
        
       $classes = $app['dao.classNames']->findAll();
       $disciplines = $app['dao.discipline']->findAll();
       $students = $app['dao.student']->findAll();
       
       $id_student = $request->request->get('id_student');
       $id_discipline = $request->request->get('id_discipline');
       $note = $request->request->get('note');
      
     //  $discipline = $app['dao.discipline']->findDiscipline($id_discipline);
       $coeff =  $request->request->get('coeff');
       $judgement = $request->request->get('judgement');
       
       $newEvaluation = new Evaluation();

       $newEvaluation->setGradeStudent($note);
       $newEvaluation->setDiscipline($id_discipline);
       $newEvaluation->setIdStudent($id_student);
       $newEvaluation->setCoefDiscipline($coeff);
       $newEvaluation->setJudgement($judgement);
       $newEvaluation->setDtCreate(date('Y-m-d H:i:s'));
       $newEvaluation->setDtUpdate(date('Y-m-d H:i:s'));

       $app['dao.evaluation']->saveGrade($newEvaluation);

       $app['session']->getFlashBag()->add('success', 'La note a été ajoutée avec succès !');

       return $app['twig']->render('FormTemplate/addnote.html.twig', array(

                'classNames'  => $classes,
                'matieres'    => $disciplines,
                'students'    => $students,
             )
        );
    }
    
    
    // STAT
    public function statAction(Request $request ,Application $app) {    
  
            return $app['twig']->render('StatTemplate/notestats.html.twig');
    }
    
     // TABLEAU DE BORD
    
     public function tabAction(Request $request ,Application $app) {    
  
           return $app['twig']->render('StatTemplate/notestats.html.twig');
    }
         
    // LISTE
    
     public function listAction(Request $request ,Application $app) {    
  
         return $app['twig']->render('ListTemplate/notelist.html.twig');
    }
    
}

