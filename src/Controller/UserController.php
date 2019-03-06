<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicholas
 * Date: 05/03/2019
 * Time: 15:33
 */

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/** @Route("/user")*/
class UserController extends AbstractController
{
    /**
     * @Route("/profile/{id}", name="profile")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profileAction (User $user) {
        $em = $this->getDoctrine()->getManager();

        if ($user != $this->getUser()) {
            throw new AccessDeniedException("You don't have the right to access to this page.");
        }

        return $this->render('security/profile.html.twig', [
            'mainNavMember' => true,
            'title' => 'Profile',
            'user' => $user
        ]);
    }
}