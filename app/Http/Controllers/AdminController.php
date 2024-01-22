<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View{
        $data = '';
        if (Auth::check() and Auth::user()->id == 1) {
            $id = 0;
            foreach (User::all() as $user){
                $id += 1;
                $data.= '
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion'.$id.'">
                                '.$user->name.'
                            </button>
                        </h2>
                        <div id="accordion'.$id.'" class="accordion-collapse collapse">
                            <div class="accordion-body">';
                foreach (Checklist::where('user_id', $user->id)->get() as $checklist){
                    $data .= '
                    <div class="input-group dropdown-item d-flex flex-row">
                        <input disabled class="form-check-input" style="height: 2.5em;width: 2.5em" type="checkbox" ' . ($checklist->checked ? 'checked' : '') . '>
                        <input disabled class="form-control w-50 mt-1" type="text" value="' . $checklist->product . '">
                        <input disabled class="form-control mt-1" type="number" value="' . $checklist->count . '">
                    </div>';
                }
                $data .= '</div></div></div>';
            }
        }
        return view('admin', ['data' => $data]);
    }
}
