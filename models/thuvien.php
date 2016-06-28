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