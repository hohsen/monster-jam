<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChampionRequest;
use App\Models\Champion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChampionController extends Controller
{
    public function index()
    {
        $champions = Champion::all();
        return view('champions.index', compact('champions'));
    }

    public function create()
    {
        return view('champions.create');
    }
    public function store(ChampionRequest $request)
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            Storage::putFileAs('/images/champions_photos', $file, $fileName);

            $data = $request->validated();
            $data['photo'] = $fileName;

            Champion::create($data);

            return redirect()->route('champion.index');
        }else{
            $data = $request->validated();
            Champion::create($data);
            return redirect()->route('champion.index');
        }
    }

    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $champion = Champion::findOrFail($id);
        return view('champions.edit', compact('champion'));
    }

    public function update(ChampionRequest $request, string $id)
    {
        $champion = Champion::findOrFail($id);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            Storage::putFileAs('/images/champions_photos', $file, $fileName);

            $data = $request->validated();
            $data['photo'] = $fileName;
            $champion->update($data);

            return redirect()->route('champion.index');
        }else{
            $data = $request->validated();
            $champion->update($data);
            return redirect()->route('champion.index');
        }
    }

    public function destroy(string $id)
    {
        $champion = Champion::findOrFail($id);
        $champion->delete();

        return redirect()->route('champion.index');
    }
}
