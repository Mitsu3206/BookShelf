<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\RakutenAPIClasses\RakutenAPIService;
use App\RakutenAPIClasses\RakutenAPIServiceInterface;

class BookController extends Controller
{
    // Home画面
    public function home()
    {
        $user = Auth::user();
        
        return view('book.home');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $books = Book::where('userId', $user->id)->paginate(5);
        return view('book.index', ['items' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Book::$rules);
        $user = Auth::user();
        $book = new Book;
        $record = $request->all();
        $book->userID = $user->id;
        unset($record['_token']);
        $book->fill($record)->save();
        return redirect('/bookshelf/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit', ['info' => $book]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->input('update')){
            $this->validate($request, Book::$rules);
            $book = Book::find($request->id);
            $record = $request->all();
            $book->fill($record)->save();
            return redirect('/bookshelf/index');
        }
        else if($request->input('delete')){
            $this->destroy($request->id);
            return redirect('/bookshelf/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect('/');
    }

    public function destroyBulk(Request $request)
    {
        $ids = $request->all();
        foreach($ids['id'] as $id){
            Book::find($id)->delete();
        }

        return redirect('/bookshelf/index');
    }

    public function postCreate(Request $request)
    {
        if($request->input('search')){
            $info = [
                'title' => $request->title,
                'author' => $request->author,
                'publisherName' => $request->publisherName,
            ];

            $rakutenAPIService = app('App\RakutenAPIClasses\RakutenAPIServiceInterface');
            $infos = $rakutenAPIService->ExecuteAPI($info);
            
            return view('book.resultAPI', ['infos' => $infos]);
        }
        else if($request->input('add')){
            $this->store($request);
            return view('book.create');
        }
    }

    public function storeAPI(Request $request)
    {
        $rakutenAPIService = app('App\RakutenAPIClasses\RakutenAPIServiceInterface');
        
        foreach($request->id as $id){
            $info = $request->session()->get($id);
            $user = Auth::user();
            $book = new Book;
            $book->all_data = $info;
            $book->userID = $user->id;
            $book->save();
        }

        return view('book.create');
    }
}
