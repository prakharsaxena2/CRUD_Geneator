<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\bikeRequest;
    use App\bike;

    class bikeController extends Controller
    {
        public function index()
        {
            $bikes = bike::latest()->get();
            return response()->json($bikes);
        }
        public function store(bikeRequest $request)
        {
            ${{modelNameSingularLowerCase}} = bike::create($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 201);
        }
        public function show($id)
        {
            ${{modelNameSingularLowerCase}} = bike::findOrFail($id);
            return response()->json(${{modelNameSingularLowerCase}});
        }
        public function update(bikeRequest $request, $id)
        {
            ${{modelNameSingularLowerCase}} = bike::findOrFail($id);
            ${{modelNameSingularLowerCase}}->update($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 200);
        }
        public function destroy($id)
        {
            bike::destroy($id);
            return response()->json(null, 204);
        }
    }
