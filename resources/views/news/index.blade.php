<h2><a href="{{ route('home') }}">Go back</a></h2>

<button onclick="window.location='{{ route('news.create') }}'">Add news</button>

<ul>
    @foreach ($news as $news)
        <li>
            <a href="{{ route('news.edit', ['id' => $news->id]) }}">{{ $news->title }}</a>

            <br>

            @php
                $arr = $news->toArray();

                foreach ($arr as $key => $value) {
                    echo "<pre>";
                     echo "$key = $value";
                    echo "</pre>";
                }
            @endphp

            <form action="{{ route('news.delete', ['id' => $news->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button>Delete</button>
            </form>
        </li>
    @endforeach
</ul>
