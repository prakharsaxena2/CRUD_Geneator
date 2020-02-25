<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\PlaceRequest;
    use App\Place;

    class PlaceController extends Controller
    {
        public function index()
        {
            $places = Place::latest()->get();
            return response()->json($places);
        }
        public function store(PlaceRequest $request)
        {
            ${{modelNameSingularLowerCase}} = Place::create($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 201);
        }
        public function show($id)
        {
            ${{modelNameSingularLowerCase}} = Place::findOrFail($id);
            return response()->json(${{modelNameSingularLowerCase}});
        }
        public function update(PlaceRequest $request, $id)
        {
            ${{modelNameSingularLowerCase}} = Place::findOrFail($id);
            ${{modelNameSingularLowerCase}}->update($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 200);
        }
        public function destroy($id)
        {
            Place::destroy($id);
            return response()->json(null, 204);
        }
    }
