<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerguruanTinggiController extends Controller
{
    public function index()
    {
        $data['perguruan']      = PeguruanTinggi::get()->orderBY('created_at', 'DESC')->get();
        return view('website.data-perguruan-tinggi')->with($data);
    }

    public function store(Request $request)
    {
        $file                 = $request->file('gambar'); 
        if($file){
            $filename         =  time() .'-'.$file->getClientOriginalExtension();
            $path             = 'public/asset/perguruan';
            $file->move($path,$filename);
            $data = [
                'name'	      => $request->name,
                'nama'	      => $request->nama,
                'alamat'	  => $request->alamat,
                'status'	      => $request->status,
                'deskripsi'	      => $request->deskripsi,
                'gambar'     => $filename,
            ];
        }else{
            $data = [
                'name'	      => $request->name,
                'nama'	      => $request->nama,
                'alamat'	  => $request->alamat,
                'status'	      => $request->status,
                'deskripsi'	      => $request->deskripsi,
                'gambar'     => '',
            ];
        }
        PeguruanTinggi::create($data);
        return redirect('website/perguruan')->with('success', 'Data Added Successfully');
    }

    public function edit($id)
    {
        $data['perguruan']       = PeguruanTinggi::find($id)->orderBY('created_at', 'status')->get();
        return view('website.data-perguruan-tingginner')->with($data);
    }

    public function update(Request $request, $id)
    {
        $file                 = $request->file('gambar');   
        $gambarlama	      = $request->gambarlama;
        if($file){
            $filename         =  time() .'-'.$file->getClientOriginalExtension();
            $path             = 'public/asset/perguruan';
            $file->move($path,$filename);
            $data = [
                'name'	      => $request->name,
                'nama'	      => $request->nama,
                'alamat'	  => $request->alamat,
                'status'	      => $request->status,
                'deskripsi'	      => $request->deskripsi,
                'gambar'     => $filename,
            ];
            File::delete('public/asset/banner/'.$gambarlama);
        }else{
            $data = [
                'name'	      => $request->name,
                'nama'	      => $request->modul,
                'alamat'	  => $request->alamat,
                'status'	      => $request->status,
                'deskripsi'	      => $request->deskripsi,
                'gambar'     => $gambarlama,
            ];
        }
        
        PeguruanTinggi::where('id',$id)->update($data);
        return redirect('website/perguruan')->with('success','Data updated successfully');
    }


    public function delete($id)
    {
        $banner                = PeguruanTinggi::find($id);
        File::delete('public/img/perguruan/'.$banner->gambar.'');
        $banner->delete();
        return redirect('website/perguruan');
    } 
}
