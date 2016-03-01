<?php

namespace ppe_gestion\Controller;

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
  
          return $app['twig']->render('ListTemplate/examlist.html.twig');
    }
     
    
     //  FONCTION  AJOUT INDEX
     //  //  Récupère via l'url les examens
    public function addIndexAction(Request $request ,Application $app) {
        
         return $app['twig']->render('FormTemplate/addexam.html.twig');
    }
    
    //  FONCTION AJOUT TRAITEMENT
     // Récupère les données en post et insère en base de données
    
    public function addAction(Request $request ,Application $app) {
          
        $name = $request->request->get('name'); 
        $date = $request->request->get('date');
        $description = $request->request->get('description');
        
        $newExamen = new Examen();

        $newExamen->setNameExamen($name);
        $newExamen->setDateExamen($date);
        $newExamen->setDescriptionExamen($description);

        $newExamen->setDtCreate(date('Y-m-d H:i:s'));
        $newExamen->setDtUpdate(date('Y-m-d H:i:s'));

        $app['dao.examen']->saveExamen($newExamen);

        $app['session']->getFlashBag()->add('success', 'L\'examen a été ajouté avec succès !');
        
        return $app['twig']->render('/addexam', array(
                'name'              => $name,
                'date'              => $date ,
                'description'       => $description, 
             ));
    }
    
    
    // STAT
    public function statAction(Request $request ,Application $app) {    
  
         
    }
    
     // TABLEAU DE BORD
    
     public function tabAction(Request $request ,Application $app) {    
  
          
    }
         

    
}

