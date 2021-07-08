<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    
    public function run()
    {   
        $roles = ['Admin','Secretariat','Formateur','Etudiant']; 

        for($i=0;$i<=3; $i++){
            DB::table('roles')->insert([
                'role' => $roles[$i]
            ]);    
        }
        
    }
}
