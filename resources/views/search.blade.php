@include('message')
検索画面
<form action="{{ route('book.search') }}" method="get">
<input type="text" name="isbn" placeholder="ISBNコードを入力" value="{{ Request::input('isbn') }}">
<input type="submit" value="検索する">
</form>
@if ($book)
<img src="{{ $book['cover'] }}">
<br>
<label>書籍タイトル:</label>
{{ $book['title'] }}</li>
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
<input type="submit" value="持っている本に登録する">
</form>
@endif
<a href="{{ route('book.index') }}">登録した書籍一覧</a>
