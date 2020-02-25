<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\EmpwssRequest;
    use App\Empwss;

    class EmpwssController extends Controller
    {
        public function index()
        {
            $empwsses = Empwss::latest()->get();
            return response()->json($empwsses);
        }
        public function store(EmpwssRequest $request)
        {
            ${{modelNameSingularLowerCase}} = Empwss::create($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 201);
        }
        public function show($id)
        {
            ${{modelNameSingularLowerCase}} = Empwss::findOrFail($id);
            return response()->json(${{modelNameSingularLowerCase}});
        }
        public function update(EmpwssRequest $request, $id)
        {
            ${{modelNameSingularLowerCase}} = Empwss::findOrFail($id);
            ${{modelNameSingularLowerCase}}->update($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 200);
        }
        public function destroy($id)
        {
            Empwss::destroy($id);
            return response()->json(null, 204);
        }
    }
