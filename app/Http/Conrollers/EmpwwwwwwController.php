<?php
    namespace App\Http\Controllers;

    use App\Http\Requests\EmpwwwwwwRequest;
    use App\Empwwwwww;

    class EmpwwwwwwController extends Controller
    {
        public function index()
        {
            $Empwwwwww = Empwwwwww::latest()->get();
            return response()->json($Empwwwwww);
        }
        public function store(EmpwwwwwwRequest $request)
        {
            $Empwwwwww = Empwwwwww::create($request->all());
            return response()->json($Empwwwwww, 201);
        }
        public function show($id)
        {
            $Empwwwwww = Empwwwwww::findOrFail($id);
            return response()->json($Empwwwwww);
        }
        public function update(EmpwwwwwwRequest $request, $id)
        {
            $Empwwwwww = Empwwwwww::findOrFail($id);
            $Empwwwwww->update($request->all());
            return response()->json($Empwwwwww, 200);
        }
        public function destroy($id)
        {
            Empwwwwww::destroy($id);
            return response()->json(null, 204);
        }
    }
