<!-- resources/views/books.blade.php -->

@extends('layouts.app')
@section('content')

<!-- Bootstrap の定型コード -->


<div class="panel-body">
  <!-- バリデーションエラーの表示に使用　-->
  @include('common.errors')
  <!-- バリデーションエラーの表示に使用　-->



  <!-- 本登録フォーム -->
  <form action="{{ url('books') }}" method="POST" class="form-horizontal">
    {{csrf_field()}}

  <!-- 本のタイトル -->
  <div class="form-group">
    <label for="book" class="col-sm-3 control-label">
      BOOK
    </label>

    <div class="col-sm-6">
      <ul style="list-style:none">
      <li><p>本の名前<input type="text" name="item_name" id="book-name" class="form-control" /></p></li>
      <li><p>ページ数<input type="text" name="item_number" id="book-number" class="form-control" /></p></li>
      <li><p>数量<input type="text" name="item_amount" id="book-amount" class="form-control" /></p></li>
      <li><p>発刊日<input type="text" name="published" id="published" class="form-control" /></p></li>
      </ul>
    </div>
  </div>


  <!--本の登録ボタン -->
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" class="btn btn-default">
          <i class="glyphicon glyphicon-plus"></i> Save
      </button>
    </div>
  </div>
  </form>

  @if (count($books) > 0)
  <div class="panel panel-default">
    <div class="panel-heading">
      現在の本
    </div>
    <div class="panel-body">
      <table class="table table-striped task-table">
        <!-- テーブルヘッダ -->
        <thead>
          <th>
             本の一覧
          </th>
          <th>

          </th>
        </thead>
        <!--テーブル本体 -->
        <tbody>
          @foreach($books as $book)
            <tr>
              <!--本のタイトル-->
              <td class="table-text">
                <div>
                  {{ $book->item_name}}
                </div>
              </td>


              <!--　詳細 -->
              <td>
                <form action="{{ url('detail/' .$book->id) }}" method="POST">
                  {{ csrf_field() }}

                  <button type="submit" class="btn btn-warning"> <i class="glyphicon glyphicon-trash"></i>
                      詳細
                  </button>
                </form>
              </td>


              <!-- 本削除ボタン -->
              <td>
                <form action="{{ url('book/' .$book->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button type="submit" class="btn btn-danger"> <i class="glyphicon glyphicon-trash"></i>
                      削除
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="row">
      <div class="col-md-4 col-md-offset-4">
      {{ $books->links()}}
      </div>

    </div>

  </div>
</div>
@endif
  <!-- Book: すでに登録されている本のリスト -->

@endsection
