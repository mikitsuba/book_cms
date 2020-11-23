<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            本のタイトル
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- 本登録フォーム -->
        <form action="{{ url('books') }}" method="POST" class="form-horizontal">
            @csrf

            <!-- 本のタイトル -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="book" class="col-sm-3 control-label">Title</label>
                    <input type="text" name="item_name"  value="{{ old('item_name') }}" class="form-control">
                </div>
            </div>
            
            <!-- 本の在庫数 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="number" class="col-sm-3 control-label">Number</label>
                    <input type="text" name="item_number"  value="{{ old('item_number') }}" class="form-control">
                </div>
            </div>
            
            <!-- 本の単価 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="amount" class="col-sm-3 control-label">Amount</label>
                    <input type="text" name="item_amount"  value="{{ old('item_amount') }}" class="form-control">
                </div>
            </div>
            
            <!-- 本の出版日 -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="published" class="col-sm-3 control-label">Published</label>
                    <input type="date" name="published"  value="{{ old('published') }}" class="form-control">
                </div>
            </div>

            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
        <!-- 現在の本 -->
        @if (count($books) > 0)
            <div class="card-body">
                <div class="card-title">
                    本一覧
                </div>
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>Title</th>
                        <th>Number</th>
                        <th>Amount</th>
                        <th>Published</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <!-- 本タイトル -->
                                <td class="table-text">
                                    <div>{{ $book->item_name }}</div>
                                </td>
                                
                                <!--在庫数-->
                                <td class="table-text">
                                    <div>{{ $book->item_number }}</div>
                                </td>
                                
                                <!--価格-->
                                <td class="table-text">
                                    <div>{{ $book->item_amount }}</div>
                                </td>
                                
                                <!--出版日-->
                                <td class="table-text">
                                    <div>{{ $book->published }}</div>
                                </td>
                                
                                <!--本：更新ボタン-->
                                <td>
                                	<form action="{{ url('booksedit/'.$book->id) }}" method="POST">
                                	    @csrf
                                	    <button type="submit" class="btn btn-primary">更新</button>
                                	</form>
                                </td>

                                <!-- 本: 削除ボタン -->
                                <td>
                                    <form action="{{ url('book/'.$book->id) }}" method="POST">
                                         @csrf
                                         {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <!-- Book: 既に登録されてる本のリスト -->
    <div class="row">
    	<div class="col-md-4 offset-md-4">
    		{{ $books->links()}}
        </div>
    </div>
@endsection