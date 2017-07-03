<?php

namespace App\Managers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Contracts\Repositories\CategoriesRepository;
use App\Contracts\Managers\CategoriesManager as ResourceManager;
use App\Http\Requests\Admin\CategoryRequest;

class CategoriesManager extends Manager implements ResourceManager
{
    /**
     * The categories repository instance.
     *
     * @var \App\Contracts\Repositories\categoriesRepository
     */
    protected $categoriesRepository;

    /**
     * Create a new CategoriesRepository instance.
     *
     * @param  \App\Contracts\Repositories\CategoriesRepository  $categoriesRepository
     * @return void
     */
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * Get render data for categories listing view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function makeListingViewData(Request $request)
    {
        $categories = $this->categoriesRepository->listing($request);

        return compact('categories');
    }

    /**
     * Get render data for categories create view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function makeCreateViewData(Request $request)
    {
        $categoriesOptions = $this->categoriesRepository->getRecursiveCategoriesOptions();

        return compact('categoriesOptions');
    }

    /**
     * Get render data for categories edit view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function makeEditViewData(Request $request)
    {
        //
    }

    /**
     * Store a new category model.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return array
     */
    public function createNewCategory(CategoryRequest $request)
    {
        $attributes = $request->all();

        $attributes['slug'] = Str::slug($request->get('title'));
        $attributes['user_id'] = $request->user()->getKey();
        $attributes['active'] = $request->get('active', false);

        try {
            $this->categoriesRepository->store($attributes);
            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.create_category');
        } catch (Exception $e) {
            logger()->error($e);
            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.success.create_category');
        }

        return $renderData;
    }
}
