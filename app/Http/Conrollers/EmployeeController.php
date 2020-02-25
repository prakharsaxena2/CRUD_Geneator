<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\EmployeeRequest;
    use App\Employee;

    class EmployeeController extends Controller
    {
        public function index()
        {
            $employees = Employee::latest()->get();
            return response()->json($employees);
        }
        public function store(EmployeeRequest $request)
        {
            ${{modelNameSingularLowerCase}} = Employee::create($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 201);
        }
        public function show($id)
        {
            ${{modelNameSingularLowerCase}} = Employee::findOrFail($id);
            return response()->json(${{modelNameSingularLowerCase}});
        }
        public function update(EmployeeRequest $request, $id)
        {
            ${{modelNameSingularLowerCase}} = Employee::findOrFail($id);
            ${{modelNameSingularLowerCase}}->update($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 200);
        }
        public function destroy($id)
        {
            Employee::destroy($id);
            return response()->json(null, 204);
        }
    }
