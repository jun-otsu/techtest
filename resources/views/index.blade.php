@include('message')
<a href="{{ route('book.search') }}" class="btn btn-primary">ISBN検索</a>
<form action="{{ route('book.output') }}" method="post" style="display:inline">
@csrf
<input type="submit" value="CSVダウンロード" class="btn btn-primary">
</form>
<br>
<br>
<table border="1" class="table">
<tr>
<th></th>
<th>{{ __('books.isbn') }}</th>
<th>{{ __('books.title') }}</th>
<th>{{ __('books.author') }}</th>
<th>{{ __('books.registered_at') }}</th>
</tr>
@forelse ($books as $book)
<tr>
<td>{{ $book['id'] }}</td>
<td>{{ $book['isbn'] }}</td>
<td>{{ $book['title'] }}</td>
<td>{{ $book['author'] }}</td>
<td>{{ Carbon\Carbon::parse($book['registered_at'])->format('Y/m/d H:i:s') }}</td>
</tr>
@empty
登録されている本がありません。
@endforelse
</table>
<div class="d-flex align-items-center justify-content-center">
{{ $books->links() }}
</div>
