<form action="{{route('champion.store')}}" method="POST">
    @csrf

    <label for="car_id">Car id: <br /></label>
    <input type="text" name="car_id" id="car_id">

    <br>

    <label for="name">Name: <br /></label>
    <input type="text" name="name" id="name">

    <br>

    <label for="surname">Surname: <br /></label>
    <input type="text" name="surname" id="surname">

    <br>

    <label for="biography">Biography: <br /></label>
    <input type="text" name="biography" id="biography">

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
