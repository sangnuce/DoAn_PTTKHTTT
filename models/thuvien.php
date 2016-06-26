<?php

//Tầng MODEL của PROJECT
class LIB
{
    public $pdo;

    function __construct($server, $host, $db, $user, $pass)
    {
        try {
            $dsn = $server . ':host=' . $host . ';dbname=' . $db;
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->exec("SET NAMES 'utf8'");
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function selectall($sql)
    {
        $re = $this->pdo->query($sql);
        if (!$re) die('Error Query:' . $sql);
        return $re->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectone($sql)
    {
        $re = $this->pdo->query($sql);//Chạy câu lệnh SQL truyền vào
        if (!$re) die('Error Query:' . $sql);//Kiểm tra nếu lỗi thì in ra câu lệnh trên
        if ($re->rowCount() > 0)
            return $re->fetch(PDO::FETCH_ASSOC);//PT trả về mảng 1 chiều
        else return array();
    }

    public function insert($table, $data)
    {
        $listcol = '';
        $listval = '';
        foreach ($data as $key => $val) {
            $listcol .= $key . ',';
            $listval .= ':' . $key . ',';
        }
        $listcol = trim($listcol, ',');
        $listval = trim($listval, ',');
        $strquery = "INSERT INTO $table ($listcol) VALUES ($listval)";
        $re = $this->pdo->prepare($strquery);
        if (!$re) die('Error Query:' . $strquery);
        $re->execute($data);
        return $this->pdo->lastInsertId();
    }

    public function update($table, $data, $dieukien = array())
    {
        $listcol = '';
        foreach ($data as $key => $val)
            $listcol .= $key . '=:' . $key . ',';
        $listcol = trim($listcol, ',');
        $listwhere = '';
        foreach ($dieukien as $key => $val)
            $listwhere .= $key . '=:' . $key . ' AND ';

        $listwhere = trim($listwhere, ' AND ');
        $strquery = "UPDATE $table SET $listcol";
        if($listwhere != '') $strquery.= " WHERE $listwhere";
        $re = $this->pdo->prepare($strquery);
        if (!$re) die('Error Query:' . $strquery);
        return $re->execute(array_merge($data, $dieukien));
    }

    public function delete($table, $dieukien = array())
    {
        $listwhere = '';
        foreach ($dieukien as $key => $val)
            $listwhere .= $key . '=:' . $key . ' AND ';

        $listwhere = trim($listwhere, ' AND ');
        $strquery = "DELETE FROM $table";
        if($listwhere != '') $strquery.= " WHERE $listwhere";
        $re = $this->pdo->prepare($strquery);
        if (!$re) die('Error Query:' . $strquery);
        return $re->execute($dieukien);
    }

    public function sendmail($email, $name, $subject, $body)
    {
        require_once('class.phpmailer.php');
        $mail = new PHPMailer;

        //Phần 1: Cấu hình thông tin kết nối đến Server Free trung gian kia
        $mail->IsSMTP();                                //Khai báo hệ thống gửi mail theo cơ chế SMTP
        $mail->Host = 'smtp.gmail.com';                 //Server trung gian gửi mail
        $mail->Port = '465';                            //Cổng chạy phần mềm
        $mail->SMTPAuth = true;                         //Kích hoạt chế độ xác nhận người dùng
        $mail->Username = 'svtnnuce@gmail.com';         //Tên đăng nhập vào hệ thống trên
        $mail->Password = 'svtnnuce';                   //Mật khẩu tương ứng
        $mail->SMTPSecure = 'ssl';                      //Chế độ bảo mật SSL
        //Phần 2: Cấu hinh nội dung gửi mail: người nhận, người gửi, tiêu đề, nội dung ...
        $mail->CharSet = 'utf-8';                       //Nội dung TIếng Việt
        $mail->IsHTML(true);                            //Nội dung cho phép thẻ HTML
        $mail->FromName = 'Đội SVTN trường ĐH Xây Dựng';//Tên người gửi thư
        $mail->AddAddress($email, $name);               //Thêm địa chỉ người nhận EMail
        //$mail->AddReplyTo('jacki_tom@yahoo.com','Ly');//Thêm địa chỉ của người nhận trả lời
        $mail->Subject = $subject;                      //Tiêu đề
        $mail->Body = $body;                            //Nội dung
        $mail->Send();                                  //Gọi Phương thức Send gửi mail đi
        return $mail->ErrorInfo;
    }

    public function makeslug($str)
    {
        $char = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ|Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',);
        $str = str_replace(' ', '-', $str);
        foreach ($char as $key => $val)
            $str = preg_replace("/(" . $val . ")/", $key, $str);
        $str = preg_replace("/[^-a-zA-Z0-9]/", "", $str);
        $str = preg_replace("/[-]+/", "-", $str);
        return $str;
    }

    public function dateformat($date, $time = 0)
    {
        if ($date == 0) return '';
        if ($time == 1)
            return date('H:i d-m-Y', strtotime($date));
        return date('d-m-Y', strtotime($date));
    }

    public function attempt($sdt, $matkhau)
    {
        $strquery = "SELECT tbl_thanhvien.* 
                FROM tbl_thanhvien JOIN tbl_taikhoan ON tbl_thanhvien.matv = tbl_taikhoan.matv 
                WHERE sdt=:sdt AND matkhau=:matkhau LIMIT 0,1";
        $re = $this->pdo->prepare($strquery);
        if (!$re) die('Error Query:' . $strquery);
        $re->execute(array('sdt' => $sdt, 'matkhau' => md5($matkhau)));
        if ($re->rowCount() > 0) {
            return $re->fetch(PDO::FETCH_ASSOC);
        } else return array();
    }

    public function checkLogin()
    {
        if (!isset($_SESSION['thanhvien'])) {
            $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Bạn chưa đăng nhập!');
            header('Location: index.php?prog=dangnhap');
            die();
        }
    }
}


?>