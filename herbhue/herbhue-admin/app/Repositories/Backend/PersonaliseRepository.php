<?php

namespace App\Repositories\Backend;

use App\Models\Personalise;
use App\Models\User;
use DB;
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
        $id = DB::table('tbl_recommendation')->insertGetId([
            'personalise_id' => $personalise->id,
            'recommendation1' => $post["recommendation1"],
            'recommendation2' => $post["recommendation2"],
            'recommendation3' => $post["recommendation3"],
            'recommendation4' => $post["recommendation4"],
            'recommendation5' => $post["recommendation5"],
            'image1' => $post["image1"],
            'image2' => $post["image2"],
            'image3' => $post["image3"],
            'image4' => $post["image4"],
            'image5' => $post["image5"]
        ]);

        return $personalise;
    }

    public function getPersonalise($id)
    {
        $personalise = Personalise::findOrFail($id);

        return  $personalise;
    }
    public function getAllRecommendations($id)
    {
        $recommendations = DB::table('tbl_recommendation')->where("personalise_id",$id)->first();
        return $recommendations;
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

            $rec_id = DB::table('tbl_recommendation')->where('personalise_id',$id)->update([
                'recommendation1' => $post["recommendation1"],
                'recommendation2' => $post["recommendation2"],
                'recommendation3' => $post["recommendation3"],
                'recommendation4' => $post["recommendation4"],
                'recommendation5' => $post["recommendation5"]
            ]);
            if($post["image1"]!="")
            {
                $rec_id = DB::table('tbl_recommendation')->where('personalise_id',$id)->update([
                    'image1' => $post["image1"]
                ]);
            }
            if($post["image2"]!="")
            {
                $rec_id = DB::table('tbl_recommendation')->where('personalise_id',$id)->update([
                    'image2' => $post["image2"]
                ]);
            }
            if($post["image3"]!="")
            {
                $rec_id = DB::table('tbl_recommendation')->where('personalise_id',$id)->update([
                    'image3' => $post["image3"]
                ]);
            }
            if($post["image4"]!="")
            {
                $rec_id = DB::table('tbl_recommendation')->where('personalise_id',$id)->update([
                    'image4' => $post["image4"]
                ]);
            }
            if($post["image5"]!="")
            {
                $rec_id = DB::table('tbl_recommendation')->where('personalise_id',$id)->update([
                    'image5' => $post["image5"]
                ]);
            }
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
                DB::table('tbl_recommendation')->where("personalise_id",$id)->delete();
            }else{
                return false;
            }
        }catch(\Exception $exception){
            report($exception);
        }

        return true;
    }

}
