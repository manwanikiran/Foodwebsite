<?php

namespace App\Http\Controllers;

use App\Models\Offer;

use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function offer(){
        $offer=Offer::all();
        return view('admin.offer.offer',compact('offer'));
    }

    public function offerdetail($id){
        $offer=Offer::where('offer_id',$id)->first();
        return view('admin.offer.offerdetail',compact('offer'));
    }
    
    public function addoffer(){
        return view('admin.offer.addoffer');
    }

    public function updateoffer($id){

        $offer = Offer::where("offer_id",$id)->first();
        return view('admin.offer.updateoffer',compact('offer'));
    }

    public function insertoffer(Request $request)
    {
        $offer=$request->offer;
        $obj = new Offer;
        $obj->offer_title=$offer;

        $ostartdate=$request->ostartdate;
        $obj->offer_start_date=$ostartdate;

        $oenddate=$request->oenddate;
        $obj->offer_end_date=$oenddate;

        $odiscription=$request->odiscription;
        $obj->offer_description=$odiscription;

        $ominamount=$request->ominamount;
        $obj->offer_min_amont=$ominamount;

        $omaxamount=$request->omaxamount;
        $obj->offer_max_amont=$omaxamount;

        $ocoupon=$request->ocoupon;
        $obj->offer_coupon=$ocoupon;

        $odiscount=$request->odiscount;
        $obj->offer_discount=$odiscount;

    
        $obj->offer_added_datetime=now();
        

        $obj->save();
        return redirect('/addoffer');
    }

    public function deleteoffer(Request $request)
    {
        $id = $request->deleteid;

        $result = Offer::Where("offer_id",$id)->first();

        $result->delete();

        return redirect('/offer');
    }

    public function editoffer(Request $request){
        
        $id=$request->editoffer;
        $offer=$request->offer;
        $ostartdate=$request->ostartdate;
        $oenddate=$request->oenddate;
        $odiscription=$request->odiscription;
        $ominamount=$request->ominamount;
        $omaxamount=$request->omaxamount;
        $ocoupon=$request->ocoupon;
        $odiscount=$request->odiscount;
    
      

        $obj=Offer::where("offer_id",$id)->first();
        $obj->offer_title = $offer;
        $obj->offer_start_date = $ostartdate;
        $obj->offer_end_date = $oenddate;
        $obj->offer_description = $odiscription;
        $obj->offer_min_amont = $ominamount;
        $obj->offer_max_amont = $omaxamount;
        $obj->offer_coupon = $ocoupon;
        $obj->offer_discount = $odiscount;
    
        $obj->offer_added_datetime = now();

        $obj->save();


        return redirect('/offer');
    }

    
    public function offerisactive($id,$isactive){

        $obj=Offer::where("offer_id",$id)->first();
        $obj->offer_is_active=$isactive;
        $obj->save();
        return redirect('/offer');
    }

    // restaurant-----------------------------------------------------------

    public function resoffer(){
        $offer=Offer::all();
        return view('restaurant.resoffer.resoffer',compact('offer'));
    }

    public function resofferdetail($id){
        $offer=Offer::where('offer_id',$id)->first();
        return view('restaurant.resoffer.resofferdetail',compact('offer'));
    }

}
