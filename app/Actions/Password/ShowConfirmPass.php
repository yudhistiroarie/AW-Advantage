<?php

namespace App\Actions\Password;

use Lorisleiva\Actions\Concerns\AsAction;

class ShowConfirmPass {
    use AsAction;

    public function asController() {
        return view("auth.confirm-password");
    }
}
