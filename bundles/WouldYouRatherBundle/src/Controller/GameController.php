<?php

namespace WouldYouRatherBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use WouldYouRatherBundle\Repository\WouldYouRepository;
use Symfony\Component\HttpFoundation\Request;

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
        $question = $repository->findRandomActive();

        if (!$question) {
            throw $this->createNotFoundException('No active Would You Rather questions were found.');
        }

        return $this->render('@WouldYouRather/game/gameplay.html.twig', [
            'question' => $question,
        ]);
    }

    #[Route('/games/would-you-rather/question/random',name: 'would_you_rather_random_question',methods: ['GET'])]
    public function randomQuestion(Request $request, WouldYouRepository $repository): Response
    {
        $excludeId = $request->query->getInt('exclude');

        $question = $repository->findRandomActive(
            $excludeId > 0 ? $excludeId : null
        );

        if (!$question) {
            return $this->json([
                'error' => 'No active questions available.',
            ], 404);
        }

        return $this->json([
            'id' => $question->getId(),
            'question' => $question->getQuestion(),
            'optionA' => $question->getOptionA(),
            'optionB' => $question->getOptionB(),
        ]);
    }
}