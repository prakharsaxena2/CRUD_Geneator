<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\EmpwsRequest;
    use App\Empws;

    class EmpwsController extends Controller
    {
        public function index()
        {
            $empws = Empws::latest()->get();
            return response()->json($empws);
        }
        public function store(EmpwsRequest $request)
        {
            ${{modelNameSingularLowerCase}} = Empws::create($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 201);
        }
        public function show($id)
        {
            ${{modelNameSingularLowerCase}} = Empws::findOrFail($id);
            return response()->json(${{modelNameSingularLowerCase}});
        }
        public function update(EmpwsRequest $request, $id)
        {
            ${{modelNameSingularLowerCase}} = Empws::findOrFail($id);
            ${{modelNameSingularLowerCase}}->update($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 200);
        }
        public function destroy($id)
        {
            Empws::destroy($id);
            return response()->json(null, 204);
        }
    }
