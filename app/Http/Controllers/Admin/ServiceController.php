<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Проверка на админа
    private function checkAdmin()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403, 'Доступ запрещён');
        }
    }

    public function index()
    {
        $this->checkAdmin();
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $this->checkAdmin();
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $this->checkAdmin();
    
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|string',  
        ]);
    
        if ($request->has('image')) {
            $data['image'] = $request->input('image'); 
        }
    
        Service::create($data);
    
        return redirect()->route('admin.services.index')->with('success', 'Услуга добавлена');
    }
    
    public function edit($id)
    {
        $this->checkAdmin();
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $this->checkAdmin();
    
        $service = Service::findOrFail($id);
    
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|string',  
        ]);
    
        if ($request->has('image')) {
            $data['image'] = $request->input('image'); 
        }
    
        $service->update($data);
    
        return redirect()->route('admin.services.index')->with('success', 'Услуга обновлена');
    }
    

    public function destroy($id)
    {
        $this->checkAdmin();

        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Услуга удалена');
    }
}
