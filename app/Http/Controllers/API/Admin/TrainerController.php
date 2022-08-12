<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TrainerController extends Controller
{
    public function ShowTrainer()
    {
        $data['trainers'] = Trainer::select('id','name','phone','spec','image')->paginate(3);
        return view('admin.trainer.index')->with($data);
    }
    public function CreateTrainer()
    {
        return view('admin.trainer.create');
    }

    public function StoreTrainer(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'required|string|max:20',
            'spec' => 'required|string|max:30',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        $new_name =  $data['image']->hashName();
        Image::make($data['image'])->resize(50,50)->save(public_path('uploads/trainers/'.$new_name));
        $data['image'] = $new_name;
        Trainer::create($data);
        return redirect(route('admin.ShowTrainer'));
    }
    public function EditTrainer($id)
    {
        $data['trainer'] = Trainer::findOrFail($id);
        return view('admin.trainer.edit')->with($data);
    }

    public function UpdateTrainer(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'required|string|max:20',
            'spec' => 'required|string|max:30',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $old_name = Trainer::findOrFail($request->id)->image;

        if($request->hasFile('image'))
        {
            Storage::disk('uploads')->delete('trainers/'.$old_name);
            $new_name =  $data['image']->hashName();
            Image::make($data['image'])->resize(50,50)->save(public_path('uploads/trainers/'.$new_name));
            $data['image'] = $new_name;
        }
        else
        {
            $data['image'] = $old_name;
            Trainer::findOrFail($request->id)->update($data);
        }

        Trainer::findOrFail($request->id)->update($data);
        return redirect(route('admin.ShowTrainer'));

    }

    public function DeleteTrainer($id)
    {
        $image_current = Trainer::findOrFail($id)->image;
        Storage::disk('uploads')->delete('trainers/'.$image_current);
        Trainer::findOrFail($id)->delete();
        return back();
    }
}
