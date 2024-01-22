<?php

namespace App\Http\Controllers;
use App\Models\Checklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MainController extends Controller
{
    public static string $blueprint = '';

    public function index(): View{
        global $blueprint;
        $counter = 0;
        if (isset(Auth::user()->id)){
            $choose = Checklist::where('user_id', Auth::user()->id)->get();
            foreach ($choose as $item) {
                $counter += 1;
                $blueprint .= '
                <div class="input-group mb-2">
                    <input class="form-check-input bg-info" type="checkbox" name="items['.$counter.'][checked]"  ' . ($item->checked ? 'checked' : '') . '>
                    <input class="form-control bg-info w-50 mt-1" type="text" name="items['.$counter.'][product]" value="' . $item->product . '" maxlength="25">
                    <input class="form-control bg-info mt-1" type="number" name="items['.$counter.'][count]" value="' . $item->count . '" maxlength="4">
                    <input type="button" class="delete_button btn btn-close h-auto mt-1 bg-info" id="delete_button">
                </div>
            ';
            }
        }
        return view('main', ['blueprint' => $blueprint, 'counter' => $counter]);
    }
    public function createList(Request $request){
//        if (Auth::check()) {
//            $items = $request->items;
//            dd($items);
////            foreach ($items as $item){
////                $validatedData += [
////                    'checked'=>$item['checked'],
////                    'product'=>$item['product'],
////                    'count'=>$item['count']
////                ];
////            }
////            Checklist::create($validatedData);
//        }
        return redirect('/');
    }
}
