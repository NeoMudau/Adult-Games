<?php

namespace WouldYouRatherBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use WouldYouRatherBundle\Repository\WouldYouRepository;
use Symfony\Component\HttpFoundation\Request;
use WouldYouRatherBundle\Game\QuestionCategory;
use WouldYouRatherBundle\Game\QuestionTag;

class GameController extends AbstractController
{
    #[Route('/games/would-you-rather', name: 'would_you_rather_game')]
    public function index(): Response
    {
        return $this->render('@WouldYouRather/game/index.html.twig', [
            'categories' => QuestionCategory::choices(),
            'tags' => QuestionTag::choices(),
        ]);
    }

    #[Route('/games/would-you-rather/gameplay', name: 'would_you_rather_gameplay')]
    public function gameplay(
        Request $request,
        WouldYouRepository $repository
    ): Response {
        $categories = $request->query->all('categories');
        $tags = $request->query->all('tags');

        $question = $repository->findRandomActive(
            excludeIds: [],
            categories: $categories,
            tags: $tags
        );

        if (!$question) {
            throw $this->createNotFoundException(
                'No questions were found for the selected categories and tags.'
            );
        }

        return $this->render('@WouldYouRather/game/gameplay.html.twig', [
            'question' => $question,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    #[Route(
        '/games/would-you-rather/question/random',
        name: 'would_you_rather_random_question',
        methods: ['GET']
    )]
    public function randomQuestion(
        Request $request,
        WouldYouRepository $repository
    ): Response {
        $excludeIds = array_map(
            'intval',
            $request->query->all('exclude')
        );

        $categories = $request->query->all('categories');
        $tags = $request->query->all('tags');

        $question = $repository->findRandomActive(
            excludeIds: $excludeIds,
            categories: $categories,
            tags: $tags
        );

        if (!$question) {
            return $this->json([
                'error' => 'No active questions available for the selected filters.',
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