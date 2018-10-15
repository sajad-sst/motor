<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Motor;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\DeclareDeclare;

class AdminController extends Controller
{
    public function index()
    {
        return View('admin.index');
    }

    public function store(Request $request)
    {
        try {
            if ($request->img) {
                $images = array();
                foreach ($request->img as $item) {
                    $file = file_store($item, 'source/assets/uploads/motors/photos/', 'photo-');
                    array_push($images, $file);
                }
            }
            Motor::create([
                'last_make' => $request->last_make,
                'modell' => $request->model,
                'color' => $request->color,
                'weight' => $request->weight,
                'price' => $request->price,
                'images' => serialize($images),
            ]);

            return redirect()->back()->with('status','success!');
        }catch (\Exception $e){
            return redirect()->back()->with('status', $e);
        }


    }
}
