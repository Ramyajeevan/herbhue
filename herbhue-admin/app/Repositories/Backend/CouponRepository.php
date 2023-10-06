<?php

namespace App\Repositories\Backend;

use App\Models\Coupon;
use App\Repositories\BaseRepository;

/**
 * Class CouponRepository.
 */
class CouponRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Coupon::class;
    }

    public function getAllCoupon()
    {
        $coupon = Coupon::get();
        return $coupon;
    }

    public function saveCoupon($post){
        // Validate the request...

        $coupon = new Coupon;
        $coupon->name = $post['name'];
        $coupon->coupon_type=$post['coupon_type'];
        $coupon->valid_from=$post['valid_from'];
      	$coupon->valid_to=$post['valid_to'];
      	$coupon->amount=$post['amount'];
        $coupon->save();
        return $coupon;
    }

    public function getCoupon($id)
    {
        $coupon = Coupon::findOrFail($id);

        return  $coupon;
    }

    public function updateCoupon($post,$id)
    {
        $coupon = Coupon::find($id);
        if(isset($coupon)){
          $coupon->name = $post['name'];
          $coupon->coupon_type=$post['coupon_type'];
          $coupon->valid_from=$post['valid_from'];
          $coupon->valid_to=$post['valid_to'];
          $coupon->amount=$post['amount'];
          $coupon->save();

            return $coupon;
        }else{
            return false;
        }
    }

    public function deleteCoupon($id)
    {
        try{
            $coupon = Coupon::find($id);
            if(isset($coupon)){
                $coupon->delete();
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