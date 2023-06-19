<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Requiter;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $atmin = new User();
        $atmin->username = 'admin';
        $atmin->email = 'admin@gmail.com';
        $atmin->password = bcrypt('admin');
        $atmin->role = 'admin';
        $atmin->profile_pic = 'img/pfp/admin.jpg';
        $atmin->address = 'Jl. Atmin';
        $atmin->born_date = '1999-12-11';
        $atmin->save();

        $user = new User();
        $user->username = 'users';
        $user->email = 'users@gmail.com';
        $user->password = bcrypt('users');
        $user->role = 'user';
        $user->profile_pic = 'img/pfp/users.jpg';
        $user->address = 'Jl. Users';
        $user->born_date = '1999-12-11';
        $user->save();

        $req = new User();
        $req->username = 'requiter';
        $req->email = 'requiter@gmail.com';
        $req->password = bcrypt('requiter');
        $req->role = 'requiter';
        $req->profile_pic = 'img/pfp/requiter.jpg';
        $req->address = 'Jl. Requiter';
        $req->born_date = '1999-12-11';
        $req->save();

        $req1 = new User();
        $req1->username = 'requiter1';
        $req1->email = 'requiter1@gmail.com';
        $req1->password = bcrypt('requiter1');
        $req1->role = 'requiter';
        $req1->profile_pic = 'img/pfp/requiter.jpg';
        $req1->address = 'Jl. Requiter';
        $req1->born_date = '1999-12-11';
        $req1->save();

        $requ = new Requiter();
        $requ->user_id = 3;
        $requ->company_name = 'PT.Kai Indonesia';
        $requ->company_pic = 'img/indicn/ptkai.png';
        $requ->company_desc = 'PT.Kai Indonesia is a Huge company, that foccused on Train system and Public Train Transportation';
        $requ->save();

        $requ = new Requiter();
        $requ->user_id = 4;
        $requ->company_name = 'PT.Mayora Indonesia';
        $requ->company_pic = 'img/indicn/ptmayora.jpg';
        $requ->company_desc = 'PT Mayora Indah Tbk or Mayora Indah and the Mayora Group are a consumer product business group in Indonesia, which was founded on February 17, 1977. This company is registered as a public company that has been publicly listed on the Indonesian Stock Exchange with IDX code: MYOR since the 4th. July 1990.';
        $requ->save();

        $cat = new JobCategory();
        $cat->name = 'Technology';
        $cat->save();

        $cat1 = new JobCategory();
        $cat1->name = 'Software Engineer';
        $cat1->save();

        $cat2 = new JobCategory();
        $cat2->name = 'Salesman';
        $cat2->save();

        $cat3 = new JobCategory();
        $cat3->name = 'Manager';
        $cat3->save();

        $cat4 = new JobCategory();
        $cat4->name = 'Software Developer';
        $cat4->save();

        $job1 = new Job();
        $job1->requiter_id = 1;
        $job1->job_category_id = 5;
        $job1->title = 'Backend Developer';
        $job1->description = 'We need a Backend developer that have Php, Html and Javascript skills';
        $job1->salary = '7.000.000';
        $job1->save();

        $job1 = new Job();
        $job1->requiter_id = 2;
        $job1->job_category_id = 3;
        $job1->title = 'Salesman';
        $job1->description = 'We need a Salesman that have Social interacting, Creative mind skills And also Good Looking';
        $job1->salary = '5.000.000';
        $job1->save();
    }
}
