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
            'student' => $student));
    }
    
    
    
    // AJOUT TRAITEMENT
    public function addAction(Request $request ,Application $app) {

       $newEvaluation = new Evaluation();

       $student = $app['dao.student']->findStudent($request->request->get('etudiants'));
       $discipline = $app['dao.discipline']->findDiscipline($request->request->get('matiere'));

       $newEvaluation->setGradeStudent($request->request->get('note'));
       $newEvaluation->setDiscipline($discipline);
       $newEvaluation->setStudent($student);
       $newEvaluation->setCoefDiscipline($request->request->get('coeff'));
       $newEvaluation->setJudgement($request->request->get('judgement'));
       $newEvaluation->setDtCreate(date('Y-m-d H:i:s'));
       $newEvaluation->setDtUpdate(date('Y-m-d H:i:s'));

       var_dump($newEvaluation);


       $app['dao.evaluation']->saveGrade($newEvaluation);

       $app['session']->getFlashBag()->add('success', 'La note a été ajoutée avec succès !');

       $classes = $app['dao.classNames']->findAll();
       $discipline = $app['dao.discipline']->findAll();
       $student = $app['dao.student']->findAll();

       return $app['twig']->render('FormTemplate/addnote.html.twig', array(

           'classNames' => $classes,
           'matieres' => $discipline,
           'student' => $student)

         );
    }
    
    
    // STAT
    public function statAction(Request $request ,Application $app) {    
  
            return $app['twig']->render('StatTemplate/notestats.html.twig');
    }
    
     // TABLEAU DE BORD
    
     public function tabAction(Request $request ,Application $app) {    
  
           return $app['twig']->render('StatTemplate/notestat.html.twig');
    }
         
    // LISTE
    
     public function listAction(Request $request ,Application $app) {    
  
         return $app['twig']->render('ListTemplate/notelist.html.twig');
    }
    
}

