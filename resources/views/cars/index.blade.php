<h2><a href="{{ route('home') }}">Go back</a></h2>


<button onclick="window.location='{{ route('car.create') }}'">Add new car</button>

<ul>
    @foreach ($cars as $car)
        <li>
            <a href="{{ route('car.edit', ['id' => $car->id]) }}">{{ $car->model }}</a>

            <br>

            @php
                $arr = $car->toArray();

                foreach ($arr as $key => $value) {
                    echo "<pre>";
                     echo "$key = $value";
                    echo "</pre>";
                }
            @endphp

            <form action="{{ route('car.delete', ['id' => $car->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button>Delete</button>
            </form>
        </li>
    @endforeach


</ul>
