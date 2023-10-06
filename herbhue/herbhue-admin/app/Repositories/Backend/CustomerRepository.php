<?php

namespace App\Repositories\Backend;

use App\Models\User;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository.
 */
class CustomerRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    public function getAllCustomer()
    {
        $customer = User::where("status","1")->get();
        return $customer;
    }

    public function saveCustomer($post){
        // Validate the request...

        $customer = new User;
        $customer->name = $post['name'];
        $customer->image = $post['image'];
        $customer->email= $post['email'];
        $customer->mobile= $post['mobile'];
        $customer->password= $post['password'];
        $customer->refer_by=$post["refer_by"];
        $customer->youtube_link=$post["youtube_link"];
        $customer->save();
        return $customer;
    }

    public function getCustomer($id)
    {
        $customer = User::findOrFail($id);

        return  $customer;
    }

    public function updateCustomer($post,$id)
    {
        $customer = User::find($id);
        if(isset($customer)){
           $customer->name = $post['name'];
        $customer->email= $post['email'];
        $customer->password= $post['password'];
       $customer->youtube_link=$post["youtube_link"];
            if(isset($post['image']) && $post['image']!="") $customer->image = $post['image'];
            $customer->save();

            return $customer;
        }else{
            return false;
        }
    }

    public function deleteCustomer($id)
    {
        try{
            $customer = User::find($id);
            if(isset($customer)){
                $customer->delete();
            }else{
                return false;
            }
        }catch(\Exception $exception){
            report($exception);
        }

        return true;
    }
    
    public function changestatus($id,$newstatus)
    {
         $customer = User::find($id);
         $customer->admin_status=$newstatus;
         $customer->save();
        return $customer;
    }
}
?>