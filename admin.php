<?php

require_once "database/connection.php";




?>


<!DOCTYPE html>
<!-- صفحة مدير النظام -->
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>أدوات مدير النظام</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.4/dist/tailwind.min.css" rel="stylesheet">

  <script src="js/jquery.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gray-200 p-5">
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold text-center mb-6">أدوات مدير النظام</h1>
    <div class="grid grid-cols-1 gap-4 mb-6">
      <button id="manageUsersBtn" class="transform hover:scale-110 transition duration-300 ease-in-out bg-green-500 text-white font-bold py-2 px-4 rounded">
        إدارة المستخدمين
      </button>
      <button id="activityLogsBtn" class="transform hover:scale-110 transition duration-300 ease-in-out bg-green-500 text-white font-bold py-2 px-4 rounded">
        سجلات النشاط
      </button>
    
    </div>
    <div id="adminInfo" class="p-4 bg-white shadow rounded">
      <p>اضغط على أي زر لعرض المعلومات هنا.</p>
    </div>
  </div>

  <script>
    document.getElementById('manageUsersBtn').addEventListener('click', function() {
      document.getElementById('adminInfo').innerHTML = `
        <h2 class="text-xl font-bold mb-4">إدارة المستخدمين</h2>

<table id="table">
  <thead>
    <tr>
      <th scope="col">Number</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
     
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE name != 'admin'");

  $i = 0;
  while ($row = mysqli_fetch_assoc($select_user)) {
    $i++;
  ?>
    <tr>
      <td ><?= $i; ?></td>
      <td><?= $row['name']; ?></td>
      <td><?= $row['email']; ?></td>
      <td><?= $row['password']; ?></td>
   

      <td>
                   <select onchange="Role('<?= $row['id']; ?>')" id="status<?= $row['id']; ?>" class="form-control" aria-label="Default select example">
                   <option disabled data-i18n="status">الحالة</option>
                   <option value="NULL" <?php if (is_null($row['role'])){
                         echo "selected";
                        }; ?> class="badge badge-danger" data-i18n="status1">عميل</option>
                        <option value="2" <?php if ($row['role'] == 2) {
                         echo "selected";
                        }; ?> class="badge badge-danger" data-i18n="status1">موظف</option>
                        <option value="3" <?php if ($row['role'] == 3) {
         echo "selected";
                   }; ?> class="badge badge-warning" data-i18n="status2">مدير القسم</option>
                     
                 </select>

               
                 </td>
    </tr>
    <?php } ?>
   
   
  </tbody>
</table>
<br>
<button type="button" class="btn btn-dark">Save</button>

        
      `;
    });

    document.getElementById('activityLogsBtn').addEventListener('click', function() {
      document.getElementById('adminInfo').innerHTML = `
        <h2 class="text-xl font-bold mb-4">سجلات النشاط</h2>
        <p>هنا تظهر سجلات نشاط المستخدمين...</p>
        <table id="table">
  <thead>
    <tr>
    
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Last login</th>
     
  
    </tr>
  </thead>
  <tbody>
  <?php
  $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE name != 'admin'");

  $i = 0;
  while ($row = mysqli_fetch_assoc($select_user)) {
    $i++;
  ?>
    <tr>
    
      <td><?= $row['name']; ?></td>
      <td><?= $row['email']; ?></td>
      <td><?= $row['last_login']; ?></td>
   

    </tr>
    <?php } ?>
   
   
  </tbody>
</table>

      `;
    });


  </script>
</body>

</html>





<script>
  function Role(id) {
    let status = $("#status" + id).val();
    $.ajax({
      url: "ajax/status.php",
      method: "POST",
      data: "id=" + id + "&status=" + status,
      success: function(res) {}
    })
    return false;

  }
</script>