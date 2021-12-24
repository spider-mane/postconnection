<?php

namespace WebTheory\Post2Post;

use Respect\Validation\Validator as v;
use WebTheory\Saveyour\Contracts\DataFormatterInterface;
use WebTheory\Saveyour\Contracts\FieldDataManagerInterface;
use WebTheory\Saveyour\Contracts\FormFieldControllerInterface;
use WebTheory\Saveyour\Controllers\AbstractField;

abstract class AbstractPostRelationshipField extends AbstractField implements FormFieldControllerInterface
{
    use HasContextArgumentTrait;

    /**
     * @var PostRelationshipInterfaceInterface
     */
    protected $relationship;

    /**
     * @var string
     */
    protected $context;

    /**
     * @var array
     */
    protected $options = [];

    /**
     *
     */
    public function __construct(string $requestVar, PostRelationship $relationship, string $context, array $options = [])
    {
        $this->relationship = $relationship;

        $this->context = $this->throwExceptionIfInvalidContext($context, $relationship);
        $this->options = $this->defineOptions($options);

        parent::__construct($requestVar);
    }

    /**
     *
     */
    protected function defineOptions(array $options)
    {
        $relatedPostsType = $this->relationship->getRelatedPostTypeName($this->context);

        return [
            'label' => $options['label'] ?? '',
            'id' => $options['id'] ?? "related-{$relatedPostsType}-checklist",
            'class' => $options['class'] ?? [],
            'required' => $options['required'] ?? false
        ];
    }

    /**
     *
     */
    public function defineDataManager(): ?FieldDataManagerInterface
    {
        return new PostRelationshipDataManager($this->relationship);
    }

    /**
     *
     */
    protected function defineDataFormatter(): ?DataFormatterInterface
    {
        return new PostObjectsToIdsDataFormatter();
    }

    /**
     *
     */
    protected function defineFilters(): ?array
    {
        return ['sanitize_text_field'];
    }

    /**
     *
     */
    protected function defineRules(): ?array
    {
        $label = $this->options['label'];

        return [
            'int' => [
                'validator' => v::when(v::notEmpty(), v::intVal(), v::alwaysValid()),
                'alert' => "A value provided for {$label} is invalid."
            ]
        ];
    }
}
