<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class GameController extends AbstractController
{
    #[Route('/games', name: 'app_games')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, Security $security, EntityManagerInterface $entityManager): Response
    {
        return $this->render('home/games.html.twig');
    }

    #[Route('/would/you/rather', name: 'app_wouldYouRather')]
    public function wouldYouRather(): Response
    {
        return $this->render('games/WouldYouRather.html.twig');
    }

    #[Route('/truth/dare', name: 'app_truthOrDare')]
    public function trthOrDare(): Response
    {
        return $this->render('games/TruthOrDare.twig');
    }
}
