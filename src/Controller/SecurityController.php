<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nicholas
 * Date: 05/03/2019
 * Time: 14:33
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 * @package App\Controller
 */
class SecurityController extends Controller
{
    /**
     * @param Request $request
     * @param AuthenticationUtils $authenticationUtils
     * @Route("login", name="login")
     */
    public function login (Request $request, AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered bu the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->get('form.factory')
            ->createNamedBuilder(null)
            ->add('_username', null, ['label' => 'Email'])
            ->add('_password', PasswordType::class, ['label' => 'Mot de passe'])
            ->add('ok', SubmitType::class, [
                'label' => 'ok',
                'attr' => ['class' => 'btn-primary btn-block']])
            ->getForm();

        return $this->render('security/login.html.twig', [
            'mainNavLogin' => true,
            'title' => 'Connexion',
            'form' => $form->createView(),
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }
}