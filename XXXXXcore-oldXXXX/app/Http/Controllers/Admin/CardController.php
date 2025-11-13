<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::with('user')->orderBy('id', 'desc')->get();
        return view('admin.cards.index', compact('cards'));
    }

    public function generate()
    {
        for ($i = 1; $i <= 10; $i++) {

            // Unique 4 digit number
            do {
                $card_id = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
            } while (Card::where('card_id', $card_id)->exists());

            // URL for QR
            $url = "https://dotinfo.test/view/" . $card_id;

            // Determine public path (public folder may be outside core)
            $public_path = base_path('../public');
            $qr_folder = $public_path . '/qrcodes';

            if (!file_exists($qr_folder)) {
                mkdir($qr_folder, 0777, true);
            }

            $file_name = $qr_folder . '/' . $card_id . '.png';

            // Generate QR Code PNG
            QrCode::format('png')->size(200)->generate($url, $file_name);

            // Save relative path in DB
            Card::create([
                'card_id' => $card_id,
                'qrcode' => 'qrcodes/' . $card_id . '.png',
            ]);
        }

        return back()->with('success', '10 Cards Generated Successfully 🎉');
    }

    public function edit($id)
    {
        $card = Card::findOrFail($id);
        return view('admin.cards.edit', compact('card'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $card = Card::findOrFail($id);
        $card->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.cards.index')->with('success', 'Card updated successfully.');
    }

    public function destroy($id)
    {
        $card = Card::findOrFail($id);

        $file = base_path('../public/' . $card->qrcode);
        if (file_exists($file)) {
            unlink($file);
        }

        $card->delete();

        return back()->with('success', 'Card Deleted ✅');
    }

    public function view($card_id)
    {
        $card = Card::where('card_id', $card_id)->firstOrFail();
        return view('admin.cards.view', compact('card'));
    }
}
