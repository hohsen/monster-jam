<form action="{{route('car.store')}}" method="POST">
    @csrf

    <label for="model">Model: <br /></label>
    <input type="text" name="model" id="model">

    <br>

    <label for="max_speed">Max speed: <br /></label>
    <input type="text" name="max_speed" id="max_speed">

    <br>

    <label for="horse_power">Horse power: <br /></label>
    <input type="text" name="horse_power" id="horse_power">

    <br>

    <label for="engine_volume">Engine volime: <br /></label>
    <input type="text" name="engine_volume" id="engine_volume">

    <br>

    <label for="year_of_manufacture">Year of manufacture: <br /></label>
    <input type="number" name="year_of_manufacture" id="year_of_manufacture">

    <br>
    <br>

    <button type="submit">save car</button>
</form>
