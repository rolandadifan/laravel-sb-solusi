<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function contact_index()
    {
        $address = Menu::where('key', 'address')->first();
        $phone = Menu::where('key', 'phone')->first();
        $email = Menu::where('key', 'email')->first();
        return view('admin.page.menu.contact', [
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
        ]);
    }

    public function contact_update(Request $request)
    {
        try {
            //code...
            $address = $request->address;
            $phone = $request->phone;
            $email = $request->email;

            $address_update = Menu::where('key', 'address')->first();
            $address_update->update([
                'value' => $address
            ]);

            $phone_update = Menu::where('key', 'phone')->first();
            $phone_update->update([
                'value' => $phone
            ]);

            $email_update = Menu::where('key', 'email')->first();
            $email_update->update([
                'value' => $email
            ]);

            return redirect()->back()->with('status', 'successfully update menu');
        } catch (\Throwable $th) {
            //throw $th;
             return redirect()->back()->with('error', $th->getMessage());
        }
        
    }

    public function header_index()
    {
        $one = Menu::where('key', 'header_one')->first();
        $two = Menu::where('key', 'header_two')->first();
        return view('admin.page.menu.header', [
            'one' => $one,
            'two' => $two,
        ]);
    }

     public function header_update(Request $request)
    {
        try {
            //code...
            $one = $request->one;
            $two = $request->two;

            $one_update = Menu::where('key', 'header_one')->first();
            $one_update->update([
                'value' => $one
            ]);

            $two_update = Menu::where('key', 'header_two')->first();
            $two_update->update([
                'value' => $two
            ]);

            

            return redirect()->back()->with('status', 'successfully update menu');
        } catch (\Throwable $th) {
            //throw $th;
             return redirect()->back()->with('error', $th->getMessage());
        }
        
    }

    public function social_index()
    {
        $linkedin = Menu::where('key', 'linkedin')->first();
        $wa = Menu::where('key', 'wa')->first();
        $ig = Menu::where('key', 'ig')->first();
        $yt = Menu::where('key', 'yt')->first();
        return view('admin.page.menu.social', [
            'linkedin' => $linkedin,
            'wa' => $wa,
            'ig' => $ig,
            'yt' => $yt,
        ]);
    }

    public function social_update(Request $request)
    {
        try {
            //code...
            $linkedin = $request->linkedin;
            $wa = $request->wa;
            $ig = $request->ig;
            $yt = $request->yt;

            $linkedin_update = Menu::where('key', 'linkedin')->first();
            $linkedin_update->update([
                'value' => $linkedin
            ]);

            $wa_update = Menu::where('key', 'wa')->first();
            $wa_update->update([
                'value' => $wa
            ]);

            $ig_update = Menu::where('key', 'ig')->first();
            $ig_update->update([
                'value' => $ig
            ]);

            $yt_update = Menu::where('key', 'yt')->first();
            $yt_update->update([
                'value' => $yt
            ]);

            return redirect()->back()->with('status', 'successfully update menu');
        } catch (\Throwable $th) {
            //throw $th;
             return redirect()->back()->with('error', $th->getMessage());
        }
        
    }

     public function about_index()
    {
        $about = Menu::where('key', 'about')->first();
        $visi = Menu::where('key', 'visi')->first();
        $misi = Menu::where('key', 'misi')->first();
        $image_about = Menu::where('key', 'image_about')->first();
        return view('admin.page.menu.about', [
            'about' => $about,
            'visi' => $visi,
            'misi' => $misi,
            'image_about' => $image_about,
        ]);
    }

    public function about_update(Request $request)
    {
        try {
            //code...
            $about = $request->about;
            $visi = $request->visi;
            $misi = $request->misi;
            

            $about_update = Menu::where('key', 'about')->first();
            $about_update->update([
                'value' => $about
            ]);

            $visi_update = Menu::where('key', 'visi')->first();
            $visi_update->update([
                'value' => $visi
            ]);

            $misi_update = Menu::where('key', 'misi')->first();
            $misi_update->update([
                'value' => $misi
            ]);


            return redirect()->back()->with('status', 'successfully update menu');
        } catch (\Throwable $th) {
            //throw $th;
             return redirect()->back()->with('error', $th->getMessage());
        }
        
    }

    public function img_update(Request $request)
    {
        try {
            //code...
             $image_about = Menu::where('key', 'image_about')->first();
             if($image_about->value === 'no pic')
             {
                 $img = $request->file('image_about')->store('menu', 'public');
                 $image_about->update([
                     'value' => $img
                 ]);
                 return redirect()->back()->with('status', 'successfully update menu');
             }else{
                $file_path = Storage::url($image_about->value);
                $path = str_replace('\\', '/', public_path());
                if (file_exists($path . $file_path)) {
                    unlink($path . $file_path);
                }
                $img = $request->file('image_about')->store('menu', 'public');
                $image_about->update([
                     'value' => $img
                 ]);
                 return redirect()->back()->with('status', 'successfully update menu');
             }
        } catch (\Throwable $th) {
            //throw $th;
             return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
