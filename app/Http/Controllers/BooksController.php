<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;  // Book  モデルを使えるように
use Validator; // バリデーションを利用するため

use Auth; //認証モデル

use Debugbar; // Debugbar

class BooksController extends Controller
{

  //Construct
  public function __construct()
  {
    $this->middleware('auth');
  }

  // Index
  public function index()
  {
    $books = Book::orderBy('created_at','asc')->paginate(5);
    $auths = Auth::user();

    Debugbar::info("テスト");

    return view('books',['books' => $books,'auths'=>$auths ]);
  }

  // 更新処理
  public function update(Request $request)
  {
    // Validation
    $validator = Validator::make($request->all(),[
      'id' => 'required',
      'item_name' => 'required|min:3|max:255',
      'item_number' => 'required|min:1|max:3',
      'item_amount' => 'required|max:6',
      'published' => 'required',
    ]);

    //Validation Error
    if ($validator->fails()){
      return redirect('/')
        ->withInput()
        ->withErrors($validator);
    }

    //Eloquent モデル
    $books=Book::find($request->id);
    $books->item_name = $request->item_name;
    $books->item_number = $request->item_number;
    $books->item_amount = $request->item_amount;
    $books->published = $request->published;
    $books->save();
    return redirect('/');
  }

  // 登録処理
  public function store(Request $request)
  {
  // Validation
  $validator = Validator::make($request->all(),[
    'item_name' => 'required|min:3|max:255',
    'item_number' => 'required|min:1|max:3',
    'item_amount' => 'required|max:6',
    'published' => 'required',
  ]);

  //Validation Error
  if ($validator->fails()){
    return redirect('/')
      ->withInput()
      ->withErrors($validator);
  }

  //Eloquent モデル
  $books = new Book;
  $books->item_name = $request->item_name;
  $books->item_number = $request->item_number;
  $books->item_amount = $request->item_amount;
  $books->published = $request->published;
  $books->save();
  return redirect('/');
  }


  // 詳細画面
  public function detail(Book $books)
  {
    return view('detail',['books' => $books]);
  }


  //削除
  public function delete(Book $book)
  {
      $book->delete();
      return redirect('/');
  }
    //
}
