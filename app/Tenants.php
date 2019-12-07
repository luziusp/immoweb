<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tenants extends Model
{
    protected $table = 'tenant';
    protected $fillable =['title', 'familyname', 'surname', 'gender', 'phone','email','dateOfBirth', 'isActive','billingCityName', 'billingZipCode' , 'billingStreetName','billingAdditionalStreetName'];
  

    public function contracts()
    {
        return $this->hasMany('App\Contracts', 'tenantFk');
    }

    public static function find($id){
        $tenant = DB::table('tenant')->where('id',  $id)->get();
        return $tenant;

       }

       public static function getAll(){
        $tenants = DB::table('tenant')->where('isActive',  true)->get();
        return $tenants;
       }


        public static function deleteTenant($id){
        DB::table('tenant')->where('id', '=', $id)->update(['isActive' => false]);

        }

                public static function deleteBillingAdress($id){

                        DB::table('billing_adress')->where('id', '=', $id)->update(['isActive' => false]);

                        }


}
