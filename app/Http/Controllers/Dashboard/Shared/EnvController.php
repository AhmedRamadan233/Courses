<?php

namespace App\Http\Controllers\Dashboard\Shared;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class EnvController extends Controller
{
    public function update(Request $request)
    {
        $envContent = file_get_contents(base_path('.env'));
        $envVariables = preg_split('/\R/', $envContent, -1, PREG_SPLIT_NO_EMPTY);
        $existingEnv = [];
        foreach ($envVariables as $envVariable) {
            list($key, $value) = explode('=', $envVariable, 2);
            $existingEnv[$key] = $value;
        }
        foreach ($request->types as $type) {
            if ($request->has($type)) {
                $key = strtoupper($type);
                $value = $request->input($type);
                // Update the value if the key exists, otherwise add it to the array
                if (array_key_exists($key, $existingEnv)) {
                    $existingEnv[$key] = $value;
                }
            }
        }
        $updatedEnvContent = '';
        foreach ($existingEnv as $key => $value) {
            $updatedEnvContent .= "$key=$value\n";
        }
        file_put_contents(base_path('.env'), $updatedEnvContent);
        Artisan::call('config:cache');
        return redirect()->route('paymob.index');
    }
    
}
