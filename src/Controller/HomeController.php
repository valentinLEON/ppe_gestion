<?php

namespace ppe_gestion\Controller;

use Silex\Application;
use Silex\Controller;
use Symfony\Component\HttpFoundation\Request;
use ppe_gestion\Domain;

class HomeController
{

    /**
     * Home page controller.
     *
     * @param Application $app Silex application
     */
    public function indexAction(Application $app) {
        
        $classes = $app['dao.classNames']->findAll();
        $exams = $app['dao.examen']->findAll();
        $classes_total = $app['dao.classNames']->countAll();

        $students = $app['dao.student']->findAll();
        $students_total = $app['dao.student']->countAll();
        $date = date('d/m/Y');

        return $app['twig']->render('index.html.twig', array(

                'classes'=>$classes,
                'exams'=>$exams,
                'classes_number'=>$classes_total,
                'students'=>$students,
                'students_number'=>$students_total,
                'date'=>$date,
        ));
    }

    /**
     * User login controller.
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function loginAction(Request $request, Application $app) {
        return $app['twig']->render('login.html.twig', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
            ));
    }
    
        public function login_checkAction(Request $request, Application $app) {
        return $app['twig']->render('login.html.twig', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
            ));
    }
    
    //      TESTLOGIN
    public function testroutesAction(Application $app){
        return $app['twig']->render('testroutes.html.twig');
    }
    
    //      TESTS ROUTES
    public function testloginAction(Request $request, Application $app){
        return $app['twig']->render('testlogin.html.twig');
    }
}
