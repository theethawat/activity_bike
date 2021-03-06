@extends('layouts.app')
@section('content')


@auth


<div class="container">
<div class="card col-md-10">
<div class="card-body">

<form action="{{url('/home/confirmreg')}}" method="POST">
    <h3 class="kanit"> <i class="fas fa-user-edit"></i> ลงทะเบียนเข้าร่วมกิจกรรม  </h3><h4 class="kanit">10.28 กรกฎาคม BIKE @ เขื่อนวชิราลงกรณ </h4> <hr>
    <!--
        ----------------------------------------------
        /*------SESSION 1 ข้อมูลส่วนตัว ------------------------*/
        ----------------------------------------------
    -->
    
        <h4>ข้อมูลส่วนตัว</h4>
    
            <label>คำนำหน้าชื่อ*</label>
            <select class="form-control col-sm-3" name="regis_prefix" required>
                <option value="นาย">นาย</option>
                <option value="นาง">นาง</option>
                <option value="น.ส.">น.ส.</option>
                <option value="ด.ช.">ด.ช.</option>
                <option value="ด.ญ.">ด.ญ.</option>
            </select>
            <small>สำหรับเพศจะระบุให้อัตโนมัติจากคำนำหน้าชื่อที่บอกไว้ กรณีเป็นยศอื่น ๆ กรุณาเลือกตามเพศสภาพ และใส่ยศไว้หน้าชื่อของท่าน</small>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <label>ชื่อ*</label>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-user"></i></div>
                        </div>
                        <input type="text" name="regis_name" required class="form-control">
                    </div>
                </div>

                <div class="col-sm-6"> 
                    <label>นามสกุล*</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-friends"></i></div>
                            </div>
                            <input type="text" name="regis_surname" required class="form-control">
                        </div>
                </div>
            </div>
            <br> 
            <div class="card bg-light col-sm-6">
                <div class="card-body"> 
                <script>
                        $(document).ready(function(){
                            $("#buddist").change(function(){
                                $("#christ").html(function(){
                                    var bc = document.getElementById("buddist").value;
                                    console.log(bc);
                                    return bc-543;
                                });
                            });
                        });
                    </script>
                    <h5>เครื่องช่วยคำนวนการแปลงปี พ.ศ.เป็น ค.ศ. </h5>
                    <label>ใส่เลขปี พ.ศ. (Optional)</label>
                    <input  class="form-control col-sm-6"  type="number" value="2501"  id="buddist" >
                    <p >ปี ค.ศ. <span id="christ">1958</span> </p>
                    <small>ถ้าใส่โดยการพิมพ์ แล้วยังไม่เห็นผล พิมพ์เสร็จให้กด Enter หรือคลิกที่อื่นใดก็ได้ เพื่อให้ผลเปลี่ยนแปลง</small>
                   
                </div>
            </div>
            <br>
            <div class="row">
                <!-- <div class="col-sm-4">
                    <label>เพศ*</label>
                    <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-mars"></i></div>
                            </div>
                            <select class="form-control " name="regis_sex" required>
                                <option value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                            </select>
                        </div>
                </div> -->
               
                <div class="col-sm-4">
                    <label>วันเกิด(เดือน/วัน/ปี)*</label>
                    <div class="input-group mb-2 mr-sm-2">

                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                            </div> 
                                
                            <input type="date" id="datepicker" class="form-control"  name="regis_date" required > 
                            <script>
                            $( function() {
                                $("#datepicker").datepicker();
                             } );
                             </script>
                        </div>
                    
                    
                </div>
                <div class="col-sm-4">
                    <label>หมายเลขโทรศัพท์*  </label>
                    <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-phone-alt"></i></div>
                            </div>
                            <input type="text" name="regis_call" required class="form-control ">
                        </div>
                    
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <label>หมายเลขบัตรประชาชน หรือ หมายเลขหนังสือเดินทาง (Optional) </label>
                    <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                            </div>
                            <input type="text" name="regis_peopleid" class="form-control ">
                        </div>
                    
                </div>
                
                <div class="col-sm-6">
                    <label>อีเมล (Optional) </label>
                    <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-envelope"></i></div>
                            </div>
                            <input type="email" name="regis_email"  class="form-control ">
                        </div>
                    
                </div>
            </div>
    <hr>
 <!--
        ----------------------------------------------
        /*------SESSION 2 ที่อยู่ ------------------------*/
        ----------------------------------------------
    -->
    <h4>ที่อยู่</h4>
    <label>ที่อยู่ (Optional)</label>
    <textarea  name="regis_address"  class="form-control" rows="3" required> - </textarea>
     <label>จังหวัด*</label>

    <select name="regis_province" class="form-control">
      <option value="" >--------- เลือกจังหวัด ---------</option>
      <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
      <option value="กระบี่">กระบี่ </option>
      <option value="กาญจนบุรี" selected >กาญจนบุรี </option>
      <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
      <option value="กำแพงเพชร">กำแพงเพชร </option>
      <option value="ขอนแก่น">ขอนแก่น</option>
      <option value="จันทบุรี">จันทบุรี</option>
      <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
      <option value="ชัยนาท">ชัยนาท </option>
      <option value="ชัยภูมิ">ชัยภูมิ </option>
      <option value="ชุมพร">ชุมพร </option>
      <option value="ชลบุรี">ชลบุรี </option>
      <option value="เชียงใหม่">เชียงใหม่ </option>
      <option value="เชียงราย">เชียงราย </option>
      <option value="ตรัง">ตรัง </option>
      <option value="ตราด">ตราด </option>
      <option value="ตาก">ตาก </option>
      <option value="นครนายก">นครนายก </option>
      <option value="นครปฐม">นครปฐม </option>
      <option value="นครพนม">นครพนม </option>
      <option value="นครราชสีมา">นครราชสีมา </option>
      <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
      <option value="นครสวรรค์">นครสวรรค์ </option>
      <option value="นราธิวาส">นราธิวาส </option>
      <option value="น่าน">น่าน </option>
      <option value="นนทบุรี">นนทบุรี </option>
      <option value="บึงกาฬ">บึงกาฬ</option>
      <option value="บุรีรัมย์">บุรีรัมย์</option>
      <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
      <option value="ปทุมธานี">ปทุมธานี </option>
      <option value="ปราจีนบุรี">ปราจีนบุรี </option>
      <option value="ปัตตานี">ปัตตานี </option>
      <option value="พะเยา">พะเยา </option>
      <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
      <option value="พังงา">พังงา </option>
      <option value="พิจิตร">พิจิตร </option>
      <option value="พิษณุโลก">พิษณุโลก </option>
      <option value="เพชรบุรี">เพชรบุรี </option>
      <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
      <option value="แพร่">แพร่ </option>
      <option value="พัทลุง">พัทลุง </option>
      <option value="ภูเก็ต">ภูเก็ต </option>
      <option value="มหาสารคาม">มหาสารคาม </option>
      <option value="มุกดาหาร">มุกดาหาร </option>
      <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
      <option value="ยโสธร">ยโสธร </option>
      <option value="ยะลา">ยะลา </option>
      <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
      <option value="ระนอง">ระนอง </option>
      <option value="ระยอง">ระยอง </option>
      <option value="ราชบุรี">ราชบุรี</option>
      <option value="ลพบุรี">ลพบุรี </option>
      <option value="ลำปาง">ลำปาง </option>
      <option value="ลำพูน">ลำพูน </option>
      <option value="เลย">เลย </option>
      <option value="ศรีสะเกษ">ศรีสะเกษ</option>
      <option value="สกลนคร">สกลนคร</option>
      <option value="สงขลา">สงขลา </option>
      <option value="สมุทรสาคร">สมุทรสาคร </option>
      <option value="สมุทรปราการ">สมุทรปราการ </option>
      <option value="สมุทรสงคราม">สมุทรสงคราม </option>
      <option value="สระแก้ว">สระแก้ว </option>
      <option value="สระบุรี">สระบุรี </option>
      <option value="สิงห์บุรี">สิงห์บุรี </option>
      <option value="สุโขทัย">สุโขทัย </option>
      <option value="สุพรรณบุรี">สุพรรณบุรี </option>
      <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
      <option value="สุรินทร์">สุรินทร์ </option>
      <option value="สตูล">สตูล </option>
      <option value="หนองคาย">หนองคาย </option>
      <option value="หนองบัวลำภู">หนองบัวลำภู </option>
      <option value="อำนาจเจริญ">อำนาจเจริญ </option>
      <option value="อุดรธานี">อุดรธานี </option>
      <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
      <option value="อุทัยธานี">อุทัยธานี </option>
      <option value="อุบลราชธานี">อุบลราชธานี</option>
      <option value="อ่างทอง">อ่างทอง </option>
</select>
     <label>สัญชาติ*</label>
    <input type="text" name="regis_nationality" required class="form-control" value="ไทย">

    <label>ประเทศ*</label>
    <select  name="regis_country" class="form-control">
        <option value="Afghanistan">Afghanistan</option>
        <option value="Åland Islands">Åland Islands</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
             <option value="Antigua and Barbuda">Antigua and Barbuda</option>
             <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan, Republic of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option selected value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
    </select>
 <!--
        ----------------------------------------------
        /*------SESSION 3 ทีม และ ข้อมูลติดต่อ ------------------------*/
        ----------------------------------------------
    -->
        <hr>
        <h4>ทีมที่ลงแข่งขัน </h4>
        <label>ชื่อทีม (Optional)</label>
        <input type="text" class="form-control" name="regis_team">
        <label>ชื่อผู้ติดต่อเร่งด่วน (Optional)</label>
        <input type="text" class="form-control" name="regis_contact">
        <label>หมายเลขโทรศัพท์ของผู้ติดต่อเร่งด่วน (Optional)</label>
        <input type="text" class="form-control" name="regis_contactcall">
        <hr>



         <!--
        ----------------------------------------------
        /*------SESSION 4 การบริจาคเงิน ------------------------*/
        ----------------------------------------------
    -->
        <h4>การบริจาคเงิน </h4>
        <label>ร่วมบริจาค*</label><br>
		<ul>
		 <input type="radio" id="selectmillion" name="regis_donation" class="form-check-input" value="1000000"> 1,000,000 บาท <br>
		 <input type="radio" id="selectthousand" name="regis_donation" class="form-check-input" value="5000"> 5,000 บาท <br>
		 <input type="radio" id="selecthundred" name="regis_donation" class="form-check-input" value="500" checked> 500 บาท <br>
		 <input type="radio" id="selecthother1" name="regis_donation" class="form-check-input" value="5000"> 5,001 - 999,999บาท <br>
		 <input type="radio" id="selecthother2" name="regis_donation" class="form-check-input" value="1000000">  มากกว่า 1,000,000 บาท <br>
        </ul>
	

        <br>
        <div class="card bg-light" id="donatemore" style="display:none;">
            <div class="card-body">
            <h5>สำหรับผู้ที่บริจาคมากกว่าจำนวนเงิน</h5>
				<div class="alert alert-danger">
					<h5> ถ้ามีการใส่ ต้องใส่ข้อมูลทั้งตัวเลขและตัวอักษร  เท่านั้น</h5>
				</div>
                <label>จำนวนเงินเป็นตัวเลขและตัวอักษร<strong> กรณีบริจาคมากกว่าที่กำหนด (ถ้ามีการใส่ โปรดใส่ทั้งคู่)</strong></label>
                    <div class="row" id="optional_donation" >
                        <div class="col-sm-6">
                            <label>จำนวนเงินเป็นตัวเลข</label>
                            <input type="number" name="money_numberic"  class="form-control">
                        </div>

                        <div class="col-sm-6">
                            <label>จำนวนเงินเป็นตัวอักษร</label>
                            <input type="text" name="money_alphabet" class="form-control" placeholder="เช่น ห้าพันสองร้อยบาทถ้วน หรือ สองล้านบาทถ้วน">
                        </div>
                    </div>
            </div>
        </div>
		<script>
		$(document).ready(function(){
			$("#selecthother1").on("click",function(){
				$("#donatemore").show();
			});
			$("#selecthother2").on("click",function(){
				$("#donatemore").show();
			});
			$("#selectmillion").on("click",function(){
				$("#donatemore").hide();
			});
			$("#selectthousand").on("click",function(){
				$("#donatemore").hide();
			});
			$("#selecthundred").on("click",function(){
				$("#donatemore").hide();
			});
		

});
		</script>
            <br>

            <!--
        ----------------------------------------------
        /*------SESSION 5 ของที่ระลึก------------------------*/
        ----------------------------------------------
    -->
            
            <h4>ของที่ระลึก </h4>
            <label>ของที่ระลึก</label><br>
            <ul>
                <input type="checkbox" class="form-check-input" name="sou_shield" value="YES">โล่ที่ระลึก <br>
                <input type="checkbox" class="form-check-input" name="sou_medal" value="YES" checked>เหรียญที่ระลึก <br>
            </ul>
            <label>ขนาดเสื้อ*</label>
            <select class="form-control col-sm-3" name="regis_size" required>
                <option value="SS">SS (รอบอก 36 นิ้ว)</option>
                <option value="S">S (รอบอก 38 นิ้ว)</option>
                <option value="M">M (รอบอก 40 นิ้ว)</option>
                <option value="L">L (รอบอก 42 นิ้ว)</option>
                <option value="XL">XL (รอบอก 44 นิ้ว)</option>
                <option value="2XL">2XL (รอบอก 46 นิ้ว)</option>
                <option value="3XL">3XL (รอบอก 48 นิ้ว) </option>
            </select>
            <hr>

             <!--
        ----------------------------------------------
        /*------SESSION 6 สถานะการชำระเงิน  ------------------------*/
        ----------------------------------------------
    -->


            <h4>สถานะ </h4>
            <label>สถานะการชำระเงิน*</label>
            <select class="form-control col-sm-3" name="regis_status" required>
                     <option value="success">ชำระเงินแล้ว</option>
                     <option value="pending" selected>รอการชำระเงิน</option>
                   
            </select>
            <br>
			 <label>ร่วมกิจกรรม*</label>
            <select class="form-control col-sm-3" name="regis_joining" required>
                     <option value="join">ร่วมปั่นจักรยาน</option>
                     <option value="nojoin">ไม่ร่วมปั่นจักรยาน</option>
                   
            </select>
            <br>
            <label>รับเหรียญแล้ว*</label>
            <select class="form-control col-sm-3" name="regis_medal_recieve" required>
                     <option value="0" selected>ยังไม่รับเหรียญ </option>
                     <option value="1">รับเหรียญแล้ว</option>
                   
            </select>
            <br>
            <label>สถานะการรับเสื้อ ณ เวลาที่สมัคร *</label>
            <select class="form-control col-sm-3" name="regis_cloth" required>
                     <option value="1">รับเสื้อแล้ว</option>
                     <option value="0" selected>ยังไม่รับเสื้อ</option>
            </select>
            
            <?php
            $addingUser = Auth::user()->name;
            ?>
             <input type="hidden" name="input_username" value="{{$addingUser}}"> 
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> <br>
            <button type="submit" class="btn btn-primary "> ยืนยันการสมัคร </button>
</form>
</div>
</div>
</div>
@else
 กรุณาลงชื่อเข้าใช้ก่อน
@endauth

@endsection
