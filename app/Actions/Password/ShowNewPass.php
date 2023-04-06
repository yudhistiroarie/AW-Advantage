<?php

namespace App\Actions\Password;

use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowNewPass {
    use AsAction;

    public function acController(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }
}
