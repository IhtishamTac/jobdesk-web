<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Requiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\Toaster;

class JobController extends Controller
{
    public function index()
    {
        $job = Job::paginate(10);

        return view('welcome', compact('job'));
    }

    public function alljob()
    {
        $jobs = Job::with('requiter')->get();

        return view('job.alljob', compact('jobs'));
    }

    public function reqdash()
    {
        $req = Requiter::where('user_id', auth()->id())->first();

        $jobb = Job::where('requiter_id', $req->id)->with('job_category')->paginate(10);
        $cat = JobCategory::all();

        return view('job.req-dashboard', compact('jobb', 'cat'));
    }

    public function getujob(string $id)
    {
        $j = Job::where('id', $id)->first();
        $cat = JobCategory::all();

        return view('job.editjob', compact('j', 'cat'));
    }

    public function addjob(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required',
            'category' => 'required',
        ]);

        if($validator->fails()){
            Alert::error('Error', 'Invalid field.');
            return redirect()->back()->with('error', 'Invalid field');
        }

        $user = Auth::user();
        $req = Requiter::where('user_id', $user->id)->first();
        if($user->role == 'requiter'){
            $j = new Job();
            $j->requiter_id = $req->id;
            $j->job_category_id = $request->category;
            $j->title = $request->title;
            $j->description = $request->description;
            $j->salary = $request->salary;
            $j->save();

            toast('Job added successfully!','success');
            return redirect()->back()->with('message', 'Job Successfully added');
        }else{

            toast('Only requiter can add a Job!','error');
            return redirect()->back()->with('error', 'Unauthorized');
        }
    }


    public function editjob(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required',
            'category' => 'required',
        ]);

        if($validator->fails()){
            Alert::error('Error', 'Invalid field.');
            return redirect()->back()->with('error', 'Invalid field');
        }

        $j = Job::where('id', $id)->first();
        $j->job_category_id = $request->category;
        $j->title = $request->title;
        $j->description = $request->description;
        $j->salary = $request->salary;
        $j->save();

        toast('Job updated successfully.','success');
        return redirect()->route('reqdash')->with('message', 'Job Successfully updated');
    }

    public function applyjob(Request $request)
    {
        Alert::warning('Warning!', 'In Progress. Coming Soon...');
        return redirect()->back()->with('message', 'cannot Apply');
    }
}
