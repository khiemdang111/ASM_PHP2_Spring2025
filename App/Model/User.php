<?php 

namespace App\Model;

use mysqli;

class User extends Database 
{
    protected $_conn;

    public function __construct()
    {
        $this->_conn = new Database();
    }

    public function getAll()
    {
        $result = [];
        try {
            $conn = $this->_conn->connect();
            if (!$conn) {
                throw new \Exception('Kết nối MySQL không thành công.');
            }

            $sql = "SELECT * FROM users";
            $query = $conn->query($sql);

            if ($query === false) {
                throw new \Exception('Lỗi khi thực hiện truy vấn: ' . $conn->error);
            }

            $result = $query->fetch_all(MYSQLI_ASSOC);

            // Giải phóng bộ nhớ và đóng kết nối
            $query->free();
            $conn->close();

            return $result;
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
}
