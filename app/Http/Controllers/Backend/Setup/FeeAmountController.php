<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use App\Models\FeeCategory;


class FeeAmountController extends Controller
{
    public function ViewFeeAmount(){
        //$data['allData'] = FeeCategoryAmount::all();
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount', $data);
    }

    public function AddFeeAmount(){
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }

    public function StoreFeeAmount(Request $request){
        $countClass = count($request->class_id);
        if($countClass !=null){
            for ($i=0; $i <$countClass ; $i++){
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amout = $request->amout[$i];
                $fee_amount->save();

            }//End for loop
        }

        $notification = array(
            'message' => 'Fee Amount Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.amount.view')->with($notification);
    }// End of if Condition

//End method

    public function EditFeeAmount($fee_category_id){
        $data['editData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id','asc')->get();

        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.edit_fee_amount', $data);
    }
    public function UpdateFeeAmount(Request $request,$fee_category_id){
        if($request->class_id == NULL){

            $notification = array(
                'message' => 'Sorry, You have not selected any class amount! Please Select at least one',
                'alert-type' => 'error'
            );
    
            return redirect()->route('fee.amount.edit',$fee_category_id)->with($notification);
            
        }else{
            $countClass = count($request->class_id);

            FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete();

            for ($i=0; $i <$countClass ; $i++){
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amout = $request->amout[$i];
                $fee_amount->save();

            }//End for loop
          }
          $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('fee.amount.view')->with($notification);
    }

    public function DetailsFeeAmount($fee_category_id){
        $data['detailsData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id','asc')->get();

        return view('backend.setup.fee_amount.details_fee_amount',$data);
    }

    public function DeleteFeeAmount($fee_category_id){
        $user = FeeCategory::find($fee_category_id);
        $user->delete();

        $notification = array(
            'message' => 'Student Fee Amount Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('fee.amount.view')->with($notification);
    }

}
