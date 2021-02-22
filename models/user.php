<?php

class User extends Model implements IModel{
    private $id;
    private $name;
    private $email;
    private $role;
    private $password;
    private $created_at;

    public function __construct(){
        parent::__construct();
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getId():int{
        return $this->id;
    }

    public function getName():String{
        return $this->name;
    }

    public function setName(String $name){
        $this->name = $name;
    }

    public function getRole():String{
        return $this->role;
    }

    public function setRole(String $role){
        $this->role = $role;
    }

    public function getEmail():String{
        return $this->email;
    }

    public function setEmail(String $email){
        $this->email = $email;
    }

    public function getPassword():String{
        return $this->password;
    }

    public function setPassword(String $password){
        $this->password = $password;
    }

    public function getCreatedAt():DateTime{
        return $this->created_at;
    }

    public function setCreatedAt(DateTime $date){
         $this->created_at = $date;
    }

    public function save(){
        try{
            $query = $this->prepare("INSERT INTO user (name, email, password) VALUES (:name, :email, :password)");
            $query->execute(['name'=>$this->name, 
                        'email'=>$this->email, 
                        'password'=>$this->password]
                    );
            error_log('User::create => User created successfully');
            return true;
        }catch(PDOException $e){
            error_log('User::create => Error '.$e);
            return false;

        }
        
    }

    public function update(){
        try{
            $query = $this->prepare("UPDATE user
                                    SET name=:name, email=:email,password=:password, role=:role
                                    WHERE id=:id");
            $query->execute([
                        'id'=>$this->id,
                        'name'=>$this->name, 
                        'email'=>$this->email, 
                        'role'=>$this->role, 
                        'password'=>$this->password]
                    );
                    error_log('User::update => User updated successfully');
        }catch(PDOException $e){
            error_log('User::update => Error '.$e);

        }
    }

    public function delete($id){
        try{
            $query = $this->prepare("DELETE FROM user
                                    WHERE id=:id");
            $query->execute([
                        'id'=>$this->id
            ]);
            error_log('User::delete => User deleted successfully');
        }catch(PDOException $e){
            error_log('User::delete => Error '.$e);

        }
    }

    public function getAll(){
        try{
            $items = [];
            $query = $this->query("SELECT * FROM user");
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new User();
                $item->setId($row['id']);
                $item->setName($row['name']);
                $item->setPassword($row['password']);
                $item->setRole($row['role']);
                $item->setEmail($row['email']);
                $item->setCreatedAt($row['createdAt']);
                array_push($items, $item);
            }
            error_log('User::getAll => get all users successfully');
        }catch(PDOException $e){
            error_log('User::getAll => Error '.$e);

        }
    }

    public function get($id){

        try{
            $items = [];
            $query = $this->prepare("SELECT * FROM user WHERE id=:id");
            $query->execute(['id'=>$id]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
            $this->setId($user['id']);
            $this->setName($user['name']);
            $this->setPassword($user['password']);
            $this->setRole($user['role']);
            $this->setEmail($user['email']);
            $this->setCreatedAt($user['createdAt']);
            
            error_log('User::get => get user successfully');
        }catch(PDOException $e){
            error_log('User::getAll => Error '.$e);

        }
    }

    public function exists($email){
        try{
            $query = $this->prepare("SELECT * FROM user WHERE email =:email");
            $query->execute(['email'=>$email]);
    
            if($query->rowCount()>0){
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e){
            error_log('User::exists => Error '.$e);
        }
        
    }

}
?>