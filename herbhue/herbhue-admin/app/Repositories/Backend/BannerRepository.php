<?php

namespace App\Repositories\Backend;

use App\Models\Banner;
use App\Repositories\BaseRepository;
/**
 * Class UserRepository.
 */
class BannerRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Banner::class;
    }

    public function getAllBanner()
    {
        $banner = Banner::get();
       return $banner;
    }

    public function saveBanner($imageName){
        // Validate the request...

        $banner = new Banner;
        $banner->image = $imageName;
        $banner->save();
        return $banner;
    }

    public function getBanner($id)
    {
        $banner = Banner::findOrFail($id);

        return  $banner;
    }

    public function updateBanner($imageName,$id)
    {
        $banner = Banner::find($id);
      //print_r($post);exit;
        if(isset($banner))
        {
            if(isset($imageName))
             $banner->image = $imageName;
            $banner->save();
            return $banner;
        }else{
            return false;
        }
    }

    public function deleteBanner($id)
    {
        try{
            $banner = Banner::find($id);
            if(isset($banner)){
                $banner->delete();
            }else{
                return false;
            }
        }catch(\Exception $exception){
            report($exception);
        }

        return true;
    }

}
