<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicholas
 * Date: 05/03/2019
 * Time: 15:27
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends Controller
{
    /**
     * @Route("/")
     */
    public function index ()
    {
        return $this->render('homepage/index.html.twig', [
            'mainNavHome' => true,
            'title' => 'Accueil'
        ]);
    }
}