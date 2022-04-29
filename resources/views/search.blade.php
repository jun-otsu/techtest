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

@endif

