<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = Book::all();
        return response()->json([
            'success' => true,
            'data' => $books->toArray()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $book = new Book;
        $book->name = $request->name;
        $book->description = $request->description;
        $book->isbn = $request->isbn;
        $book->user_id = auth()->user()->id;
        $book->save();
        return response()->json([
            'success' => true,
            'message' => 'Libro creado: ',['nombre'=>$request->name]
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        //FIND BY ID
        $books = Book::find($id);
        return response()->json([
            'success' => true,
            'data' => $books->toArray()
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $book->update([
             'name'=> $request->name,
                'description' => $request->description,
                'isbn' => $request->isbn
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Libro actualizado: ',['nombre'=>$request->name,'description'=>$request->description,'isbn'=>$request->isbn]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
         Book::find($id);


        Book::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Libro eliminado'
        ], 200);
    }
}
