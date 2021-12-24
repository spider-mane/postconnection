<?php

namespace WebTheory\Post2Post;

use WebTheory\Leonidas\Fields\Selections\PostQuerySelectOptions;
use WebTheory\Saveyour\Contracts\FormFieldControllerInterface;
use WebTheory\Saveyour\Contracts\FormFieldInterface;
use WebTheory\Saveyour\Fields\Select2;

class PostRelationshipSelect2 extends AbstractPostRelationshipField implements FormFieldControllerInterface
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var array
     */
    protected $config = [];

    /**
     * Get the value of config
     *
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * Set the value of config
     *
     * @param array $config
     *
     * @return self
     */
    public function setConfig(array $config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     *
     */
    protected function defineFormField(): ?FormFieldInterface
    {
        $options = $this->options;
        $selection = new PostQuerySelectOptions(
            $this->relationship->getRelatedPostTypePostsQuery($this->context)
        );

        return (new Select2($this->config))
            ->setSelectionProvider($selection)
            ->setMultiple(true)
            ->setRequired($options['required'])
            ->setId($options['id'])
            ->setClasslist($options['class'])
            ->addClass('thing');
    }
}
