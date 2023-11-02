<?php

namespace App\Repositories\Backend;

use App\Models\Personalise;
use App\Models\User;
use App\Repositories\BaseRepository;
/**
 * Class UserRepository.
 */
class PersonaliseRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Personalise::class;
    }

    public function getAllPersonalise()
    {
        $personalise = Personalise::get();
        for($i=0;$i<count($personalise);$i++)
        {
            $user=User::find($personalise[$i]->user_id);
            $personalise[$i]->user_name=$user->name;
        }
        return $personalise;
    }
    public function getAllUsers()
    {
        $users=User::get();
        return $users;
    }
    public function savePersonalise($post){
        // Validate the request...

        $personalise = new Personalise;
        $personalise->user_id = $post["user_id"];
        $personalise->question = $post["question"];
        $personalise->save();
        return $personalise;
    }

    public function getPersonalise($id)
    {
        $personalise = Personalise::findOrFail($id);

        return  $personalise;
    }

    public function updatePersonalise($post,$id)
    {
        $personalise = Personalise::find($id);
      //print_r($post);exit;
        if(isset($personalise))
        {
            $personalise->user_id = $post["user_id"];
            $personalise->question = $post["question"];
            $personalise->save();
            return $personalise;
        }else{
            return false;
        }
    }

    public function deletePersonalise($id)
    {
        try{
            $personalise = Personalise::find($id);
            if(isset($personalise)){
                $personalise->delete();
            }else{
                return false;
            }
        }catch(\Exception $exception){
            report($exception);
        }

        return true;
    }

}
