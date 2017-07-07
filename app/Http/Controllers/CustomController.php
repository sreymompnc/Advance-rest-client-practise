<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\HttpFoundation\Response;
use App\Book;

class CustomController extends Controller
{
        public function __construct()
    {
        $this->middleware('apip'); // call middleware name configApi that set in Kernel.phpDisplay a listing of the resource.
    }
    /**
     *      * @return \Illuminate\Http\Response
     *      */


    public function index()
    {
        $books = Book::paginate(5);

        return response()->json($books);
        return response(array(
            'success' => true,
            'books' =>$books->toArray(),
        ),200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storebook(Request $request)
    {
      Book::create($request->all());
              return response(array(
                  'success' => true,
                  'message' =>'Product created successfully',      //return response()->json($about);
         ),200);
     }
    /**           ]);
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showbook($id)
    {
        $books = Book::find($id);
        return response(array(
            'success' => true,
            'books' =>$books,
        ),200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatebook(Request $request, $id)
    {          Book::where('Id',$id)->update($request->all());
                    return response(array(
                     'success' => true,
                     'message' =>'Product updated successfully',    ),200);

    }
    /**             ),200);
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletebook($id)
    {
        Book::where('Id',$id)->delete();
        return response(array(
            'success' => true,
            'message' => 'Delete book successfully',

        ),200);
    }
}
