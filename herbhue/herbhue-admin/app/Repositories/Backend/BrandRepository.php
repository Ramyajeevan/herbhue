<?php

namespace App\Repositories\Backend;

use App\Models\Brand;
use App\Repositories\BaseRepository;
use DB;
/**
 * Class UserRepository.
 */
class BrandRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Brand::class;
    }

    public function getAllBrand()
    {
        $brand = Brand::get();
        return $brand;
    }

    public function saveBrand($post){
        // Validate the request...
        $exists=Brand::where('name',$post['name'])->count();
        if($exists==0)
        {
        $brand = new Brand;
        $brand->name = $post['name'];
        $brand->image = $post['image'];
        $brand->save();
       return true;
        }
        else
        return false;
    }

    public function getBrand($id)
    {
        $brand = Brand::findOrFail($id);

        return  $brand;
    }

    public function updateBrand($post,$id)
    {
        $exists=Brand::where('name',$post['name'])->where("id","!=",$id)->count();
        if($exists==0)
        {
            $brand = Brand::find($id);
            if(isset($brand))
            {
                $brand->name = $post['name'];
                $brand->save();
                return true;
            }
        }
        else{
            return false;
        }
    }

    public function deleteBrand($id)
    {
        try{
            $brand = Brand::find($id);
            if(isset($brand)){
                $brand->delete();
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