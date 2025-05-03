<?php 

require_once "database/connection.php";
$_SESSION['error'] = "";
$_SESSION['success'] = "";

if (isset($_POST['submit'])) {

  if (isset($_POST['name'])) {
    $name = $_POST['name'];
  }

  if (isset($_POST['password'])) {
    $password = $_POST['password'];
  }

  if(empty($_POST['name']) || empty($_POST['password'])){
    $_SESSION['error'] =  "يرجى ادخال اسم المستخدم و كلمة السر";
    $_SESSION['success'] = "";
  }
  



  if($_SESSION['error'] == ""){

    $sql = "SELECT * FROM users WHERE (name='$name' OR email='$name') AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['name'] === $name || $row['email'] === $name  && $row['password'] === $password) {
        $today = date("F j, Y, g:i a"); 
        $email = $row['email'];
        $last_login = mysqli_query($conn,"UPDATE `users` SET `last_login`='$today' WHERE email = '$email'");
        if($row['role'] == 1){
          header('location:admin.php');
        }elseif($row['role'] == 2){
          header('location:employees.php');
        }elseif($row['role'] == 3){
          header('location:manager.php');
        }elseif(is_null($row['role'])){
          header('location:clients.php');
        }
        $_SESSION['success'] = "";
       
        
      }
    } else {
      $_SESSION['error'] = "كلمة السر خاطئة";
      $_SESSION['success'] = "";
    }
  }
}

?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل الدخول</title>

  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 flex items-center justify-center h-screen">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-xs">
   <!-- شعار النظام -->
    <div class="flex justify-center mb-8">
    <img src="images/logo.png" alt="شعار النظام" class="h-32 w-auto"> <!-- تغيير الفئات لتعديل الحجم -->
  </div>
  
    <form id="loginForm" method="POST" action="">
    <?php if($_SESSION['success'] != ""): ?>
    <div class="alert alert-success" role="alert">
    <?= $_SESSION['success'] ;?>
    </div>
    <?php endif; ?>



    <?php if($_SESSION['error'] != ""): ?>
    <div class="alert alert-danger" role="alert">
    <?= $_SESSION['error'] ;?>
    </div>
    <?php endif; ?>
      <!-- حقول النموذج -->
      <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2"> اسم المستخدم او البريد الالكتروني</label>
        <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
      </div>
      <div class="mb-6">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">كلمة المرور</label>
        <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" >
      </div>
      <!-- زر تسجيل الدخول -->
      <div class="flex items-center justify-between mb-6">
        <button name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          تسجيل الدخول
        </button>
      <!-- زر إنشاء حساب جديد -->
<div class="flex items-center justify-between">
  <a href="signup.php" >
    إنشاء حساب جديد؟
  </a>
</div>
    </form>
  </div>


</body>
</html>
