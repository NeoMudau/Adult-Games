<?php

namespace WouldYouRatherBundle\Game;

final class QuestionTag
{
    public const FUN = 'fun';
    public const COUPLES = 'couples';
    public const FRIENDS = 'friends';
    public const SPICY = 'spicy';
    public const SEXUAL = 'sexual';

    public static function choices(): array
    {
        return [
            'Fun' => self::FUN,
            'Couples' => self::COUPLES,
            'Friends' => self::FRIENDS,
            'Spicy' => self::SPICY,
            'Sexual' => self::SEXUAL,
        ];
    }
}
