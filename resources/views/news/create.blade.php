<form action="{{route('news.store')}}" method="POST">
    @csrf

    <label for="title">Title: <br /></label>
    <input type="text" name="title" id="title">

    <br>

    <label for="description">Description: <br /></label>
    <textarea type="text" name="description" id="description"></textarea>

    <br>

    <label for="short_description">Short description: <br /></label>
    <textarea type="text" name="short_description" id="short_description"></textarea>

    <br>

    <label for="photo">Photo: <br /></label>
    <input type="text" name="photo" id="photo">

    <br>
    <br>

    <button type="submit">save</button>

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</form>
