<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\EmpRequest;
    use App\Emp;

    class EmpController extends Controller
    {
        public function index()
        {
            $emps = Emp::latest()->get();
            return response()->json($emps);
        }
        public function store(EmpRequest $request)
        {
            ${{modelNameSingularLowerCase}} = Emp::create($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 201);
        }
        public function show($id)
        {
            ${{modelNameSingularLowerCase}} = Emp::findOrFail($id);
            return response()->json(${{modelNameSingularLowerCase}});
        }
        public function update(EmpRequest $request, $id)
        {
            ${{modelNameSingularLowerCase}} = Emp::findOrFail($id);
            ${{modelNameSingularLowerCase}}->update($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 200);
        }
        public function destroy($id)
        {
            Emp::destroy($id);
            return response()->json(null, 204);
        }
    }
