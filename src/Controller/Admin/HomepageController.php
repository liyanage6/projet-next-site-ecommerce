<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicholas
 * Date: 05/03/2019
 * Time: 15:38
 */

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/admin") */
class HomepageController extends Controller
{
    /**
     * @Route("/", name="homepage-admin")
     */
    public function index ()
    {
        $user = $this->getUser();

        return $this->render('admin/homepage/index.html.twig', [
            'mainNavAdmin' => true,
            'title' => 'Espace Admin',
            'user' => $user
        ]);
    }
}