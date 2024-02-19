<?php

namespace App\Services;
use App\Models\Term;
use App\Models\Description;

class DeustchTermService
{

    public function deustchTerms()
    {
        $deustch = Term::where('language_id', 'de')->get();
        return $deustch;
    }
}