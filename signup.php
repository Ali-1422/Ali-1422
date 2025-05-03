<?php

require_once "database/connection.php";

$_SESSION['error'] = "";

$_SESSION['success'] = "";



if (isset($_POST['submit'])) {


    if (isset($_POST['email'])) {
        $email = $_POST['email'];



        $check_email = mysqli_query($conn,"SELECT * FROM `users`  WHERE email = '$email'");
        if(mysqli_num_rows($check_email) > 0){
          $_SESSION['error'] = "بريد الكتروني مستخدم من قبل غيره";
        }


    }
    if (isset($_POST['name'])) {
        $name = $_POST['name'];

        $check_name = mysqli_query($conn,"SELECT * FROM `users`  WHERE name = '$name'");

        if(mysqli_num_rows($check_name) > 0){
          $_SESSION['error'] = "اسم المستخدم مستخدم من قبل غيره";
        }
    }

    if(empty($_POST['name'])){
      $_SESSION['error'] = "يرجى ادخال الاسم";
    }
    if(empty($_POST['email'])){
      $_SESSION['error'] = "يرجى ادخال الايمايل";
    }
    if(empty($_POST['password'])){
      $_SESSION['error'] = "يرجى ادخال كلمة المرور";
    }

    if(empty($_POST['phone'])){
      $_SESSION['error'] = "يرجى ادخال رقم الهاتف";
    }


    if(isset($_POST['countryCode']) && isset($_POST['phone'])){
      $phone = $_POST['countryCode'].$_POST['phone'];

    }



    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }
    if (isset($_POST['password_confirm'])) {
        $password_confirm = $_POST['password_confirm'];
    }

    if($password != $password_confirm){
      $_SESSION['error'] = "يرجى تكرار نفس كلمة المرور";
    }
   

    if ($_SESSION['error'] == "") {
        $insert = mysqli_query($conn, "INSERT INTO `users`( `name`, `email`, `password`,`phone`) VALUES ('$name','$email','$password','$phone')");
        $_SESSION['success'] = "تم انشاء حساب سجل دخولك الان";
        header('location:index.php');
    }
}

?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>إنشاء حساب جديد</title>
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.4/dist/tailwind.min.css" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-200 flex items-center justify-center h-screen">
  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-xs">
    <div class="flex justify-center mb-8">
      <img src="images/logo.png" alt="logo.png" class="h-32 w-auto"> <!-- تغيير الفئات لتعديل الحجم -->
    </div>
    <form id="signupForm" method="POST" action="">
    <?php if($_SESSION['error'] != ""): ?>
    <div class="alert alert-danger" role="alert">
    <?= $_SESSION['error'] ;?>
    </div>
    <?php endif; ?>
      <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">الاسم</label>
        <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
      </div>
      <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">البريد الإلكتروني</label>
        <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
      </div>
      <div class="mb-4">
        <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">رقم الجوال</label>
        <div class="flex items-center">
          <select id="countryCode" name="countryCode" class="mr-2 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="+966">+966</option>
            <option value="+971">+971</option>
            <option value="+1">+1</option>
            <!-- يمكنك إضافة المزيد من رموز المناطق حسب الحاجة -->
          </select>
          <input type="tel" id="phone" name="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="أدخل رقم الجوال" required>
        </div>
      </div>
      <div class="mb-4">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">كلمة المرور</label>
        <input type="password" id="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
      </div>
      
      <div class="mb-4">
        <label for="password_confirm" class="block text-gray-700 text-sm font-bold mb-2">تأكيد كلمة المرور</label>
        <input type="password" id="password_confirm" name="password_confirm" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
      </div>
      <div class="flex items-center justify-between">
        <button name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          إنشاء حساب
        </button>

        <a href="index.php">لديك حساب؟</a>
      </div>
    </form>
  </div>
</body>
</html>
