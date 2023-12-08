<form action="{{ route('champion.update', ['id' => $champion->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="car_id">Car id: <br /></label>
    <input type="text" name="car_id" id="car_id">

    <br>

    <label for="name">Name: <br /></label>
    <input value="{{$champion->name}}" type="text" name="name" id="name">

    <br>

    <label for="surname">Surname: <br /></label>
    <input value="{{$champion->surname}}" type="text" name="surname" id="surname">

    <br>

    <label for="biography">Biography: <br /></label>
    <input value="{{$champion->biography}}" type="text" name="biography" id="biography">

    <br>

    <label for="photo">Photo: <br /></label>
    <input value="{{$champion->photo}}" type="text" name="photo" id="photo">

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
