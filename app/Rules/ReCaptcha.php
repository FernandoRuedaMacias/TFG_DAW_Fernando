<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class ReCaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //Recurso : https://www.youtube.com/watch?v=VdTk3abjT_w&ab_channel=HardikSavani%28ItSolutionStuff%29
        //El código lo he sacado del vídeo de arriba.

        $response = Http::get("https://www.google.com/recaptcha/api/siteverify", [
            "secret" => "6LccAyorAAAAAGTphZez-gKp12DVdA_TEmHdNvM",
            "response" => $value
        ])->json();
    
        if (!$response['success']) {
            $fail("El captcha de Google no se ha validado.");
        }
    }
}
