<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\EmpwwdddddRequest;
    use App\Empwwddddd;

    class EmpwwdddddController extends Controller
    {
        public function index()
        {
            $Empwwddddd = Empwwddddd::latest()->get();
            return response()->json($Empwwddddd);
        }
        public function store(Request $request)
        {
            $Empwwddddd = Empwwddddd::create($request->all());
            return response()->json($Empwwddddd, 201);
        }
        public function show($id)
        {
            $Empwwddddd = Empwwddddd::findOrFail($id);
            return response()->json($Empwwddddd);
        }
        public function update(Request $request, $id)
        {
            $Empwwddddd = Empwwddddd::findOrFail($id);
            $Empwwddddd->update($request->all());
            return response()->json($Empwwddddd, 200);
        }
        public function destroy($id)
        {
            Empwwddddd::destroy($id);
            return response()->json(null, 204);
        }
    }
