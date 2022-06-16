<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

*{
  list-style: none;
  text-decoration: none;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Open Sans', sans-serif;
}

body{
  background: #f5f6fa;
}

.wrapper .sidebar{
  background: rgb(5, 68, 104);
  position: fixed;
  top: 0;
  left: 0;
  width: 250px;
  height: 100%;
  padding: 20px 0;
  transition: all 0.5s ease;
}

.wrapper .sidebar .profile{
  margin-bottom: 30px;
  text-align: center;
}

.wrapper .sidebar .profile img{
  display: block;
  width: 100px;
  height: 100px;
    border-radius: 50%;
  margin: 0 auto;
}

.wrapper .sidebar .profile h3{
  color: #ffffff;
  margin: 10px 0 5px;
}

.wrapper .sidebar .profile p{
  color: rgb(206, 240, 253);
  font-size: 14px;
}

.wrapper .sidebar ul li a{
  display: block;
  padding: 13px 30px;
  border-bottom: 1px solid #10558d;
  color: rgb(241, 237, 237);
  font-size: 16px;
  position: relative;
}

.wrapper .sidebar ul li a .icon{
  color: #dee4ec;
  width: 30px;
  display: inline-block;
}

 

.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
  color: #0c7db1;

  background:white;
    border-right: 2px solid rgb(5, 68, 104);
}

.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
  color: #0c7db1;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
  display: block;
}

.wrapper .section{
  width: calc(100% - 225px);
  margin-left: 225px;
  transition: all 0.5s ease;
}

.wrapper .section .top_navbar{
  background: rgb(7, 105, 185);
  height: 50px;
  display: flex;
  align-items: center;
  padding: 0 30px;
 
}

.wrapper .section .top_navbar .hamburger a{
  font-size: 28px;
  color: #f4fbff;
}

.wrapper .section .top_navbar .hamburger a:hover{
  color: #a2ecff;
}

 .wrapper .section .container{
  margin: 30px;
  background: #fff;
  padding: 50px;
  line-height: 28px;
}

body.active .wrapper .sidebar{
  left: -225px;
}

body.active .wrapper .section{
  margin-left: 0;
  width: 100%;
}
    </style>
</head>
<body>
   
    <div class="wrapper">
       <div class="section">
    <div class="top_navbar">
      <div class="hamburger">
        <a href="#">
          <i class="fas fa-bars"></i>
        </a>
      </div>
    </div>
    <div class="container">
      @yield('content')
    </div>
  </div>
        <div class="sidebar">
            <div class="profile">
              <h3>Welcome </h3>
                <h3>{{{ Auth::user()->name }}} </h3>
                <p>{{{Auth::user()->email }}} </p>
            </div>
            <ul>
 
               <li>
                    <a href="{{route('signout')}}">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        
    </div>
 
</body>
<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
    </script>
</html>