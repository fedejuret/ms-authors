<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{


    /**
     * Return authors list
     * @return Ilumnate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return $this->successResponse($authors);
    }

    /**
     * Create an instance of author
     * @return Ilumnate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:50|in:male,female',
            'country' => 'required|max:255'
        ];

        $this->validate($request, $rules);

        $author = Author::create($request->all());

        return $this->successResponse($author, Response::HTTP_CREATED);
    }

    /**
     * Return author data
     * @return Ilumnate\Http\Response
     */
    public function show($authorId)
    {
        $author = Author::findOrFail($authorId);
        return $this->successResponse($author, Response::HTTP_FOUND);
    }

    /**
     * Update the information of an existing author
     * @return Ilumnate\Http\Response
     */
    public function update(Request $request, $authorId)
    {
        $rules = [
            'name' => 'string|max:255',
            'gender' => 'string|max:50|in:male,female',
            'country' => 'max:255'
        ];

        $this->validate($request, $rules);

        $author = Author::findorFail($authorId);

        $author->fill($request->all());

        if($author->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $author->save();

        return $this->successResponse($author);
    }

    /**
     * Destroy an existing author
     * @return Ilumnate\Http\Response
     */
    public function destroy($authorId)
    {

        $author = Author::findOrFail($authorId);

        $author->delete();

        return $this->successResponse($author);

    }
}
