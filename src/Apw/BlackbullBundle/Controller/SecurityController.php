<?php

namespace Apw\BlackbullBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;

class SecurityController extends Controller
{
    /**
     * @Route("/login")
     * @Template()
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        if($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)){

            $error = $request->attributes->get(SecurityContextInterface::AUTHENTICATION_ERROR);

        }elseif(null !== $session && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)){

            $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        }else{
            $error = '';
        }

        // ultimo nome utente inserito
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContextInterface::LAST_USERNAME);

        return
            array(
                // ultimo nome utente inserito
                'last_username' => $lastUsername,
                'error'         => $error,
            );
    }
}
