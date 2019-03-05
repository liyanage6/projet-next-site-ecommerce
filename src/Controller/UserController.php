<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicholas
 * Date: 05/03/2019
 * Time: 15:33
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/user")*/
class UserController extends Controller
{
    /**
     * @Route("/")
     */
    public function index () {
        return $this->render('user/index.html.twig', [
            'mainNavMember' => true,
            'title' => 'Espace Membre'
        ]);
    }
}