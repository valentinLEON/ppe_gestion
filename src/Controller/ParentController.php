<?php

namespace ppe_gestion\Controller;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;




/**
 * Description of StudentController
 *
 * @author ajj
 */
class ParentController {
  
   //                   LISTE
   
    public function afficheProfilParentAction(Request $request ,Application $app) {

       $etudiant1 = $app['dao.parent']->findAll();

        return $app['twig']->render('Parent/profilParent.html.twig', array(
            'id_student1' => $etudiant1,
        ));
    }


        public function afficheProfilStudentAction(Request $request ,Application $app) {

       $etudiant1 = $app['dao.parent']->findAll();

        return $app['twig']->render('Parent/profilStudent.html.twig', array(
            'id_student1' => $etudiant1,
        ));
    }
    //              STATS
//    public function studentStatIndex(Request $request ,Application $app){
//        return $app['twig']->render('StatTemplate/studentstats.html.twig');
//    }
 }
