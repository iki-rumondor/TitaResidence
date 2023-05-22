<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\House;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function viewOffers()
    {
        return view('offers', [
            'title' => 'Penawaran Rumah',
            'offers' => Offer::all(),
        ]);
    }

    public function verifyOffer(Offer $offer)
    {
        
        $offer->house->owner->update([
            'user_id' => $offer->user->id,
            'status' => ($offer->status == 'Membeli') ? 'Pemilik' : 'Penyewa',
        ]);

        $offer->house->update([
            'status' => 'Dibeli',
        ]);

        $offer->delete();

        $phone_num = $offer->user->phone_num;
        $body = 'Penawaran perumahan yang anda ajukan telah kami terima, anda bisa datang langsung ke kantor kami di jalan Kotamobagu,  Kotamobagu Utara.';
        $response = response('<script>window.open("https://api.whatsapp.com/send?phone=' . $phone_num . '&text=' . $body . '", "_blank");</script>', 200, ['Content-Type', 'text/html']);

        return back()->with('response', $response);
    }

    public function denyOffer(Offer $offer)
    {
        $offer->delete();

        $phone_num = $offer->user->phone_num;
        $body = 'Maaf... Penawaran perumahan yang anda ajukan belum dapat kami terima dengan alasan tertentu.';
        $response = response('<script>window.open("https://api.whatsapp.com/send?phone=' . $phone_num . '&text=' . $body . '", "_blank");</script>', 200, ['Content-Type', 'text/html']);

        return back()->with('response', $response);
    }

    public function viewCustomers()
    {
        return view('customers', [
            'title' => 'Pelanggan iPagar',
            'customers' => User::where('username', '!=', 'admin')->get(),
        ]);
    }

}
