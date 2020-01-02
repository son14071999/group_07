<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call('cauhoi');
        $this->call('User');
        $this->call('TheLoaiDe');
        $this->call('DeThi');
        $this->call('Noidungkienthuc');
        $this->call('cacdangbai');
        $this->call('comment');
        $this->call('cauhoi');
        $this->call('cauTL');
        $this->call('ketQua');



    }
}
class ketQua extends Seeder{
	public function run()
    {
    	for($i=1;$i<=4170;$i++){
    		DB::table('ketqua')->insert(
				[
					'id_deThi'=>rand(1,50),
					'id_user'=>rand(1,10),
					'score'=>rand(0,50),
        			'created_at' => new DateTime(),
	        	]
		    );
    	}
    }
}
class Noidungkienthuc extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    public function run()
    {
    	$mon = array('toán','Lý','Hóa','Sử','Địa','Sinh','Công dân','','tiếng anh');
    	$lop = array(10,11,12,0);

    	for($i=1;$i<=100;$i++){
    		DB::table('noidungkienthuc')->insert(
    				[
						'lop'=>$lop[array_Rand($lop, 1)],
	        			'mon'=>$mon[array_Rand($mon, 1)],

	        			'nd'=>'nội dung kiến thức '.rand(20,1000).$i,
	        			'created_at' => new DateTime(),
		        	]
	        		);
    	}
    }
}

class cauTL extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    public function run()
    {
    	$a = array('A','B','C','D');
    	for($i=1;$i<=2500;$i++){
    		$c = array(0,0,1,0);
			$k = rand(0,3);
			$b = array();
			for($m=0;$m<=3;$m++){
				$b[$m]=$c[($k+$m)%4];
			}
    		for($j=1;$j<=4;$j++){
	    		DB::table('cautraloi')->insert(
		        		[
		        			'id_cauHoi'=>$i,
		        			'nd'=>'nội dung câu trả lời '.$j.'của câu hỏi'.$i,
		        			'maCTL'=>$a[$j-1],
		        			'trangThai'=>$b[$j-1],
		        			// 'image'=>Null,
		        			'created_at' => new DateTime(),
			        	]
		        		);
    		}
    	}
    }
}

class cacdangbai extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    public function run()
    {
    	$mon = array('toán','Lý','Hóa','Sử','Địa','Sinh','Công dân','');
  		$k=3;
    	for($i=1;$i<=100;$i++){
    		for($j=1;$j<=$k;$j++){
	    		DB::table('cacdangbai')->insert(
		        		[
		        			'id_ndkt'=>$i,
		        			'nd'=>'nội dung dạng bài '.$i.$j,
		        			'created_at' => new DateTime(),
			        	]
		        		);
    		}
    	}
    }
}
class comment extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    public function run()
    {
    	$mon = array('toán','Lý','Hóa','Sử','Địa','Sinh','Công dân','');
    	for($i=1;$i<=2000;$i++){
    		$k = rand(1,50);

    		DB::table('comment')->insert(
	        		[
	        			'id_user'=>rand(1,10),
	        			'nd'=>'nội dung comment '.$i,
	        			'id_deThi'=>$k,
	        			// 'id_tl'=>rand(0,$i),
	        			'created_at' => new DateTime(),
		        	]
	        		);

    	}

    }
}

class cauhoi extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    public function run()
    {
    	for($i=1;$i<=50;$i++){

    		for($j=1;$j<=50;$j++){
    			// $arr=array('A','B','C','D');
    			// foreach ($arr as $key => $value) {
    				# code...
    				$k = rand(1,100);
    				DB::table('cauhoi')->insert(
	        		[
	        		'id_de' => $i,
	            	'doKho' => rand(1,5),
	            	'cauSo'=>$j,
	            	// 'image'=>'',
	            	'nd'=>'nd câu hỏi thứ '.$j.'đề '.$i,
	            	'id_ndkt'=>$k,
	            	'id_cdb'=>rand(1+($k-1)*3,3+($k-1)*3),
	            	'created_at' => new DateTime(),
		        	]
	        		);
        		// }
    		}

    	}
    }
}

class TheLoaiDe extends Seeder
{
	public function run()
    {
        //

		DB::table('theloaide')->insert(
    	[
    		'theLoai' => 'Thể loại Cao Đẳng ',
        	// 'lop' => 13,
        	'created_at' => new DateTime(),
    	]
		);

    	DB::table('theloaide')->insert(
        	[
        		'theLoai' => 'Thể loại Đại Học ',
            	// 'lop' => 14,
            	'created_at' => new DateTime(),
        	]
    	);

    	DB::table('theloaide')->insert(
        	[
        		'theLoai' => 'Thể loại IQ ',
            	// 'lop' => 0,
            	'created_at' => new DateTime(),
        	]
    	);

    	DB::table('theloaide')->insert(
        	[
        		'theLoai' => 'Thể loại topic/ielts ',
            	// 'lop' => 0,
            	'created_at' => new DateTime(),
        	]
    	);
   		for($i=10;$i<=12;$i++){
	    	DB::table('theloaide')->insert(
	        	[
	        		'theLoai' => 'Thể loại trường học ',
	            	'lop' => $i,
	            	'created_at' => new DateTime(),
	        	]
	    	);
	    }


    }
}

class User extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    public function run()
    {
    	for($i = 1; $i <= 10;$i++)
        {
        	DB::table('users')->insert(
	        	[
	        		'name' => 'User_'.$i,
	            	'email' => 'user_'.$i.'@gmail.com',
	            	'password' => bcrypt('123456'),
	            	'quyen'=> rand(0,1),
	            	// 'avata'=> '',
	            	'score'=>0,
	            	'SDT'=>'0'.mt_rand(100000000,999999999),
	            	// 'diaChi'=>'',
	            	'trangThai'=> rand(0,1),
	            	'created_at' => new DateTime(),
	        	]
        	);
        }
    }
}
class DeThi extends Seeder
{
    /**
     * Seed the application's database.
     *
     */
    public function convert_vi_to_en($str) {
    		# code...
		 	$str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
		  	$str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
		 	$str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
		 	$str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
		 	$str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
		  	$str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
		  	$str = preg_replace('/(đ)/', 'd', $str);
		  	$str = preg_replace('/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/', 'A', $str);
		  	$str = preg_replace('/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/', 'E', $str);
		  	$str = preg_replace('/(Ì|Í|Ị|Ỉ|Ĩ)/', 'I', $str);
		  	$str = preg_replace('/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/', 'O', $str);
		  	$str = preg_replace('/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/', 'U', $str);
		  	$str = preg_replace('/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/', 'Y', $str);
		  	$str = preg_replace('/(Đ)/', 'D', $str);
		  	//$str = str_replace(' ', '-', str_replace('&*#39;','",$str));

		return $str;
	}
    public function run()
    {
    	for($i = 1; $i <= 50; $i++)
        {
        	$mon = array('toán','Lý','Hóa','Sử','Địa','Sinh','Công dân','');
        	$lop = array(10,11,12,0);
        	$tenDe='Tên đề '.$i.''.rand(10,1000);
        	DB::table('dethi')->insert(
	        	[

	        		'tenDe' => $tenDe,
	        		'id_theLoaiDe'=>rand(1,7),
	        		'tenDeKhongDau' => $this->convert_vi_to_en($tenDe),
	        		'mon'=>$mon[array_Rand($mon, 1)],
	        		'lop'=>$lop[array_Rand($lop, 1)],
	        		'nam'=>rand(2010,2019),
	        		'kieuDe'=>rand(0,1),
	        		'soNguoiLam'=>rand(0,147),
	        		'doKho'=>rand(0,5),
	        		'thoigian'=>rand(1,20)*10,
	            	'created_at' => new DateTime(),
	        	]
        	);
        }
    }

}
