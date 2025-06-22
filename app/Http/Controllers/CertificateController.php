<?php

namespace App\Http\Controllers;
use App\Models\Certificate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;



class CertificateController extends Controller
{
    

public function create()
{
    return view('certificates.create');
}
public function store(Request $request)
{
    $data = $request->validate([
        'amount' => 'required|numeric|min:100',
        'recipient_name' => 'required|string|max:255',
        'recipient_email' => 'required|email',
    ]);

    $data['code'] = strtoupper(uniqid('SPA-'));
    $data['expiry_date'] = now()->addMonths(6);
    $data['used'] = false;

    $certificate = Certificate::create($data);

    $pdf = Pdf::loadView('certificates.pdf', ['certificate' => $certificate]);

    return $pdf->download("Сертификат-{$certificate->code}.pdf");
}

public function index()
{
    $certificates = Certificate::all();
    return view('admin.certificates.index', compact('certificates'));
}

}
