<?php

include('server.php');  
include('h.php'); 




?>
<div class="container">
  <div class="row">
      <form  name="addproduct" action="admin_from_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
         <div class="u-form-group">
             <p> ชื่อ</p>
                    <input type="firstname" name="firstname" placeholder="Firstname" class="form-control"/>
                </div>
                <div class="u-form-group">
                     <p> นามสกุล</p>
                    <input type="lastname" name="lastname" placeholder="Lastname" class="form-control"/>
                </div>
                <div class="u-form-group">
                     <p> Username</p>
                    <input type="username" name="username" placeholder="Username" class="form-control"/>
                </div>
                <div class="u-form-group">
                     <p> รหัสผ่าน</p>
                    <input type="password" name="password_1" placeholder="Password" class="form-control"/>
                </div>
                <div class="u-form-group">
                     <p> ยืนยันรหัสผ่านอีกครั้ง</p>
                    <input type="password" name="password_2" placeholder="Confirm Password" class="form-control"/>
                </div>
                <div class="u-form-group">
                     <p> ที่อยู่</p>
                    <input type="adress" name="adress" placeholder="Adress" class="form-control"/>
                </div>
                 <div class="u-form-group">
                      <p> เบอร์โทรศัพท์</p>
                    <input type="tel" name="tel" placeholder="Tel" class="form-control"/>
                </div>
          <div class="form-group"><br>
            <button type="submit" class="btn btn-success" name="saveadmin"> บันทึก </button>
          <div class="col-sm-12">
            
              
            
          </div>
        </div>
      </form>
    </div>
  </div>
