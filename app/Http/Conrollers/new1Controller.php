<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\new1Request;
    use App\new1;

    class new1Controller extends Controller
    {
        public function index()
        {
            $new1s = new1::latest()->get();
            return response()->json($new1s);
        }
        public function store(new1Request $request)
        {
            ${{modelNameSingularLowerCase}} = new1::create($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 201);
        }
        public function show($id)
        {
            ${{modelNameSingularLowerCase}} = new1::findOrFail($id);
            return response()->json(${{modelNameSingularLowerCase}});
        }
        public function update(new1Request $request, $id)
        {
            ${{modelNameSingularLowerCase}} = new1::findOrFail($id);
            ${{modelNameSingularLowerCase}}->update($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 200);
        }
        public function destroy($id)
        {
            new1::destroy($id);
            return response()->json(null, 204);
        }
    }
