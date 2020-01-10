<?php

namespace App\Http\Controllers;

use App\dethi;
use App\cauhoi;
use App\cautraloi;
use App\theloaide;
use App\noidungkienthuc;
use App\cacdangbai;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class ManagerQuestionController extends Controller
{
   public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
             return redirect('/trangchu-admin');
        }else{
            return redirect('/tk/login')->send();
        }
    }
    public function add_question(Request $request){
        $this->AuthLogin();
    	$dethi = dethi::all();
       // $cauhoi = cauhoi::paginate(5);
        // $theloaide = theloaide::all();
        $cautraloi = cautraloi::all();
        $cacdangbai = cacdangbai::all();
       // $noidungkienthuc = noidungkienthuc::all();
    	return view('admins.page_manager_question.add_question',['dethi'=> $dethi,'cautraloi'=>$cautraloi, 'cacdangbai'=>$cacdangbai]);


    }
    public function save_question(Request $request){
         $this->AuthLogin();
    	$dethi = new dethi();
        $cauhoi = new cauhoi();
       
    	$cauhoi->id_de = $request->chode;
        $cauhoi->doKho = $request->dokho;
        $cauhoi->cauSo = $request->causo;
        $cauhoi->nd = $request->noidungcauhoi;
       // $cauhoi->id_ndkt = $request->noidungkienthuc;
        $cauhoi->id_cdb = $request->cacdangbai;
        $get_image = $request->file('image');
        
        if($get_image && ($get_image->getClientOriginalExtension()=='png' || $get_image->getClientOriginalExtension()=='jpg'|| $get_image->getClientOriginalExtension()=='gif')){
            $info = getdate();
            $duoifile=$get_image->getClientOriginalExtension();
            $get_name_image = $get_image->getClientOriginalName();// lay ra ten anh lay ca duoi vi du anh1.png
            $tenImage = current(explode('.', $get_name_image)).$info['seconds']; // phan tach chuoi cach nhau dau . lay chuoi dau tien anh
            $new_image = 'anh'.$tenImage.rand(0,99).'.'.$duoifile;
            //echo $new_image;
            $link = 'admin/anhuser';
            $get_image->move($link , $new_image);
            $cauhoi->image=$new_image;
            $cauhoi->save();
            $id_cauhoi = $cauhoi::select('id')->where('nd', $request->noidungcauhoi)->get();
            //$x=$id_cauhoi->id;
            $arr = ['A','B','C', 'D'];
            //echo $arr[0];

            // for ($i=1; $i <= 4 ; $i++) { 
            //    foreach ($id_cauhoi as $key => $value) {
            //             $cautraloi->id_cauHoi = $value->id;
            //     }
            //     $cautraloi->nd = $request->cautraloi.$i;
            //     $cautraloi->maCTL = $arr[$i-1];
            //     if($request->cautraloidung==$i){
            //         $cautraloi->trangThai = 1;
            //     }else{
            //         $cautraloi->trangThai = 0;
            //     }
            //     $cautraloi->image = '';
            //     $cautraloi->save();
            // }
                for ($i=1; $i <= 4 ; $i++) { 
                    $cautraloi = new cautraloi();
                         $x = 0;
                       foreach ($id_cauhoi as $key => $value) {
                                $x = $value->id;
                                $cautraloi->id_cauHoi = $x;
                                //echo $x."<br>";           
                        }
                
                        $y = 'cautraloi'.$i;
                        //$trangthai=0;
                        //echo $y."<br>";
                        $cautraloi->nd = $request->$y;
                       //  echo $request->$y.'<br>';
                       //  $cautraloi->maCTL = $arr[$i-1];
                       //  echo $arr[$i-1]."<br>";
                        if($request->cautraloidung==$i){
                            $cautraloi->trangThai = 1;
                            //$trangthai=1;
                           // echo '1'."<br>";
                        }else{
                            $cautraloi->trangThai = 0;
                            //$trangthai=0;
                           // echo '0'."<br>";
                        }
                          $cautraloi->image = '';
                        // $cautraloi->id_cauHoi=1;
                        // $cautraloi->nd='xxx';
                         $cautraloi->maCTL=$arr[$i-1];
                        //  $cautraloi->trangThai = 0;
                        //  $cautraloi->image = '';
                         $cautraloi->save();
                            
                            //     DB::table('cautraloi')->insert(
                            // [
                            //     'id_cauHoi'=> $x,
                            //     'nd'=>$request->$y,
                            //     'maCTL'=>$arr[$i-1],
                            //     'trangThai'=>$trangthai,
                            //     // 'image'=>Null,
                                
                            // ]
                            // );
                
            }
            Session::put('massage',' add question success!');
            return Redirect::to('/all-question');
        }
        $cauhoi->image = '';
        $cauhoi->save();

        $id_cauhoi = $cauhoi::select('id')->where('nd', $request->noidungcauhoi)->get();
        //$x=$id_cauhoi->id;
        $arr = ['A','B','C', 'D'];
        //echo $arr[0];

        // for ($i=1; $i <= 4 ; $i++) { 
        //    foreach ($id_cauhoi as $key => $value) {
        //             $cautraloi->id_cauHoi = $value->id;
        //     }
        //     $cautraloi->nd = $i;
        //     $cautraloi->maCTL = $arr[$i-1];
        //     if($request->cautraloidung==$i){
        //         $cautraloi->trangThai = 1;
        //     }else{
        //         $cautraloi->trangThai = 0;
        //     }
        //     $cautraloi->image = '';
        //     $cautraloi->save();
        // }
        
        //echo $x;
        for ($i=1; $i <= 4 ; $i++) { 
             $cautraloi = new cautraloi();
                     $x = 0;
                   foreach ($id_cauhoi as $key => $value) {
                            $x = $value->id;
                            $cautraloi->id_cauHoi = $x;
                           // echo $x."<br>";           
                    }
            
                    $y = 'cautraloi'.$i;
                    $trangthai=0;
                    //echo $y."<br>";
                    $cautraloi->nd = $request->$y;
                   //  echo $request->$y.'<br>';
                    $cautraloi->maCTL = $arr[$i-1];
                   //  echo $arr[$i-1]."<br>";
                    if($request->cautraloidung==$i){
                        $cautraloi->trangThai = 1;
                        $trangthai=1;
                        //echo '1'."<br>";
                    }else{
                        $cautraloi->trangThai = 0;
                        $trangthai=0;
                       // echo '0'."<br>";
                    }
                    $cautraloi->image = '';
                    // $cautraloi->id_cauHoi=1;
                    // $cautraloi->nd='xxx';
                    // $cautraloi->maCTL=$arr[$i-1];
                    //  $cautraloi->trangThai = 0;
                    //  $cautraloi->image = '';
                     $cautraloi->save();
                        
                        //     DB::table('cautraloi')->insert(
                        // [
                        //     'id_cauHoi'=> $x,
                        //     'nd'=>$request->$y,
                        //     'maCTL'=>$arr[$i-1],
                        //     'trangThai'=>$trangthai,
                        //     // 'image'=>Null,
                            
                        // ]
                        // );
            
        }
    	Session::put('massage',' add  question success!');
        return Redirect::to('/all-question');
    }

    public function edit_question($question_id){
         $this->AuthLogin();
        $dethi = dethi::all();
    	$cauhoi = cauhoi::where('id',$question_id)->first();
        $cautraloi1 = cautraloi::where('id_cauHoi',$question_id)->where('maCTL','A')->first();
        $cautraloi2 = cautraloi::where('id_cauHoi',$question_id)->where('maCTL','B')->first();
        $cautraloi3 = cautraloi::where('id_cauHoi',$question_id)->where('maCTL','C')->first();
        $cautraloi4 = cautraloi::where('id_cauHoi',$question_id)->where('maCTL','D')->first();
        $cautraloidung = cautraloi::where('id_cauHoi',$question_id)->where('trangThai',1)->first();
        // echo "<pre>";
        // print_r($cauhoi);
        // echo "</pre>";
       // $theloaide = theloaide::all();
        $cacdangbai = cacdangbai::all();
       // $noidungkienthuc = noidungkienthuc::all();
    	return view('admins.page_manager_question.edit_question',['cauhoi'=>$cauhoi,
                                                         'cautraloi1'=>$cautraloi1,
                                                         'cautraloi2'=>$cautraloi2,
                                                         'cautraloi3'=>$cautraloi3,
                                                         'cautraloi4'=>$cautraloi4,
                                                         'cautraloidung'=>$cautraloidung,
                                                         'cacdangbai'=>$cacdangbai,
                                                        
                                                          'dethi'=>$dethi ]);
    }

    public function update_question(Request $request, $question_id){
         $this->AuthLogin();
        $cauhoi = cauhoi::find($question_id);
        $cauhoi->id_de = $request->chode;
        $cauhoi->doKho = $request->dokho;
        $cauhoi->cauSo = $request->causo;
        $cauhoi->nd = $request->noidungcauhoi;
       // $cauhoi->id_ndkt = $request->noidungkienthuc;
        $cauhoi->id_cdb = $request->cacdangbai;
        $get_image = $request->file('image');
    	if($get_image && ($get_image->getClientOriginalExtension()=='png' || $get_image->getClientOriginalExtension()=='jpg'|| $get_image->getClientOriginalExtension()=='gif')){
            $info = getdate();
            $duoifile=$get_image->getClientOriginalExtension();
            $get_name_image = $get_image->getClientOriginalName();// lay ra ten anh lay ca duoi vi du anh1.png
            $tenImage = current(explode('.', $get_name_image)).$info['seconds']; // phan tach chuoi cach nhau dau . lay chuoi dau tien anh
            $new_image = 'anh'.$tenImage.rand(0,99).'.'.$duoifile;
            //echo $new_image;
            $link = 'admin/anhuser';
            $get_image->move($link , $new_image);
            $cauhoi->image=$new_image;
            $cauhoi->save();
            $id_cauhoi = $cauhoi::select('id')->where('nd', $request->noidungcauhoi)->get();
            //$x=$id_cauhoi->id;
            $arr = ['A','B','C', 'D'];
            //echo $arr[0];

            // for ($i=1; $i <= 4 ; $i++) { 
            //    foreach ($id_cauhoi as $key => $value) {
            //             $cautraloi->id_cauHoi = $value->id;
            //     }
            //     $cautraloi->nd = $request->cautraloi.$i;
            //     $cautraloi->maCTL = $arr[$i-1];
            //     if($request->cautraloidung==$i){
            //         $cautraloi->trangThai = 1;
            //     }else{
            //         $cautraloi->trangThai = 0;
            //     }
            //     $cautraloi->image = '';
            //     $cautraloi->save();
            // }
                for ($i=1; $i <= 4 ; $i++) { 
              $cautraloi = cautraloi::where('id_cauHoi',$question_id)->where('maCTL',$arr[$i-1])->first();
                     $x = 0;
                   // foreach ($id_cauhoi as $key => $value) {
                   //          $x = $value->id;
                   //          $cautraloi->id_cauHoi = $x;
                   //         // echo $x."<br>";           
                   //  }
            
                    $y = 'cautraloi'.$i;
                    
                    //echo $y."<br>";
                    $cautraloi->nd = $request->$y;
                   //  echo $request->$y.'<br>';
                    //$cautraloi->maCTL = $arr[$i-1];
                   //  echo $arr[$i-1]."<br>";
                    if($request->cautraloidung==$i){
                        $cautraloi->trangThai = 1;
                       
                    }else{
                        $cautraloi->trangThai = 0;
                       
                    }
                    $cautraloi->image = '';
                   
                    $cautraloi->save();
            
             }

            Session::put('massage',' update question success!');
            return Redirect::to('/all-question');
        }


        $cauhoi->image = '';
        $cauhoi->save();

        //$id_cauhoi = $cauhoi::select('id')->where('nd', $request->noidungcauhoi)->get();
        //$x=$id_cauhoi->id;
        $arr = ['A','B','C', 'D'];
        //echo $arr[0];

        // for ($i=1; $i <= 4 ; $i++) { 
        //    foreach ($id_cauhoi as $key => $value) {
        //             $cautraloi->id_cauHoi = $value->id;
        //     }
        //     $cautraloi->nd = $i;
        //     $cautraloi->maCTL = $arr[$i-1];
        //     if($request->cautraloidung==$i){
        //         $cautraloi->trangThai = 1;
        //     }else{
        //         $cautraloi->trangThai = 0;
        //     }
        //     $cautraloi->image = '';
        //     $cautraloi->save();
        // }
        
        //echo $x;
        // $cautraloi1 = cautraloi::where('id_cauHoi',$question_id)->where('maCTL','A')->first();
         //$cautraloi1 = cautraloi::find(10073);
        //  echo "<pre>";
        // print_r($cautraloi);
        // echo "</pre>";

        // echo "<br><br><br>";
        //  echo "<pre>";
        // print_r($cautraloi1);
        // echo "</pre>";
         // $cautraloi1->nd = $request->cautraloi1;
         // $cautraloi1->save();

        for ($i=1; $i <= 4 ; $i++) { 
              $cautraloi = cautraloi::where('id_cauHoi',$question_id)->where('maCTL',$arr[$i-1])->first();
                     $x = 0;
                   // foreach ($id_cauhoi as $key => $value) {
                   //          $x = $value->id;
                   //          $cautraloi->id_cauHoi = $x;
                   //         // echo $x."<br>";           
                   //  }
            
                    $y = 'cautraloi'.$i;
                    
                    //echo $y."<br>";
                    $cautraloi->nd = $request->$y;
                   //  echo $request->$y.'<br>';
                    //$cautraloi->maCTL = $arr[$i-1];
                   //  echo $arr[$i-1]."<br>";
                    if($request->cautraloidung==$i){
                        $cautraloi->trangThai = 1;
                       
                    }else{
                        $cautraloi->trangThai = 0;
                       
                    }
                    $cautraloi->image = '';
                   
                    $cautraloi->save();
            
        }
        
        Session::put('massage',' update  question success!');
        return Redirect::to('/all-question');
    }

     public function delete_question( $question_id){
    	$cauhoi = cauhoi::find($question_id);
    	
    	$cauhoi->delete();
    	Session::put('massage',' delete question success!');
        return Redirect::to('/all-question');
    }

    public function all_question(){
         $this->AuthLogin();
    	$dethi = dethi::all();
    	$cauhoi = cauhoi::paginate(5);
    	// $theloaide = theloaide::all();
    	$cautraloi = cautraloi::all();
        $cacdangbai = cacdangbai::all();
       // $noidungkienthuc = noidungkienthuc::all();

        // echo "<pre>";
        // print_r($cautraloi);
        // echo "</pre>";
    	return view('admins.page_manager_question.all_question',['dethi'=> $dethi,'cautraloi'=>$cautraloi,'cauhoi'=>$cauhoi, 'cacdangbai'=>$cacdangbai]);
    }

    public function demo(Request $request){
        $dethi = new dethi();
        $cauhoi = new cauhoi();
        $cautraloi = new cautraloi();
        $id_cauhoi = $cauhoi::select('id')->where('nd', $request->noidungcauhoi)->get();
        //$x=$id_cauhoi->id;
        $arr = ['A','B','C', 'D'];
        //echo $arr[0];

        for ($i=1; $i <= 4 ; $i++) { 
                     $x = 0;
                   foreach ($id_cauhoi as $key => $value) {
                            $x = $value->id;
                            //$cautraloi->id_cauHoi = $x;
                            echo $x."<br>";           
                    }
            
                    $y = 'cautraloi'.$i;
                    $trangthai=0;
                    //echo $y."<br>";
                    //$cautraloi->nd = $request->$y;
                   //  echo $request->$y.'<br>';
                   //  $cautraloi->maCTL = $arr[$i-1];
                   //  echo $arr[$i-1]."<br>";
                    if($request->cautraloidung==$i){
                        //$cautraloi->trangThai = 1;
                        $trangthai=1;
                        echo '1'."<br>";
                    }else{
                        //$cautraloi->trangThai = 0;
                        $trangthai=0;
                        echo '0'."<br>";
                    }
                   //  $cautraloi->image = '';
                    // $cautraloi->id_cauHoi=1;
                    // $cautraloi->nd='xxx';
                    // $cautraloi->maCTL=$arr[$i-1];
                    //  $cautraloi->trangThai = 0;
                    //  $cautraloi->image = '';
                    // $cautraloi->save();
                        
                            DB::table('cautraloi')->insert(
                        [
                            'id_cauHoi'=> $x,
                            'nd'=>$request->$y,
                            'maCTL'=>$arr[$i-1],
                            'trangThai'=>$trangthai,
                            // 'image'=>Null,
                            
                        ]
                        );
            
        }
       // $a = array('A','B','C','D');
        //for($i=1;$i<=4;$i++){
            // $c = array(0,0,1,0);
            // $k = rand(0,3);
            // $b = array();
            // for($m=0;$m<=3;$m++){
            //     $b[$m]=$c[($k+$m)%4];
            // }
            // for($j=1;$j<=4;$j++){
            //     DB::table('cautraloi')->insert(
            //             [
            //                 'id_cauHoi'=>2505,
            //                 'nd'=>'nội dung câu trả lời '.$j,
            //                 'maCTL'=>$a[$j-1],
            //                 'trangThai'=>111,
            //                 // 'image'=>Null,
                            
            //             ]
            //             );
            // }
        //}
    }

    public function search(Request $request)
    {
         $this->AuthLogin();
            // $output = '';
            // $users = User::where('name', 'LIKE','%'.$request->search.'%')->get();
           
            // if ($users) {
            //     $output .= '<ul class="dropdown-menu" style="display:block; position:relative">';
            //     foreach ($users as $key => $user) {
                    // $output .= '<tr>
                    // <td>' . $user->id . '</td>
                    // <td>' . $user->name . '</td>
                    // <td>' . $user->diaChi . '</td>
                    // <td>' . $user->SDT . '</td>
                    // <td>' . $user->email . '</td>
                    //  <td>' . $user->quyen . '</td>
                    //   <td>' . $user->trangThai . '</td>

                    // <td><img src="'.('admin/anhuser'.'/'.$value->avata).'" width="36px" height="36px"></td>
                    //  <td>' . $user->score . '</td>
                    //  <td>
                    //         <span class="sua" style="font-size: 22px"><a href="'. URL::to('/edit-account'.'/'.$value->id) .'"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></span>
                    //        {{--  <label class="sss" style="font-size: 20px; color: red">/</label> --}}
                    //         <span class="xoa" style="font-size: 22px"><a onclick="return confirm('.'Are you sure to delete?'.')" href="'. URL::to('/delete-account'.'/'.$value->id) .'"><i class="fa fa-times" aria-hidden="true"></i></a></span>
                    //       </td>
                    // </tr>';
             //        $output .= '
             //                    <li><a href="data/'. $user->id .'">'.$user->name.'</a></li>
             //                    ';
             //    }
            
             // $output .= '</ul>';
                    if($request->get('query'))
                {
                    $query = $request->get('query');
                    
                    $data = dethi::where('tenDe', 'LIKE',"%{$query}%")->take(5)->get();
                    $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
                    foreach($data as $row)
                    {
                       $output .= '
                       <li><a href="'.route('search_de',$row->tenDe).'"> '.$row->tenDe.'</a></li>
                       ';
                   }
                   $output .= '</ul>';
                   echo $output;
               }
            //return Response($output);
        }
    
        public function search_exacly(Request $request){
             $this->AuthLogin();
            $keyWord = $request->search;
            return Redirect::to('search/de&keyword='.$keyWord);
               

            
        }

        public function search_xuly($keyword){
             $this->AuthLogin();

        $dethi = dethi::where('tenDe',$keyword)->first();
        if($dethi){
            $cauhoi = cauhoi::where('id_de',$dethi->id)->paginate(5);
        //     echo $dethi->id ."<br>";
        //     echo "<pre>";
        // print_r($cauhoi);
        // echo "</pre>";
        }
        else{
            $cauhoi = cauhoi::where('id_de',-1)->paginate(5);
        }
        // $theloaide = theloaide::all();
        $cautraloi = cautraloi::all();
        $cacdangbai = cacdangbai::all();
       // $noidungkienthuc = noidungkienthuc::all();
        $messenger='Không có kết quả nào phù hợp với sự tìm kiếm của bạn !';
        // echo "<pre>";
        // print_r($cautraloi);
        // echo "</pre>";
        return view('admins.page_manager_question.search_de',['dethi'=> $dethi,'cautraloi'=>$cautraloi,'cauhoi'=>$cauhoi, 'cacdangbai'=>$cacdangbai, 'mes'=>$messenger]);

        //return view('admins.page_manager_user.add_account', ['cauhoi'=>$cauhoi]);
            
            // $user=User::where('name',$keyword)->paginate(5);
               
                    //return view('admins.page_manager_user.search_account', ['users' => $user,'mes'=>$messenger]);
        }

}
