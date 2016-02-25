<?php

namespace ppe_gestion\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

use ppe_gestion\Domain\User;


class HomeController {

    /**
     * Home page controller.
     *
     * @param Application $app Silex application
     */
    public function indexAction(Application $app) {
        $users= $app['dao.user']->findAll();
        return $app['twig']->render('index.html.twig', array('users' => $users));
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
}
