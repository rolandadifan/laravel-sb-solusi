<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.page.menu.service', ['services' => $services]);
    }

    public function edit($id)
    {
        $services = Service::findOrFail($id);
        return view('admin.page.menu.service-detail', ['services' => $services]);

    }

    public function update(Request $request, $id)
    {
        try {
            //code...
            $data['title'] = $request->title;
            $data['desc'] = $request->desc;
    
            $services = Service::findOrFail($id);
            $services->update($data);
            $services->save();
    
            return redirect()->back()->with('status', 'Successfully update status');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
