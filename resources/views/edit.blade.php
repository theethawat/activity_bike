@extends('layouts.app')
@section('content')


@auth


<div class="container">
<div class="card">
<div class="card-body">
<br>
<form action="{{url('/home/editreg')}}" method="POST">
<h3>แก้ไขการลงทะเบียน ไอดีที่ {{$data->id}} | {{$data->regis_name}}  {{ $data->regis_surname}}</h3>

    <label>สถานะการชำระเงิน</label>
    <?php
            $status = $data->regis_status;
            $status == "success" ? $success = "selected" : $success="";
            $status == "pending" ? $pending = "selected" : $pending="";
        ?>
        <select class="form-control col-sm-3" name="regis_status" required>
            <option value="pending" {{$pending}}>รอการชำระเงิน</option>
            <option value="success" {{$success}} >ชำระเงินแล้ว</option>
        </select>

    <label>คำนำหน้าชื่อ</label>
    <!--For Displaying the default value from database-->
    <select class="form-control col-sm-3" name="regis_prefix">
        <?php
            $data_prefix = $data->regis_prefix;
            $data_prefix == "นาย" ? $men = "selected" : $men="";
            $data_prefix == "นาง" ? $women = "selected" : $women="";
            $data_prefix == "น.ส." ? $women2 = "selected" : $women2="";
            $data_prefix == "ด.ช." ? $litmen = "selected" : $litmen="";
            $data_prefix == "ด.ญ." ? $litwomen = "selected" : $litwomen="";
        ?>
        <option value="นาย" {{$men}} >นาย</option>
        <option value="นาง" {{$women}}>นาง</option>
        <option value="น.ส." {{$women2}}>น.ส.</option>
        <option value="ด.ช." {{$litmen}}>ด.ช.</option>
        <option value="ด.ญ." {{$litwomen}}>ด.ญ.</option>
    </select>


    <label>ชื่อ</label>
        <input type="text" name="regis_name" required class="form-control" value="{{$data->regis_name}}">
    <label>นามสกุล</label>
        <input type="text" name="regis_surname" required class="form-control" value="{{$data->regis_surname}}">


    <label>เพศ</label>
    <select class="form-control col-sm-3" name="regis_sex">
        <!--It will be one to correct and make that option active-->
        <option value="ชาย" {{$men}} {{$litmen}}>ชาย</option>
        <option value="หญิง" {{$women}} {{$women2}} {{$litwomen}}>หญิง</option>
    </select>



    <label>วัน เดือน ปีเกิด (เดือน/วัน/ปี)</label>
        <input type="date" name="regis_date" required class="form-control col-sm-3" value={{ date($data->regis_date)}} >

    <label>หมายเลขบัตรประชาชน หรือ หมายเลขพาสปอร์ต</label>
        <input type="text" name="regis_peopleid" required class="form-control" value="{{$data->regis_peopleid}} ">

     <label>หมายเลขโทรศัพท์</label>
        <input type="text" name="regis_call" required class="form-control" value="{{$data->regis_call}} ">

    <label>อีเมล</label>
        <input type="text" name="regis_email"  class="form-control" value="{{$data->regis_email}} ">
    <hr>


    <label>ที่อยู่</label>
        <textarea  name="regis_address"  class="form-control" rows="3">{{$data->regis_address}}</textarea>

    <label>จังหวัด</label>
        <input type="text" name="regis_province"  class="form-control" value="{{$data->regis_province}} ">
    <label>สัญชาติ</label>
        <input type="text" name="regis_nationality" required class="form-control" value="{{$data->regis_nationality}}">

    <label>ประเทศ</label>
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
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
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

            <hr>
            <label>ชื่อทีม</label>
        <input type="text" class="form-control" name="regis_team" value="{{$data->regis_team}}">
            <label>ชื่อผู้ติดต่อเร่งด่วน</label>
            <input type="text" class="form-control" name="regis_contact" value="{{$data->regis_contact}}">
            <label>หมายเลขโทรศัพท์ของผู้ติดต่อเร่งด่วน</label>
            <input type="text" class="form-control" name="regis_contactcall"  value="{{$data->regis_contactcall}}">
            <hr>
            <label>ร่วมบริจาค</label>
            <select class="form-control col-sm-3" name="regis_donation" required >
                <?php
                    $donate = $data->regis_donation;
                    $donate == "1000000" ? $million ="selected" : $million ="";
                    $donate == "5000" ? $thousand ="selected" : $thousand ="";
                    $donate == "500" ? $hundred ="selected" : $hundred ="";

                ?>
                <option value="1000000" {{$million}} >1,000,000 บาท</option>
                <option value="5000" {{$thousand}} >5,000 บาท</option>
                <option value="500" {{$hundred}} >500 บาท</option>
            </select>
            <br>
            <div class="card">
                <div class="card-body">
                    <label>จำนวนเงินเป็นตัวเลขและตัวอักษร<strong> กรณีบริจาคมากกว่าที่กำหนด (ถ้ามีการใส่ โปรดใส่ทั้งคู่)</strong></label>
                    <div class="row" id="optional_donation" >
                        <div class="col-sm-6">
                            <label>จำนวนเงินเป็นตัวเลข</label>
                            <input type="text" name="money_numberic"  class="form-control" value="{{$data->donate_value}}">
                        </div>

                        <div class="col-sm-6">
                            <label>จำนวนเงินเป็นตัวอักษร</label>
                            <input type="text" name="money_alphabet" class="form-control"  value="{{$data->donate_alphabet}}">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <label>ของที่ระลึก</label><br>
            <ul>
                <?php
                    if($donate == "1000000" || $donate == "5000")
                        $shield = "checked";
                    else
                        $shield = "";
                ?>
                <input type="checkbox" class="form-check-input" name="sou_shield" value="YES" {{$shield}} >โล่ที่ระลึก <br>
                <input type="checkbox" class="form-check-input" name="sou_medal" value="YES" checked>เหรียญที่ระลึก <br>
            </ul>
            <label>ขนาดเสื้อ</label>
            <?php
                $size = $data->regis_size;
                $size == "SS" ?  $ss = "selected": $ss ="" ;
                $size == "S" ?  $s = "selected": $s ="" ;
                $size == "M" ?  $m = "selected": $m ="" ;
                $size == "L" ?  $l = "selected": $l ="" ;
                $size == "XL" ?  $xl = "selected": $xl ="" ;
                $size == "2XL" ?  $xl2 = "selected": $xl2 ="" ;
                $size == "3XL" ?  $xl3 = "selected": $xl3 ="" ;
            ?>
            <select class="form-control" name="regis_size" required>
                <option value="SS" {{$ss}}>SS (รอบอก 36 นิ้ว)</option>
                <option value="S" {{$s}}>S (รอบอก 38 นิ้ว)</option>
                <option value="M"{{$m}}>M (รอบอก 40 นิ้ว)</option>
                <option value="L" {{$l}}>L (รอบอก 42 นิ้ว)</option>
                <option value="XL" {{$xl}}>XL (รอบอก 44 นิ้ว)</option>
                <option value="2XL" {{$xl2}}>2XL (รอบอก 46 นิ้ว)</option>
                <option value="3XL" {{$xl3}}>3XL (รอบอก 48 นิ้ว) </option>
            </select>
            <hr>
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="regis_id" value="{{$data->id}}">
            <input type="hidden" name="bib_status" value="{{$data->bib_id}}">
            <p>โปรดตรวจสอบข้อมูลให้แน่นอนก่อนการยืนยัน</p>
            <button type="submit" class="btn btn-primary "> ยืนยันการแก้ไขข้อมูล </button>
</form>
</div>
</div>
</div>
@else
 กรุณาลงชื่อเข้าใช้ก่อน
@endauth

@endsection
