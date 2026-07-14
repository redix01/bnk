@extends('admin.layouts.app')
@section('content')

<main id="main-container">

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Edit Info</h1>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Layouts -->
        <div class="block block-rounded">
            <a href="{{ route('admin.user_details', $user_details->id) }}" class="btn btn-secondary m-3">View Profile</a>
            <div class="block-header block-header-default">
                <h3 class="block-title text-center">Personal Info</h3>
            </div>
            <div class="block-content">
                <!-- Inline Layout -->
                <div class="row">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-lg-12 space-y-2">
                        <!-- Form Inline - Alternative Style -->
                        <form class="row row-cols-lg-auto g-3 align-items-center" action="{{ route('admin.update_user', $user_details->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Title</label>
                                <select class="form-control" name="title" id="">
                                    <option selected disabled>Choose Title</option>
                                    <option value="Mr" {{ $user_details->title == 'Mr' ? 'selected' : '' }}>Mr</option>
                                    <option value="Mrs" {{ $user_details->title == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                    <option value="Miss" {{ $user_details->title == 'Miss' ? 'selected' : '' }}>Miss</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">First Name</label>
                                <input value="{{ old('first_name', optional($user_details)->first_name)  }}" type="text" class="form-control form-control-alt"  id="example-if-email2" name="first_name" >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Last Name</label>
                                <input value="{{ old('last_name', optional($user_details)->last_name ) }}" type="text" class="form-control form-control-alt" id="example-if-email2" name="last_name" >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Email</label>
                                <input value="{{ old('email', optional($user_details)->email) }}" type="email" class="form-control form-control-alt" id="example-if-email2" name="email" >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Country Code</label>
                                <select name="country_code" id="" class="form-control">
                                    <option selected disabled>Country Code</option>
                                    <option data-countryCode="GB" value="44" {{ $user_details->country_code == '44' ? 'selected' : '' }}>UK (+44)</option>
                                    <option data-countryCode="US" value="1" {{ $user_details->country_code == '1' ? 'selected' : '' }}>USA (+1)</option>
                                    <optgroup label="Other countries">
                                        <option data-countryCode="DZ" value="213" {{ $user_details->country_code == '213' ? 'selected' : '' }}>Algeria (+213)</option>
                                        <option data-countryCode="AD" value="376" {{ $user_details->country_code == '376' ? 'selected' : '' }}>Andorra (+376)</option>
                                        <option data-countryCode="AO" value="244" {{ $user_details->country_code == '244' ? 'selected' : '' }}>Angola (+244)</option>
                                        <option data-countryCode="AI" value="1264" {{ $user_details->country_code == '1264' ? 'selected' : '' }}>Anguilla (+1264)</option>
                                        <option data-countryCode="AG" value="1268" {{ $user_details->country_code == '1268' ? 'selected' : '' }}>Antigua &amp; Barbuda (+1268)</option>
                                        <option data-countryCode="AR" value="54" {{ $user_details->country_code == '54' ? 'selected' : '' }}>Argentina (+54)</option>
                                        <option data-countryCode="AM" value="374" {{ $user_details->country_code == '374' ? 'selected' : '' }}>Armenia (+374)</option>
                                        <option data-countryCode="AW" value="297" {{ $user_details->country_code == '297' ? 'selected' : '' }}>Aruba (+297)</option>
                                        <option data-countryCode="AU" value="61" {{ $user_details->country_code == '61' ? 'selected' : '' }}>Australia (+61)</option>
                                        <option data-countryCode="AT" value="43" {{ $user_details->country_code == '43' ? 'selected' : '' }}>Austria (+43)</option>
                                        <option data-countryCode="AZ" value="994" {{ $user_details->country_code == '994' ? 'selected' : '' }}>Azerbaijan (+994)</option>
                                        <option data-countryCode="BS" value="1242" {{ $user_details->country_code == '1242' ? 'selected' : '' }}>Bahamas (+1242)</option>
                                        <option data-countryCode="BH" value="973" {{ $user_details->country_code == '973' ? 'selected' : '' }}>Bahrain (+973)</option>
                                        <option data-countryCode="BD" value="880" {{ $user_details->country_code == '880' ? 'selected' : '' }}>Bangladesh (+880)</option>
                                        <option data-countryCode="BB" value="1246" {{ $user_details->country_code == '1246' ? 'selected' : '' }}>Barbados (+1246)</option>
                                        <option data-countryCode="BY" value="375" {{ $user_details->country_code == '375' ? 'selected' : '' }}>Belarus (+375)</option>
                                        <option data-countryCode="BE" value="32" {{ $user_details->country_code == '32' ? 'selected' : '' }}>Belgium (+32)</option>
                                        <option data-countryCode="BZ" value="501" {{ $user_details->country_code == '501' ? 'selected' : '' }}>Belize (+501)</option>
                                        <option data-countryCode="BJ" value="229" {{ $user_details->country_code == '229' ? 'selected' : '' }}>Benin (+229)</option>
                                        <option data-countryCode="BM" value="1441" {{ $user_details->country_code == '1441' ? 'selected' : '' }}>Bermuda (+1441)</option>
                                        <option data-countryCode="BT" value="975" {{ $user_details->country_code == '975' ? 'selected' : '' }}>Bhutan (+975)</option>
                                        <option data-countryCode="BO" value="591" {{ $user_details->country_code == '591' ? 'selected' : '' }}>Bolivia (+591)</option>
                                        <option data-countryCode="BA" value="387" {{ $user_details->country_code == '387' ? 'selected' : '' }}>Bosnia Herzegovina (+387)</option>
                                        <option data-countryCode="BW" value="267" {{ $user_details->country_code == '267' ? 'selected' : '' }}>Botswana (+267)</option>
                                        <option data-countryCode="BR" value="55" {{ $user_details->country_code == '55' ? 'selected' : '' }}>Brazil (+55)</option>
                                        <option data-countryCode="BN" value="673" {{ $user_details->country_code == '673' ? 'selected' : '' }}>Brunei (+673)</option>
                                        <option data-countryCode="BG" value="359" {{ $user_details->country_code == '359' ? 'selected' : '' }}>Bulgaria (+359)</option>
                                        <option data-countryCode="BF" value="226" {{ $user_details->country_code == '226' ? 'selected' : '' }}>Burkina Faso (+226)</option>
                                        <option data-countryCode="BI" value="257" {{ $user_details->country_code == '257' ? 'selected' : '' }}>Burundi (+257)</option>
                                        <option data-countryCode="KH" value="855" {{ $user_details->country_code == '855' ? 'selected' : '' }}>Cambodia (+855)</option>
                                        <option data-countryCode="CM" value="237" {{ $user_details->country_code == '237' ? 'selected' : '' }}>Cameroon (+237)</option>
                                        <option data-countryCode="CA" value="1" {{ $user_details->country_code == '1' ? 'selected' : '' }}>Canada (+1)</option>
                                        <option data-countryCode="CV" value="238" {{ $user_details->country_code == '238' ? 'selected' : '' }}>Cape Verde Islands (+238)</option>
                                        <option data-countryCode="KY" value="1345" {{ $user_details->country_code == '1345' ? 'selected' : '' }}>Cayman Islands (+1345)</option>
                                        <option data-countryCode="CF" value="236" {{ $user_details->country_code == '236' ? 'selected' : '' }}>Central African Republic (+236)</option>
                                        <option data-countryCode="CL" value="56" {{ $user_details->country_code == '56' ? 'selected' : '' }}>Chile (+56)</option>
                                        <option data-countryCode="CN" value="86" {{ $user_details->country_code == '86' ? 'selected' : '' }}>China (+86)</option>
                                        <option data-countryCode="CO" value="57" {{ $user_details->country_code == '57' ? 'selected' : '' }}>Colombia (+57)</option>
                                        <option data-countryCode="KM" value="269" {{ $user_details->country_code == '269' ? 'selected' : '' }}>Comoros (+269)</option>
                                        <option data-countryCode="CG" value="242" {{ $user_details->country_code == '242' ? 'selected' : '' }}>Congo (+242)</option>
                                        <option data-countryCode="CK" value="682" {{ $user_details->country_code == '682' ? 'selected' : '' }}>Cook Islands (+682)</option>
                                        <option data-countryCode="HR" value="385" {{ $user_details->country_code == '385' ? 'selected' : '' }}>Croatia (+385)</option>
                                        <option data-countryCode="CU" value="53" {{ $user_details->country_code == '53' ? 'selected' : '' }}>Cuba (+53)</option>
                                        <option data-countryCode="CY" value="90392" {{ $user_details->country_code == '90392' ? 'selected' : '' }}>Cyprus North (+90392)</option>
                                        <option data-countryCode="CY" value="357" {{ $user_details->country_code == '357' ? 'selected' : '' }}>Cyprus South (+357)</option>
                                        <option data-countryCode="CZ" value="42" {{ $user_details->country_code == '42' ? 'selected' : '' }}>Czech Republic (+42)</option>
                                        <option data-countryCode="DK" value="45" {{ $user_details->country_code == '45' ? 'selected' : '' }}>Denmark (+45)</option>
                                        <option data-countryCode="DJ" value="253" {{ $user_details->country_code == '253' ? 'selected' : '' }}>Djibouti (+253)</option>
                                        <option data-countryCode="DM" value="1809" {{ $user_details->country_code == '1809' ? 'selected' : '' }}>Dominica (+1809)</option>
                                        <option data-countryCode="DO" value="1809" {{ $user_details->country_code == '1809' ? 'selected' : '' }}>Dominican Republic (+1809)</option>
                                        <option data-countryCode="EC" value="593" {{ $user_details->country_code == '593' ? 'selected' : '' }}>Ecuador (+593)</option>
                                        <option data-countryCode="EG" value="20" {{ $user_details->country_code == '20' ? 'selected' : '' }}>Egypt (+20)</option>
                                        <option data-countryCode="SV" value="503" {{ $user_details->country_code == '503' ? 'selected' : '' }}>El Salvador (+503)</option>
                                        <option data-countryCode="GQ" value="240" {{ $user_details->country_code == '240' ? 'selected' : '' }}>Equatorial Guinea (+240)</option>
                                        <option data-countryCode="ER" value="291" {{ $user_details->country_code == '291' ? 'selected' : '' }}>Eritrea (+291)</option>
                                        <option data-countryCode="EE" value="372" {{ $user_details->country_code == '372' ? 'selected' : '' }}>Estonia (+372)</option>
                                        <option data-countryCode="ET" value="251" {{ $user_details->country_code == '251' ? 'selected' : '' }}>Ethiopia (+251)</option>
                                        <option data-countryCode="FK" value="500" {{ $user_details->country_code == '500' ? 'selected' : '' }}>Falkland Islands (+500)</option>
                                        <option data-countryCode="FO" value="298" {{ $user_details->country_code == '298' ? 'selected' : '' }}>Faroe Islands (+298)</option>
                                        <option data-countryCode="FJ" value="679" {{ $user_details->country_code == '679' ? 'selected' : '' }}>Fiji (+679)</option>
                                        <option data-countryCode="FI" value="358" {{ $user_details->country_code == '358' ? 'selected' : '' }}>Finland (+358)</option>
                                        <option data-countryCode="FR" value="33" {{ $user_details->country_code == '33' ? 'selected' : '' }}>France (+33)</option>
                                        <option data-countryCode="GF" value="594" {{ $user_details->country_code == '594' ? 'selected' : '' }}>French Guiana (+594)</option>
                                        <option data-countryCode="PF" value="689" {{ $user_details->country_code == '689' ? 'selected' : '' }}>French Polynesia (+689)</option>
                                        <option data-countryCode="GA" value="241" {{ $user_details->country_code == '241' ? 'selected' : '' }}>Gabon (+241)</option>
                                        <option data-countryCode="GM" value="220" {{ $user_details->country_code == '220' ? 'selected' : '' }}>Gambia (+220)</option>
                                        <option data-countryCode="GE" value="7880" {{ $user_details->country_code == '7880' ? 'selected' : '' }}>Georgia (+7880)</option>
                                        <option data-countryCode="DE" value="49" {{ $user_details->country_code == '49' ? 'selected' : '' }}>Germany (+49)</option>
                                        <option data-countryCode="GH" value="233" {{ $user_details->country_code == '233' ? 'selected' : '' }}>Ghana (+233)</option>
                                        <option data-countryCode="GI" value="350" {{ $user_details->country_code == '350' ? 'selected' : '' }}>Gibraltar (+350)</option>
                                        <option data-countryCode="GR" value="30" {{ $user_details->country_code == '30' ? 'selected' : '' }}>Greece (+30)</option>
                                        <option data-countryCode="GL" value="299" {{ $user_details->country_code == '299' ? 'selected' : '' }}>Greenland (+299)</option>
                                        <option data-countryCode="GD" value="1473" {{ $user_details->country_code == '1473' ? 'selected' : '' }}>Grenada (+1473)</option>
                                        <option data-countryCode="GP" value="590" {{ $user_details->country_code == '590' ? 'selected' : '' }}>Guadeloupe (+590)</option>
                                        <option data-countryCode="GU" value="671" {{ $user_details->country_code == '671' ? 'selected' : '' }}>Guam (+671)</option>
                                        <option data-countryCode="GT" value="502" {{ $user_details->country_code == '502' ? 'selected' : '' }}>Guatemala (+502)</option>
                                        <option data-countryCode="GN" value="224" {{ $user_details->country_code == '224' ? 'selected' : '' }}>Guinea (+224)</option>
                                        <option data-countryCode="GW" value="245" {{ $user_details->country_code == '245' ? 'selected' : '' }}>Guinea - Bissau (+245)</option>
                                        <option data-countryCode="GY" value="592" {{ $user_details->country_code == '592' ? 'selected' : '' }}>Guyana (+592)</option>
                                        <option data-countryCode="HT" value="509" {{ $user_details->country_code == '509' ? 'selected' : '' }}>Haiti (+509)</option>
                                        <option data-countryCode="HN" value="504" {{ $user_details->country_code == '504' ? 'selected' : '' }}>Honduras (+504)</option>
                                        <option data-countryCode="HK" value="852" {{ $user_details->country_code == '852' ? 'selected' : '' }}>Hong Kong (+852)</option>
                                        <option data-countryCode="HU" value="36" {{ $user_details->country_code == '36' ? 'selected' : '' }}>Hungary (+36)</option>
                                        <option data-countryCode="IS" value="354" {{ $user_details->country_code == '354' ? 'selected' : '' }}>Iceland (+354)</option>
                                        <option data-countryCode="IN" value="91" {{ $user_details->country_code == '91' ? 'selected' : '' }}>India (+91)</option>
                                        <option data-countryCode="ID" value="62" {{ $user_details->country_code == '62' ? 'selected' : '' }}>Indonesia (+62)</option>
                                        <option data-countryCode="IR" value="98" {{ $user_details->country_code == '98' ? 'selected' : '' }}>Iran (+98)</option>
                                        <option data-countryCode="IQ" value="964" {{ $user_details->country_code == '964' ? 'selected' : '' }}>Iraq (+964)</option>
                                        <option data-countryCode="IE" value="353" {{ $user_details->country_code == '353' ? 'selected' : '' }}>Ireland (+353)</option>
                                        <option data-countryCode="IL" value="972" {{ $user_details->country_code == '972' ? 'selected' : '' }}>Israel (+972)</option>
                                        <option data-countryCode="IT" value="39" {{ $user_details->country_code == '39' ? 'selected' : '' }}>Italy (+39)</option>
                                        <option data-countryCode="JM" value="1876" {{ $user_details->country_code == '1876' ? 'selected' : '' }}>Jamaica (+1876)</option>
                                        <option data-countryCode="JP" value="81" {{ $user_details->country_code == '81' ? 'selected' : '' }}>Japan (+81)</option>
                                        <option data-countryCode="JO" value="962" {{ $user_details->country_code == '962' ? 'selected' : '' }}>Jordan (+962)</option>
                                        <option data-countryCode="KZ" value="7" {{ $user_details->country_code == '7' ? 'selected' : '' }}>Kazakhstan (+7)</option>
                                        <option data-countryCode="KE" value="254" {{ $user_details->country_code == '254' ? 'selected' : '' }}>Kenya (+254)</option>
                                        <option data-countryCode="KI" value="686" {{ $user_details->country_code == '686' ? 'selected' : '' }}>Kiribati (+686)</option>
                                        <option data-countryCode="KP" value="850" {{ $user_details->country_code == '850' ? 'selected' : '' }}>Korea North (+850)</option>
                                        <option data-countryCode="KR" value="82" {{ $user_details->country_code == '82' ? 'selected' : '' }}>Korea South (+82)</option>
                                        <option data-countryCode="KW" value="965" {{ $user_details->country_code == '965' ? 'selected' : '' }}>Kuwait (+965)</option>
                                        <option data-countryCode="KG" value="996" {{ $user_details->country_code == '996' ? 'selected' : '' }}>Kyrgyzstan (+996)</option>
                                        <option data-countryCode="LA" value="856" {{ $user_details->country_code == '856' ? 'selected' : '' }}>Laos (+856)</option>
                                        <option data-countryCode="LV" value="371" {{ $user_details->country_code == '371' ? 'selected' : '' }}>Latvia (+371)</option>
                                        <option data-countryCode="LB" value="961" {{ $user_details->country_code == '961' ? 'selected' : '' }}>Lebanon (+961)</option>
                                        <option data-countryCode="LS" value="266" {{ $user_details->country_code == '266' ? 'selected' : '' }}>Lesotho (+266)</option>
                                        <option data-countryCode="LR" value="231" {{ $user_details->country_code == '231' ? 'selected' : '' }}>Liberia (+231)</option>
                                        <option data-countryCode="LY" value="218" {{ $user_details->country_code == '218' ? 'selected' : '' }}>Libya (+218)</option>
                                        <option data-countryCode="LI" value="417" {{ $user_details->country_code == '417' ? 'selected' : '' }}>Liechtenstein (+417)</option>
                                        <option data-countryCode="LT" value="370" {{ $user_details->country_code == '370' ? 'selected' : '' }}>Lithuania (+370)</option>
                                        <option data-countryCode="LU" value="352" {{ $user_details->country_code == '352' ? 'selected' : '' }}>Luxembourg (+352)</option>
                                        <option data-countryCode="MO" value="853" {{ $user_details->country_code == '853' ? 'selected' : '' }}>Macao (+853)</option>
                                        <option data-countryCode="MK" value="389" {{ $user_details->country_code == '389' ? 'selected' : '' }}>Macedonia (+389)</option>
                                        <option data-countryCode="MG" value="261" {{ $user_details->country_code == '261' ? 'selected' : '' }}>Madagascar (+261)</option>
                                        <option data-countryCode="MW" value="265" {{ $user_details->country_code == '265' ? 'selected' : '' }}>Malawi (+265)</option>
                                        <option data-countryCode="MY" value="60" {{ $user_details->country_code == '60' ? 'selected' : '' }}>Malaysia (+60)</option>
                                        <option data-countryCode="MV" value="960" {{ $user_details->country_code == '960' ? 'selected' : '' }}>Maldives (+960)</option>
                                        <option data-countryCode="ML" value="223" {{ $user_details->country_code == '223' ? 'selected' : '' }}>Mali (+223)</option>
                                        <option data-countryCode="MT" value="356" {{ $user_details->country_code == '356' ? 'selected' : '' }}>Malta (+356)</option>
                                        <option data-countryCode="MH" value="692" {{ $user_details->country_code == '692' ? 'selected' : '' }}>Marshall Islands (+692)</option>
                                        <option data-countryCode="MQ" value="596" {{ $user_details->country_code == '596' ? 'selected' : '' }}>Martinique (+596)</option>
                                        <option data-countryCode="MR" value="222" {{ $user_details->country_code == '222' ? 'selected' : '' }}>Mauritania (+222)</option>
                                        <option data-countryCode="YT" value="269" {{ $user_details->country_code == '269' ? 'selected' : '' }}>Mayotte (+269)</option>
                                        <option data-countryCode="MX" value="52" {{ $user_details->country_code == '52' ? 'selected' : '' }}>Mexico (+52)</option>
                                        <option data-countryCode="FM" value="691" {{ $user_details->country_code == '691' ? 'selected' : '' }}>Micronesia (+691)</option>
                                        <option data-countryCode="MD" value="373" {{ $user_details->country_code == '373' ? 'selected' : '' }}>Moldova (+373)</option>
                                        <option data-countryCode="MC" value="377" {{ $user_details->country_code == '377' ? 'selected' : '' }}>Monaco (+377)</option>
                                        <option data-countryCode="MN" value="976" {{ $user_details->country_code == '976' ? 'selected' : '' }}>Mongolia (+976)</option>
                                        <option data-countryCode="MS" value="1664" {{ $user_details->country_code == '1664' ? 'selected' : '' }}>Montserrat (+1664)</option>
                                        <option data-countryCode="MA" value="212" {{ $user_details->country_code == '212' ? 'selected' : '' }}>Morocco (+212)</option>
                                        <option data-countryCode="MZ" value="258" {{ $user_details->country_code == '258' ? 'selected' : '' }}>Mozambique (+258)</option>
                                        <option data-countryCode="MN" value="95" {{ $user_details->country_code == '95' ? 'selected' : '' }}>Myanmar (+95)</option>
                                        <option data-countryCode="NA" value="264" {{ $user_details->country_code == '264' ? 'selected' : '' }}>Namibia (+264)</option>
                                        <option data-countryCode="NR" value="674" {{ $user_details->country_code == '674' ? 'selected' : '' }}>Nauru (+674)</option>
                                        <option data-countryCode="NP" value="977" {{ $user_details->country_code == '977' ? 'selected' : '' }}>Nepal (+977)</option>
                                        <option data-countryCode="NL" value="31" {{ $user_details->country_code == '31' ? 'selected' : '' }}>Netherlands (+31)</option>
                                        <option data-countryCode="NC" value="687" {{ $user_details->country_code == '687' ? 'selected' : '' }}>New Caledonia (+687)</option>
                                        <option data-countryCode="NZ" value="64" {{ $user_details->country_code == '64' ? 'selected' : '' }}>New Zealand (+64)</option>
                                        <option data-countryCode="NI" value="505" {{ $user_details->country_code == '505' ? 'selected' : '' }}>Nicaragua (+505)</option>
                                        <option data-countryCode="NE" value="227" {{ $user_details->country_code == '227' ? 'selected' : '' }}>Niger (+227)</option>
                                        <option data-countryCode="NG" value="234" {{ $user_details->country_code == '234' ? 'selected' : '' }}>Nigeria (+234)</option>
                                        <option data-countryCode="NU" value="683" {{ $user_details->country_code == '683' ? 'selected' : '' }}>Niue (+683)</option>
                                        <option data-countryCode="NF" value="672" {{ $user_details->country_code == '672' ? 'selected' : '' }}>Norfolk Islands (+672)</option>
                                        <option data-countryCode="NP" value="670" {{ $user_details->country_code == '670' ? 'selected' : '' }}>Northern Marianas (+670)</option>
                                        <option data-countryCode="NO" value="47" {{ $user_details->country_code == '47' ? 'selected' : '' }}>Norway (+47)</option>
                                        <option data-countryCode="OM" value="968" {{ $user_details->country_code == '968' ? 'selected' : '' }}>Oman (+968)</option>
                                        <option data-countryCode="PW" value="680" {{ $user_details->country_code == '680' ? 'selected' : '' }}>Palau (+680)</option>
                                        <option data-countryCode="PA" value="507" {{ $user_details->country_code == '507' ? 'selected' : '' }}>Panama (+507)</option>
                                        <option data-countryCode="PG" value="675" {{ $user_details->country_code == '675' ? 'selected' : '' }}>Papua New Guinea (+675)</option>
                                        <option data-countryCode="PY" value="595" {{ $user_details->country_code == '595' ? 'selected' : '' }}>Paraguay (+595)</option>
                                        <option data-countryCode="PE" value="51" {{ $user_details->country_code == '51' ? 'selected' : '' }}>Peru (+51)</option>
                                        <option data-countryCode="PH" value="63" {{ $user_details->country_code == '63' ? 'selected' : '' }}>Philippines (+63)</option>
                                        <option data-countryCode="PL" value="48" {{ $user_details->country_code == '48' ? 'selected' : '' }}>Poland (+48)</option>
                                        <option data-countryCode="PT" value="351" {{ $user_details->country_code == '351' ? 'selected' : '' }}>Portugal (+351)</option>
                                        <option data-countryCode="PR" value="1787" {{ $user_details->country_code == '1787' ? 'selected' : '' }}>Puerto Rico (+1787)</option>
                                        <option data-countryCode="QA" value="974" {{ $user_details->country_code == '974' ? 'selected' : '' }}>Qatar (+974)</option>
                                        <option data-countryCode="RE" value="262" {{ $user_details->country_code == '262' ? 'selected' : '' }}>Reunion (+262)</option>
                                        <option data-countryCode="RO" value="40" {{ $user_details->country_code == '40' ? 'selected' : '' }}>Romania (+40)</option>
                                        <option data-countryCode="RU" value="7" {{ $user_details->country_code == '7' ? 'selected' : '' }}>Russia (+7)</option>
                                        <option data-countryCode="RW" value="250" {{ $user_details->country_code == '250' ? 'selected' : '' }}>Rwanda (+250)</option>
                                        <option data-countryCode="SM" value="378" {{ $user_details->country_code == '378' ? 'selected' : '' }}>San Marino (+378)</option>
                                        <option data-countryCode="ST" value="239" {{ $user_details->country_code == '239' ? 'selected' : '' }}>Sao Tome &amp; Principe (+239)</option>
                                        <option data-countryCode="SA" value="966" {{ $user_details->country_code == '966' ? 'selected' : '' }}>Saudi Arabia (+966)</option>
                                        <option data-countryCode="SN" value="221" {{ $user_details->country_code == '221' ? 'selected' : '' }}>Senegal (+221)</option>
                                        <option data-countryCode="CS" value="381" {{ $user_details->country_code == '381' ? 'selected' : '' }}>Serbia (+381)</option>
                                        <option data-countryCode="SC" value="248" {{ $user_details->country_code == '248' ? 'selected' : '' }}>Seychelles (+248)</option>
                                        <option data-countryCode="SL" value="232" {{ $user_details->country_code == '232' ? 'selected' : '' }}>Sierra Leone (+232)</option>
                                        <option data-countryCode="SG" value="65" {{ $user_details->country_code == '65' ? 'selected' : '' }}>Singapore (+65)</option>
                                        <option data-countryCode="SK" value="421" {{ $user_details->country_code == '421' ? 'selected' : '' }}>Slovak Republic (+421)</option>
                                        <option data-countryCode="SI" value="386" {{ $user_details->country_code == '386' ? 'selected' : '' }}>Slovenia (+386)</option>
                                        <option data-countryCode="SB" value="677" {{ $user_details->country_code == '677' ? 'selected' : '' }}>Solomon Islands (+677)</option>
                                        <option data-countryCode="SO" value="252" {{ $user_details->country_code == '252' ? 'selected' : '' }}>Somalia (+252)</option>
                                        <option data-countryCode="ZA" value="27" {{ $user_details->country_code == '27' ? 'selected' : '' }}>South Africa (+27)</option>
                                        <option data-countryCode="ES" value="34" {{ $user_details->country_code == '34' ? 'selected' : '' }}>Spain (+34)</option>
                                        <option data-countryCode="LK" value="94" {{ $user_details->country_code == '94' ? 'selected' : '' }}>Sri Lanka (+94)</option>
                                        <option data-countryCode="SH" value="290" {{ $user_details->country_code == '290' ? 'selected' : '' }}>St. Helena (+290)</option>
                                        <option data-countryCode="KN" value="1869" {{ $user_details->country_code == '1869' ? 'selected' : '' }}>St. Kitts (+1869)</option>
                                        <option data-countryCode="SC" value="1758" {{ $user_details->country_code == '1758' ? 'selected' : '' }}>St. Lucia (+1758)</option>
                                        <option data-countryCode="SD" value="249" {{ $user_details->country_code == '249' ? 'selected' : '' }}>Sudan (+249)</option>
                                        <option data-countryCode="SR" value="597" {{ $user_details->country_code == '597' ? 'selected' : '' }}>Suriname (+597)</option>
                                        <option data-countryCode="SZ" value="268" {{ $user_details->country_code == '268' ? 'selected' : '' }}>Swaziland (+268)</option>
                                        <option data-countryCode="SE" value="46" {{ $user_details->country_code == '46' ? 'selected' : '' }}>Sweden (+46)</option>
                                        <option data-countryCode="CH" value="41" {{ $user_details->country_code == '41' ? 'selected' : '' }}>Switzerland (+41)</option>
                                        <option data-countryCode="SI" value="963" {{ $user_details->country_code == '963' ? 'selected' : '' }}>Syria (+963)</option>
                                        <option data-countryCode="TW" value="886" {{ $user_details->country_code == '886' ? 'selected' : '' }}>Taiwan (+886)</option>
                                        <option data-countryCode="TJ" value="7" {{ $user_details->country_code == '7' ? 'selected' : '' }}>Tajikstan (+7)</option>
                                        <option data-countryCode="TH" value="66" {{ $user_details->country_code == '66' ? 'selected' : '' }}>Thailand (+66)</option>
                                        <option data-countryCode="TG" value="228" {{ $user_details->country_code == '228' ? 'selected' : '' }}>Togo (+228)</option>
                                        <option data-countryCode="TO" value="676" {{ $user_details->country_code == '676' ? 'selected' : '' }}>Tonga (+676)</option>
                                        <option data-countryCode="TT" value="1868" {{ $user_details->country_code == '1868' ? 'selected' : '' }}>Trinidad &amp; Tobago (+1868)</option>
                                        <option data-countryCode="TN" value="216" {{ $user_details->country_code == '216' ? 'selected' : '' }}>Tunisia (+216)</option>
                                        <option data-countryCode="TR" value="90" {{ $user_details->country_code == '90' ? 'selected' : '' }}>Turkey (+90)</option>
                                        <option data-countryCode="TM" value="7" {{ $user_details->country_code == '7' ? 'selected' : '' }}>Turkmenistan (+7)</option>
                                        <option data-countryCode="TM" value="993" {{ $user_details->country_code == '993' ? 'selected' : '' }}>Turkmenistan (+993)</option>
                                        <option data-countryCode="TC" value="1649" {{ $user_details->country_code == '1649' ? 'selected' : '' }}>Turks &amp; Caicos Islands (+1649)</option>
                                        <option data-countryCode="TV" value="688" {{ $user_details->country_code == '688' ? 'selected' : '' }}>Tuvalu (+688)</option>
                                        <option data-countryCode="UG" value="256" {{ $user_details->country_code == '256' ? 'selected' : '' }}>Uganda (+256)</option>
                                        <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                                        <option data-countryCode="UA" value="380" {{ $user_details->country_code == '380' ? 'selected' : '' }}>Ukraine (+380)</option>
                                        <option data-countryCode="AE" value="971" {{ $user_details->country_code == '971' ? 'selected' : '' }}>United Arab Emirates (+971)</option>
                                        <option data-countryCode="UY" value="598" {{ $user_details->country_code == '598' ? 'selected' : '' }}>Uruguay (+598)</option>
                                        <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                                        <option data-countryCode="UZ" value="7" {{ $user_details->country_code == '7' ? 'selected' : '' }}>Uzbekistan (+7)</option>
                                        <option data-countryCode="VU" value="678" {{ $user_details->country_code == '678' ? 'selected' : '' }}>Vanuatu (+678)</option>
                                        <option data-countryCode="VA" value="379" {{ $user_details->country_code == '379' ? 'selected' : '' }}>Vatican City (+379)</option>
                                        <option data-countryCode="VE" value="58" {{ $user_details->country_code == '58' ? 'selected' : '' }}>Venezuela (+58)</option>
                                        <option data-countryCode="VN" value="84" {{ $user_details->country_code == '84' ? 'selected' : '' }}>Vietnam (+84)</option>
                                        <option data-countryCode="VG" value="84" {{ $user_details->country_code == '84' ? 'selected' : '' }}>Virgin Islands - British (+1284)</option>
                                        <option data-countryCode="VI" value="84" {{ $user_details->country_code == '84' ? 'selected' : '' }}>Virgin Islands - US (+1340)</option>
                                        <option data-countryCode="WF" value="681" {{ $user_details->country_code == '681' ? 'selected' : '' }}>Wallis &amp; Futuna (+681)</option>
                                        <option data-countryCode="YE" value="969" {{ $user_details->country_code == '969' ? 'selected' : '' }}>Yemen (North)(+969)</option>
                                        <option data-countryCode="YE" value="967" {{ $user_details->country_code == '967' ? 'selected' : '' }}>Yemen (South)(+967)</option>
                                        <option data-countryCode="ZM" value="260" {{ $user_details->country_code == '260' ? 'selected' : '' }}>Zambia (+260)</option>
                                        <option data-countryCode="ZW" value="263" {{ $user_details->country_code == '263' ? 'selected' : '' }}>Zimbabwe (+263)</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Phone</label>
                                <input value="{{ old('phone', optional($user_details)->phone)  }}" type="tel" name="phone" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Marital Status</label>
                                <select name="m_status" class="form-control" id="">
                                    <option value="Single" {{ $user_details->m_status == 'Single' ? 'selected' : '' }}>Single</option>
                                    <option value="Married" {{ $user_details->m_status == 'Married' ? 'selected' : '' }}>Married</option>
                                    <option value="Divorced" {{ $user_details->m_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                    <option value="Seperated" {{ $user_details->m_status == 'Seperated' ? 'selected' : '' }}>Seperated</option>
                                </select>
{{--                                <input value="{{ old('m_status', optional($user_details)->m_status) }}" type="text" name="m_status" class="form-control form-control-alt" id="example-if-email2"  >--}}
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Date of Birth</label>
                                <input value="{{ old('date_of_birth', optional($user_details)->date_of_birth) }}" type="date" name="date_of_birth" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Gender</label>
                                <select name="gender" class="form-control" id="">
                                    <option value="Male" {{ $user_details->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $user_details->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
{{--                                <input value="{{ old('gender', optional($user_details)->gender) }}" type="text" name="gender" class="form-control form-control-alt" id="example-if-email2"  >--}}
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Country</label>
                                <select id="country" name="country" class="form-control">
                                    <option selected>Choose Country</option>
                                    <option value="Afghanistan" {{ $user_details->country == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
                                    <option value="Åland Islands" {{ $user_details->country == 'Åland Islands' ? 'selected' : '' }}>Åland Islands</option>
                                    <option value="Albania" {{ $user_details->country == 'Albania' ? 'selected' : '' }}>Albania</option>
                                    <option value="Algeria" {{ $user_details->country == 'Algeria' ? 'selected' : '' }}>Algeria</option>
                                    <option value="American Samoa" {{ $user_details->country == 'American Samoa' ? 'selected' : '' }}>American Samoa</option>
                                    <option value="Andorra" {{ $user_details->country == 'Andorra' ? 'selected' : '' }}>Andorra</option>
                                    <option value="Angola" {{ $user_details->country == 'Angola' ? 'selected' : '' }}>Angola</option>
                                    <option value="Anguilla" {{ $user_details->country == 'Anguilla' ? 'selected' : '' }}>Anguilla</option>
                                    <option value="Antarctica" {{ $user_details->country == 'Antarctica' ? 'selected' : '' }}>Antarctica</option>
                                    <option value="Antigua and Barbuda" {{ $user_details->country == 'Antigua and Barbuda' ? 'selected' : '' }}>Antigua and Barbuda</option>
                                    <option value="Argentina" {{ $user_details->country == 'Argentina' ? 'selected' : '' }}>Argentina</option>
                                    <option value="Armenia" {{ $user_details->country == 'Armenia' ? 'selected' : '' }}>Armenia</option>
                                    <option value="Aruba" {{ $user_details->country == 'Aruba' ? 'selected' : '' }}>Aruba</option>
                                    <option value="Australia" {{ $user_details->country == 'Australia' ? 'selected' : '' }}>Australia</option>
                                    <option value="Austria" {{ $user_details->country == 'Austria' ? 'selected' : '' }}>Austria</option>
                                    <option value="Azerbaijan" {{ $user_details->country == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
                                    <option value="Bahamas" {{ $user_details->country == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
                                    <option value="Bahrain" {{ $user_details->country == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
                                    <option value="Bangladesh" {{ $user_details->country == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                    <option value="Barbados" {{ $user_details->country == 'Barbados' ? 'selected' : '' }}>Barbados</option>
                                    <option value="Belarus" {{ $user_details->country == 'Belarus' ? 'selected' : '' }}>Belarus</option>
                                    <option value="Belgium" {{ $user_details->country == 'Belgium' ? 'selected' : '' }}>Belgium</option>
                                    <option value="Belize" {{ $user_details->country == 'Belize' ? 'selected' : '' }}>Belize</option>
                                    <option value="Benin" {{ $user_details->country == 'Benin' ? 'selected' : '' }}>Benin</option>
                                    <option value="Bermuda" {{ $user_details->country == 'Bermuda' ? 'selected' : '' }}>Bermuda</option>
                                    <option value="Bhutan" {{ $user_details->country == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
                                    <option value="Bolivia" {{ $user_details->country == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
                                    <option value="Bosnia and Herzegovina" {{ $user_details->country == 'Bosnia and Herzegovina' ? 'selected' : '' }}>Bosnia and Herzegovina</option>
                                    <option value="Botswana" {{ $user_details->country == 'Botswana' ? 'selected' : '' }}>Botswana</option>
                                    <option value="Bouvet Island" {{ $user_details->country == 'Bouvet Island' ? 'selected' : '' }}>Bouvet Island</option>
                                    <option value="Brazil" {{ $user_details->country == 'Brazil' ? 'selected' : '' }}>Brazil</option>
                                    <option value="British Indian Ocean Territory" {{ $user_details->country == 'British Indian Ocean Territory' ? 'selected' : '' }}>British Indian Ocean Territory</option>
                                    <option value="Brunei Darussalam" {{ $user_details->country == 'Brunei Darussalam' ? 'selected' : '' }}>Brunei Darussalam</option>
                                    <option value="Bulgaria" {{ $user_details->country == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
                                    <option value="Burkina Faso" {{ $user_details->country == 'Burkina Faso' ? 'selected' : '' }}>Burkina Faso</option>
                                    <option value="Burundi" {{ $user_details->country == 'Burundi' ? 'selected' : '' }}>Burundi</option>
                                    <option value="Cambodia" {{ $user_details->country == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
                                    <option value="Cameroon" {{ $user_details->country == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
                                    <option value="Canada" {{ $user_details->country == 'Canada' ? 'selected' : '' }}>Canada</option>
                                    <option value="Cape Verde" {{ $user_details->country == 'Cape Verde' ? 'selected' : '' }}>Cape Verde</option>
                                    <option value="Cayman Islands" {{ $user_details->country == 'Cayman Islands' ? 'selected' : '' }}>Cayman Islands</option>
                                    <option value="Central African Republic" {{ $user_details->country == 'Central African Republic' ? 'selected' : '' }}>Central African Republic</option>
                                    <option value="Chad" {{ $user_details->country == 'Chad' ? 'selected' : '' }}>Chad</option>
                                    <option value="Chile" {{ $user_details->country == 'Chile' ? 'selected' : '' }}>Chile</option>
                                    <option value="China" {{ $user_details->country == 'China' ? 'selected' : '' }}>China</option>
                                    <option value="Christmas Island" {{ $user_details->country == 'Christmas Island' ? 'selected' : '' }}>Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands" {{ $user_details->country == "Cocos (Keeling) Islands" ? 'selected' : '' }}>Cocos (Keeling) Islands</option>
                                    <option value="Colombia" {{ $user_details->country == 'Colombia' ? 'selected' : '' }}>Colombia</option>
                                    <option value="Comoros" {{ $user_details->country == 'Comoros' ? 'selected' : '' }}>Comoros</option>
                                    <option value="Congo" {{ $user_details->country == 'Congo' ? 'selected' : '' }}>Congo</option>
                                    <option value="Congo, The Democratic Republic of The" {{ $user_details->country == "Congo, The Democratic Republic of The" ? 'selected' : '' }}>Congo, The Democratic Republic of The</option>
                                    <option value="Cook Islands" {{ $user_details->country == 'Cook Islands' ? 'selected' : '' }}>Cook Islands</option>
                                    <option value="Costa Rica" {{ $user_details->country == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
                                    <option value="Cote D'ivoire" {{ $user_details->country == "Cote D'ivoire" ? 'selected' : '' }}>Cote D'ivoire</option>
                                    <option value="Croatia" {{ $user_details->country == 'Croatia' ? 'selected' : '' }}>Croatia</option>
                                    <option value="Cuba" {{ $user_details->country == 'Cuba' ? 'selected' : '' }}>Cuba</option>
                                    <option value="Cyprus" {{ $user_details->country == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
                                    <option value="Czech Republic" {{ $user_details->country == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
                                    <option value="Denmark" {{ $user_details->country == 'Denmark' ? 'selected' : '' }}>Denmark</option>
                                    <option value="Djibouti" {{ $user_details->country == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
                                    <option value="Dominica" {{ $user_details->country == 'Dominica' ? 'selected' : '' }}>Dominica</option>
                                    <option value="Dominican Republic" {{ $user_details->country == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
                                    <option value="Ecuador" {{ $user_details->country == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
                                    <option value="Egypt" {{ $user_details->country == 'Egypt' ? 'selected' : '' }}>Egypt</option>
                                    <option value="El Salvador" {{ $user_details->country == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
                                    <option value="Equatorial Guinea" {{ $user_details->country == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
                                    <option value="Eritrea" {{ $user_details->country == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
                                    <option value="Estonia" {{ $user_details->country == 'Estonia' ? 'selected' : '' }}>Estonia</option>
                                    <option value="Ethiopia" {{ $user_details->country == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
                                    <option value="Falkland Islands (Malvinas)" {{ $user_details->country == "Falkland Islands (Malvinas)" ? 'selected' : '' }}>Falkland Islands (Malvinas)</option>
                                    <option value="Faroe Islands" {{ $user_details->country == 'Faroe Islands' ? 'selected' : '' }}>Faroe Islands</option>
                                    <option value="Fiji" {{ $user_details->country == 'Fiji' ? 'selected' : '' }}>Fiji</option>
                                    <option value="Finland" {{ $user_details->country == 'Finland' ? 'selected' : '' }}>Finland</option>
                                    <option value="France" {{ $user_details->country == 'France' ? 'selected' : '' }}>France</option>
                                    <option value="French Guiana" {{ $user_details->country == 'French Guiana' ? 'selected' : '' }}>French Guiana</option>
                                    <option value="French Polynesia" {{ $user_details->country == 'French Polynesia' ? 'selected' : '' }}>French Polynesia</option>
                                    <option value="French Southern Territories" {{ $user_details->country == 'French Southern Territories' ? 'selected' : '' }}>French Southern Territories</option>
                                    <option value="Gabon" {{ $user_details->country == 'Gabon' ? 'selected' : '' }}>Gabon</option>
                                    <option value="Gambia" {{ $user_details->country == 'Gambia' ? 'selected' : '' }}>Gambia</option>
                                    <option value="Georgia" {{ $user_details->country == 'Georgia' ? 'selected' : '' }}>Georgia</option>
                                    <option value="Germany" {{ $user_details->country == 'Germany' ? 'selected' : '' }}>Germany</option>
                                    <option value="Ghana" {{ $user_details->country == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                                    <option value="Gibraltar" {{ $user_details->country == 'Gibraltar' ? 'selected' : '' }}>Gibraltar</option>
                                    <option value="Greece" {{ $user_details->country == 'Greece' ? 'selected' : '' }}>Greece</option>
                                    <option value="Greenland" {{ $user_details->country == 'Greenland' ? 'selected' : '' }}>Greenland</option>
                                    <option value="Grenada" {{ $user_details->country == 'Grenada' ? 'selected' : '' }}>Grenada</option>
                                    <option value="Guadeloupe" {{ $user_details->country == 'Guadeloupe' ? 'selected' : '' }}>Guadeloupe</option>
                                    <option value="Guam" {{ $user_details->country == 'Guam' ? 'selected' : '' }}>Guam</option>
                                    <option value="Guatemala" {{ $user_details->country == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
                                    <option value="Guernsey" {{ $user_details->country == 'Guernsey' ? 'selected' : '' }}>Guernsey</option>
                                    <option value="Guinea" {{ $user_details->country == 'Guinea' ? 'selected' : '' }}>Guinea</option>
                                    <option value="Guinea-bissau" {{ $user_details->country == 'Guinea-bissau' ? 'selected' : '' }}>Guinea-bissau</option>
                                    <option value="Guyana" {{ $user_details->country == 'Guyana' ? 'selected' : '' }}>Guyana</option>
                                    <option value="Haiti" {{ $user_details->country == 'Haiti' ? 'selected' : '' }}>Haiti</option>
                                    <option value="Heard Island and Mcdonald Islands" {{ $user_details->country == "Heard Island and Mcdonald Islands" ? 'selected' : '' }}>Heard Island and Mcdonald Islands</option>
                                    <option value="Holy See (Vatican City State)" {{ $user_details->country == "Holy See (Vatican City State)" ? 'selected' : '' }}>Holy See (Vatican City State)</option>
                                    <option value="Honduras" {{ $user_details->country == 'Honduras' ? 'selected' : '' }}>Honduras</option>
                                    <option value="Hong Kong" {{ $user_details->country == 'Hong Kong' ? 'selected' : '' }}>Hong Kong</option>
                                    <option value="Hungary" {{ $user_details->country == 'Hungary' ? 'selected' : '' }}>Hungary</option>
                                    <option value="Iceland" {{ $user_details->country == 'Iceland' ? 'selected' : '' }}>Iceland</option>
                                    <option value="India" {{ $user_details->country == 'India' ? 'selected' : '' }}>India</option>
                                    <option value="Indonesia" {{ $user_details->country == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                    <option value="Iran, Islamic Republic of" {{ $user_details->country == "Iran, Islamic Republic of" ? 'selected' : '' }}>Iran, Islamic Republic of</option>
                                    <option value="Iraq" {{ $user_details->country == 'Iraq' ? 'selected' : '' }}>Iraq</option>
                                    <option value="Ireland" {{ $user_details->country == 'Ireland' ? 'selected' : '' }}>Ireland</option>
                                    <option value="Isle of Man" {{ $user_details->country == 'Isle of Man' ? 'selected' : '' }}>Isle of Man</option>
                                    <option value="Israel" {{ $user_details->country == 'Israel' ? 'selected' : '' }}>Israel</option>
                                    <option value="Italy" {{ $user_details->country == 'Italy' ? 'selected' : '' }}>Italy</option>
                                    <option value="Jamaica" {{ $user_details->country == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
                                    <option value="Japan" {{ $user_details->country == 'Japan' ? 'selected' : '' }}>Japan</option>
                                    <option value="Jersey" {{ $user_details->country == 'Jersey' ? 'selected' : '' }}>Jersey</option>
                                    <option value="Jordan" {{ $user_details->country == 'Jordan' ? 'selected' : '' }}>Jordan</option>
                                    <option value="Kazakhstan" {{ $user_details->country == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
                                    <option value="Kenya" {{ $user_details->country == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                                    <option value="Kiribati" {{ $user_details->country == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
                                    <option value="Korea, Democratic People's Republic of" {{ $user_details->country == "Korea, Democratic People's Republic of" ? 'selected' : '' }}>Korea, Democratic People's Republic of</option>
                                    <option value="Korea, Republic of" {{ $user_details->country == 'Korea, Republic of' ? 'selected' : '' }}>Korea, Republic of</option>
                                    <option value="Kuwait" {{ $user_details->country == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
                                    <option value="Kyrgyzstan" {{ $user_details->country == 'Kyrgyzstan' ? 'selected' : '' }}>Kyrgyzstan</option>
                                    <option value="Lao People's Democratic Republic" {{ $user_details->country == "Lao People's Democratic Republic" ? 'selected' : '' }}>Lao People's Democratic Republic</option>
                                    <option value="Latvia" {{ $user_details->country == 'Latvia' ? 'selected' : '' }}>Latvia</option>
                                    <option value="Lebanon" {{ $user_details->country == 'Lebanon' ? 'selected' : '' }}>Lebanon</option>
                                    <option value="Lesotho" {{ $user_details->country == 'Lesotho' ? 'selected' : '' }}>Lesotho</option>
                                    <option value="Liberia" {{ $user_details->country == 'Liberia' ? 'selected' : '' }}>Liberia</option>
                                    <option value="Libyan Arab Jamahiriya" {{ $user_details->country == 'Libyan Arab Jamahiriya' ? 'selected' : '' }}>Libyan Arab Jamahiriya</option>
                                    <option value="Liechtenstein" {{ $user_details->country == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
                                    <option value="Lithuania" {{ $user_details->country == 'Lithuania' ? 'selected' : '' }}>Lithuania</option>
                                    <option value="Luxembourg" {{ $user_details->country == 'Luxembourg' ? 'selected' : '' }}>Luxembourg</option>
                                    <option value="Macao" {{ $user_details->country == 'Macao' ? 'selected' : '' }}>Macao</option>
                                    <option value="Macedonia, The Former Yugoslav Republic of" {{ $user_details->country == "Macedonia, The Former Yugoslav Republic of" ? 'selected' : '' }}>Macedonia, The Former Yugoslav Republic of</option>
                                    <option value="Madagascar" {{ $user_details->country == 'Madagascar' ? 'selected' : '' }}>Madagascar</option>
                                    <option value="Malawi" {{ $user_details->country == 'Malawi' ? 'selected' : '' }}>Malawi</option>
                                    <option value="Malaysia" {{ $user_details->country == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                                    <option value="Maldives" {{ $user_details->country == 'Maldives' ? 'selected' : '' }}>Maldives</option>
                                    <option value="Mali" {{ $user_details->country == 'Mali' ? 'selected' : '' }}>Mali</option>
                                    <option value="Malta" {{ $user_details->country == 'Malta' ? 'selected' : '' }}>Malta</option>
                                    <option value="Marshall Islands" {{ $user_details->country == 'Marshall Islands' ? 'selected' : '' }}>Marshall Islands</option>
                                    <option value="Martinique" {{ $user_details->country == 'Martinique' ? 'selected' : '' }}>Martinique</option>
                                    <option value="Mauritania" {{ $user_details->country == 'Mauritania' ? 'selected' : '' }}>Mauritania</option>
                                    <option value="Mauritius" {{ $user_details->country == 'Mauritius' ? 'selected' : '' }}>Mauritius</option>
                                    <option value="Mayotte" {{ $user_details->country == 'Mayotte' ? 'selected' : '' }}>Mayotte</option>
                                    <option value="Mexico" {{ $user_details->country == 'Mexico' ? 'selected' : '' }}>Mexico</option>
                                    <option value="Micronesia, Federated States of" {{ $user_details->country == "Micronesia, Federated States of" ? 'selected' : '' }}>Micronesia, Federated States of</option>
                                    <option value="Moldova, Republic of" {{ $user_details->country == "Moldova, Republic of" ? 'selected' : '' }}>Moldova, Republic of</option>
                                    <option value="Monaco" {{ $user_details->country == 'Monaco' ? 'selected' : '' }}>Monaco</option>
                                    <option value="Mongolia" {{ $user_details->country == 'Mongolia' ? 'selected' : '' }}>Mongolia</option>
                                    <option value="Montenegro" {{ $user_details->country == 'Montenegro' ? 'selected' : '' }}>Montenegro</option>
                                    <option value="Montserrat" {{ $user_details->country == 'Montserrat' ? 'selected' : '' }}>Montserrat</option>
                                    <option value="Morocco" {{ $user_details->country == 'Morocco' ? 'selected' : '' }}>Morocco</option>
                                    <option value="Mozambique" {{ $user_details->country == 'Mozambique' ? 'selected' : '' }}>Mozambique</option>
                                    <option value="Myanmar" {{ $user_details->country == 'Myanmar' ? 'selected' : '' }}>Myanmar</option>
                                    <option value="Namibia" {{ $user_details->country == 'Namibia' ? 'selected' : '' }}>Namibia</option>
                                    <option value="Nauru" {{ $user_details->country == 'Nauru' ? 'selected' : '' }}>Nauru</option>
                                    <option value="Nepal" {{ $user_details->country == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                                    <option value="Netherlands" {{ $user_details->country == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
                                    <option value="Netherlands Antilles" {{ $user_details->country == 'Netherlands Antilles' ? 'selected' : '' }}>Netherlands Antilles</option>
                                    <option value="New Caledonia" {{ $user_details->country == 'New Caledonia' ? 'selected' : '' }}>New Caledonia</option>
                                    <option value="New Zealand" {{ $user_details->country == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
                                    <option value="Nicaragua" {{ $user_details->country == 'Nicaragua' ? 'selected' : '' }}>Nicaragua</option>
                                    <option value="Niger" {{ $user_details->country == 'Niger' ? 'selected' : '' }}>Niger</option>
                                    <option value="Nigeria" {{ $user_details->country == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                                    <option value="Niue" {{ $user_details->country == 'Niue' ? 'selected' : '' }}>Niue</option>
                                    <option value="Norfolk Island" {{ $user_details->country == 'Norfolk Island' ? 'selected' : '' }}>Norfolk Island</option>
                                    <option value="Northern Mariana Islands" {{ $user_details->country == 'Northern Mariana Islands' ? 'selected' : '' }}>Northern Mariana Islands</option>
                                    <option value="Norway" {{ $user_details->country == 'Norway' ? 'selected' : '' }}>Norway</option>
                                    <option value="Oman" {{ $user_details->country == 'Oman' ? 'selected' : '' }}>Oman</option>
                                    <option value="Pakistan" {{ $user_details->country == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                                    <option value="Palau" {{ $user_details->country == 'Palau' ? 'selected' : '' }}>Palau</option>
                                    <option value="Palestinian Territory, Occupied" {{ $user_details->country == "Palestinian Territory, Occupied" ? 'selected' : '' }}>Palestinian Territory, Occupied</option>
                                    <option value="Panama" {{ $user_details->country == 'Panama' ? 'selected' : '' }}>Panama</option>
                                    <option value="Papua New Guinea" {{ $user_details->country == 'Papua New Guinea' ? 'selected' : '' }}>Papua New Guinea</option>
                                    <option value="Paraguay" {{ $user_details->country == 'Paraguay' ? 'selected' : '' }}>Paraguay</option>
                                    <option value="Peru" {{ $user_details->country == 'Peru' ? 'selected' : '' }}>Peru</option>
                                    <option value="Philippines" {{ $user_details->country == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                                    <option value="Pitcairn" {{ $user_details->country == 'Pitcairn' ? 'selected' : '' }}>Pitcairn</option>
                                    <option value="Poland" {{ $user_details->country == 'Poland' ? 'selected' : '' }}>Poland</option>
                                    <option value="Portugal" {{ $user_details->country == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                                    <option value="Puerto Rico" {{ $user_details->country == 'Puerto Rico' ? 'selected' : '' }}>Puerto Rico</option>
                                    <option value="Qatar" {{ $user_details->country == 'Qatar' ? 'selected' : '' }}>Qatar</option>
                                    <option value="Reunion" {{ $user_details->country == 'Reunion' ? 'selected' : '' }}>Reunion</option>
                                    <option value="Romania" {{ $user_details->country == 'Romania' ? 'selected' : '' }}>Romania</option>
                                    <option value="Russian Federation" {{ $user_details->country == 'Russian Federation' ? 'selected' : '' }}>Russian Federation</option>
                                    <option value="Rwanda" {{ $user_details->country == 'Rwanda' ? 'selected' : '' }}>Rwanda</option>
                                    <option value="Saint Helena" {{ $user_details->country == 'Saint Helena' ? 'selected' : '' }}>Saint Helena</option>
                                    <option value="Saint Kitts and Nevis" {{ $user_details->country == 'Saint Kitts and Nevis' ? 'selected' : '' }}>Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia" {{ $user_details->country == 'Saint Lucia' ? 'selected' : '' }}>Saint Lucia</option>
                                    <option value="Saint Pierre and Miquelon" {{ $user_details->country == 'Saint Pierre and Miquelon' ? 'selected' : '' }}>Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and The Grenadines" {{ $user_details->country == "Saint Vincent and The Grenadines" ? 'selected' : '' }}>Saint Vincent and The Grenadines</option>
                                    <option value="Samoa" {{ $user_details->country == 'Samoa' ? 'selected' : '' }}>Samoa</option>
                                    <option value="San Marino" {{ $user_details->country == 'San Marino' ? 'selected' : '' }}>San Marino</option>
                                    <option value="Sao Tome and Principe" {{ $user_details->country == 'Sao Tome and Principe' ? 'selected' : '' }}>Sao Tome and Principe</option>
                                    <option value="Saudi Arabia" {{ $user_details->country == 'Saudi Arabia' ? 'selected' : '' }}>Saudi Arabia</option>
                                    <option value="Senegal" {{ $user_details->country == 'Senegal' ? 'selected' : '' }}>Senegal</option>
                                    <option value="Serbia" {{ $user_details->country == 'Serbia' ? 'selected' : '' }}>Serbia</option>
                                    <option value="Seychelles" {{ $user_details->country == 'Seychelles' ? 'selected' : '' }}>Seychelles</option>
                                    <option value="Sierra Leone" {{ $user_details->country == 'Sierra Leone' ? 'selected' : '' }}>Sierra Leone</option>
                                    <option value="Singapore" {{ $user_details->country == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                                    <option value="Slovakia" {{ $user_details->country == 'Slovakia' ? 'selected' : '' }}>Slovakia</option>
                                    <option value="Slovenia" {{ $user_details->country == 'Slovenia' ? 'selected' : '' }}>Slovenia</option>
                                    <option value="Solomon Islands" {{ $user_details->country == 'Solomon Islands' ? 'selected' : '' }}>Solomon Islands</option>
                                    <option value="Somalia" {{ $user_details->country == 'Somalia' ? 'selected' : '' }}>Somalia</option>
                                    <option value="South Africa" {{ $user_details->country == 'South Africa' ? 'selected' : '' }}>South Africa</option>
                                    <option value="South Georgia and The South Sandwich Islands" {{ $user_details->country == "South Georgia and The South Sandwich Islands" ? 'selected' : '' }}>South Georgia and The South Sandwich Islands</option>
                                    <option value="Spain" {{ $user_details->country == 'Spain' ? 'selected' : '' }}>Spain</option>
                                    <option value="Sri Lanka" {{ $user_details->country == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
                                    <option value="Sudan" {{ $user_details->country == 'Sudan' ? 'selected' : '' }}>Sudan</option>
                                    <option value="Suriname" {{ $user_details->country == 'Suriname' ? 'selected' : '' }}>Suriname</option>
                                    <option value="Svalbard and Jan Mayen" {{ $user_details->country == 'Svalbard and Jan Mayen' ? 'selected' : '' }}>Svalbard and Jan Mayen</option>
                                    <option value="Swaziland" {{ $user_details->country == 'Swaziland' ? 'selected' : '' }}>Swaziland</option>
                                    <option value="Sweden" {{ $user_details->country == 'Sweden' ? 'selected' : '' }}>Sweden</option>
                                    <option value="Switzerland" {{ $user_details->country == 'Switzerland' ? 'selected' : '' }}>Switzerland</option>
                                    <option value="Syrian Arab Republic" {{ $user_details->country == 'Syrian Arab Republic' ? 'selected' : '' }}>Syrian Arab Republic</option>
                                    <option value="Taiwan" {{ $user_details->country == 'Taiwan' ? 'selected' : '' }}>Taiwan</option>
                                    <option value="Tajikistan" {{ $user_details->country == 'Tajikistan' ? 'selected' : '' }}>Tajikistan</option>
                                    <option value="Tanzania, United Republic of" {{ $user_details->country == "Tanzania, United Republic of" ? 'selected' : '' }}>Tanzania, United Republic of</option>
                                    <option value="Thailand" {{ $user_details->country == 'Thailand' ? 'selected' : '' }}>Thailand</option>
                                    <option value="Timor-leste" {{ $user_details->country == 'Timor-leste' ? 'selected' : '' }}>Timor-leste</option>
                                    <option value="Togo" {{ $user_details->country == 'Togo' ? 'selected' : '' }}>Togo</option>
                                    <option value="Tokelau" {{ $user_details->country == 'Tokelau' ? 'selected' : '' }}>Tokelau</option>
                                    <option value="Tonga" {{ $user_details->country == 'Tonga' ? 'selected' : '' }}>Tonga</option>
                                    <option value="Trinidad and Tobago" {{ $user_details->country == 'Trinidad and Tobago' ? 'selected' : '' }}>Trinidad and Tobago</option>
                                    <option value="Tunisia" {{ $user_details->country == 'Tunisia' ? 'selected' : '' }}>Tunisia</option>
                                    <option value="Turkey" {{ $user_details->country == 'Turkey' ? 'selected' : '' }}>Turkey</option>
                                    <option value="Turkmenistan" {{ $user_details->country == 'Turkmenistan' ? 'selected' : '' }}>Turkmenistan</option>
                                    <option value="Turks and Caicos Islands" {{ $user_details->country == 'Turks and Caicos Islands' ? 'selected' : '' }}>Turks and Caicos Islands</option>
                                    <option value="Tuvalu" {{ $user_details->country == 'Tuvalu' ? 'selected' : '' }}>Tuvalu</option>
                                    <option value="Uganda" {{ $user_details->country == 'Uganda' ? 'selected' : '' }}>Uganda</option>
                                    <option value="Ukraine" {{ $user_details->country == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                                    <option value="United Arab Emirates" {{ $user_details->country == 'United Arab Emirates' ? 'selected' : '' }}>United Arab Emirates</option>
                                    <option value="United Kingdom" {{ $user_details->country == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                    <option value="United States" {{ $user_details->country == 'United States' ? 'selected' : '' }}>United States</option>
                                    <option value="United States Minor Outlying Islands" {{ $user_details->country == 'United States Minor Outlying Islands' ? 'selected' : '' }}>United States Minor Outlying Islands</option>
                                    <option value="Uruguay" {{ $user_details->country == 'Uruguay' ? 'selected' : '' }}>Uruguay</option>
                                    <option value="Uzbekistan" {{ $user_details->country == 'Uzbekistan' ? 'selected' : '' }}>Uzbekistan</option>
                                    <option value="Vanuatu" {{ $user_details->country == 'Vanuatu' ? 'selected' : '' }}>Vanuatu</option>
                                    <option value="Venezuela" {{ $user_details->country == 'Venezuela' ? 'selected' : '' }}>Venezuela</option>
                                    <option value="Viet Nam" {{ $user_details->country == 'Viet Nam' ? 'selected' : '' }}>Viet Nam</option>
                                    <option value="Virgin Islands, British" {{ $user_details->country == 'Virgin Islands, British' ? 'selected' : '' }}>Virgin Islands, British</option>
                                    <option value="Virgin Islands, U.S." {{ $user_details->country == "Virgin Islands, U.S." ? 'selected' : '' }}>Virgin Islands, U.S.</option>
                                    <option value="Wallis and Futuna" {{ $user_details->country == 'Wallis and Futuna' ? 'selected' : '' }}>Wallis and Futuna</option>
                                    <option value="Western Sahara" {{ $user_details->country == 'Western Sahara' ? 'selected' : '' }}>Western Sahara</option>
                                    <option value="Yemen" {{ $user_details->country == 'Yemen' ? 'selected' : '' }}>Yemen</option>
                                    <option value="Zambia" {{ $user_details->country == 'Zambia' ? 'selected' : '' }}>Zambia</option>
                                    <option value="Zimbabwe" {{ $user_details->country == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">State</label>
                                <input value="{{ old('state', optional($user_details)->state) }}" type="text" name="state" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">City</label>
                                <input value="{{ old('city', optional($user_details)->city) }}" type="text" name="city" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Address</label>
                                <input value="{{ old('address', optional($user_details)->address) }}" type="text" name="address" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Address 2</label>
                                <input value="{{ old('address_2', optional($user_details)->address_2) }}" type="text" name="address_2" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Zipcode</label>
                                <input value="{{ old('zipcode', optional($user_details)->zipcode) }}" type="text" name="zipcode" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">profile Picture</label>
                                <input  type="file" name="avatar" class="form-control form-control-file" id="example-if-email2"  >
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title text-center">Account Details</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label class="" for="example-if-email2">Account Type</label>
                                <select name="account_type" class="form-control " id="account_type" required>
                                    <option selected disabled>Account Type</option>
                                    <option value="Savings" {{ $user_details->account_type == 'Savings' ? 'selected' : '' }}>Savings</option>
                                    <option value="Checking" {{ $user_details->account_type == 'Checking' ? 'selected' : '' }}>Checking</option>
                                    <option value="Current" {{ $user_details->account_type == 'Current' ? 'selected' : '' }}>Current</option>
                                    <option value="Offshore" {{ $user_details->account_type == 'Offshore' ? 'selected' : '' }}>Offshore</option>
                                    <option value="Joint" {{ $user_details->account_type == 'Joint' ? 'selected' : '' }}>Joint</option>
                                    <option value="Fixed" {{ $user_details->account_type == 'Fixed' ? 'selected' : '' }}>Fixed</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="" for="example-if-email2">Preferred Currency</label>
                                <select name="preferred_currency" required class="form-control currency_changer" id="currency">
                                    <option selected>Prefered Currency</option>
                                    <option value="USD" {{ $user_details->preferred_currency == 'USD' ? 'selected' : '' }}>USD</option>
                                    <option value="GBP" {{ $user_details->preferred_currency == 'GBP' ? 'selected' : '' }}>British pound (GBP)</option>
                                    <option value="EURO" {{ $user_details->preferred_currency == 'EURO' ? 'selected' : '' }}>EURO (EUR)</option>
                                    <option value="AUD" {{ $user_details->preferred_currency == 'AUD' ? 'selected' : '' }}>Australian Dollar (AUD)</option>
                                    <option value="CAD" {{ $user_details->preferred_currency == 'CAD' ? 'selected' : '' }}>Canadian Dollars (CAD)</option>
                                    <option value="CHF" {{ $user_details->preferred_currency == 'CHF' ? 'selected' : '' }}>Swiss Franc (fr)</option>
                                    <option value="JPY" {{ $user_details->preferred_currency == 'JPY' ? 'selected' : '' }}>Japanese Yen (JPY)</option>
                                    <option value="NZD" {{ $user_details->preferred_currency == 'NZD' ? 'selected' : '' }}>New Zealand Dollars (NZD)</option>
                                </select>
{{--                                <input value="{{ old('preferred_currency', optional($user_details)->preferred_currency) }}" type="text" name="preferred_currency" class="form-control form-control-alt" id="example-if-email2"  >--}}
                            </div>
                            <br>
                           <div class="col-lg-12">
                               <div class="block-header block-header-default">
                                   <h3 class="block-title text-center">Employment Details</h3>
                               </div>
                           </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Occupation</label>
                                <input value="{{ old('occupation', optional($user_details)->occupation) }}"  type="text" name="occupation" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Position</label>
                                <input value="{{ old('position', optional($user_details)->position) }}"  type="text" name="position" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Employer Name</label>
                                <input value="{{ old('employer_name', optional($user_details)->employer_name) }}"  type="text" name="employer_name" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Office Address</label>
                                <input value="{{ old('office_address', optional($user_details)->office_address) }}"  type="text" name="office_address" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Office Name</label>
                                <input value="{{ old('office_name', optional($user_details)->office_name) }}"  type="text" name="office_name" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Annual Salary</label>
                                <input value="{{ old('annual_salary', optional($user_details)->annual_salary) }}"  type="text" name="annual_salary" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-12">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title text-center">Identity Details</h3>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Identification Type</label>
                                <select name="cus_identification" class="form-control" id="cus_identification">
                                    <option value="Select">Select</option>
                                    <option value="Passport" {{ $user_details->cus_identification == 'Passport' ? 'selected' : '' }}>International Passport</option>
                                    <option value="Driver's Licence" {{ $user_details->cus_identification == "Driver's Licence" ? 'selected' : '' }}>Driver's Licence</option>
                                    <option value="Voter's Card" {{ $user_details->cus_identification == "Voter's Card" ? 'selected' : '' }}>Voter's Card</option>
                                    <option value="Social Security Number" {{ $user_details->cus_identification == 'Social Security Number' ? 'selected' : '' }}>Social Security Number</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Identification Number</label>
                                <input value="{{ old('cus_idnumber', optional($user_details)->cus_idnumber) }}"  type="text" name="cus_idnumber" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Identification Expiry Date</label>
                                <input value="{{ old('cus_expiry', optional($user_details)->cus_expiry) }}"  type="text" name="cus_expiry" class="form-control form-control-alt" id="example-if-email2"  >
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="example-if-email2">Identification Image</label>
                                <input value="{{ old('cus_image', optional($user_details)->cus_image) }}"  type="file" name="cus_image" class="form-control form-control-file" id="example-if-email2"  >
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-secondary">Update</button>
                            </div>
                        </form>
                        <!-- END Form Inline - Alternative Style -->
                    </div>
                </div>
                <!-- END Inline Layout -->
                <br>



            </div>
        </div>
        <!-- END Layouts -->
    </div>
    <!-- END Page Content -->
</main>

@endsection
