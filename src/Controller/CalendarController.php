<?php

namespace ppe_gestion\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

//use ppe_gestion\Domain\User;
//use ppe_gestion\Domain\StudentToClass;
//use ppe_gestion\Domain\Student;
//use ppe_gestion\Domain\DisciplineToClass;
//use ppe_gestion\Domain\Evaluation;
//use ppe_gestion\Domain\Discipline;
//use ppe_gestion\Domain\ClassName;

class CalendarController {
   
    public function indexAction(Request $request ,Application $app)  {
        
  
    //$eval = $app['dao.evaluation']->findAllByDiscipline(1);
    return $app['twig']->render('calendar.html.twig');
    }
}
