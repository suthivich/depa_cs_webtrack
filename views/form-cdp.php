<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>form</title>
    <link rel="icon" type="image/x-icon" href="../tracktag/img/favi.png">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .head {
            text-align: center;
            margin-top: 50px;
        }

        .custom-container,
        .custom-container-1 {
            display: flex;
            justify-content: space-between;
            width: 70%;
            margin: 0 auto;
            padding: 20px;
            border-radius: 50px;
            margin-top: 50px;
            margin-bottom: 50px;
            background-color: #FFF0C4;
        }

        .custom-container-1>div {
            width: 48%;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        .left-content,
        .right-content {
            width: 50%;
            padding: 10px;
            box-sizing: border-box;
            margin-left: 50px;
        }

        form {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        form div {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 20px;
            width: 100%;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
        }

        select,
        textarea,
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 2px solid #C2AF76;
            border-radius: 4px;
            resize: vertical;
            border-radius: 15px;
            background-color: #fffbf0;
        }

        input {
            width: 50%;
            position: relative;
            left: 75%;
            transform: translateX(-50%);
        }

        button {
            background-color: #C2AF76;
            color: white;
            padding: 10px 15px;
            border: 2px solid #C2AF76;
            border-radius: 50px;
            margin-top: 20px;
        }

        button:last-child {
            margin-left: 0;
        }

        button:hover {
            background-color: #C2AF76;
            border-radius: 50px;
        }

        #fileUpload {
            display: none;
        }
    </style>

</head>

<body>

    <?php include './component/navbar.php'; ?>

    <div class="head">
        <h5>เมืองอัจฉริยะ</h5>
    </div>

    <div class="head">
        <h6>ระบบบริหารข้อมูลเมือง City Data Platform </h6>
    </div>



    <div class="custom-container">
        <div class="left-content">
            <!-- เนื้อหาฝั่งซ้าย -->
            <p>ระบบบริหารข้อมูลเมือง City Data Platform</p>
            <p>แหล่งเงินทุน : </p>
            <p>เงินทุน (บาท) : </p>
        </div>
        <div class="right-content">
            <!-- เนื้อหาฝั่งขวา -->
            <p>CDP : </p>
        </div>
    </div>


    <div class="custom-container-1">
        <form action="submit" method="post">

            <!-- ช่องเลือก (รายการแบบเลื่อน) -->
            <div>
                <label for="status">สถานะ :</label>
                <select id="status" name="status">
                    <option value="null">ระบุ สถานะโครงการ</option>
                    <option value="delayed">ล่าช้ากว่าแผน</option>
                    <option value="on_schedule">ตามแผน</option>
                    <option value="ahead_of_schedule">เร็วกว่าแผน</option>
                    <option value="not_started">ยังไม่ดำเนินโครงการ</option>
                </select>
            </div>

            <div>
                <label for="progress">ความก้าวหน้าโครงการ :</label>
                <select id="progress" name="progress" placeholder="ความก้าวหน้าโครงการ">
                    <option value="null">ระบุ % ความก้าวหน้า</option>
                    <option value="0">0%</option>
                    <option value="5">5%</option>
                    <option value="10">10%</option>
                    <option value="15">15%</option>
                    <option value="20">20%</option>
                    <option value="25">25%</option>
                    <option value="30">30%</option>
                    <option value="35">35%</option>
                    <option value="40">40%</option>
                    <option value="45">45%</option>
                    <option value="50">50%</option>
                    <option value="55">55%</option>
                    <option value="60">60%</option>
                    <option value="65">65%</option>
                    <option value="70">70%</option>
                    <option value="75">75%</option>
                    <option value="80">80%</option>
                    <option value="85">85%</option>
                    <option value="90">90%</option>
                    <option value="95">95%</option>
                    <option value="100">100%</option>
                </select>
            </div>

            <div>
                <input type="file" id="fileUpload" name="fileUpload" accept=".pdf, .doc, .docx">
            </div>

            <!-- ตำแหน่ง textarea ที่เพิ่ม id="name" เพื่อให้สอดคล้องกับ label -->
            <div>
                <label for="operation">ผลการดำเนินงาน:</label>
                <textarea id="operation" name="operation" placeholder="กรอกข้อความ...."></textarea>
            </div>

            <div>
                <label for="problem_type">ประเภทปัญหา:</label>
                <select id="problem_type" name="problem_type">
                    <option value="null">ระบุ ประเภทปัญหา</option>
                    <option value="0">0%</option>
                    <option value="5">5%</option>
                    <option value="10">15%</option>
                </select>
            </div>

            <!-- ตำแหน่ง textarea ที่เพิ่ม id="result" เพื่อให้สอดคล้องกับ label -->
            <div>
                <label for="result">ผลลัพธ์:</label>
                <textarea id="result" name="result" placeholder="กรอกข้อความ...."></textarea>
            </div>

            <!-- ตำแหน่ง textarea ที่เพิ่ม id="problem" เพื่อให้สอดคล้องกับ label -->
            <div>
                <label for="problem">ปัญหา/อุปสรรค:</label>
                <textarea id="problem" name="problem" placeholder="กรอกข้อความ...."></textarea>
            </div>

            <!-- ตำแหน่ง textarea ที่เพิ่ม id="solution" เพื่อให้สอดคล้องกับ label -->
            <div>
                <label for="solution">แนวทางแก้ไข:</label>
                <textarea id="solution" name="solution" placeholder="กรอกข้อความ...."></textarea>
            </div>

            <!-- ตำแหน่ง textarea ที่เพิ่ม id="note" เพื่อให้สอดคล้องกับ label -->
            <div>
                <label for="note">หมายเหตุ:</label>
                <textarea id="note" name="note" placeholder="กรอกข้อความ...."></textarea>
            </div>

            <!-- ปุ่มบันทึก -->
            <button type="button" id="recordButton">บันทึก</button>

            <!-- ปุ่มส่งรายงาน -->
            <button type="button" id="submitButton">ส่งรายงาน</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var statusSelect = document.getElementById('status');
            var progressSelect = document.getElementById('progress');
            var fileUploadInput = document.getElementById('fileUpload');
            var submitButton = document.getElementById('submitButton'); // Updated selector
            var form = document.querySelector('form');

            statusSelect.addEventListener('change', function() {
                toggleFileUpload();
                updateSubmitButtonState();
            });

            progressSelect.addEventListener('change', function() {
                toggleFileUpload();
                updateSubmitButtonState();
            });

            form.addEventListener('input', function() {
                updateSubmitButtonState();
            });

            submitButton.addEventListener('click', function() {
                form.submit(); // จะทำให้ฟอร์มถูกส่งไปยัง action ที่ระบุใน form tag
            });

            function toggleFileUpload() {
                if (statusSelect.value === '100' || progressSelect.value === '100') {
                    fileUploadInput.style.display = 'block';
                } else {
                    fileUploadInput.style.display = 'none';
                }
            }

            function updateSubmitButtonState() {
                var isFormValid = Array.from(form.elements).every(function(element) {
                    if (
                        (element.tagName === 'INPUT' || element.tagName === 'SELECT' || element.tagName === 'TEXTAREA') &&
                        element.type !== 'file' && // ไม่นับ input type file
                        element.value.trim() !== ''
                    ) {
                        return true;
                    } else if (element.type === 'file') {
                        return true; // ไม่ต้องตรวจสอบไฟล์ที่อัปโหลด
                    } else if (element.type === 'button') {
                        return true; // ปุ่มบันทึกและส่งรายงานสามารถกดได้ตลอดเวลา
                    } else {
                        return false;
                    }
                });

                if (isFormValid) {
                    submitButton.style.backgroundColor = '#C2AF76';
                    submitButton.style.cursor = 'pointer';
                    submitButton.disabled = false;
                } else {
                    submitButton.style.backgroundColor = '#A9A9A9';
                    submitButton.style.cursor = 'not-allowed';
                    submitButton.disabled = true;
                }
            }

            window.addEventListener('load', function() {
                toggleFileUpload();
                updateSubmitButtonState();
            });

            // ให้เรียก updateSubmitButtonState เมื่อมีการเปลี่ยนแปลงในฟอร์ม
            form.addEventListener('input', function() {
                updateSubmitButtonState();
            });

            // ให้เรียกฟังก์ชัน updateSubmitButtonState เมื่อโหลดหน้าเว็บ
            updateSubmitButtonState();
        });
    </script>







    <?php include './component/footer.php'; ?>

</body>

</html>