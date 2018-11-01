<?php

namespace App\Api\Transformer;

final class PostResourceTransformer implements ResourceTransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return 'post';
    }

    /**
     * @param \App\Entity\Post $entity
     *
     * @return iterable
     */
    public function getAttributes($entity): iterable
    {
        return [
            // TODO: implement relationships
            'category' => $entity->getCategory()->getTitle(),
            'title' => $entity->getTitle(),
            'content' => $entity->getBody(),
            'created_at' => $entity->getCreatedAt(),
            'updated_at' => $entity->getUpdatedAt(),
        ];
    }

    /**
     * @param \App\Entity\Post $entity
     *
     * @return iterable
     */
    public function getLinks($entity): iterable
    {
        return [
            'self' => ['href' => '/post/' . $entity->getId()],
        ];
    }
}
