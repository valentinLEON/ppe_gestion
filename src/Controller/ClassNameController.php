<?php

namespace ppe_gestion\Controller;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;

use ppe_gestion\Domain\ClassName;
//use ppe_gestion\Domain\StudentToClass;
//use ppe_gestion\Domain\Student;
//use ppe_gestion\Domain\DisciplineToClass;
//use ppe_gestion\Domain\Evaluation;
//use ppe_gestion\Domain\Discipline;
//use ppe_gestion\Domain\ClassName;


class ClassNameController {
   
    
    public function indexAction(Request $request ,Application $app)  {
        
     return $app['twig']->render('TabTemplate/classetab.html.twig');
    }
    
    // INDEX
     public function listClassNameindexAction(Request $request ,Application $app)  {
    
        $classes = $app['dao.classNames']->findAll();
        $disciplines = $app['dao.discipline']->findAll();
        $users = $app['dao.user']->findAll();

       return $app['twig']->render('ListTemplate/classeslist.html.twig', array(
           'classes'=>$classes,
           'disciplines'=>$disciplines,
           'users'=>$users,
       ));
     }
     
     // AJOUT INDEX
    public function addClassNameIndexAction(Request $request ,Application $app) {
         $classes = $app['dao.classNames']->findAll();

      return $app['twig']->render('FormTemplate/addclass.html.twig', array(
          
             'classes' => $classes
          
      ));
         
    }
    
    // AJOUT TRAITEMENT
    public function addClassNameAction(Request $request ,Application $app) {
        
        $newClass = new ClassName();

        $newClass->setClassName($request->request->get('class'));
        $newClass->setClassOption($request->request->get('option'));
        $newClass->setClassYear($request->request->get('year'));
        $newClass->setDescription($request->request->get('description'));
        $newClass->setNombreEtudiant($request->request->get('nombreEtudiant'));
        $newClass->setDtCreate(date('Y-m-d H:i:s'));
        $newClass->setDtUpdate(date('Y-m-d H:i:s'));

        $app['dao.classNames']->saveClassName($newClass);
        $app['session']->getFlashBag()->add('success', 'La classe a été ajouté avec succès !');

        return $app['twig']->render('ListTemplate/classeslist.html.twig');
      
    }
}

