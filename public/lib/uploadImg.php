<?php 
session_start();
if(!isset($_SESSION['shUser'])){
    // Header("Location:sh_login.php"); 
    $re = array('errcode'=>1,'errmsg'=>"请登陆");
    echo json_encode($re);
    exit;
}  
$file = isset($_FILES["uploaderInput"]) ? $_FILES["uploaderInput"] : "";
if(!empty($file)){   
    $path="../upload/images/"; //上传路径   
  
    //允许上传的文件格式   
    $tp = array("image/jpeg","image/jpg","image/png");   
    //检查上传文件是否在允许上传的类型        
    if(!in_array($file["type"],$tp))   
    {   
        $re = array('errcode'=>2,'errmsg'=>"文件格式错误");
        exit;   
    }//END IF   
    if ($file["size"]>10*1024*1024) {
        $re = array('errcode'=>3,'errmsg'=>"文件过大");
        exit;  
    }
    
    function imgType($type){
        switch ($type) {
            case 'image/jpeg':
                return "jpeg";
                break;
            case 'image/jpg':
                return "jpg";
                break;
            case 'image/png':
                return "png";
                break;
            default:
                # code...
                break;
        }
    }
    

    if($file["name"])   
    {   
        $sh_id_hash = $_SESSION['shUser']['sh_id_hash'];
        $file2 = $path.time().$sh_id_hash.".".imgType($file["type"]);
        $flag=1;   
    }//END IF   
    
    if($flag){
        $result=move_uploaded_file($file["tmp_name"],$file2);
    }
        
    
    //特别注意这里传递给move_uploaded_file的第一个参数为上传到服务器上的临时文件   
    if($result)   
    {
        $re = array('picUrl'=>$file2);
    }else{
        $re = array('errcode'=>4,'errmsg'=>"文件上传失败");
    }  
} else {  
    $re = array('errcode'=>1,'errmsg'=>"文件不存在");
}
echo json_encode($re);