<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $jobb = Job::with('job_category')->paginate(10);

        return view('admin.index', compact('jobb'));
    }

    public function deljob(string $id)
    {
        $jo = Job::where('id', $id)->first();

        if($jo){
            $jo->delete();

            toast('Job deleted successfully.','success');
            return redirect()->back()->with('message', 'Job deleted successfully');
        }else if(!$jo){
            toast('Invalid id.','error');
            return redirect()->back()->with('error', 'Invalid id.');
        }

        Alert::error('Oopss...', 'Something went wrong.');
    }


}
