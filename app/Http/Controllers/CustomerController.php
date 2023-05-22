<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Order;
use App\Models\Complaint;
use App\Models\Offer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function viewOffering()
    {

        return view('offering', [
            'title' => 'Penawaran Rumah',
            'offers' => Offer::where('user_id', \auth()->user()->id)->get()
        ]);
    }

    public function setOffer(House $house)
    {

        if(Offer::where('user_id', \auth()->user()->id)->first()){
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

    public function order(Request $request)
    {
        $validatedData = $request->validate([
            "req_date" => "required|date|after_or_equal:tomorrow",
            "service" => "required",
            "address" => "required",
            "desa" => "required",
        ]);

        $validatedData['user_id'] = \auth()->user()->id;
        $validatedData['status'] = 'Diajukan';

        Order::create($validatedData);

        return redirect('/customer')->with('success', 'Berhasil mengajukan pemesanan jasa');
    }

    public function viewWarranty()
    {
        return view('warranty', [
            'title' => 'Order Jasa',
            'orders' => auth()->user()->orders->where('status', 'Selesai'),
        ]);
    }

    public function claimWarranty(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            "complaint_desc" => "required",
        ]);

        $order->update(['status_warranty' => 'Diklaim']);

        $validatedData['order_id'] = $order->id;
        Complaint::create($validatedData);

        return back()->with('success', 'Keluhan berhasil dikirimkan, mohon menunggu konfirmasi dari pihak iPagar');
    }
}
