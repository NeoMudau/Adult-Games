<?php

namespace WouldYouRatherBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use WouldYouRatherBundle\Repository\WouldYouRepository;

class GameController extends AbstractController
{
    #[Route('/games/would-you-rather', name: 'would_you_rather_game')]
    public function index(): Response
    {
        return $this->render('@WouldYouRather/game/index.html.twig');
    }

    #[Route('/games/would-you-rather/gameplay', name: 'would_you_rather_gameplay')]
    public function gameplay(WouldYouRepository $repository): Response
    {
        $question = $repository->findOneBy([
            'active' => true,
        ]);

        if (!$question) {
            throw $this->createNotFoundException('No active Would You Rather questions were found.');
        }

        return $this->render('@WouldYouRather/game/gameplay.html.twig', [
            'question' => $question,
        ]);
    }
}