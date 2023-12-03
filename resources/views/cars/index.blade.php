<button>Add new car</button>

<ul>
    @foreach ($cars as $car)
        <li>
            <a href="{{ route('car.edit', ['id' => $car->id]) }}">{{ $car->model }}</a>

            <form action="{{ route('car.delete', ['id' => $car->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button>Delete</button>
            </form>
        </li>
    @endforeach
</ul>
