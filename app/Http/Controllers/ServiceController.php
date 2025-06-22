<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::query();

        if ($request->has(key: 'title') && $request->title != '') {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->has('sort')) {
            $sortOrder = $request->sort == 'desc' ? 'desc' : 'asc';
            $query->orderBy('price', $sortOrder);
        }

        $services = $query->get();

        return view('services.index', compact('services'));

    }

    public function show($id)
    {
        $service = Service::findOrFail($id);

        $reviews = $service->reviews()->latest()->get();

        $otherServices = Service::where('id', '!=', $service->id)
            ->latest()
            ->take(3)
            ->get();

        return view('services.show', [
            'service' => $service,
            'reviews' => $reviews, 
            'otherServices' => $otherServices,
        ]);
    }

    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'review' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
        ]);

        $service = Service::findOrFail($id);

        $hasBooked = $service->bookings()->where('user_id', Auth::id())->exists();

        if (!$hasBooked) {
            return redirect()->route('services.show', $id)->with('error', 'Вы не можете оставить отзыв, так как не записывались на эту услугу.');
        }

        Review::create([
            'user_id' => Auth::id(),
            'service_id' => $id,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return redirect()->route('services.show', $id)->with('success', 'Отзыв успешно добавлен!');
    }
}
