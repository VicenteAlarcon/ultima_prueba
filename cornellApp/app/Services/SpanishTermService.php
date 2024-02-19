<?php

namespace App\Services;
use App\Models\Term;
use App\Models\Description;

class SpanishTermService
{

    public function spanishTerms()
    {
        $spanish = Term::where('language_id', 'es')->get();
        return $spanish;
    }
}