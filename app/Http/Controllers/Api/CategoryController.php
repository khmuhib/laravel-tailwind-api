<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\SuccessResource;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = PostCategory::all();

        return new SuccessResource([
            'message' => 'All Categories',
            'data' => $categories
        ]);
    }

    public function store(CategoryRequest $request)
    {
        // return $request;

        $formData = $request->validated();
        $formData['slug'] = Str::slug($formData['name']);

        PostCategory::create($formData);

        return new SuccessResource(['message' => 'Successfully Category Created']);
    }

    public function update(CategoryRequest $request, PostCategory $id)
    {
        $formData = $request->validated();
        $formData['slug'] = Str::slug($formData['name']);

        $id->update($formData);

        return (new SuccessResource(['message' => 'Successfully Category Update']))->response()->setStatusCode(201);
    }

    public function show(PostCategory $id)
    {
        $formatData = new CategoryResource($id);

        //all data pass
        // return new SuccessResource([
        //     'success' => true,
        //     'message' => 'Single Category',
        //     'data' => $formatData
        // ]);


        //formated data pass
        return new SuccessResource([
            'success' => true,
            'message' => 'Single Category',
            'data' => $formatData
        ]);
    }

    public function edit(PostCategory $id)
    {
        return new SuccessResource([
            'success' => true,
            'message' => 'Single Category Edit',
            'data' => $id
        ]);
    }

    public function delete(PostCategory $id)
    {
        $id->delete();
        return new SuccessResource(['message' => 'Successfully Category Deleted']);
    }
}
