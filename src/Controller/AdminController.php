<?php

namespace ppe_gestion\Controller;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;

use ppe_gestion\Domain\User;
use ppe_gestion\Domain\StudentToClass;
use ppe_gestion\Domain\Student;
use ppe_gestion\Domain\DisciplineToClass;
use ppe_gestion\Domain\Evaluation;
use ppe_gestion\Domain\Discipline;
use ppe_gestion\Domain\ClassName;

use ppe_gestion\Form\Type\addNoteForm;



class AdminController {


    /**

     * Admin home page controller.

     *

     * @param Application $app Silex application

     */

    public function indexAction(Application $app) {

        $users = $app['dao.user']->findAll();

        return $app['twig']->render('admin.html.twig');

    }

    /**

     * Add user controller.

     *

     * @param Request $request Incoming request

     * @param Application $app Silex application

     */

    public function addUserAction(Request $request, Application $app) {

        $user = new User();

        $userForm = $app['form.factory']->create(new UserType(), $user);

        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {

            // generate a random salt value

            $salt = substr(md5(time()), 0, 23);

            $user->setSalt($salt);

            $plainPassword = $user->getPassword();

            // find the default encoder

            $encoder = $app['security.encoder.digest'];

            // compute the encoded password

            $password = $encoder->encodePassword($plainPassword, $user->getSalt());

            $user->setPassword($password); 

            $app['dao.user']->save($user);

            $app['session']->getFlashBag()->add('success', 'The user was successfully created.');

        }

        return $app['twig']->render('user_form.html.twig', array(

            'title' => 'New user',

            'userForm' => $userForm->createView()));

    }


    /**

     * Edit user controller.

     *

     * @param integer $id User id

     * @param Request $request Incoming request

     * @param Application $app Silex application

     */

    public function editUserAction($id, Request $request, Application $app) {

        $user = $app['dao.user']->find($id);

        $userForm = $app['form.factory']->create(new UserType(), $user);

        $userForm->handleRequest($request);

        if ($userForm->isSubmitted() && $userForm->isValid()) {

            $plainPassword = $user->getPassword();

            // find the encoder for the user

            $encoder = $app['security.encoder_factory']->getEncoder($user);

            // compute the encoded password

            $password = $encoder->encodePassword($plainPassword, $user->getSalt());

            $user->setPassword($password); 

            $app['dao.user']->save($user);

            $app['session']->getFlashBag()->add('success', 'The user was succesfully updated.');

        }

        return $app['twig']->render('user_form.html.twig', array(

            'title' => 'Edit user',

            'userForm' => $userForm->createView()));

    }


    /**

     * Delete user controller.

     *

     * @param integer $id User id

     * @param Application $app Silex application

     */

    public function deleteUserAction($id, Application $app) {

       
        // Delete the user

        $app['dao.user']->delete($id);

        $app['session']->getFlashBag()->add('success', 'The user was succesfully removed.');

        // Redirect to admin home page

        return $app->redirect($app['url_generator']->generate('admin'));

    }

}

