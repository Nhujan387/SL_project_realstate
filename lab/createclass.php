<?php
class Room{
    private $RoomNumber;
    private $RoomCategory;
    private $RoomDetails;
    private $RoomPrice;

    public function getRoomNumber(){
        return $this -> RoomNumber;
    }
    public function setRoomNumber($RoomNumber){
        $this -> RoomNumber = $RoomNumber;
    }
    public function getRoomCategory(){
        return $this -> RoomCategory;
    }
    public function setRoomCategory($RoomCategory){
        $this -> RoomCategory = $RoomCategory;
    }
    public function getRoomDetails(){
        return $this -> RoomDetails;
    }
    public function setRoomDetails($RoomDetails){
        $this -> RoomDetails = $RoomDetails;
    }
    public function getRoomPrice(){
        return $this -> RoomPrice;
    }
    public function setRoomPrice($RoomPrice){
        $this -> RoomPrice = $RoomPrice;
    }
}

    $Room = new room();
    $Room -> setRoomNumber("101");
    $Room -> setRoomCategory('Suite');
    $Room -> setRoomDetails('Very comfortable');
    $Room -> setRoomPrice('RS 10000');


    echo $Room-> getRoomNumber().'<br/>';
    echo $Room-> getRoomCategory().'<br/>';
    echo $Room-> getRoomDetails().'<br/>';
    echo $Room-> getRoomPrice().'<br/>';
?>
