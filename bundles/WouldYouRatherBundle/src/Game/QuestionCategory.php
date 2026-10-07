<?php

namespace WouldYouRatherBundle\Game;

final class QuestionCategory
{
    public const GENERAL = 'general';
    public const FUNNY = 'funny';
    public const RELATIONSHIP = 'relationship';
    public const PARTY = 'party';
    public const ADULT = 'adult';

    public static function choices(): array
    {
        return [
            'General' => self::GENERAL,
            'Funny' => self::FUNNY,
            'Relationship' => self::RELATIONSHIP,
            'Party' => self::PARTY,
            'Adult' => self::ADULT,
        ];
    }
}