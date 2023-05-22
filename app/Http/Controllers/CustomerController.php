<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Order;
use App\Models\Complaint;
use App\Models\Offer;
use App\Models\Owner;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function viewOffering()
    {
        return view('offering', [
            'title' => 'Penawaran Rumah',
            'offers' => auth()->user()->offers
        ]);
    }

    public function setOffer(House $house)
    {

        if (Offer::where('user_id', \auth()->user()->id)->first()) {
            return back()->with('fail', 'Maaf status penawaran anda masih belum dikonfirmasi, harap selesaikan satu penawaran untuk mengajukan penawaran lagi');
        }

        $status = $house->status == 'Dijual' ? 'Membeli' : 'Menyewa';

        Offer::create([
            'user_id' => \auth()->user()->id,
            'house_id' => $house->id,
            'status' => $status,
        ]);

        return \redirect('/customer/offering')->with('success', 'Berhasil mengajukan penawaran');
    }

    public function viewHouse()
    {
        return view('house', [
            'title' => 'Rumah Saya',
            'owners' => auth()->user()->owners,
        ]);
    }

    public function rentOut(Owner $owner)
    {
        $owner->house->update([
            'status' => 'Disewakan'
        ]);

        return back()->with('Rumah berhasil dipromosikan untuk disewakan');
    }

    public function cancelRent(Owner $owner)
    {
        $owner->house->update([
            'status' => 'Dibeli'
        ]);

        return back()->with('Rumah berhasil dipromosikan untuk disewakan');
    }
}
