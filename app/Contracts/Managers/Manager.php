<?php

namespace App\Contracts\Managers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface Manager
{
    /**
     * Store new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request);

    /**
     * Update exists resource.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Model $model, Request $request);

    /**
     * Destroy exists resource.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $model, Request $request);
}
