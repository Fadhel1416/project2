<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_default")
     */
    public function index(MailerInterface $mailer,CallApiService $callApiService): Response
    {
        $val=random_int(0,100);
        $email = (new Email())
        ->from($this->getUser()->getUserIdentifier())
        ->to('dad@test.com')
        ->subject('Demande de jouet N '.$val)
        ->text('Bonjour Maman et Papa, merci de me commander le jouet : je suis '.$this->getUser()->getUsername());

    $mailer->send($email);

        return $this->render('default/index.html.twig', [
            'data' => $callApiService->getFranceData(),
        ]);
    }
}
