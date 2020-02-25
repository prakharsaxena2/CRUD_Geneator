<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\CarRequest;
    use App\Car;

    class CarController extends Controller
    {
        public function index()
        {
            $cars = Car::latest()->get();
            return response()->json($cars);
        }
        public function store(CarRequest $request)
        {
            ${{modelNameSingularLowerCase}} = Car::create($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 201);
        }
        public function show($id)
        {
            ${{modelNameSingularLowerCase}} = Car::findOrFail($id);
            return response()->json(${{modelNameSingularLowerCase}});
        }
        public function update(CarRequest $request, $id)
        {
            ${{modelNameSingularLowerCase}} = Car::findOrFail($id);
            ${{modelNameSingularLowerCase}}->update($request->all());
            return response()->json(${{modelNameSingularLowerCase}}, 200);
        }
        public function destroy($id)
        {
            Car::destroy($id);
            return response()->json(null, 204);
        }
    }
