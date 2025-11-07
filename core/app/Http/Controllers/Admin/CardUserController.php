<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;

class CardUserController extends Controller
{
    public function index()
    {
        // Load cards with related user info
        $cards = Card::with('user')->orderBy('id', 'desc')->get();

        return view('admin.users.index', compact('cards'));
    }
}
