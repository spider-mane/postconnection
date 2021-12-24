<?php

namespace WebTheory\Post2Post;

use WebTheory\Leonidas\Fields\Selections\PostQueryChecklistItems;
use WebTheory\Saveyour\Contracts\FormFieldControllerInterface;
use WebTheory\Saveyour\Contracts\FormFieldInterface;
use WebTheory\Saveyour\Fields\Checklist;

class PostRelationshipChecklist extends AbstractPostRelationshipField implements FormFieldControllerInterface
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     *
     */
    protected function defineFormField(): ?FormFieldInterface
    {
        $options = $this->options;
        $selection = new PostQueryChecklistItems(
            $this->relationship->getRelatedPostTypePostsQuery($this->context)
        );

        return (new Checklist)
            ->setSelectionProvider($selection)
            ->setRequired($options['required'])
            ->setId($options['id'])
            ->setClasslist($options['class'])
            ->addClass('thing');
    }
}
