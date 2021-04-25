<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books= Book::all();

        if (!$books) {
            return response()->json([
                'success' => false,
                'message' => 'Books with id ' . $id . ' not found'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => $books->toArray()
        ], 200);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function create()
    {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $books= new Book;
        $books->name = $request->name;
        $books->description = $request->description;
        $books->isbn = $request->isbn;
        $books->user_id = auth()->user()->id;
        $books->save();
        return response()->json([
            'success' => true,
            'message' => 'created'
        ], 200);

    }
    public function store(Request $request)
    {

        return view('store');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $books = Book::find($id);

        if (!$books) {
            return response()->json([
                'success' => false,
                'message' => 'Books with id ' . $id . ' not found'
            ], 200);
        }

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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $books = Book::find($id);

        if (!$books) {
            return response()->json([
                'success' => false,
                'message' => 'Books with id ' . $id . ' not found'
            ], 200);
        }
        $books->update([
        $books->name = $request->name,
        $books->description = $request->description,
        $books->isbn = $request->isbn
        ]);

        $books->save();
        return response()->json([
            'success' => true,
            'message' => 'updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
