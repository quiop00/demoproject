<h1>{{ $pageName }}</h1>
<form method="post" action="/admin/news/update/{{ $news->id }}">
    @method('PATCH')
    @csrf
    <input type="text" name="id" value="{{ $news->id }}">
    <p>
        <label for="title">Title</label><br>
        <input type="text" name="title" value="{{ $news->title }}">
    </p>

    <p>
        <label for="email">Email</label><br>
        <input type="text" name="email" value="{{ $news->email }}">
    </p>

    <p>
        <button type="submit">Submit</button>
    </p>
</form>