<?php

require_once "database/connection.php";
$_SESSION['success'] = "";
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






if (isset($_POST['add_report'])) {


    if (isset($_POST['finalReport'])) {
        $finalReport = $_POST['finalReport'];
    }

    if (isset($_POST['projectCost'])) {
        $projectCost = $_POST['projectCost'];
    }

    if (isset($_POST['projectSelect'])) {
        $projectSelect = $_POST['projectSelect'];
    }

    $unsert = mysqli_query($conn, "INSERT INTO `reposrt`( `finalReport`, `projectCost`, `projectSelect`) VALUES ('$finalReport','$projectCost','$projectSelect')");
}



if (isset($_POST['add_feedback'])) {

    if (isset($_POST['projectSelect'])) {
        $projectSelect = $_POST['projectSelect'];
    }

    if (isset($_POST['feedback'])) {
        $feedback = $_POST['feedback'];
    }

    if (isset($projectSelect) && isset($feedback)) {

        $insert = mysqli_query($conn, "UPDATE `manager`  SET `feedback`='$feedback' WHERE id = '$projectSelect'");
    }
}
?>


<!DOCTYPE html>
<!-- صفحة الموظفين -->
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>أدوات الموظفين</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.4/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200 p-5">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6">أدوات الموظفين</h1>
        <div class="grid grid-cols-1 gap-4 mb-6">
            <button id="uploadDocsBtn" class="transform hover:scale-110 transition duration-300 ease-in-out bg-purple-500 text-white font-bold py-2 px-4 rounded">
                رفع الوثائق
            </button>
            <button id="addNotesBtn" class="transform hover:scale-110 transition duration-300 ease-in-out bg-purple-500 text-white font-bold py-2 px-4 rounded">
                إضافة ملاحظات
            </button>
            <button id="viewProjectsBtn" class="transform hover:scale-110 transition duration-300 ease-in-out bg-purple-500 text-white font-bold py-2 px-4 rounded">
                عرض المشاريع
            </button>
            <button id="submitReportsBtn" class="transform hover:scale-110 transition duration-300 ease-in-out bg-purple-500 text-white font-bold py-2 px-4 rounded">
                تقديم التقارير
            </button>


            <button id="createProjectBtn" class="transform hover:scale-110 transition duration-300 ease-in-out bg-purple-500 text-white font-bold py-2 px-4 rounded">
                إنشاء مشروع جديد
            </button>


        </div>
        <div id="employeeInfo" class="p-4 bg-white shadow rounded">
            <p>اضغط على أي زر لعرض المعلومات هنا.</p>
        </div>
    </div>

    <script>
        const employeeInfo = document.getElementById('employeeInfo');

        document.getElementById('uploadDocsBtn').addEventListener('click', function() {
            employeeInfo.innerHTML = `
                <h2 class="text-xl font-bold mb-4">رفع الوثائق</h2>
                <p>اختر الطريقة المناسبة لرفع الوثائق:</p>
              
                <form method="POST" action="">
                    <label for="file" class="block text-gray-700 text-sm font-bold mb-2">التقرير النهائي:</label>
                    <input type="file" required name="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="أدخل التقرير النهائي هنا"></input>
                </div>
                <button id="uploadFileBtn" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded mt-2">
                    رفع مستند
                </button>

            `;

            document.getElementById('uploadCameraBtn').addEventListener('click', function() {
                employeeInfo.innerHTML = `
                    <h2 class="text-xl font-bold mb-4">رفع الوثائق - التصوير المباشر</h2>
                    <p>هنا يمكن للموظفين رفع الوثائق والمستندات المتعلقة بالمشروع عبر التصوير المباشر...</p>
                `;
            });

            document.getElementById('uploadFileBtn').addEventListener('click', function() {
                employeeInfo.innerHTML = `
                    <h2 class="text-xl font-bold mb-4">رفع الوثائق - رفع مستند</h2>
                    <p>هنا يمكن للموظفين رفع الوثائق والمستندات المتعلقة بالمشروع عبر رفع مستند...</p>
                `;
            });
        });

        document.getElementById('addNotesBtn').addEventListener('click', function() {
            employeeInfo.innerHTML = `
                <h2 class="text-xl font-bold mb-4">إضافة ملاحظات</h2>
                <form method="POST" action="">
                    <div class="mb-4">
                        <label for="projectSelect" class="block text-gray-700 text-sm font-bold mb-2">اختر المشروع:</label>
                        <select name="projectSelect" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <?php $select = mysqli_query($conn, "SELECT * FROM `manager`");

                            while ($row = mysqli_fetch_assoc($select)) {



                            ?>
                            <option value="<?= $row['id']; ?>"><?= $row['id']; ?> مشروع</option>


<?php } ?>

                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="projectNotes" class="block text-gray-700 text-sm font-bold mb-2">الملاحظات:</label>
                        <textarea name="feedback" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="أدخل الملاحظات هنا"></textarea>
                    </div>
                    <button id="add_feedback" name="add_feedback" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">حفظ الملاحظات</button>
                </form>
            `;

            document.getElementById('saveNotesBtn').addEventListener('click', function() {
                const selectedProject = document.getElementById('projectSelect').value;
                const projectNotes = document.getElementById('projectNotes').value;
                console.log('تم حفظ الملاحظات:');
                console.log('المشروع:', selectedProject);
                console.log('الملاحظات:', projectNotes);
            });
        });

        document.getElementById('viewProjectsBtn').addEventListener('click', function() {
            employeeInfo.innerHTML = `
                <h2 class="text-xl font-bold mb-4">عرض المشاريع</h2>
                <p>هنا يمكن عرض جميع المشاريع المسندة للموظف وتفاصيلها...</p>
            `;
        });

        document.getElementById('submitReportsBtn').addEventListener('click', function() {
            employeeInfo.innerHTML = `
            <form method="POST" action="">
                <h2 class="text-xl font-bold mb-4">تقديم التقارير</h2>
                <div class="mb-4">
                    <label for="finalReport" class="block text-gray-700 text-sm font-bold mb-2">التقرير النهائي:</label>
                    <textarea required name="finalReport" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="أدخل التقرير النهائي هنا"></textarea>
                </div>
                <div class="mb-4">
                    <label for="projectCost" class="block text-gray-700 text-sm font-bold mb-2">تكلفة المشروع:</label>
                    <input required name="projectCost" type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  placeholder="أدخل تكلفة المشروع هنا">
                </div>
           
                
                    <div class="mb-4">
                        <label for="projectSelect" class="block text-gray-700 text-sm font-bold mb-2">اختر المشروع:</label>
                        <select  name="projectSelect" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <?php $select = mysqli_query($conn, "SELECT * FROM `manager`");
                            while ($row = mysqli_fetch_assoc($select)) {
                            ?>
                            <option value="<?= $row['id']; ?>"><?= $row['id']; ?> مشروع</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <button name="add_report" id="add_report" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >رفع التقرير النهائي</button>
                </form>`;

            document.getElementById('submitFinalReportBtn').addEventListener('click', function() {
                const finalReportText = document.getElementById('finalReport').value;
                const projectCost = document.getElementById('projectCost').value;
                const selectedProject = document.getElementById('projectSelect').value;
                console.log('تم رفع التقرير النهائي:');
                console.log('التقرير النهائي:', finalReportText);
                console.log('تكلفة المشروع:', projectCost);
                console.log('المشروع:', selectedProject);
            });
        });
    </script>


    <script>
        let projectCounter = 1;

        document.getElementById('createProjectBtn').addEventListener('click', function() {
            document.getElementById('employeeInfo').innerHTML = `
       
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
    </script>

</body>

</html>