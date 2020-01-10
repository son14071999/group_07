<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Hash;
use App\User;
use App\dethi;
use App\comment;
use App\Binhluan;
use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\Redirect;
session_start();

class UserController extends Controller
{
    //
     

    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
             return redirect('/trangchu-admin');
        }else{
            return redirect('/tk/login')->send();
        }
    }
    
    public function showIndex(){
        // thong ke so de
        $this->AuthLogin();
        $statisticExam = dethi::all()->count();
        // echo $statisticExam; 
        $statisticAccount = User::all()->count();
        $statisticComment = Binhluan::all()->count();
        $statisticUserOnline = User::where('trangThai',1)->count();
        // $admin_id= Session::get('admin_id');
        // echo $admin_id;
    	return view('admins.page_manager_user.trangchu_admin',['sode'=>$statisticExam,
                                                               'sotaikhoan'=>$statisticAccount,
                                                                'socomment'=>$statisticComment,
                                                                'songuoionline'=>$statisticUserOnline]);
    }

    public function showAllAccount(){
         $this->AuthLogin();
    	//$user = new User();
    	$user=User::paginate(5);
    	//$data=0;
    	//var_dump($user);
    	// echo "<pre>";
    	// print_r($user);
    	// echo "</pre>";
    	return view('admins.page_manager_user.all_user_account', ['users' => $user]);
    }

    public function addAccount(){
         $this->AuthLogin();
    	return view('admins.page_manager_user.add_account');
    }

    public function saveAccount(Request $req){
         $this->AuthLogin();
    	$user = new User();
    	$user->name=$req->tendangnhap;
    	$user->password=Hash::make($req->pass);
    	// $user->hovaten=$req->hovaten;
    	$user->diaChi=$req->diachi;
    	$user->score=$req->diem;

    	$user->SDT=$req->dienthoai;
    	$user->email=$req->email;
    	$user->quyen=$req->quyen;
    	 $get_image = $req->file('avata');
        
        if($get_image && ($get_image->getClientOriginalExtension()=='png' || $get_image->getClientOriginalExtension()=='jpg'|| $get_image->getClientOriginalExtension()=='gif')){
            $info = getdate();
            $duoifile=$get_image->getClientOriginalExtension();
            $get_name_image = $get_image->getClientOriginalName();// lay ra ten anh lay ca duoi vi du anh1.png
            $tenImage = current(explode('.', $get_name_image)).$info['seconds']; // phan tach chuoi cach nhau dau . lay chuoi dau tien anh
            $new_image = 'anh'.$tenImage.rand(0,99).'.'.$duoifile;
            //echo $new_image;
            $link = 'images';
            $get_image->move($link , $new_image);
            $user->avata=$new_image;
            $user->save();
            Session::put('massage',' add account success!');
            return Redirect::to('/all-account');
        }
        $user->save();
            Session::put('massage',' add account success!');
            return Redirect::to('/all-account');

    }

    public function editAccount($user_id){
         $this->AuthLogin();
    	$user=User::where('id',$user_id)->get();
    	// echo "<pre>";
    	// print_r($user);
    	// echo "</pre>";
    	// foreach ($user as $key => $value) {
    	// 	# code...
    	// 	echo $value->email;
    	// }
    	return view('admins.page_manager_user.edit_account')->with('get_user_by_id', $user);
    }

    public function updateAccount(Request $req, $user_id){
         $this->AuthLogin();
    	$user = User::find($user_id);
    	$user->name=$req->tendangnhap;
    	$user->password=Hash::make($req->pass);
    	// $user->hovaten=$req->hovaten;
    	$user->diaChi=$req->diachi;
    	$user->score=$req->diem;

    	$user->SDT=$req->dienthoai;
    	$user->email=$req->email;
    	$user->quyen=$req->quyen;
    	 $get_image = $req->file('avata');
        
        if($get_image && ($get_image->getClientOriginalExtension()=='png' || $get_image->getClientOriginalExtension()=='jpg'|| $get_image->getClientOriginalExtension()=='gif')){
            $info = getdate();
            $duoifile=$get_image->getClientOriginalExtension();
            $get_name_image = $get_image->getClientOriginalName();// lay ra ten anh lay ca duoi vi du anh1.png
            $tenImage = current(explode('.', $get_name_image)).$info['seconds']; // phan tach chuoi cach nhau dau . lay chuoi dau tien anh
            $new_image = 'anh'.$tenImage.rand(0,99).'.'.$duoifile;
            //echo $new_image;
            $link = 'images';
            $get_image->move($link , $new_image);
            $user->avata=$new_image;
            $user->save();
            Session::put('massage',' update account success!');
            return Redirect::to('/all-account');
        }
       		 $user->save();
            Session::put('massage',' update account success!');
            return Redirect::to('/all-account');
    }

    public function deleteAccount($user_id){
         $this->AuthLogin();
    	$user=User::find($user_id);
    	$user->delete();
    	 Session::put('massage',' delete account success!');
            return Redirect::to('/all-account');
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
                    //$url='http://localhost:81/DuAnzzz/public/search/account&keyword=';
                    //$url= url("/search/account$keyword=");
                    if($request->get('query'))
                {
                    $query = $request->get('query');
                   
                    $data = User::where('name', 'LIKE',"%{$query}%")->take(5)->get();
                    $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
                    foreach($data as $row)
                    {
                       $output .= '
                       <li><a href="'.route('search_nameuser', $row->name).'"> '.$row->name.'</a></li>
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
            return Redirect::to('/search/account&keyword='.$keyWord);
               

            
        }

        public function search_xuly($keyword){
             $this->AuthLogin();

            $messenger='Không có kết quả nào phù hợp với sự tìm kiếm của bạn !';
            $user=User::where('name',$keyword)->paginate(5);
               
                    return view('admins.page_manager_user.search_account', ['users' => $user,'mes'=>$messenger]);
        }

}
