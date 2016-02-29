<?php

namespace ppe_gestion\Controller;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;

use ppe_gestion\Domain\Discipline;
//use ppe_gestion\Domain\StudentToClass;
//use ppe_gestion\Domain\Student;
//use ppe_gestion\Domain\DisciplineToClass;
//use ppe_gestion\Domain\Evaluation;
//use ppe_gestion\Domain\Discipline;
//use ppe_gestion\Domain\ClassName;

/**
 * Description of DisciplineController
 *
 * @author ajj
 */
class DisciplineController {
 
    
    
/**                                                            DISCIPLINES
 * 
 *  
 *                   TABLEAU DE BORD
 * 
 */
public function tabDisciplineAction(Application $app) {
    return $app['twig']->render('TabTemplate/disciplinetab.html.twig');
}
/**   *                       LISTE
 * 
 * route pour l'affichage de la liste des matières
 */
public function listDisciplineAction(Application $app) {
    
    $classes = $app['dao.classNames']->findAll();
    $disciplines = $app['dao.discipline']->findAll();
    $users = $app['dao.user']->findAll();
     
    return $app['twig']->render('ListTemplate/disciplineslist.html.twig', array(
        'classes'=>$classes,
        'disciplines'=>$disciplines,
        'users'=>$users,
    ));

/**                    AJOUT
 *
 * route pour l'ajout des matières
 */
$app->get('/adddiscipline', function () use ($app) {
    return $app['twig']->render('FormTemplate/adddiscipline.html.twig');
})->bind('adddiscipline');

$app->post('adddiscipline', function(Request $request) use($app){
    $newDiscipline = new Discipline();

    $newDiscipline->setNameDiscipline($request->request->get('matiere'));
    $newDiscipline->setDescription($request->request->get('description'));
    $newDiscipline->setDtCreate(date('Y-m-d H:i:s'));
    $newDiscipline->setDtUpdate(date('Y-m-d H:i:s'));

    $app['dao.discipline']->saveDiscipline($newDiscipline);
    $app['session']->getFlashBag()->add('success', 'La discipline a été ajoutée avec succès !');
    
    return  $app['twig']->render('FormTemplate/adddiscipline.html.twig');
    
})->bind('discipline');
    
}
