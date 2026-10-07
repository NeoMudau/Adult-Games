<?php

namespace WouldYouRatherBundle\Repository;

use WouldYouRatherBundle\Entity\WouldYou;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<WouldYou>
 */
class WouldYouRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WouldYou::class);
    }

   public function findRandomActive(
        array $excludeIds = [],
        array $categories = [],
        array $tags = []
    ): ?WouldYou {
        $queryBuilder = $this->createQueryBuilder('w')
            ->where('w.active = :active')
            ->andWhere('w.deletedAt IS NULL')
            ->setParameter('active', true);

        if ($excludeIds !== []) {
            $queryBuilder
                ->andWhere($queryBuilder->expr()->notIn('w.id', ':excludeIds'))
                ->setParameter('excludeIds', $excludeIds);
        }

        /** @var WouldYou[] $questions */
        $questions = $queryBuilder
            ->getQuery()
            ->getResult();

        if ($categories !== []) {
            $questions = array_filter(
                $questions,
                static function (WouldYou $question) use ($categories): bool {
                    return array_intersect(
                        $categories,
                        $question->getCategory()
                    ) !== [];
                }
            );
        }

        if ($tags !== []) {
            $questions = array_filter(
                $questions,
                static function (WouldYou $question) use ($tags): bool {
                    return array_intersect(
                        $tags,
                        $question->getTags()
                    ) !== [];
                }
            );
        }

        if ($questions === []) {
            return null;
        }

        $questions = array_values($questions);

        return $questions[array_rand($questions)];
    }
}
