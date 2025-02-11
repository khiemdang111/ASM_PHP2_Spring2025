<?php
namespace App\Models;

class Recycle extends BaseModel
{

    const STATUS_DISABLE = 0;
    public function getAllRecyleBy($table)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM $table WHERE status = 0";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function deletePermanently($id, $table)
    {
        try {
            $sql = "UPDATE $table SET status = 5 WHERE id = $id";
            $this->_conn->MySQLi()->query($sql);
            return true;
        } catch (\Throwable $th) {
            error_log('Lỗi khi xóa dữ liệu: ' . $th->getMessage());
            return false;
        }
    }
    public function restore($id, $table){
        try {
            $sql = "UPDATE $table SET status = 1 WHERE id = $id";
            $this->_conn->MySQLi()->query($sql);
            return true;
        } catch (\Throwable $th) {
            error_log('Lỗi khi khôi phục dữ liệu: '. $th->getMessage());
            return false;
        }
    }
}