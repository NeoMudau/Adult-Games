<?php

namespace WouldYouRatherBundle\DataFixtures;

use WouldYouRatherBundle\Game\QuestionCategory;
use WouldYouRatherBundle\Game\QuestionTag;

final class StarterQuestions
{
    public static function getQuestions(): array
    {
        return [
            // GENERAL
            [
                'question' => 'Would you rather be able to fly or be invisible?',
                'optionA' => 'Be able to fly',
                'optionB' => 'Be invisible',
                'category' => [QuestionCategory::GENERAL],
                'tags' => [QuestionTag::FUN],
            ],
            [
                'question' => 'Would you rather be rich or famous?',
                'optionA' => 'Be rich',
                'optionB' => 'Be famous',
                'category' => [QuestionCategory::GENERAL],
                'tags' => [QuestionTag::FUN],
            ],
            [
                'question' => 'Would you rather travel to the past or the future?',
                'optionA' => 'Travel to the past',
                'optionB' => 'Travel to the future',
                'category' => [QuestionCategory::GENERAL],
                'tags' => [QuestionTag::FUN],
            ],
            [
                'question' => 'Would you rather never use social media again or never watch movies again?',
                'optionA' => 'Never use social media',
                'optionB' => 'Never watch movies',
                'category' => [QuestionCategory::GENERAL],
                'tags' => [QuestionTag::FRIENDS],
            ],

            // FUNNY
            [
                'question' => 'Would you rather always speak in rhymes or always sing instead of speaking?',
                'optionA' => 'Always speak in rhymes',
                'optionB' => 'Always sing',
                'category' => [QuestionCategory::FUNNY],
                'tags' => [QuestionTag::FUN],
            ],
            [
                'question' => 'Would you rather have a permanent clown nose or wear clown shoes every day?',
                'optionA' => 'Permanent clown nose',
                'optionB' => 'Clown shoes every day',
                'category' => [QuestionCategory::FUNNY],
                'tags' => [QuestionTag::FUN],
            ],
            [
                'question' => 'Would you rather laugh every time someone cries or cry every time someone laughs?',
                'optionA' => 'Laugh when someone cries',
                'optionB' => 'Cry when someone laughs',
                'category' => [QuestionCategory::FUNNY],
                'tags' => [QuestionTag::FUN, QuestionTag::FRIENDS],
            ],
            [
                'question' => 'Would you rather fight one horse-sized duck or one hundred duck-sized horses?',
                'optionA' => 'One horse-sized duck',
                'optionB' => 'One hundred duck-sized horses',
                'category' => [QuestionCategory::FUNNY],
                'tags' => [QuestionTag::FUN, QuestionTag::FRIENDS],
            ],

            // RELATIONSHIP
            [
                'question' => 'Would you rather have a partner who is very romantic or very funny?',
                'optionA' => 'Very romantic',
                'optionB' => 'Very funny',
                'category' => [QuestionCategory::RELATIONSHIP],
                'tags' => [QuestionTag::COUPLES],
            ],
            [
                'question' => 'Would you rather receive an expensive gift or a thoughtful handmade gift?',
                'optionA' => 'Expensive gift',
                'optionB' => 'Thoughtful handmade gift',
                'category' => [QuestionCategory::RELATIONSHIP],
                'tags' => [QuestionTag::COUPLES],
            ],
            [
                'question' => 'Would you rather know everything about your partner\'s past or know nothing about it?',
                'optionA' => 'Know everything',
                'optionB' => 'Know nothing',
                'category' => [QuestionCategory::RELATIONSHIP],
                'tags' => [QuestionTag::COUPLES],
            ],
            [
                'question' => 'Would you rather have weekly date nights or take one big romantic trip every year?',
                'optionA' => 'Weekly date nights',
                'optionB' => 'One big trip every year',
                'category' => [QuestionCategory::RELATIONSHIP],
                'tags' => [QuestionTag::COUPLES],
            ],

            // PARTY
            [
                'question' => 'Would you rather be the DJ or the person controlling the drinks at a party?',
                'optionA' => 'Be the DJ',
                'optionB' => 'Control the drinks',
                'category' => [QuestionCategory::PARTY],
                'tags' => [QuestionTag::FUN, QuestionTag::FRIENDS],
            ],
            [
                'question' => 'Would you rather dance in front of everyone or sing karaoke in front of everyone?',
                'optionA' => 'Dance',
                'optionB' => 'Sing karaoke',
                'category' => [QuestionCategory::PARTY],
                'tags' => [QuestionTag::FUN, QuestionTag::FRIENDS],
            ],
            [
                'question' => 'Would you rather arrive first at every party or always be the last person to leave?',
                'optionA' => 'Always arrive first',
                'optionB' => 'Always leave last',
                'category' => [QuestionCategory::PARTY],
                'tags' => [QuestionTag::FRIENDS],
            ],
            [
                'question' => 'Would you rather host the party or just show up and enjoy it?',
                'optionA' => 'Host the party',
                'optionB' => 'Just enjoy it',
                'category' => [QuestionCategory::PARTY],
                'tags' => [QuestionTag::FUN, QuestionTag::FRIENDS],
            ],

            // ADULT / SPICY
            [
                'question' => 'Would you rather go on a romantic weekend away or have a private date night at home?',
                'optionA' => 'Romantic weekend away',
                'optionB' => 'Private date night at home',
                'category' => [QuestionCategory::ADULT],
                'tags' => [QuestionTag::COUPLES, QuestionTag::SPICY],
            ],
            [
                'question' => 'Would you rather make the first move or have the other person make the first move?',
                'optionA' => 'Make the first move',
                'optionB' => 'Let them make the first move',
                'category' => [QuestionCategory::ADULT],
                'tags' => [QuestionTag::COUPLES, QuestionTag::SPICY],
            ],
            [
                'question' => 'Would you rather have more romance or more excitement in a relationship?',
                'optionA' => 'More romance',
                'optionB' => 'More excitement',
                'category' => [QuestionCategory::ADULT],
                'tags' => [QuestionTag::COUPLES, QuestionTag::SPICY],
            ],
            [
                'question' => 'Would you rather reveal your biggest crush or your most embarrassing dating story?',
                'optionA' => 'Reveal your biggest crush',
                'optionB' => 'Reveal your dating story',
                'category' => [QuestionCategory::ADULT],
                'tags' => [QuestionTag::SPICY, QuestionTag::FRIENDS],
            ],
        ];
    }
}