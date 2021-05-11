<?php

namespace App\Http\Controllers\Member;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Course;
use App\Models\Micro_classes;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Skill;
use App\Models\Student;
use App\Models\Whishlists;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Event\RequestEvent;

use function PHPUnit\Framework\isNull;

class MemberController extends Controller
{
    public function getOrderAll(Request $request){
        $active = 'Order';
        $id = Auth::guard('member')->id();
        $status = null;
        // $q = (is_null($request->q)) ? '1' : $request->q;
        if(!is_null($request->q)){
            $status = ($request->q == 1) ? '1' : '0';
        }

        if($request->q != ''){
            $orders = Order::where('student_id', $id)
                            ->where('status', $status)
                            ->orderBy('created_at', 'DESC')
                            ->paginate(10);
            $status = ($status == 0) ? '3': '1';

        } else {
            $orders = Order::where('student_id', $id)
                            ->orderBy('created_at', 'DESC')
                            ->paginate(10);
        }


        return view('member.order', compact('active', 'orders', 'status'));
    }

    public function setOrder(Request $request, $id){
        $user = Student::find(Auth::guard('member')->id());

        $order = new Order();
        $order->invoice = Str::random(5) . '-' . time();
        $order->student_id = Auth::guard('member')->id();
        $order->course_id = $id;
        $order->course_detail_id = $request->detail_id;
        $order->student_name = $user->name;
        $order->student_address = $user->address;
        $order->subtotal = $request->price;
        $order->status = false;
        $order->save();

        return redirect(route('member.getorder'));
    }

    public function getOrderDetail($id){
        $active = 'Order';
        $order = Order::find($id);

        // dd($order->payments);

        return view('member.detailorder', compact('active', 'order') );
    }

    public function payment(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'number_bank' => 'required|integer',
            'name_bank' => 'required|string',
            'amount' => 'required|integer',
            'date_transfer' => 'required|date',
            'image' => 'required|image|mimes:png,jpg|max:2048',
        ]);

        $imageName = Helper::uploadImage($request->image, null, 'payment');

        $payment = new Payment();
        $payment->order_id = $request->id;
        $payment->name_transfer = $request->name;
        $payment->name_bank = $request->name_bank;
        $payment->number_bank = $request->number_bank;
        $payment->transfer_date = $request->date_transfer;
        $payment->amount = $request->amount;
        $payment->image_transfer = $imageName;
        $payment->status = true;
        $payment->save();

        return redirect()->back()->with('success', 'Silakan tunggu untuk beberapa saat');

    }

    public function getCourseAll(Request $request){
        $active = 'Course';
        // $id = Auth::guard('member')->id();
        $q = $request->q;

        // $courses = Order::when($request->q, function($q){
        //     $q->where('course_id', 7)
        //     ->orWhere('student_id', 1);
        // })->where('student_id', $id)->where('status', 1)->get();

        // $courses = Order::where('student_id', $id)->where('status', 1)->get();
        // $courses = Order::when($q, function($q){
        //     $q->with(['course' => function($e){
        //         $e->where('skill_id', 1);
        //     }]);
        // })->where('student_id', $id)->where('status', 1)->get();

            // $courses = Course::when($request->q, function($q, $request) {
            //     $q->where('skill_id', $request);
            // })->whereHas('orders', function($q){
            //     $q->where('status', 1)->where('student_id', 1);
            // })->get();

            $courses = Course::when($request->q, function($q, $request){
                $q->where('skill_id', $request);
            })->whereHas('orders', function($e){
                $e->where('status', 1)->where('student_id', Auth::guard('member')->id());
            })->get();

            // dd($courses, $id);

        $skills = Skill::all();

        return view('member.course', compact('active', 'courses', 'skills', 'q'));
    }

    public function getDetailCourse($id){
        $active = 'Course';
        $course = Order::where('status', 1)
                        ->where('course_id', $id)
                        ->where('student_id', Auth::guard('member')->id())
                        ->first();

                        // dd($course->course_detail);

        if(is_null($course)){
            return redirect()->back();
        }

        return view('member.detailcourse', compact('active', 'course'));
    }

    public function getAccount(){
        $active = 'Account';
        $account = Student::find(Auth::guard('member')->id());

        return view('member.account', compact('active', 'account'));
    }

    public function setUpdateAccount(Request $request,$id){
        $this->validate($request, [
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:students,email,'.$id,
            'phone_number' => 'required|integer',
            'address' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $account = Student::find($id);

        if ($request->image_delete) {
            $imageName = null;
            Storage::delete('/public/assets/images/user/'.$account->image);
        } else {
            $imageName = Helper::uploadImage($request->image, $account->image, 'user');
        }


        $account->name = $request->name;
        $account->email = $request->email;
        $account->image = $imageName;
        $account->phone_number = $request->phone_number;
        $account->address = $request->address;
        $account->save();

        return redirect()->back()->with('success', 'Account berhasil diupdate');
    }

    public function getTrophy(){
        $active = 'Achievement';
        $id = Auth::guard('member')->id();
        $trophys = Achievement::with('skill')->where('student_id', $id)->orderBy('skill_id', 'ASC')->get();

        $skills = Skill::with('subskills')->get();

        // dd($max);
        // $idSkill = [];
        // $idSubskill = [];
        // $totalSubskill = [];
        // $currentTotalSubskill = [];

        // search id skill in achievment. if id skill exist in array idSkill not insert into array idSkill
        // foreach ( $trophys as $key => $tropy ){
        //     if(!in_array($tropy->skill_id, $idSkill)){
        //         array_push($idSkill, $tropy->id);
        //         $idSubskill["$tropy->name_skill"] = array();
        //     }
        // }

        // cari total subskil dari masing masing skill.
        // foreach ($idSkill as $key => $skill ) {
        //     $total = Skill::with('subskills')->find($skill);
        //     dd($total);
        //     array_push( $totalSubskill, count($total->subskills));
        // }

        // cari id subskill di table achievment. dan jika belum ada di array idsubskill. maka masukaan ke array ke tersbut.
        // $i = 0;
        // foreach ($trophys as $key => $achiev) {
        //     $angka = $idSkill[$i];
        //     array_push($idSubskill[$angka], "jos{$key}");
        //     $i++;
        // }
        // for ($i=0; $i < count($trophys) ; $i++) {
        //     if(!in_array($trophys[$i]->subskill_id, $idSubskill[$trophys[$i]->name_skill])){
        //         array_push($idSubskill[$trophys[$i]->name_skill], $trophys[$i]->subskill_id);
        //     }
        //     // echo($trophys[$i]->subskill_id);
        // }


        // Cari id subskill yang ada ditable achievment.
        // foreach ($trophys as $key => $achiev) {
        //     if(!in_array($achiev->subskill_id, $idSubskill[$idSkill[$key]])) {
        //         // $idSubskill[$idSkill[$key]] = array_push($idSubskill[$idSkill[$key]], $achiev->subskill_id);
        //         // array_push($idSubskill, $achiev->subskill_id);
        //         // $idSubskill[$idSkill[$key]] = array_push()
        //         // $idSubskill =
        //         // [
        //         //     $idSkill[$key] = array()
        //         // ];
        //         echo ('oke');
        //     }
        // }

        // array_push($idSubskill[1], 'jos');

        // dd($idSubskill[1]);
        // dd($testArray, $idSubskill);

        // cari nilai subskill yang sesuai id di table achievment
        // foreach ($idSkill as $key => $skill) {
        //     $value = 0;
        //     foreach ($trophys as $achiev) {
        //         if($achiev->skill_id == $skill) {

        //         }
        //     }
        // }

        // dd($idSkill, $totalSubskill, $idSubskill);
        // dd($trophys);

        return view('member.trophy', compact('active', 'trophys', 'skills'));
    }

    public function setWishlist(Request $request, $id){
        $wishlist = new Whishlists();
        $wishlist->course_id = $id;
        $wishlist->student_id = Auth::guard('member')->id();
        $wishlist->save();

        return redirect()->back()->with('success', 'berhasil ditambahkan ke Wishlist');
    }

    public function destroyWishlist($id){
        // $wishlist = Whishlists::find($id);
        Whishlists::destroy($id);

        return redirect()->back();
    }

    public function getWishlist(){
        $active = "Wishlist";
        $wishlists = Whishlists::where('student_id', auth('member')->id())->get();

        // dd($wishlists[0]);

        return view('wishlist', compact('active', 'wishlists'));
    }

    // function to routeDetailMicroClass
    public function getDetailMicroClass($id) {

        $active = 'Micro Class';
        $microclass = Micro_classes::find($id);

        return view('member.microclassdetail', compact('microclass', 'active'));
    }

    // Function microclass save to achievment.
    public function setSkillMicroClass(Request $request) {
        $id = Auth::guard('member')->id();

        $achieve = Achievement::where('skill_id', $request->skill)
                    ->where('subskill_id', $request->subskill)
                    ->where('student_id', $id)
                    ->first();

        $student = Student::find($id);

        if(is_null($achieve)){
            $trophy = new Achievement();
            $trophy->student_id = $id;
            $trophy->skill_id = $request->skill;
            $trophy->subskill_id = $request->subskill;
            $trophy->name_student = $student->name;
            $trophy->name_skill = $request->name;
            $trophy->total = $trophy->total += 1;
            $trophy->save();
        }

        return redirect()->back()->with('success', 'Micro class berhasil dibuka');
    }
}
