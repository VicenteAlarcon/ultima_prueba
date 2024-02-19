<?php

namespace App\Services;
use App\Models\Term;
use App\Models\Description;

class EnglishTermService
{

    public function englishTerms()
    {
        $english = Term::where('language_id', 'en')->get();
        return $english;
    }
}