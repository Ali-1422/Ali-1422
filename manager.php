<?php
require_once "database/connection.php";


$_SESSION['success'] = "";
if (isset($_POST['add']) ){

  if (isset($_POST['get_back_feedback'])) {
    $get_back_feedback = $_POST['get_back_feedback'];
  }

  if (isset($_POST['projectSelect'])) {
    $projectSelect = $_POST['projectSelect'];
  }

  $upsate = mysqli_query($conn, "UPDATE `manager` SET `get_back_feedback`='$get_back_feedback' WHERE id = '$projectSelect'");
}






if (isset($_POST['submit'])) {



  if (isset($_POST['clientName'])) {

    $clientName = $_POST['clientName'];
  }
  if (isset($_POST['phoneNumber'])) {

    $phoneNumber = $_POST['phoneNumber'];
  }
  if (isset($_POST['licensePlate'])) {

    $licensePlate = $_POST['licensePlate'];
  }
  if (isset($_POST['serialNumber'])) {

    $serialNumber = $_POST['serialNumber'];
  }
  if (isset($_POST['carModel'])) {

    $carModel = $_POST['carModel'];
  }
  if (isset($_POST['additionalServices'])) {

    $additionalServices = $_POST['additionalServices'];
  }
  if (isset($_POST['carDetails'])) {

    $carDetails = $_POST['carDetails'];
  }
  if (isset($_POST['customerNotes'])) {

    $customerNotes = $_POST['customerNotes'];
  }
  if (isset($_POST['initialDiagnosis'])) {

    $initialDiagnosis = $_POST['initialDiagnosis'];
  }
  if (isset($_POST['technicianDiagnosis'])) {

    $technicianDiagnosis = $_POST['technicianDiagnosis'];
  }
  if (isset($_POST['assignEmployee'])) {

    $assignEmployee = $_POST['assignEmployee'];
  }
  if (isset($_POST['carStatus'])) {

    $carStatus = $_POST['carStatus'];
  }
  if (isset($_POST['deliveryDate'])) {

    $deliveryDate = $_POST['deliveryDate'];
  }
  if (isset($_POST['expectedDeliveryDate'])) {

    $expectedDeliveryDate = $_POST['expectedDeliveryDate'];
  }


  $insert  = mysqli_query($conn, "INSERT INTO `manager`( `clientName`, `phoneNumber`, `licensePlate`, `serialNumber`, `carModel`, `additionalServices`, `carDetails`, `customerNotes`, `initialDiagnosis`, `technicianDiagnosis`, `assignEmployee`, `carStatus`, `deliveryDate`, `expectedDeliveryDate`) VALUES ('$clientName',
'$phoneNumber',
'$licensePlate',
'$serialNumber',
'$carModel',
'$additionalServices',
'$carDetails',
'$customerNotes',
'$initialDiagnosis',
'$technicianDiagnosis',
'$assignEmployee',
'$carStatus',
'$deliveryDate',
'$expectedDeliveryDate')");

  $_SESSION['success'] = "تم اضافة المشروع";
}



?>


<!DOCTYPE html>
<!-- مدير القسم -->
<html lang="ar" dir="rtl">
<link rel="stylesheet" href="css/style.css">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>أدوات مدير القسم</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.4/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200 p-5">
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold text-center mb-6">أدوات مدير القسم</h1>
    <div class="grid grid-cols-1 gap-4 mb-6">
      <button id="createProjectBtn" class="transform hover:scale-110 transition duration-300 ease-in-out bg-red-500 text-white font-bold py-2 px-4 rounded">
        إنشاء مشروع جديد
      </button>
      <button id="evaluateProjectBtn" class="transform hover:scale-110 transition duration-300 ease-in-out bg-red-500 text-white font-bold py-2 px-4 rounded">
        تقييم وتحليل المشروع
      </button>
      <button id="issueReportsBtn" class="transform hover:scale-110 transition duration-300 ease-in-out bg-red-500 text-white font-bold py-2 px-4 rounded">
        إصدار تقارير
      </button>

      <button id="activityLogsBtn" class="transform hover:scale-110 transition duration-300 ease-in-out bg-red-500 text-white font-bold py-2 px-4 rounded">
        سجلات النشاط
      </button>


    </div>
    <div id="departmentInfo" class="p-4 bg-white shadow rounded">
      <p>اضغط على أي زر لعرض المعلومات هنا.</p>
    </div>
  </div>

  <script>
    let projectCounter = 1;

    document.getElementById('createProjectBtn').addEventListener('click', function() {
      document.getElementById('departmentInfo').innerHTML = `
        <h2 class="text-xl font-bold mb-4">إنشاء مشروع جديد (${projectCounter})</h2>
        <form method="POST" action="">
        <?php if ($_SESSION['success'] != "") : ?>
    <div class="alert alert-success" role="alert">
    <?= $_SESSION['success']; ?>
    </div>
    <?php endif; ?>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="clientName" required>
              اسم العميل:
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="clientName" type="text" placeholder="أدخل اسم العميل" required>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="phoneNumber">
              رقم الجوال:
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="phoneNumber" type="text" placeholder="أدخل رقم الجوال" required>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="licensePlate">
              رقم لوحة المركبة:
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="licensePlate" type="text" placeholder="أدخل رقم لوحة المركبة" required>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="serialNumber">
              الرقم التسلسلي في الاستمارة:
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="serialNumber" type="text" placeholder="أدخل الرقم التسلسلي في الاستمارة" required>
          </div>
          <!-- البقية اختيارية -->
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="carModel">
              موديل السيارة:
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="carModel" type="text" placeholder="أدخل موديل السيارة">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="additionalServices">
              خدمات إضافية:
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="additionalServices" placeholder="أدخل أي خدمات إضافية يرغب العميل فيها"></textarea>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="carDetails">
              تفاصيل السيارة:
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="carDetails" placeholder="أدخل تفاصيل السيارة مثل الموديل، اللون، الكيلومترات المقطوعة، إلخ"></textarea>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="customerNotes">
              ملاحظات العميل:
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="customerNotes" placeholder="أدخل أي ملاحظات يرغب العميل في تقديمها" required></textarea>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="initialDiagnosis">
              التشخيص الأولي:
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="initialDiagnosis" placeholder="أدخل التشخيص الأولي للمشكلة" required></textarea>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="technicianDiagnosis">
              التشخيص الفني:
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="technicianDiagnosis" placeholder="أدخل تقرير التشخيص الفني"></textarea>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="assignEmployee">
              تحديد الموظف:
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="assignEmployee">
              <option>علي الشواكر</option>
              <option>محمد الشهري</option>
              <option>معاذ الغزواني</option>
              <option>فارس القحطاني</option>
              <option>فيصل الدوسري</option>
              <!-- يمكنك إضافة المزيد من الخيارات هنا -->
            </select>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="carStatus">
              حالة الطلب:
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="carStatus">
              <option>جديد</option>
              <option>في قائمة الانتظار</option>
              <option>جاري التصليح</option>
              <option>انتظار الموافقة من العميل</option>
              <option>بانتظار قطع الغيار</option>
              <option>منتهي</option>
              <!-- يمكنك إضافة المزيد من الخيارات هنا -->
            </select>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="deliveryDate">
              تاريخ الاستلام:
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="deliveryDate" type="date">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="expectedDeliveryDate">
              تاريخ التسليم المتوقع:
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="expectedDeliveryDate" type="date">
          </div>
          <div class="mb-6">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit">
              إرسال المشروع
            </button>
          </div>
        </form>
      `;
      projectCounter++;
    });

    document.getElementById('activityLogsBtn').addEventListener('click', function() {
      document.getElementById('departmentInfo').innerHTML = `
      <table id="table2">
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
      projectCounter++;
    });




    document.getElementById('evaluateProjectBtn').addEventListener('click', function() {
      document.getElementById('departmentInfo').innerHTML = `
        <h2 class="text-xl font-bold mb-4">تقييم وتحليل المشروع</h2>
        <form  method="POST" action="">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="customerFeedback">
              تقييم العميل:
            </label>
            <div class="flex items-center">
              <input type="radio" id="star5" name="rating" value="5" class="hidden" />
              <label for="star5">&#9733;</label>
              <input type="radio" id="star4" name="rating" value="4" class="hidden" />
              <label for="star4">&#9733;</label>
              <input type="radio" id="star3" name="rating" value="3" class="hidden" />
              <label for="star3">&#9733;</label>
              <input type="radio" id="star2" name="rating" value="2" class="hidden" />
              <label for="star2">&#9733;</label>
              <input type="radio" id="star1" name="rating" value="1" class="hidden" />
              <label for="star1">&#9733;</label>
            </div>

            <table id="table2">
  <thead>
    <tr>
    <th scope="col">المشروع</th>
      <th scope="col">ملاحضات اضافية</th>
      <th scope="col">تقيم العميل</th>

     
  
    </tr>
  </thead>
  <tbody>
  <?php
  $select_user = mysqli_query($conn, "SELECT * FROM `manager`");

  $i = 0;
  while ($row = mysqli_fetch_assoc($select_user)) {
    $i++;
  ?>
    <tr>
    <td>المشروع <?= $row['id']; ?> </td>
      <td><?= $row['get_back_feedback']; ?></td>
      <td><?= $row['feedback']; ?></td>
      
   

    </tr>
    <?php } ?>
   
   
  </tbody>
</table>
<div class="mb-4">
                        <label for="projectSelect" class="block text-gray-700 text-sm font-bold mb-2">اختر المشروع:</label>
                        <select name="projectSelect" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <?php $select = mysqli_query($conn, "SELECT * FROM `manager`");

                            while ($row = mysqli_fetch_assoc($select)) {



                            ?>
                            <option value="<?= $row['id']; ?>"><?= $row['id']; ?> مشروع</option>


<?php } ?>

                        </select>
                    </div>

          </div>
          <div class="mb-4">

            <label class="block text-gray-700 text-sm font-bold mb-2" for="customerComment">
              ملاحظات إضافية:
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="get_back_feedback" placeholder="أدخل أي ملاحظات إضافية هنا" required></textarea>
          </div>
          <div class="mb-6">
            <button type="submit" name="add" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >
              إرسال التقييم
            </button>
          </div>
        </form>
        
        <div id="evaluationResult" class="hidden">
          <h3 class="text-lg font-bold mb-2">نتيجة التقييم:</h3>
          <p id="evaluationScore" class="mb-2"></p>
          <h3 class="text-lg font-bold mb-2">تحليل التقييم:</h3>
          <form id="managerAnalysisForm">
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="managerAnalysis" placeholder="أدخل تحليلك لتقييم العميل"></textarea>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4" type="submit">إرسال التحليل</button>
          
        </div>
      `;

      document.getElementById('customerFeedbackForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const rating = document.querySelector('input[name="rating"]:checked').value;
        const comment = document.getElementById('customerComment').value;

        // عرض نتيجة التقييم
        document.getElementById('evaluationScore').textContent = `تم تقييم الخدمة بتقييم ${rating} نجوم`;
        document.getElementById('evaluationResult').classList.remove('hidden');
      });

      document.getElementById('managerAnalysisForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const managerAnalysis = document.getElementById('managerAnalysis').value;

        // يمكنك القيام بالإجراءات اللازمة لتحليل التقييم هنا
      });
    });

    document.getElementById('issueReportsBtn').addEventListener('click', function() {
      document.getElementById('departmentInfo').innerHTML = `
        <h2 class="text-xl font-bold mb-4">إصدار تقارير</h2>
        

        <table id="table2">
  <tbody >
    <tr>
    <th>رقم المشروع</th>
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
    <td><?= $row['id'] ;?></td>
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



<h1>التقرير</h1>
<table id="table2">
  <tbody >
    <tr>
    <th>المشروع</th>
    <th>التقرير النهائي</th>
      <th>تكلفة المشروع</th>
      
    </tr>
<?php 
    $select = mysqli_query($conn, "SELECT * FROM `reposrt` ORDER BY id DESC");

        while ($row = mysqli_fetch_assoc($select)) {
        
?>

    <tr>
    <td><?= $row['projectSelect'] ;?></td>
      <td><?= $row['finalReport'] ;?></td>
      <td><?= $row['projectCost'] ;?></td>
  
  
  
    </tr>

    <?php } ?>
  </tbody>
</table>
      `;
    });



    
  </script>
</body>

</html>