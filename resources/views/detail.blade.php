<!-- resources/views/books.blade.php -->

@extends('layouts.app')
@section('content')


<!-- Bootstrap の定型コード -->


<div class="panel-body">
  <!-- バリデーションエラーの表示に使用　-->
  @include('common.errors')
  <!-- バリデーションエラーの表示に使用　-->
</div>


  <!-- 本のタイトル -->
  <div class="form-group">
    <label for="book" class="col-sm-3 control-label">
      BOOK
    </label>

    <div class="col-sm-6">
      <ul style="list-style:none">
      <li><p>本の名前</p>{{ $books->item_name}}</li>
      </ul>
    </div>
  </div>

 {{ $books->published}}
