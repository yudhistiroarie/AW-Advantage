<?php

namespace App\Actions\Login;

use Lorisleiva\Actions\Concerns\AsAction;

class ShowLogin {
    use AsAction;

    public function asController() {
        return view("auth.login");
    }
}
