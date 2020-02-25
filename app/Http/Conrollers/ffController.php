<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\ffRequest;
    use App\ff;

    class ffController extends Controller
    {
        public function index()
        {
            $ffs = ff::latest()->get();
            return response()->json($ffs);
        }
        public function store(ffRequest $request)
        {
            ${{modelNameSingularLowerCase}} = ff::create($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 201);
        }
        public function show($id)
        {
            ${{modelNameSingularLowerCase}} = ff::findOrFail($id);
            return response()->json(${{modelNameSingularLowerCase}});
        }
        public function update(ffRequest $request, $id)
        {
            ${{modelNameSingularLowerCase}} = ff::findOrFail($id);
            ${{modelNameSingularLowerCase}}->update($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 200);
        }
        public function destroy($id)
        {
            ff::destroy($id);
            return response()->json(null, 204);
        }
    }
