<?php

namespace App\Repositories\Backend;

use App\Models\UsersT;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return UsersT::class;
    }

    public function getAllUser()
    {
        $user = UsersT::get();
        return $user;
    }

    public function getUser($id)
    {
        $user = UsersT::findOrFail($id);

        return  $user;
    }

    public function updateUser($post,$id)
    {
        $user = UsersT::find($id);
        if(isset($user)){
            $user->status = $post['status'];
         
            $user->save();

            return $user;
        }else{
            return false;
        }
    }

    public function deleteUser($id)
    {
        try{
            $user = UsersT::find($id);
            if(isset($user)){
                $user->delete();
            }else{
                return false;
            }
        }catch(\Exception $exception){
            report($exception);
        }

        return true;
    }

}
?>