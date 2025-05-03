<?php

require_once "database/connection.php";




?>
<!DOCTYPE html>
<!--  صفحة العملاء -->
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>أدوات العملاء</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.4/dist/tailwind.min.css" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-gray-200 p-5">
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold text-center mb-6">أدوات العملاء</h1>
    <div class="grid grid-cols-1 gap-4 mb-6">
      <button id="trackProgressBtn" class="transform hover:scale-110 transition duration-300 ease-in-out bg-blue-500 text-white font-bold py-2 px-4 rounded">
        مراقبة تقدم الخدمة
      </button>
      <button id="viewServicesBtn" class="transform hover:scale-110 transition duration-300 ease-in-out bg-blue-500 text-white font-bold py-2 px-4 rounded">
        عرض الخدمات الحالية
      </button>
      <button id="submitFeedbackBtn" class="transform hover:scale-110 transition duration-300 ease-in-out bg-blue-500 text-white font-bold py-2 px-4 rounded">
        تقديم ملاحظات وتقييمات
      </button>
    </div>
    <div id="serviceInfo" class="p-4 bg-white shadow rounded">
      <p> ستم عرض المعلومات هنا </p>
    </div>
  </div>

  <script>
    document.getElementById('trackProgressBtn').addEventListener('click', function() {
      document.getElementById('serviceInfo').innerHTML = `
        <h2 class="text-xl font-bold mb-4">معلومات تتبع الخدمة</h2>
        <?php

        $select = mysqli_query($conn, "SELECT * FROM `manager` ORDER BY id DESC");

        while ($row = mysqli_fetch_assoc($select)) {
          echo $row['carStatus'];
        }



        ?>
      `;
    });

    document.getElementById('viewServicesBtn').addEventListener('click', function() {
      document.getElementById('serviceInfo').innerHTML = `
        <h2 class="text-xl font-bold mb-4">الخدمات الحالية</h2>
        <p>هنا تظهر قائمة الخدمات الحالية...</p>

        <table id="tableblue">
  <tbody >
    <tr>
      <th>اسم العميل</th>
      <th>رقم الجوال</th>
      <th>رقم لوحة المركبة</th>
      <th>الرقم التسلسلي في الاستمارة</th>
      <th>موديل السيارة</th>
      <th>خدمات إضافية</th>
      <th>تفاصيل السيارة</th>
      <th>ملاحظات العميل</th>
      <th>التشخيص الأولي</th>
      <th>التشخيص الفني</th>
      <th>تحديد الموظف</th>
      <th>حالة الطلب</th>
      <th>تاريخ الاستلام</th>
      <th>تاريخ التسليم المتوقع</th>
    </tr>
<?php 
    $select = mysqli_query($conn, "SELECT * FROM `manager` ORDER BY id DESC");

        while ($row = mysqli_fetch_assoc($select)) {
        
?>

    <tr>
      <td><?= $row['clientName'] ;?></td>
      <td><?= $row['phoneNumber'] ;?></td>
      <td><?= $row['licensePlate'] ;?></td>
      <td><?= $row['serialNumber'] ;?></td>
      <td><?= $row['carModel'] ;?></td>
      <td><?= $row['additionalServices'] ;?></td>
      <td><?= $row['carDetails'] ;?></td>
      <td><?= $row['customerNotes'] ;?></td>
      <td><?= $row['initialDiagnosis'] ;?></td>
      <td><?= $row['technicianDiagnosis'] ;?></td>
      <td><?= $row['assignEmployee'] ;?></td>
      <td><?= $row['carStatus'] ;?></td>
      <td><?= $row['deliveryDate'] ;?></td>
      <td><?= $row['expectedDeliveryDate'] ;?></td>
      
  
    </tr>

    <?php } ?>


  </tbody>
</table>


        <?php

        $select = mysqli_query($conn, "SELECT * FROM `manager` ORDER BY id DESC");

        while ($row = mysqli_fetch_assoc($select)) {
          $row['assignEmployee'];
        }



        ?>



      `;
    });

    document.getElementById('submitFeedbackBtn').addEventListener('click', function() {
      document.getElementById('serviceInfo').innerHTML = `
        <h2 class="text-xl font-bold mb-4">تقديم ملاحظات</h2>
        <p>هنا يمكن تقديم ملاحظات وتقييمات...</p>
      `;
    });
  </script>
</body>

</html>