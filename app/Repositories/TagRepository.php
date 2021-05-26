<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{
    /**
     * @var Tag $tag
     */
    protected $tag;

    /**
     *
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function insert(array $values)
    {
        return $this->tag->insert($values);
    }

    public function findByName(array $names)
    {
        return $this->tag->whereIn('name', $names)->get();
    }
}
