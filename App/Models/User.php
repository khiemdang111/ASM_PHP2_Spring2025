<?php 

namespace App\Models;
use App\Models\BaseModel;
use mysqli;

class User extends BaseModel 
{
    protected $_conn;
    protected $table = 'users';
    protected $id = 'id';

    public function __construct()
    {
        $this->_conn = new Database();
    }

    public function getAllUser()
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
    public function createUser($data)
    {
        return $this->create($data);
    }
    public function getOneUserByEmail(string $email)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM users WHERE email=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('s', $email);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }
    public function getOneUser($id)
    {
        return $this->getOne($id);
    }
}
