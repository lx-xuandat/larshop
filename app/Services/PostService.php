<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\TagRepository;
use App\Repositories\PostRepository;

class PostService
{
    public function __construct(PostRepository $postRepository, TagRepository $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->tagRepository = $tagRepository;
    }

    public function create(Request $request)
    {
        $attributes = $request->except('names');
        $names = $request->names;
        $count = count($names);
        $tags = $this->tagRepository->findByName($names); // lấy các tag dựa vào name
        $duplicateNames = [];
        for ($i = 0; $i < $count; $i++) { // lấy các tag đã tồn tại trong csdl
            foreach ($tags as $tag) {
                if ($names[$i] === $tag->name) {
                    array_push($duplicateNames, $names[$i]);
                }
            }
        }
        $newNames = array_diff($names, $duplicateNames); // loại bỏ các tag đã tồn tại

        $this->tagRepository->insert($newNames); // lưu các tag mới vào csdl

        $post = $this->postRepository->create($attributes); // lưu post
        $tagIds = $this->tagRepository->findByName($names)->pluck('ids')->toArray();
        $post->sync($tagIds); // cập nhật tag cho post

        return $post;
    }
}
