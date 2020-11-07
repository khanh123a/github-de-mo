<?php
    //add
    function postInput($string)
    {
        return isset($_POST[$string])? $_POST[$string]:'';
    }
    //edit
    function getInput($string)
    {
        return isset($_GET[$string])? $_GET[$string]:'';
    }
    ?>
<?php 
if ( ! function_exists( 'dd' )) //Kiểm tra xem hàm đó có tồn tại không
{
    /**
     * @param $data
     */
    function dd( $data ) {
        echo '<pre class="sf-dump" style=" color: #222; overflow: auto;">';
        echo '<div>Your IP: ' . $_SERVER['REMOTE_ADDR'] . '</div>';
        $debug_backtrace = debug_backtrace();
        $debug = array_shift($debug_backtrace);
        echo '<div>File: ' . $debug['file'] . '</div>';
        echo '<div>Line: ' . $debug['line'] . '</div>';
        if(is_array($data) || is_object($data)) {
            print_r($data);
        }
        else {
            var_dump($data);
        }
        echo '</pre>';
    }
}
//Kiểm tra xem đã tạo hàm chưa nếu chưa thì tự động tạo
if( ! function_exists('str_slug'))
{
    // convert duong danx than thien
    function str_slug($str,$default = '-') {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/',$default, $str);
        return $str;
    }
}

if ( ! function_exists('formatPrice'))
{
    // dinh dang lai gia tien
    function formatPrice($number , $sale = 0)
    {

        $price = $sale != 0 ? $price = $number*(100 - $sale)/100  : $number;
        return number_format($price, 0,',','.') ;
    }

}

if ( ! function_exists('formatPrice2'))
{
    // dinh dang lai gia tien
    function formatPrice2($number , $sale = 0)
    {

       $number=intval($number);
       return $number= number_format($number,0,'.','.');
    }

}


//tính giá sp sau khi sale
if ( ! function_exists('money'))
{
    // dinh dang lai gia tien
    function money($number , $sale = 0)
    {

        $price = $sale != 0 ? $price = $number*(100 - $sale)/100  : $number;
        return $price;
    }
}

if( ! function_exists( 'baseServerName'))
{
    // duong dan url ban dau
    function baseServerName()
    {
        return 'http://'.$_SERVER["SERVER_NAME"];
    }
}
//Dẫn về trang danh mục
if ( ! function_exists('redirectUrl'))
{
    function redirectUrl($url = '')
    {
        header("location: ".baseServerName().":82/websitephukien/admin/modules/{$url}");exit();
    }
}
if ( ! function_exists('redirectUrl2'))
{
    function redirectUrl2($url = '')
    {
        header("location: ".baseServerName().":82/websitephukien/{$url}");exit();
    }
}

if ( ! function_exists( 'curPageURL' ))
{
    /**
     * @return string
     * lay duong dan url hien tai
     * VD
     */
    function curPageURL() {
        $pageURL = "http";
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
}

function ColorFind($string,$fild)
{
    if($string != '')
    {
        return str_replace($string,"<span style='color:red;font-size:14px'>".$string."</span>",$fild);
    }
    else
    {
        return $fild;
    }
}
if ( ! function_exists( 'createFolder' ))
{
 /**
  *  Ham tao  thuc muc 
  * return 0  => errors
  * return 1  => success
  *  tao moi thu muc
 **/
 function createFolder($path , $name)
 {
  $respons = 
  [
   'code' => 0,
   'message' => ' Thư mục '.$name.' đã tồn tại ' 
  ];
  if(is_dir($path . $name))
  {
   return $respons;
  }
  $check_create = mkdir( $path . $name, 0777); 
  if($check_create)
  {
   $respons['message']  =  ' Tạo thư mục thành công ';
   $respons['code']  =  1;
   return $respons;
  }
  $respons['message']  = ' Lỗi tạo thư mục';
  return $respons;
 }
}

if( ! function_exists( '' ))
{
 /**
  *  xoa thu muc va file tong thu muc do 
  */
 function deleteFolder($dir = null) {
    if (is_dir($dir)) {
      $objects = scandir($dir);
      foreach ($objects as $object) {
         if ($object != "." && $object != "..")
         {
           /*if (filetype($dir."/".$object) == "dir") remove_dir($dir."/".$object);
           else unlink($dir."/".$object);*/
         }
      }
      reset($objects);
      rmdir($dir);
    }
 }
}

if (!function_exists('get_start_and_time'))
{
    function get_start_and_time($date_range, $config=[])
    {
        $dates = explode(' - ', $date_range);

        $start_date = date('Y-m-d', strtotime($dates[0]));
        $end_date = date('Y-m-d', strtotime($dates[1]));

        return [
            'start' => $start_date,
            'end' => $end_date
        ];
    }
}
function uploads()
{
    //return base_url() . "public/update/";
}
function sale($number)
{
    $number=intval($number);
    if($number<300000)
    {
        return 0;
    }
    else if ($number<600000)
    {
        return 5;
    }
    else 
    {
        return 10;
    }
    

}


?>