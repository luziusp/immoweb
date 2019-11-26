<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tenants extends Model
{
    public static function find($id){
        $tenant = DB::table('tenant')->where('id',  $id)->get();
        return $tenant;
    
       }

       public static function getAll(){
        $tenants = DB::table('tenant')->where('isActive',  true)->get();
        return $tenants;
       }
   


    public static function addTenant($title, $familyname, $surname, $gender, $phone, $email, $dateOfBirth, $room){
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

        public static function deleteTenant($id){
        DB::table('tenantmap')->where('tenantFk', '=', $id)->update(['isActive' => false]);
        DB::table('tenant')->where('id', '=', $id)->update(['isActive' => false]);

        }
        public static function updateTenant($id, $title, $familyname, $surname, $gender, $phone, $email, $dateOfBirth){
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


          public static function addBillingAdress($billingTitle, $billingFamilyName, $billingSurName, $billingZipCode, $billingCityName, $billingStreetName, $billingAdditionalStreetName){
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

                public static function deleteBillingAdress($id){
                       
                        DB::table('billing_adress')->where('id', '=', $id)->update(['isActive' => false]);
                
                        }


                public static function updateBillingAdress($id, $billingTitle, $billingFamilyName, $billingSurName, $billingZipCode, $billingCityName, $billingStreetName, $billingAdditionalStreetName){
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
