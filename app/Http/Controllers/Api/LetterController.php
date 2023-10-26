<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LetterRequest;
use App\Models\Letter;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Letter::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(LetterRequest $request)
    {
        $validated = $request->validated();

        $letter = Letter::create($validated);

        return $letter;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Letter::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $letter = Letter::findOrFail($id);

        $letter->delete();

        return $letter;
    }
}
