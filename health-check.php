<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main.css">
    <title>Health Check</title>
</head>

<body style="margin: 0;">

    <?php include("header.php"); ?>

    <div class="q-container">
        <h2 style="padding: 30px 0 0 50px">ระบบวิเคราะห์สุขภาพ Healthcare Check</h2>
        <div class="q-box">
            <form action="analyze.php" method="post" required>
                <h3 id="question-temp">1.อุณหภูมิร่างกาย (อาการไข้)</h3>
                <ul>
                    <li>
                        <input type="radio" name="temp" id="ปกติ" value="ปกติ" class="ans">
                        <label for="ปกติ">อุณหภูมิปกติ</label>
                    </li>
                    <li>
                        <input type="radio" name="temp" id="มีไข้" value="ไข้" class="ans">
                        <label for="มีไข้">มีไข้</label>
                    </li>
                    <li>
                        <input type="radio" name="temp" id="ไข้สูง" value="ไข้สูง" lass="ans" required>
                        <label for="ไข้สูง">มีไข้สูง (อุณหภูิมสูง)</label>
                    </li>
                </ul>

                <h3 id="question-vom">2.อาการคลื่นไส้อาเจียน</h3>
                <ul>
                    <li>
                        <input type="radio" name="vom" id="ไม่มี" value="ไม่คลื่นไส้" class="ans">
                        <label for="ไม่มี">ไม่มีอาการ</label>
                    </li>
                    <li>
                        <input type="radio" name="vom" id="มี" value="คลื่นไส้อาเจียน" class="ans" required>
                        <label for="มี">มีอาการ</label>
                    </li>

                </ul>

                <h3 id="question-tired">3.อาการอ่อนเพลีย</h3>
                <ul>
                    <li>
                        <input type="radio" name="tired" id="ไม่อ่อนเพลีย" value="ไม่อ่อนเพลีย" class="ans">
                        <label for="ไม่อ่อนเพลีย">ไม่อ่อนเพลีย</label>
                    </li>
                    <li>
                        <input type="radio" name="tired" id="อ่อนเพลีย" value="อ่อนเพลีย" class="ans" required>
                        <label for="อ่อนเพลีย">อ่อนเพลีย</label>
                    </li>

                </ul>

                <h3 id="question-aches">4.อาการปวดเมื่อยร่างกาย</h3>
                <ul>
                    <li>
                        <input type="radio" name="aches" id="ไม่ปวดเมื่อย" value="ไม่ปวดเมื่อยร่างกาย" class="ans">
                        <label for="ไม่ปวดเมื่อย">ไม่ปวดเมื่อยร่างกาย</label>
                    </li>
                    <li>
                        <input type="radio" name="aches" id="ปวดเมื่อย" value="ปวดเมื่อยร่างกาย" class="ans" required>
                        <label for="ปวดเมื่อย">ปวดเมื่อยร่างกาย</label>
                    </li>

                </ul>

                <h3 id="question-headaches">5.อาการปวดหัว</h3>
                <ul>
                    <li>
                        <input type="radio" name="headaches" id="ไม่ปวดหัว" value="ไม่ปวดหัว" class="ans">
                        <label for="ไม่ปวดหัว">ไม่ปวดหัว</label>
                    </li>
                    <li>
                        <input type="radio" name="headaches" id="ปวดหัว" value="ปวดหัว" class="ans" required>
                        <label for="ปวดหัว">ปวดหัว</label>
                    </li>

                </ul>

                <h3 id="question-eyes">6.อาการที่เกี่ยวกับตา (สามารถเลือกตอบได้มากกว่า 1 ข้อ)</h3>
                <ul>
                    <li>
                        <input type="checkbox" name="eyes[]" id="ไม่มีอาการ" value="ตาปกติ" class="ans">
                        <label for="ไม่มีอาการ">ไม่มีอาการเกี่ยวกับตา</label>
                    </li>
                    <li>
                        <input type="checkbox" name="eyes[]" id="ปวดตา" value="ปวดตา" class="ans">
                        <label for="ปวดตา">ปวด/เคืองตา</label>
                    </li>
                    <li>
                        <input type="checkbox" name="eyes[]" id="แดง" value="ตาแดง" class="ans">
                        <label for="แดง">ตาแดง</label>
                    </li>
                    <li>
                        <input type="checkbox" name="eyes[]" id="ตาเหลือง" value="ตาเหลือง" class="ans">
                        <label for="ตาเหลือง">ตาเหลือง</label>
                    </li>
                </ul>

                <h3 id="question-abdomi">7.อาการปวดท้องบิด</h3>
                <ul>
                    <li>
                        <input type="radio" name="abdomi" id="ไม่ปิด" value="ไม่ปวดท้องบิด" class="ans">
                        <label for="ไม่ปิด">ไม่มีอาการ</label>
                    </li>
                    <li>
                        <input type="radio" name="abdomi" id="ปวดบิด" value="ปวดท้องบิด" class="ans" required>
                        <label for="ปวดบิด">ปวดท้องบิด</label>
                    </li>

                </ul>

                <h3 id="question-diarr">8.อาการท้องเสีย</h3>
                <ul>
                    <li>
                        <input type="radio" name="diarr" id="ท้องไม่เสีย" value="ไม่มีอาการท้องเสีย" class="ans">
                        <label for="ท้องไม่เสีย">ไม่มีอาการ</label>
                    </li>
                    <li>
                        <input type="radio" name="diarr" id="เหลว" value="ถ่ายเหลว" class="ans" required>
                        <label for="เหลว">ถ่ายเหลว</label>
                    </li>
                </ul>

                <h3 id="question-rash">9.อาการผื่น (สามารถเลือกตอบได้มากกว่า 1 ข้อ)</h3>
                <ul>
                    <li>
                        <input type="checkbox" name="rash[]" id="ไม่มีผื่น" value="ไม่มีผื่น" class="ans">
                        <label for="ไม่มีผื่น">ไม่มีผื่น</label>
                    </li>
                    <li>
                        <input type="checkbox" name="rash[]" id="ผื่นผิวหนัง" value="ผื่นบริเวณผิวหนัง" class="ans">
                        <label for="ผื่นผิวหนัง">ผื่น/ตุ่มแดงบริเวณผิวหนัง</label>
                    </li>
                    <li>
                        <input type="checkbox" name="rash[]" id="ผื่นมือเท้า" value="ผื่นที่มือเท้า" class="ans">
                        <label for="ผื่นมือเท้า">ผื่น/ตุ่มแดงบริเวณมือ และเท้า</label>
                    </li>
                </ul>

                <h3 id="question-other">10.อาการอื่นๆ (สามารถเลือกตอบได้มากกว่า 1 ข้อ)</h3>
                <ul>
                    <li>
                        <input type="checkbox" name="other[]" id="ไม่เพิ่ม" value="ไม่มีอาการอื่น" class="ans">
                        <label for="ไม่เพิ่ม">ไม่มีอาการเพิ่มเติม</label>
                    </li>
                    <li>
                        <input type="checkbox" name="other[]" id="ไอ" value="ไอ" class="ans">
                        <label for="ไอ">ไอ</label>
                    </li>
                    <li>
                        <input type="checkbox" name="other[]" id="หายใจถี่" value="หายใจถี่" class="ans">
                        <label for="หายใจถี่">หายใจลำบาก / ถี่</label>
                    </li>
                    <li>
                        <input type="checkbox" name="other[]" id="แผลปาก" value="แผลในปาก" class="ans">
                        <label for="แผลปาก">แผลในปาก</label>
                    </li>
                    <li>
                        <input type="checkbox" name="other[]" id="จ้ำ" value="จ้ำเลือด" class="ans">
                        <label for="จ้ำ">รอยจ้ำเลือด</label>
                    </li>
                    <li>
                        <input type="checkbox" name="other[]" id="เบื่อ" value="เบื่ออาหาร" class="ans">
                        <label for="เบื่อ">เบื่ออาหาร</label>
                    </li>
                    <li>
                        <input type="checkbox" name="other[]" id="ต่อมน้ำเหลือง" value="ต่อมน้ำเหลืองโต" class="ans">
                        <label for="ต่อมน้ำเหลือง">ต่อมน้ำเหลืองโต</label>
                    </li>
                    <li>
                        <input type="checkbox" name="other[]" id="ตุ่มตา" value="ตุ่มบริเวณดวงตา" class="ans">
                        <label for="ตุ่มตา">ตุ่มบริเวณดวงตา</label>
                    </li>
                    <li>
                        <input type="checkbox" name="other[]" id="ตุ่ม" value="ตุ่มบริเวณอวัยวะเพศ" class="ans">
                        <label for="ตุ่ม">ตุ่มบริเวณอวัยวะเพศ</label>
                    </li>
                </ul>
                <button type="submit" value="analyze" name="analyze" style="display: flex; align-items: center; margin-top: 40px">
                    <h3 style="padding-left: 60px;">วิเคราะห์</h3>
                </button>

            </form>
        </div>

    </div>
</body>

</html>