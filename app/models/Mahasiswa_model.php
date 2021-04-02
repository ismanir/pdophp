<?php

Class Mahasiswa_model {
  // private $mhs = [
  //   [
  //     "nama" => "Isman Irawan",
  //     "nim" => "16110016",
  //     "email" => "ismanirawan@gmai.com",
  //     "jurusan" => "Teknik Informatika"
  //   ],
  //   [
  //     "nama" => "Hilman Portgas",
  //     "nim" => "16110017",
  //     "email" => "Portgas.dace@gmail.com",
  //     "jurusan" => "Teknik Komputer"
  //   ],
  //   [
  //     "nama" => "Emul Basreng",
  //     "nim" => "16110018",
  //     "email" => "kemul@lombangan.co",
  //     "jurusan" => "Teknik Mesin"
  //   ],
  //   [
  //     "nama" => "Lorem Ipsum",
  //     "nim" => "16110019",
  //     "email" => "lorem@ipsuim.com",
  //     "jurusan" => "Teknik Kendaraan Ringan"
  //   ],
  // ];

    private $table = 'mahasiswa';
    private $db;

  public function __construct(){
    $this->db = new Database;
  }

  public function getAllMahasiswa() {
    // $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
    // $this->stmt->execute();
    // return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    // script di atas udah dilakukan di database wrapper

    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }

  public function getMahasiswaById($id) {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function tambahDataMahasiswa($data){
    // var_dump($_POST);
    // echo "<br>";
    // var_dump($data); DATA NYA MASIH NULL
    // $query = "INSER INTO mahasiswa (nama, nim, email, jurusan)
    //           VALUES
    //           (:nama, :nim, :email, :jurusan)";

              $query = "INSERT INTO mahasiswa (nama,nim,email,jurusan) VALUES (:nama,:nim,:email,:jurusan)"; 
    $this->db->query($query);
    $this->db->bind(':nama',$data['nama']);
    $this->db->bind(':nim',$data['nim']);
    $this->db->bind(':email',$data['email']);
    $this->db->bind(':jurusan',$data['jurusan']);
    
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function hapusDataMahasiswa($id){

    $query = "DELETE FROM mahasiswa WHERE id = :id";
    $this->db->query($query);
    $this->db->bind(':id',$id);

    $this->db->execute();

    return $this->db->rowCount();

  }

  public function ubahDataMahasiswa($data)
  {
    $query = "UPDATE mahasiswa SET nama = :nama, nim = :nim, email = :email, jurusan = :jurusan WHERE id = :id"; 
    $this->db->query($query);
    $this->db->bind(':nama',$data['nama']);
    $this->db->bind(':nim',$data['nim']);
    $this->db->bind(':email',$data['email']);
    $this->db->bind(':jurusan',$data['jurusan']);
    $this->db->bind(':id',$data['id']);
    
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function cariDataMahasiswa()
  {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
    $this->db->query($query);
    $this->db->bind(':keyword',"%$keyword%");
    return $this->db->resultSet();
  }
}