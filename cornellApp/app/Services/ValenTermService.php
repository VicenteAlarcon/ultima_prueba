<?php

namespace App\Services;
use App\Models\Term;
use App\Models\Description;

class ValenTermService
{

    public function valenTerms()
    {
        $valencia = Term::where('language_id', 'va')->get();
        return $valencia;
    }
}