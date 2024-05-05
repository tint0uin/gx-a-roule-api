<?php

namespace App\Service;

use App\Entity\tag;
use App\Repository\TagRepository;
use App\Entity\Meme;

class TagService
{
    public function __construct(){}


    public function getTagByName(string $name, TagRepository $tagRepo) : ?Tag {
        return $tagRepo->getTagByName($name);
    }

    public function AddTagAtMemeStr(Meme $meme, string $tags,  TagRepository $tagRepo) : void {
        $tagsArray = explode(", ", $tags);
        foreach ($tagsArray as $tagStr) {
            $tag = $this->getTagByName($tagStr, $tagRepo);
            if ($tag == NULL) {
                $tag = new Tag();
                $tag->setName($tagStr);
                $tag->addMeme($meme);
                $tagRepo->save($tag, false);
            } else {
                $meme->addTag($tag);
            }
        }
    }

}