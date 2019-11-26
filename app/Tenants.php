<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tenants extends Model
{
    public function find($id){
        $tenant = DB::table('tenant')->where('id',  $id)->get();
        return $tenant;
    
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


          public function addBillingAdress($billingTitle, $billingFamilyName, $billingSurName, $billingZipCode, $billingCityName, $billingStreetName, $billingAdditionalStreetName){
                $id = DB::table('billing_adress')->insertGetId(
        
                 ['billingTitle' => $billingTitle ],
                 ['billingFamilyName' => $billingFamilyName],
                 ['billingSurName' => $billingSurName],
                 ['billingZipCode' => $billingZipCode],
                 ['billingCityName' => $billingCityName],
                 ['billingStreetName' => $billingStreetName],
                 ['dateOfBirth' => $dateOfBirth],
                 ['isActive' => true]
                 );
        
                }

                public function deleteBillingAdress($id){
                       
                        DB::table('billing_adress')->where('id', '=', $id)->update(['isActive' => false]);
                
                        }


                public function updateBillingAdress($id, $billingTitle, $billingFamilyName, $billingSurName, $billingZipCode, $billingCityName, $billingStreetName, $billingAdditionalStreetName){
                                             DB::table('billing_adress')
                                                         ->where('id', $id)
                                                         ->update(
                                                                ['billingTitle' => $billingTitle ],
                                                                ['billingFamilyName' => $billingFamilyName],
                                                                ['billingSurName' => $billingSurName],
                                                                ['billingZipCode' => $billingZipCode],
                                                                ['billingCityName' => $billingCityName],
                                                                ['billingStreetName' => $billingStreetName],
                                                                ['dateOfBirth' => $dateOfBirth]
                                                         );
                          }
}
