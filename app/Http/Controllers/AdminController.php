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
        Owner::create([
            'user_id' => $offer->user->id,
            'house_id' => $offer->house->id,
            'status' => $offer->status,
        ]);

        $offer->delete();

        return back()->with('success', 'Berhasil memverifikasi penawaran');
    }

    public function denyOffer(Offer $offer)
    {
        $offer->delete();

        return back()->with('success', 'Berhasil membatalkan penawaran');
    }

    public function denyOrder(Order $order)
    {
        $phone_num = $order->user->phone_num;
        $body = 'Maaf pengajuan permintaan jasa anda belum bisa kami proses.';
        $response = response('<script>window.open("https://api.whatsapp.com/send?phone=' . $phone_num . '&text=' . $body . '", "_blank");</script>', 200, ['Content-Type', 'text/html']);
        $order->update(['status' => 'Tidak Disetujui']);
        return back()->with('response', $response);
    }

    public function finishOrder(Order $order)
    {
        $order->update(['status' => 'Selesai']);
        $orders = $order->user->orders->where('status', 'Selesai')->count();

        if ($orders > 100) {
            $order->user->update(['level' => 'Pro']);
        } elseif ($orders > 5) {
            $order->user->update(['level' => 'Intermediate']);
        }

        $phone_num = $order->user->phone_num;
        $body = 'Terimakasih telah menggunakan jasa kami, anda akan mendapatkan garansi iPagar selama 1 bulan, silahkan kunjungi halaman garansi iPagar untuk mengajukan keluhan terhadap pengerjaan jasa yang tim kami kerjakan ';
        $response = response('<script>window.open("https://api.whatsapp.com/send?phone=' . $phone_num . '&text=' . $body . '", "_blank");</script>', 200, ['Content-Type', 'text/html']);

        return \back()->with('response', $response);
    }

    public function viewCustomers()
    {
        return view('customers', [
            'title' => 'Pelanggan iPagar',
            'customers' => User::all(),
        ]);
    }

    public function viewComplaints()
    {
        return view('complaints', [
            'title' => 'Keluhan Pelanggan iPagar',
            'complaints' => Complaint::all(),
        ]);
    }

    public function finishComplaint(Complaint $complaint)
    {
        $complaint->update(['status' => 'Selesai']);
        $complaint->order->update(['status_warranty' => 'Selesai']);
        return back()->with('success', 'Keluhan telah diselesaikan');
    }
}
