<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicholas
 * Date: 05/03/2019
 * Time: 13:55
 */

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class RegistrationController
 * @package App\Controller
 */
class RegistrationController extends Controller
{
    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/register")
     */
    public function registerAction (Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            // 3) encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            // on active par default
            $user->setIsActive(true);
//            $user->addRole("ROLE_ADMIN");
            // 4) save the user
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('success', 'Votre compte à bien été créé');

//            return $this->redirectToRoute('login');
        }

        return $this->render('registration/register.html.twig', [
            'form' => $form->createView(),
            'mainNavRegistration' => true,
            'title' => 'Inscription'
        ]);
    }
}