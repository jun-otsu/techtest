@include('message')
<a class="btn btn-primary" href="{{ route('book.index') }}">登録した書籍一覧</a>
<form action="{{ route('book.search') }}" method="get" class="d-flex align-items-center justify-content-center">
<input type="text" name="isbn" placeholder="ISBNコードを入力" value="{{ Request::input('isbn') }}">
<input type="submit" value="検索する" class="btn btn-primary">
</form>
@if ($book)
<hr>
<img src="{{ $book['cover'] }}" class="d-block mx-auto">
<br>
<div class="text-center">
<label>書籍タイトル:</label>
{{ $book['title'] }}
<br>
<label>著者名:</label>
{{ $book['author'] }}
<br>
<label>出版社:</label>
{{ $book['publisher'] }}
<br>
<label>発売日:</label>
{{ date('Y年m月d日', strtotime($book['pubdate'])) }}
<br>
<form action="{{ route('book.store') }}" method="post">
@csrf
<input type="hidden" name="isbn" value="{{ $book['isbn'] }}">
<input type="submit" value="持っている本として登録する" class="btn btn-primary">
</form>
</div>
@endif
