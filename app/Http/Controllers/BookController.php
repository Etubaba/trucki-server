<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the posts
        $book = Book::paginate(10);

        // Return collection of posts as a resource
        return BookResource::collection($book);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {


        //  Delete the post, return as confirmation
        $bookCreate = Book::create([
            'name' => $request->name,
            'author' => $request->author,
        ]);
        if ($bookCreate) {
            return new BookResource($bookCreate);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // Get a single post
        $bookShow = Book::findOrFail($book);

        // Return a single post as a resource
        return new BookResource($bookShow);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request)
    {
        // Get the post
        $postUpdate = Book::findOrFail($request->id);

        //  Delete the post, return as confirmation
        $update = $postUpdate->update([
            'name' => $request->name,
            'author' => $request->author,
        ]);
        if ($update) {
            return new BookResource($postUpdate->fresh());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Book $book)
    {
        // Get the post
        $bookDestroy = $book->findOrFail($id);

        //  Delete the post, return as confirmation
        if ($bookDestroy->delete()) {
            return new BookResource($book);
        }
    }
}
