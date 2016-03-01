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



class ExamenController {
 
    
    public function indexAction(Request $request ,Application $app)  {
        
      
    }
    
    // INDEX 
   
     public function listIndexAction(Request $request ,Application $app)  {
    
      
     }
     
     // AJOUT INDEX
     //  //  Récupère via l'url les examens
 
    
    public function addIndexAction(Request $request ,Application $app) {
        
         return $app['twig']->render('FormTemplate/addexam.html.twig');
    }
    
    
    
    // AJOUT TRAITEMENT
     // Récupère les données en post et insère en base de données
    
    public function addAction(Request $request ,Application $app) {

        $newExamen = new Examen();

        $newExamen->setNameExamen($request->request->get('name'));
        $newExamen->setDateExamen($request->request->get('date'));
        $newExamen->setDescriptionExamen($request->request->get('description'));

        $newExamen->setDtCreate(date('Y-m-d H:i:s'));
        $newExamen->setDtUpdate(date('Y-m-d H:i:s'));

        $app['dao.examen']->saveExamen($newExamen);

        $app['session']->getFlashBag()->add('success', 'L\'examen a été ajouté avec succès !');

        return $app->redirect('/addexamen', 301);
   
    }
    
    
    // STAT
    public function statAction(Request $request ,Application $app) {    
  
         
    }
    
     // TABLEAU DE BORD
    
     public function tabAction(Request $request ,Application $app) {    
  
          
    }
         
    // LISTE
    
     public function listAction(Request $request ,Application $app) {    
  
          return $app['twig']->render('TabTemplate/examlist.html.twig');
    }
    
}

