<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Contracts\Repositories\PostsRepository;
use App\Contracts\Managers\PostsManager as ResourcesManager;

class PostsManager extends Manager implements ResourcesManager
{
    /**
     * The PostsRepository instance.
     *
     * @var \App\Contracts\Repositories\PostsRepository
     */
    protected $postsRepository;

    /**
     * Create a new PostsManager instance.
     *
     * @param \App\Contracts\Repositories\PostsRepository
     * @return void
     */
    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    /**
     * Get render data for roles listing view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function makeListingViewData(Request $request)
    {
        $posts = $this->postsRepository->listing($request);

        return compact('posts');
    }
}
