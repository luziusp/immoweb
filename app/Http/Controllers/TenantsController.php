<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenantsController extends Controller
{
        public function index(){
                        $tenants = DB::table('tenant')->where('isActive',  true)->get();;

                               return view('tenants', ['tenant' => $tenant]);

        }



        public function addTenant($title, $familyname, $surname, $gender, $phone, $email, $dateOfBirth, $room){
        $id = DB::table('tenant')->insertGetId(

         ['title' => $title ],
         ['familyname' => $familyname],
         ['surname' => $surname],
         ['gender' => $gender],
         ['phone' => $phone],
         ['email' => $email],
         ['dateOfBirth' => $dateOfBirth],
         ['isActive' => true]
         );

        }

        public function deleteTenant($id){
        DB::table('tenantmap')->where('tenantFk', '=', $id)->update(['isActive' => false]);
        DB::table('tenant')->where('id', '=', $id)->update(['isActive' => false]);

        }
        public function updateTenant($id, $title, $familyname, $surname, $gender, $phone, $email, $dateOfBirth){
                             DB::table('tenant')
                                         ->where('id', $id)
                                         ->update(
         ['title' => $title ],
         ['familyname' => $familyname],
         ['surname' => $surname],
         ['gender' => $gender],
         ['phone' => $phone],
         ['email' => $email],
         ['dateOfBirth' => $dateOfBirth]
                                           );
          }

}
