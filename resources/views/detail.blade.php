<!-- resources/views/books.blade.php -->

@extends('layouts.app')
@section('content')


<!-- Bootstrap の定型コード -->


<div class="panel-body">
  <!-- バリデーションエラーの表示に使用　-->
  @include('common.errors')
  <!-- バリデーションエラーの表示に使用　-->
</div>




<!-- 本登録フォーム -->
<form action="{{ url('books/update') }}" method="POST" class="form-horizontal">
  {{csrf_field()}}

  <!-- 本のタイトル -->
  <div class="form-group">
    <label for="book" class="col-sm-3 control-label">
      BOOK
    </label>


    <div class="col-sm-6">
      <ul style="list-style:none">
      <li><p>本の名前<input type="text" name="item_name" id="book-name" class="form-control" value="{{ $books->item_name}}"/></p></li>
      <li><p>ページ数<input type="text" name="item_number" id="book-number" class="form-control" value="{{ $books->item_number}}"/></p></li>
      <li><p>数量<input type="text" name="item_amount" id="book-amount" class="form-control" value="{{ $books->item_amount}}"/></p></li>
      <li><p>発刊日<input type="text" name="published" id="published" class="form-control" value="{{ $books->published}}"/></p></li>
      </ul>
    </div>
  </div>


  <!--本の更新ボタン -->
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" class="btn btn-default">
          <i class="glyphicon glyphicon-plus"></i> Save
      </button>
    </div>
  </div>

<input type="hidden" name="id" value="{{ $books->id }}" />

  </form>


 @endsection
