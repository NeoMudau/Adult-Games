<?php

namespace WouldYouRatherBundle\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use WouldYouRatherBundle\Entity\WouldYou;
use WouldYouRatherBundle\Game\QuestionCategory;
use WouldYouRatherBundle\Game\QuestionTag;

class WouldYouCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return WouldYou::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->onlyOnIndex(),

            TextField::new('question', 'Question'),

            TextField::new('optionA', 'Option A'),

            TextField::new('optionB', 'Option B'),

            ChoiceField::new('category', 'Categories')
                ->setChoices(QuestionCategory::choices())
                ->allowMultipleChoices()
                ->renderExpanded(),

            ChoiceField::new('tags', 'Tags')
                ->setChoices(QuestionTag::choices())
                ->allowMultipleChoices()
                ->renderExpanded(),

            BooleanField::new('active', 'Active'),

            DateTimeField::new('createdAt', 'Created At')
                ->hideOnForm(),

            DateTimeField::new('updatedAt', 'Updated At')
                ->hideOnForm(),

            DateTimeField::new('deletedAt', 'Deleted At')
                ->hideOnForm(),
        ];
    }
}