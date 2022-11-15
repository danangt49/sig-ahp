<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerguruanTinggi;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
class PerguruanTinggiController extends Controller
{
    public function index()
    {
        return view('website.perguruan-tinggi.home');
    }
    
    public function api () 
    {
        $result = PerguruanTinggi::get(); 
        $original_data = json_decode($result, true);
        $features = array();

        foreach($original_data as $key => $value) { 
            $features[] = array(
                    'type' => 'Feature',
                    'geometry' => array('type' => 'Point', 'coordinates' => array((float)$value['latitude'],(float)$value['longitude'])),
                    'properties' => array('name' => $value['nama'], 'id' => $value['id']),
                    );
            };   

        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);

        return response()->json($allfeatures, 200)->withCallback('eqfeed_callback');
    }

    public function json()
    {
        $data = PerguruanTinggi::get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($row){
          $btn='
          <a class="btn btn-sm" href="perguruan-tinggi/'.$row->id.'"><i class="fas fa-tools"></i></a>
          <button data-id="'.$row->id.'"class="btn btn-sm delete"><i class="fas fa-trash-restore"></i></button>
          ';
          return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function create()
    {
        return view('website.perguruan-tinggi.create');
    }
    public function store(Request $request)
    {
        $file                 = $request->file('gambar'); 
        if($file){
            $filename         =  time() .'.'.$file->getClientOriginalExtension();
            $path             = 'public/img';
            $file->move($path,$filename);
            $data = [
                'nama'	      => $request->nama,
                'alamat'	  => $request->alamat,
                'longitude'	  => $request->longitude,
                'latitude'	  => $request->latitude,
                'status'	  => $request->status,
                'deskripsi'	  => $request->deskripsi,
                'gambar'      => $filename,
            ];
        }else{
            $data = [
                'nama'	      => $request->nama,
                'alamat'	  => $request->alamat,
                'longitude'	  => $request->longitude,
                'latitude'	  => $request->latitude,
                'status'	  => $request->status,
                'deskripsi'	  => $request->deskripsi,
                'gambar'      => '',
            ];
        }
        PerguruanTinggi::create($data);
        return redirect('perguruan-tinggi')->with('success', 'Data Added Successfully');
    }

    public function edit($id)
    {
        $data['perguruan']    = PerguruanTinggi::find($id);
        return view('website.perguruan-tinggi.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $file                 = $request->file('gambar');   
        $gambarlama	          = $request->gambarlama;
        if($file){
            $filename         =  time() .'.'.$file->getClientOriginalExtension();
            $path             = 'public/img';
            $file->move($path,$filename);
            $data = [
                'nama'	      => $request->nama,
                'alamat'	  => $request->alamat,
                'longitude'	  => $request->longitude,
                'latitude'	  => $request->latitude,
                'status'	  => $request->status,
                'deskripsi'	  => $request->deskripsi,
                'gambar'      => $filename,
            ];
            File::delete('public/img/'.$gambarlama);
        }else{
            $data = [
                'nama'	      => $request->nama,
                'alamat'	  => $request->alamat,
                'longitude'	  => $request->longitude,
                'latitude'	  => $request->latitude,
                'status'	  => $request->status,
                'deskripsi'	  => $request->deskripsi,
                'gambar'      => $gambarlama,
            ];
        }
        
        PerguruanTinggi::where('id',$id)->update($data);
        return redirect('perguruan-tinggi')->with('success','Data updated successfully');
    }

    public function delete($id)
    {
        $data                = PerguruanTinggi::find($id);
        File::delete('public/img/'.$data->gambar);
        $data->delete();
        return redirect('perguruan-tinggi');
    } 
}
