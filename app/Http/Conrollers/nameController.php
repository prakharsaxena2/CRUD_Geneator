<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\nameRequest;
    use App\name;

    class nameController extends Controller
    {
        public function index()
        {
            $names = name::latest()->get();
            return response()->json($names);
        }
        public function store(nameRequest $request)
        {
            ${{modelNameSingularLowerCase}} = name::create($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 201);
        }
        public function show($id)
        {
            ${{modelNameSingularLowerCase}} = name::findOrFail($id);
            return response()->json(${{modelNameSingularLowerCase}});
        }
        public function update(nameRequest $request, $id)
        {
            ${{modelNameSingularLowerCase}} = name::findOrFail($id);
            ${{modelNameSingularLowerCase}}->update($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 200);
        }
        public function destroy($id)
        {
            name::destroy($id);
            return response()->json(null, 204);
        }
    }
