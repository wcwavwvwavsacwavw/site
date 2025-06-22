<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        Inquiry::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return redirect()->route('welcome')->with('success', 'Ваша заявка успешно отправлена!');
    }
}
