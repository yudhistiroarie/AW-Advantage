<?php

namespace App\Actions\Register;

use Lorisleiva\Actions\Concerns\AsAction;

class ShowRegis {
    use AsAction;

    public function asController() {
        return view('auth.register');
    }
}
