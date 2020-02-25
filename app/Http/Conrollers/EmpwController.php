<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\EmpwRequest;
    use App\Empw;

    class EmpwController extends Controller
    {
        public function index()
        {
            $empws = Empw::latest()->get();
            return response()->json($empws);
        }
        public function store(EmpwRequest $request)
        {
            ${{modelNameSingularLowerCase}} = Empw::create($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 201);
        }
        public function show($id)
        {
            ${{modelNameSingularLowerCase}} = Empw::findOrFail($id);
            return response()->json(${{modelNameSingularLowerCase}});
        }
        public function update(EmpwRequest $request, $id)
        {
            ${{modelNameSingularLowerCase}} = Empw::findOrFail($id);
            ${{modelNameSingularLowerCase}}->update($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 200);
        }
        public function destroy($id)
        {
            Empw::destroy($id);
            return response()->json(null, 204);
        }
    }
