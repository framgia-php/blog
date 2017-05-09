<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Contracts\Repositories\TagsRepository;
use App\Contracts\Managers\TagsManager as ResourceManager;

class TagsManager extends Manager implements ResourceManager
{
    /**
     * The tags repository object.
     */
    protected $tagsRepository;

    /**
     * Create a new TagsManager instance.
     *
     * @param  \App\Contracts\Repositories\TagsRepository  $tagsRepository
     * @return void
     */
    public function __construct(TagsRepository $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    /**
     * Get render data for tags listing view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function makeListingViewData(Request $request)
    {
        $tags = $this->tagsRepository->listing($request);

        return compact('tags');
    }
}
