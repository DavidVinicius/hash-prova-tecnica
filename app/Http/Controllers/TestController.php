<?php

namespace App\Http\Controllers;

use App\Services\Hash;
use Illuminate\Http\Request;
use App\Models\Hash as HashModel;

class TestController extends Controller
{
    public function hash(Request $request)
    {
        try {            
            $hashService = new Hash();
            
            $hash = $hashService->hash($request->string ?? '');
            
            $hashObject = HashModel::create($hash);
    
            return response()->json($hash);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
