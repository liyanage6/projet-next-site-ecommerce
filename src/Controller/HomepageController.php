<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicholas
 * Date: 05/03/2019
 * Time: 15:27
 */

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{

     /**
     * @Route("/", name="homepage")
     */
    public function index ()
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('App\Entity\Product')->findAll();
        $user = $this->getUser();

        return $this->render('homepage/index.html.twig', [
            'mainNavHome' => true,
            'title' => 'Accueil',
            'user' => $user,
            'products' => $products
        ]);
    }
}