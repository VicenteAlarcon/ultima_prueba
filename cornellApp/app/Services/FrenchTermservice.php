<?php

namespace App\Services;
use App\Models\Term;
use App\Models\Description;

class FrenchTermService
{

    public function frenchTerms()
    {
        $french = Term::where('language_id', 'fr')->get();
        return $french;
    }
}