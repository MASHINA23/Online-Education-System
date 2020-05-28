<?php
  class oopTestingClassGetUserInfo {
  $usernames = "";
    $password = "";
    $userstatus = "";
    //...just a start
  public $testing_oop_class = echo "Hello TTC Developers We Are Going To Use OOP For Our Project This Is Just An Example/Initial Commit Change It And Do Your Magic";
    //method 1
    public function getSystemUserName(){
      // Wuuuh!! do the magic with $this username and password
      return $this->cusernames;
    }
    //method 2
    public function getSystemUserStatus() {
      // Wuuwh! do your magic with the inputs
      return $this->userstatus;
    }
    
   //......i see the future of this system in front of my eyes...
  }
  $objectClass = new oopTestingClassGetUserInfo;
  echo $objectClass->testing_oop_class;
?>
