<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Traits\DebugHelper;
use Intervention\Image\Laravel\Facades\Image;

class ActivityController extends Controller
{
    use DebugHelper;

    public function index()
    {
        $activities = Activity::latest()->paginate(5);
        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(StoreActivityRequest $request)
    {
        $file = $request->file('image');
        $contents = file_get_contents($file);
        $base64Image = base64_encode($contents);
        $validated = $request->validated();
        $validated['image'] = $base64Image;
        Activity::create($validated);
        return redirect()->route('activities.index');
    }

    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }

    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    public function update(UpdateActivityRequest $request, Activity $activity)
{
    // Aquí no necesitas validar los datos nuevamente, ya que UpdateActivityRequest lo hace por ti.

    // Actualiza los campos de la actividad
    $activity->name = $request->input('name');
    $activity->description = $request->input('description');

    // Manejo de la imagen
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $activity->image = base64_encode(file_get_contents($image->getRealPath()));
    }

    $activity->save();

    return redirect()->route('activities.index')->with('success', 'Actividad actualizada con éxito.');
}

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activities.index');
    }
}
