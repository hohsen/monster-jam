<h2><a href="{{ route('home') }}">Go back</a></h2>

<button onclick="window.location='{{ route('champion.create') }}'">Add new champion</button>

<ul>
    @foreach ($champions as $champion)
        <li>
            <a href="{{ route('champion.edit', ['id' => $champion->id]) }}">{{ $champion->name }} {{ $champion->surname }}</a>

            <br>

            @php
                $arr = $champion->toArray();

                foreach ($arr as $key => $value) {
                    echo "<pre>";
                     echo "$key = $value";
                    echo "</pre>";
                }
            @endphp

            <form action="{{ route('champion.delete', ['id' => $champion->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button>Delete</button>
            </form>
        </li>
    @endforeach


</ul>
