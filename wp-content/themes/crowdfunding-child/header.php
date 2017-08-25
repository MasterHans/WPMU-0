<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
global $themeum_options;
?>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	if(isset($themeum_options['favicon'])){ ?>
		<link rel="shortcut icon" href="<?php echo esc_url($themeum_options['favicon']['url']); ?>" type="image/x-icon"/>
	<?php }else{ ?>
		<link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri().'/images/plus.png'); ?>" type="image/x-icon"/>
	<?php } ?>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

 <?php
     if ( isset($themeum_options['boxfull-en']) ) {
      $layout = esc_attr($themeum_options['boxfull-en']);
     }else{
        $layout = 'fullwidth';
     }
 ?>
<body <?php body_class( $layout.'-bg' ); ?>>

<!--For mobile only view KICKSTARTER sign-->
<div class="site-nav-mobile mobile-show">
    <a class="site-nav__item site-nav__item--logo site-nav__item--logo--mobile" href="/">
        <svg class="svg--ksr-logo" viewBox="0 0 354 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path class="svg-fill--kick" d="M13.2157427,13.5552759 L20.3375224,3.69776954 C21.6837338,1.84097866 23.4218359,0.912583227 25.5529967,0.912583227 C27.2916828,0.912583227 28.7961689,1.50175725 30.0676233,2.68010531 C31.3384936,3.85845336 31.9745128,5.26945821 31.9745128,6.91256191 C31.9745128,8.12661748 31.6375219,9.19840092 30.9647082,10.1267964 L24.5437761,19.0464225 L32.3944374,28.5552226 C33.1793867,29.5020297 33.5724454,30.6089628 33.5724454,31.8771375 C33.5724454,33.5553908 32.9556995,34.9970818 31.7216237,36.2022105 C30.4881319,37.4084551 28.9924063,38.0110194 27.2356149,38.0110194 C25.3100361,38.0110194 23.8429285,37.4129185 22.8331239,36.2161587 L13.2157427,24.7518141 L13.2157427,31.0731605 C13.2157427,32.8775059 12.8886804,34.278468 12.234556,35.2782785 C11.0378587,37.0999198 9.29917262,38.0110194 7.01908175,38.0110194 C4.9439888,38.0110194 3.33612758,37.3415035 2.19608215,36.0019136 C1.13079379,34.7694464 0.598149607,33.1358275 0.598149607,31.0999411 L0.598149607,7.66241976 C0.598149607,5.73365593 1.14013842,4.14467143 2.22470009,2.89435041 C3.36416149,1.57317229 4.93464416,0.912583227 6.93498003,0.912583227 C8.84186956,0.912583227 10.4304575,1.57317229 11.7019118,2.89435041 C12.41152,3.62691243 12.8600625,4.36784341 13.0475392,5.11770126 C13.1596748,5.58245691 13.2157427,6.44836419 13.2157427,7.71598104 L13.2157427,13.5552759" id="Fill-1-Copy"></path>
            <path class="svg-fill--kick" d="M48.5875213,8.38549698 L48.5875213,31.0731605 C48.5875213,33.0381898 48.0548771,34.6539549 46.9895887,35.9215717 C45.8489592,37.3147228 44.269716,38.0110194 42.2506908,38.0110194 C40.4004532,38.0110194 38.8393151,37.3593572 37.5684448,36.0554749 C36.5025724,34.9663957 35.9699282,33.3054382 35.9699282,31.0731605 L35.9699282,8.38549698 C35.9699282,5.85026329 36.5025724,4.01076824 37.5684448,2.86756977 C38.7832473,1.56424541 40.3443853,0.912583227 42.2506908,0.912583227 C44.1575804,0.912583227 45.7181344,1.55531853 46.9335209,2.84078913 C48.0361878,4.01913719 48.5875213,5.86755911 48.5875213,8.38549698" id="Fill-2-Copy"></path>
            <path class="svg-fill--kick" d="M71.8685106,0.188948082 C76.5227227,0.171652253 80.8031495,1.66244108 84.7103749,4.66243042 C87.7759991,7.01912653 89.3085192,9.45728041 89.3085192,11.9746603 C89.3085192,14.1176693 88.3740557,15.7786267 86.5051288,16.9569748 C85.4392564,17.6359756 84.2799376,17.975197 83.0283406,17.975197 C81.9998468,17.975197 81.0186601,17.7430981 80.0841967,17.2783425 C79.691138,17.0819511 78.7192959,16.1803363 77.1675025,14.5729401 C75.7284288,13.0726665 73.9243303,12.3228086 71.756375,12.3228086 C69.6625928,12.3228086 67.9098897,13.0151997 66.4988499,14.398866 C65.087226,15.7830902 64.3817061,17.4752917 64.3817061,19.4749127 C64.3817061,21.4572378 65.087226,23.1405124 66.4988499,24.5241787 C67.9098897,25.907845 69.6532481,26.6002361 71.7283411,26.6002361 C73.4477539,26.6002361 75.0462705,26.0467695 76.5227227,24.9392786 C77.4384969,24.100152 78.3455106,23.2610253 79.2425955,22.4213407 C80.2144375,21.6179216 81.4479293,21.216212 82.9436549,21.216212 C84.6636517,21.216212 86.154121,21.7919957 87.4162307,22.9435632 C88.6777564,24.0951306 89.3085192,25.4927451 89.3085192,27.1358488 C89.3085192,29.3681265 87.9348579,31.626627 85.1869513,33.912466 C81.3363777,37.1272584 76.8871635,38.7340966 71.8404767,38.7340966 C68.7182006,38.7340966 65.7740566,38.0997303 63.0080448,36.8326713 C59.5119833,35.2252752 56.7313704,32.8635577 54.6662062,29.7475189 C52.6004578,26.6314801 51.5678757,23.2247599 51.5678757,19.5284739 C51.5678757,13.992693 53.7171417,9.27874283 58.0168417,5.38550764 C61.8113475,1.95702809 66.4287651,0.225213529 71.8685106,0.188948082" id="Fill-3-Copy"></path>
            <path class="svg-fill--kick" d="M111.951153,3.69776954 C113.296781,1.84097866 115.035467,0.912583227 117.166627,0.912583227 C118.90473,0.912583227 120.409216,1.50175725 121.68067,2.68010531 C122.95154,3.85845336 123.58756,5.26945821 123.58756,6.91256191 C123.58756,8.12661748 123.251153,9.19840092 122.577755,10.1267964 L116.156823,19.0464225 L124.007484,28.5552226 C124.793017,29.5020297 125.185492,30.6089628 125.185492,31.8771375 C125.185492,33.5553908 124.568746,34.9970818 123.335254,36.2022105 C122.101179,37.4084551 120.605453,38.0110194 118.848662,38.0110194 C116.923083,38.0110194 115.455975,37.4129185 114.446171,36.2161587 L104.828789,24.7518141 L104.828789,31.0731605 C104.828789,32.8775059 104.501727,34.278468 103.847603,35.2782785 C102.650905,37.0999198 100.912803,38.0110194 98.6321285,38.0110194 C96.5576196,38.0110194 94.9497584,37.3415035 93.809713,36.0019136 C92.7438406,34.7694464 92.2111964,33.1358275 92.2111964,31.0999411 L92.2111964,7.66241976 C92.2111964,5.73365593 92.7531852,4.14467143 93.8377469,2.89435041 C94.9777923,1.57317229 96.5476909,0.912583227 98.5480268,0.912583227 C100.454916,0.912583227 102.043504,1.57317229 103.314959,2.89435041 C104.025151,3.62691243 104.473693,4.36784341 104.660586,5.11770126 C104.772722,5.58245691 104.828789,6.44836419 104.828789,7.71598104 L104.828789,13.5552759 L111.951153,3.69776954 Z" id="Fill-4-Copy"></path>
<!--            <path class="svg-fill--starter" d="M133.100982,23.9210564 C134.503261,23.9210564 135.998403,24.5102305 137.587575,25.6891365 C139.568637,27.1715563 140.924193,27.9124873 141.653075,27.9124873 C142.737052,27.9124873 143.279625,27.3768745 143.279625,26.3050911 C143.279625,25.7159171 142.961324,25.2165698 142.325888,24.8053754 C141.989482,24.5911303 140.101281,23.9037606 136.662456,22.7427084 C131.035233,20.85021 128.222498,17.3503154 128.222498,12.2424667 C128.222498,8.38549698 129.708295,5.34143117 132.680473,3.10859551 C135.278282,1.16253584 138.494004,0.188948082 142.325888,0.188948082 C145.634473,0.188948082 148.513205,0.943827304 150.962083,2.45246989 C153.410961,3.9616704 154.635108,5.90382456 154.635108,8.27837443 C154.635108,9.70723303 154.173133,10.8995293 153.24743,11.8541475 C152.322311,12.8098815 151.120942,13.2874695 149.64449,13.2874695 C148.092696,13.2874695 146.373283,12.5822461 144.485083,11.1712412 C143.307659,10.2964071 142.419335,9.85898998 141.821278,9.85898998 C140.793368,9.85898998 140.279413,10.3410415 140.279413,11.3051444 C140.279413,12.2156861 141.550284,13.0464438 144.092608,13.7963016 C147.606775,14.8502313 150.326648,16.1357019 152.252227,17.6538293 C154.812657,19.6891578 156.093456,22.546875 156.093456,26.2247492 C156.093456,30.2256649 154.653798,33.3500726 151.77565,35.6002041 C149.101917,37.6896517 145.625128,38.7340966 141.344702,38.7340966 C137.064275,38.7340966 133.522074,37.6455753 130.7181,35.4663009 C128.474804,33.7344863 127.353447,31.7075268 127.353447,29.3854224 C127.353447,27.8321454 127.904197,26.5377479 129.007448,25.501672 C130.110115,24.466154 131.475015,23.9394681 133.100982,23.9210564" id="Fill-5-Copy"></path>-->
<!--            <path class="svg-fill--starter" d="M167.371846,12.4031505 L164.035227,12.4031505 C162.184405,12.4031505 160.651885,11.921657 159.437083,10.9569961 C158.146939,9.92147813 157.502159,8.53781185 157.502159,6.80543936 C157.502159,5.76992137 157.806444,4.77401641 158.413261,3.81884034 C159.020662,2.86366426 159.805612,2.18466351 160.768693,1.78295395 C161.73119,1.38068646 164.016538,1.1803896 167.624151,1.1803896 L180.354463,1.1803896 C183.475571,1.1803896 185.494013,1.35892719 186.410955,1.71600236 C187.419591,2.10878504 188.237831,2.78332235 188.863921,3.73849842 C189.490012,4.6936745 189.803641,5.69794841 189.803641,6.75132015 C189.803641,8.41227762 189.111554,9.85898998 187.729132,11.0908993 C186.737433,11.9662914 185.121395,12.4031505 182.877515,12.4031505 L179.990023,12.4031505 L179.990023,30.6178896 C179.990023,32.5996568 179.634343,34.135638 178.923566,35.2252752 C177.728037,37.0463585 175.998696,37.9574581 173.737294,37.9574581 C171.475308,37.9574581 169.736622,37.1272584 168.521236,35.4663009 C167.754976,34.4307829 167.371846,32.8590942 167.371846,30.7517928 L167.371846,12.4031505" id="Fill-6-Copy"></path>-->
<!--            <path class="svg-fill--starter" d="M198.163001,33.0019243 C197.563776,34.3593679 196.947031,35.3681052 196.311595,36.0286943 C195.040725,37.3504303 193.498276,38.0110194 191.685417,38.0110194 C189.460226,38.0110194 187.731469,37.154039 186.497977,35.4389623 C185.769095,34.4212981 185.404654,33.2786576 185.404654,32.0110407 C185.404654,30.957111 185.666304,29.8942545 186.190188,28.823029 L198.163001,4.47496596 C199.321152,2.10041609 201.256075,0.912583227 203.966603,0.912583227 C206.71451,0.912583227 208.686228,2.13556568 209.882925,4.58208851 L221.968458,29.117616 C222.454379,30.1001306 222.69734,31.0731605 222.69734,32.0378214 C222.69734,33.466122 222.210835,34.7342968 221.238993,35.8412298 C219.967538,37.2879422 218.340988,38.0110194 216.359925,38.0110194 C214.733959,38.0110194 213.378403,37.5289679 212.293841,36.564307 C211.490202,35.8507146 210.686564,34.6628818 209.882925,33.0019243 L198.163001,33.0019243" id="Fill-7-Copy"></path>-->
<!--            <path class="svg-fill--starter" d="M250.867909,23.6532501 L253.840671,28.2070743 C254.662999,29.4752491 255.074163,30.7785735 255.074163,32.1176053 C255.074163,33.8142703 254.461505,35.2208117 253.237942,36.3366716 C252.013211,37.4530894 250.512813,38.0110194 248.737332,38.0110194 C246.456657,38.0110194 244.727316,37.082624 243.550476,35.2252752 L238.27835,26.975165 L238.27835,31.9301409 C238.27835,33.6268058 237.693726,35.0645913 236.525647,36.2429394 C235.357568,37.4212874 233.885788,38.0110194 232.110307,38.0110194 C229.941768,38.0110194 228.297112,37.2700884 227.175172,35.7871106 C226.165951,34.4843442 225.660757,32.7698254 225.660757,30.6446703 L225.660757,8.1176906 C225.660757,3.49300925 228.268494,1.1803896 233.483384,1.1803896 L241.503417,1.1803896 C244.139188,1.1803896 246.587482,1.90793026 248.849468,3.36301157 C251.11087,4.81920874 252.765454,6.70724369 253.812053,9.02879021 C254.597586,10.7784585 254.990645,12.5376117 254.990645,14.3051337 C254.990645,17.6091949 253.615816,20.7252337 250.867909,23.6532501" id="Fill-8-Copy"></path>-->
<!--            <path class="svg-fill--starter" d="M266.723418,12.4031505 L263.387383,12.4031505 C261.537146,12.4031505 260.004042,11.921657 258.789239,10.9569961 C257.499095,9.92147813 256.854316,8.53781185 256.854316,6.80543936 C256.854316,5.76992137 257.1586,4.77401641 257.766002,3.81884034 C258.372819,2.86366426 259.157184,2.18466351 260.12085,1.78295395 C261.082763,1.38068646 263.368694,1.1803896 266.976307,1.1803896 L279.706036,1.1803896 C282.828312,1.1803896 284.846753,1.35892719 285.763111,1.71600236 C286.771748,2.10878504 287.589403,2.78332235 288.216078,3.73849842 C288.842752,4.6936745 289.155798,5.69794841 289.155798,6.75132015 C289.155798,8.41227762 288.463711,9.85898998 287.080705,11.0908993 C286.089589,11.9662914 284.472968,12.4031505 282.229671,12.4031505 L279.342179,12.4031505 L279.342179,30.6178896 C279.342179,32.5996568 278.986499,34.135638 278.276307,35.2252752 C277.080194,37.0463585 275.350852,37.9574581 273.088866,37.9574581 C270.826881,37.9574581 269.088195,37.1272584 267.873392,35.4663009 C267.107132,34.4307829 266.723418,32.8590942 266.723418,30.7517928 L266.723418,12.4031505" id="Fill-9-Copy"></path>-->
<!--            <path class="svg-fill--starter" d="M304.702934,26.4389943 L310.438203,26.4389943 C312.807068,26.4389943 314.5697,26.90375 315.726683,27.8321454 C317.088079,28.9396363 317.769069,30.367937 317.769069,32.1176053 C317.769069,33.9035391 317.086327,35.3502515 315.72201,36.4571845 C314.656722,37.3147228 312.908691,37.7426551 310.478502,37.7426551 L300.63685,37.7426551 C298.318796,37.7426551 296.729624,37.5736023 295.870502,37.233823 C294.187884,36.5737918 293.075872,35.4930815 292.533299,33.9933658 C292.196892,33.0287049 292.029273,31.4480894 292.029273,29.2520771 L292.029273,9.3769385 C292.029273,7.71598104 292.084757,6.60012114 292.196892,6.02824294 C292.402474,4.86774864 292.898324,3.88579193 293.682689,3.08181487 C294.580358,2.17127319 295.720404,1.59102605 297.103994,1.34107343 C297.758118,1.23395088 299.085056,1.1803896 301.085392,1.1803896 L308.62768,1.1803896 C310.684084,1.1803896 311.880781,1.19824336 312.217188,1.23395088 C313.5634,1.35892719 314.665482,1.73385611 315.525773,2.35873766 C317.058293,3.46622861 317.824553,4.91294097 317.824553,6.69831681 C317.824553,8.62652272 317.153491,10.1000157 315.8102,11.1176799 C314.616423,12.0282216 312.984616,12.4834925 310.913612,12.4834925 L304.702934,12.4834925 L304.702934,14.9746497 L309.651502,14.9746497 C311.105761,14.9746497 312.308298,15.3412097 313.258531,16.0732138 C314.265415,16.8593371 314.768857,17.9394894 314.768857,19.3142288 C314.768857,22.2249494 312.913363,23.6800307 309.204128,23.6800307 L304.702934,23.6800307 L304.702934,26.4389943" id="Fill-10-Copy"></path>-->
<!--            <path class="svg-fill--starter" d="M345.585711,23.6532501 L348.557889,28.2070743 C349.380216,29.4752491 349.79138,30.7785735 349.79138,32.1176053 C349.79138,33.8142703 349.178723,35.2208117 347.954576,36.3366716 C346.730428,37.4530894 345.230031,38.0110194 343.453966,38.0110194 C341.173291,38.0110194 339.444534,37.082624 338.26711,35.2252752 L332.995568,26.975165 L332.995568,31.9301409 C332.995568,33.6268058 332.410944,35.0645913 331.243449,36.2429394 C330.074785,37.4212874 328.603005,38.0110194 326.827525,38.0110194 C324.658401,38.0110194 323.013746,37.2700884 321.891805,35.7871106 C320.882585,34.4843442 320.378559,32.7698254 320.378559,30.6446703 L320.378559,8.1176906 C320.378559,3.49300925 322.985712,1.1803896 328.201186,1.1803896 L336.220635,1.1803896 C338.855822,1.1803896 341.3047,1.90793026 343.566686,3.36301157 C345.828087,4.81920874 347.482672,6.70724369 348.529855,9.02879021 C349.31422,10.7784585 349.706695,12.5376117 349.706695,14.3051337 C349.706695,17.6091949 348.333617,20.7252337 345.585711,23.6532501" id="Fill-11-Copy"></path>-->
            <text transform="matrix(2.2504178251082765,0,0,1.8687975690540302,-135.94262765027074,-30.909814475776283) " xml:space="preserve" text-anchor="middle" font-family="Cursive" font-size="24" id="svg_3" y="35.99735" x="163.12625" stroke-linecap="inherit" stroke-linejoin="inherit" stroke-dasharray="null" stroke-width="0" fill="#000000" font-weight="bold" class="svg-fill--starter">MENOT</text>
        </svg>
        <h1 class="site-nav__item-label">KickMENOT</h1>
    </a>
</div>

<div class="site-nav-frame js-site-nav-container" role="navigation">
    <div class="site-nav-container site-nav-container--search" id="js-nav-search" aria-hidden="true">
        <div class="site-nav-unit site-nav-unit--search">
            <nav class="site-nav-base site-nav--search">
                <div class="site-nav__left">
                    <div class="site-nav__item site-nav__item--searchbar js-searchbar js-header-livesearch">
                        <form class="site-nav__search-form" role="search" action="/projects/search" accept-charset="UTF-8" method="get"><input name="utf8" value="✓" type="hidden">
                            <svg class="svg-icon__search js-search-icon" aria-hidden="true"><use xlink:href="#search"></use></svg>
                            <svg class="svg-icon__loading-spin js-loading-spinner hide" aria-hidden="true"><use xlink:href="#loading-spin"></use></svg>
                            <input name="term" id="term" aria-label="Search projects" data-tracker-name="Header Live Search" placeholder="Search" class="site-nav__search-input js-search-term text" maxlength="200" tabindex="-1" autocomplete="off" type="text">
                        </form>

                    </div>
                </div>
                <div class="site-nav__right">
                    <button aria-label="Close Search" class="site-nav__item site-nav__item--close js-toggle-search" data-nav="primary" href="#">
                        <svg class="svg-icon__close" aria-hidden="true"><use xlink:href="#close"></use></svg>

                    </button>
                </div>
            </nav>
        </div>
    </div>
    <div class="site-nav-container site-nav-container--main active-nav--primary">
        <div class="site-nav-unit site-nav-unit--primary" id="js-nav-primary">
            <nav class="site-nav-base site-nav--primary">
                <h2 class="for-screenreader" id="main-navigation">Main menu</h2>
                <div class="site-nav__left">
                    <a class="site-nav__item site-nav__item--skip-to-content site-nav__item--text skip-to-content skip-to-content__link" href="#start-of-content">
                        <span class="site-nav__item-label">Skip to content</span>
                    </a>

                    <a aria-controls="NS_discovery_overlay" aria-expanded="false" aria-haspopup="true" class="site-nav__item site-nav__item--text" href="<?php echo get_home_url(); ?>/project/" id="js-discovery-expand">
                        <svg class="svg-icon__compass motive-h3 motive-w3 mr1 fill-green-700" aria-hidden="true"><use xlink:href="#compass"></use></svg>
                        <span class="site-nav__item-label">Explore</span>
                    </a>
<!--                    <a class="site-nav__item site-nav__item--text" href="--><?php //echo get_home_url(); ?><!--/project-form/">-->
<!--                        <span class="site-nav__item-label">Start <span class="mobile-hide">a project</span></span>-->
<!--                    </a>-->
                    <a class="site-nav__item site-nav__item--text site-nav__item--about" href="<?php echo get_home_url(); ?>/why-we-are-different/">
                        <span class="site-nav__item-label">Why we're Different!</span>
                    </a>
                </div>
                <div class="site-nav__middle">
                    <a class="site-nav__item site-nav__item--logo" href="<?php echo get_home_url(); ?>">
                        <svg class="svg--ksr-logo" viewBox="0 0 354 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path class="svg-fill--kick" d="M13.2157427,13.5552759 L20.3375224,3.69776954 C21.6837338,1.84097866 23.4218359,0.912583227 25.5529967,0.912583227 C27.2916828,0.912583227 28.7961689,1.50175725 30.0676233,2.68010531 C31.3384936,3.85845336 31.9745128,5.26945821 31.9745128,6.91256191 C31.9745128,8.12661748 31.6375219,9.19840092 30.9647082,10.1267964 L24.5437761,19.0464225 L32.3944374,28.5552226 C33.1793867,29.5020297 33.5724454,30.6089628 33.5724454,31.8771375 C33.5724454,33.5553908 32.9556995,34.9970818 31.7216237,36.2022105 C30.4881319,37.4084551 28.9924063,38.0110194 27.2356149,38.0110194 C25.3100361,38.0110194 23.8429285,37.4129185 22.8331239,36.2161587 L13.2157427,24.7518141 L13.2157427,31.0731605 C13.2157427,32.8775059 12.8886804,34.278468 12.234556,35.2782785 C11.0378587,37.0999198 9.29917262,38.0110194 7.01908175,38.0110194 C4.9439888,38.0110194 3.33612758,37.3415035 2.19608215,36.0019136 C1.13079379,34.7694464 0.598149607,33.1358275 0.598149607,31.0999411 L0.598149607,7.66241976 C0.598149607,5.73365593 1.14013842,4.14467143 2.22470009,2.89435041 C3.36416149,1.57317229 4.93464416,0.912583227 6.93498003,0.912583227 C8.84186956,0.912583227 10.4304575,1.57317229 11.7019118,2.89435041 C12.41152,3.62691243 12.8600625,4.36784341 13.0475392,5.11770126 C13.1596748,5.58245691 13.2157427,6.44836419 13.2157427,7.71598104 L13.2157427,13.5552759" id="Fill-1-Copy"></path>
                            <path class="svg-fill--kick" d="M48.5875213,8.38549698 L48.5875213,31.0731605 C48.5875213,33.0381898 48.0548771,34.6539549 46.9895887,35.9215717 C45.8489592,37.3147228 44.269716,38.0110194 42.2506908,38.0110194 C40.4004532,38.0110194 38.8393151,37.3593572 37.5684448,36.0554749 C36.5025724,34.9663957 35.9699282,33.3054382 35.9699282,31.0731605 L35.9699282,8.38549698 C35.9699282,5.85026329 36.5025724,4.01076824 37.5684448,2.86756977 C38.7832473,1.56424541 40.3443853,0.912583227 42.2506908,0.912583227 C44.1575804,0.912583227 45.7181344,1.55531853 46.9335209,2.84078913 C48.0361878,4.01913719 48.5875213,5.86755911 48.5875213,8.38549698" id="Fill-2-Copy"></path>
                            <path class="svg-fill--kick" d="M71.8685106,0.188948082 C76.5227227,0.171652253 80.8031495,1.66244108 84.7103749,4.66243042 C87.7759991,7.01912653 89.3085192,9.45728041 89.3085192,11.9746603 C89.3085192,14.1176693 88.3740557,15.7786267 86.5051288,16.9569748 C85.4392564,17.6359756 84.2799376,17.975197 83.0283406,17.975197 C81.9998468,17.975197 81.0186601,17.7430981 80.0841967,17.2783425 C79.691138,17.0819511 78.7192959,16.1803363 77.1675025,14.5729401 C75.7284288,13.0726665 73.9243303,12.3228086 71.756375,12.3228086 C69.6625928,12.3228086 67.9098897,13.0151997 66.4988499,14.398866 C65.087226,15.7830902 64.3817061,17.4752917 64.3817061,19.4749127 C64.3817061,21.4572378 65.087226,23.1405124 66.4988499,24.5241787 C67.9098897,25.907845 69.6532481,26.6002361 71.7283411,26.6002361 C73.4477539,26.6002361 75.0462705,26.0467695 76.5227227,24.9392786 C77.4384969,24.100152 78.3455106,23.2610253 79.2425955,22.4213407 C80.2144375,21.6179216 81.4479293,21.216212 82.9436549,21.216212 C84.6636517,21.216212 86.154121,21.7919957 87.4162307,22.9435632 C88.6777564,24.0951306 89.3085192,25.4927451 89.3085192,27.1358488 C89.3085192,29.3681265 87.9348579,31.626627 85.1869513,33.912466 C81.3363777,37.1272584 76.8871635,38.7340966 71.8404767,38.7340966 C68.7182006,38.7340966 65.7740566,38.0997303 63.0080448,36.8326713 C59.5119833,35.2252752 56.7313704,32.8635577 54.6662062,29.7475189 C52.6004578,26.6314801 51.5678757,23.2247599 51.5678757,19.5284739 C51.5678757,13.992693 53.7171417,9.27874283 58.0168417,5.38550764 C61.8113475,1.95702809 66.4287651,0.225213529 71.8685106,0.188948082" id="Fill-3-Copy"></path>
                            <path class="svg-fill--kick" d="M111.951153,3.69776954 C113.296781,1.84097866 115.035467,0.912583227 117.166627,0.912583227 C118.90473,0.912583227 120.409216,1.50175725 121.68067,2.68010531 C122.95154,3.85845336 123.58756,5.26945821 123.58756,6.91256191 C123.58756,8.12661748 123.251153,9.19840092 122.577755,10.1267964 L116.156823,19.0464225 L124.007484,28.5552226 C124.793017,29.5020297 125.185492,30.6089628 125.185492,31.8771375 C125.185492,33.5553908 124.568746,34.9970818 123.335254,36.2022105 C122.101179,37.4084551 120.605453,38.0110194 118.848662,38.0110194 C116.923083,38.0110194 115.455975,37.4129185 114.446171,36.2161587 L104.828789,24.7518141 L104.828789,31.0731605 C104.828789,32.8775059 104.501727,34.278468 103.847603,35.2782785 C102.650905,37.0999198 100.912803,38.0110194 98.6321285,38.0110194 C96.5576196,38.0110194 94.9497584,37.3415035 93.809713,36.0019136 C92.7438406,34.7694464 92.2111964,33.1358275 92.2111964,31.0999411 L92.2111964,7.66241976 C92.2111964,5.73365593 92.7531852,4.14467143 93.8377469,2.89435041 C94.9777923,1.57317229 96.5476909,0.912583227 98.5480268,0.912583227 C100.454916,0.912583227 102.043504,1.57317229 103.314959,2.89435041 C104.025151,3.62691243 104.473693,4.36784341 104.660586,5.11770126 C104.772722,5.58245691 104.828789,6.44836419 104.828789,7.71598104 L104.828789,13.5552759 L111.951153,3.69776954 Z" id="Fill-4-Copy"></path>
<!--                            <path class="svg-fill--starter" d="M133.100982,23.9210564 C134.503261,23.9210564 135.998403,24.5102305 137.587575,25.6891365 C139.568637,27.1715563 140.924193,27.9124873 141.653075,27.9124873 C142.737052,27.9124873 143.279625,27.3768745 143.279625,26.3050911 C143.279625,25.7159171 142.961324,25.2165698 142.325888,24.8053754 C141.989482,24.5911303 140.101281,23.9037606 136.662456,22.7427084 C131.035233,20.85021 128.222498,17.3503154 128.222498,12.2424667 C128.222498,8.38549698 129.708295,5.34143117 132.680473,3.10859551 C135.278282,1.16253584 138.494004,0.188948082 142.325888,0.188948082 C145.634473,0.188948082 148.513205,0.943827304 150.962083,2.45246989 C153.410961,3.9616704 154.635108,5.90382456 154.635108,8.27837443 C154.635108,9.70723303 154.173133,10.8995293 153.24743,11.8541475 C152.322311,12.8098815 151.120942,13.2874695 149.64449,13.2874695 C148.092696,13.2874695 146.373283,12.5822461 144.485083,11.1712412 C143.307659,10.2964071 142.419335,9.85898998 141.821278,9.85898998 C140.793368,9.85898998 140.279413,10.3410415 140.279413,11.3051444 C140.279413,12.2156861 141.550284,13.0464438 144.092608,13.7963016 C147.606775,14.8502313 150.326648,16.1357019 152.252227,17.6538293 C154.812657,19.6891578 156.093456,22.546875 156.093456,26.2247492 C156.093456,30.2256649 154.653798,33.3500726 151.77565,35.6002041 C149.101917,37.6896517 145.625128,38.7340966 141.344702,38.7340966 C137.064275,38.7340966 133.522074,37.6455753 130.7181,35.4663009 C128.474804,33.7344863 127.353447,31.7075268 127.353447,29.3854224 C127.353447,27.8321454 127.904197,26.5377479 129.007448,25.501672 C130.110115,24.466154 131.475015,23.9394681 133.100982,23.9210564" id="Fill-5-Copy"></path>-->
<!--                            <path class="svg-fill--starter" d="M167.371846,12.4031505 L164.035227,12.4031505 C162.184405,12.4031505 160.651885,11.921657 159.437083,10.9569961 C158.146939,9.92147813 157.502159,8.53781185 157.502159,6.80543936 C157.502159,5.76992137 157.806444,4.77401641 158.413261,3.81884034 C159.020662,2.86366426 159.805612,2.18466351 160.768693,1.78295395 C161.73119,1.38068646 164.016538,1.1803896 167.624151,1.1803896 L180.354463,1.1803896 C183.475571,1.1803896 185.494013,1.35892719 186.410955,1.71600236 C187.419591,2.10878504 188.237831,2.78332235 188.863921,3.73849842 C189.490012,4.6936745 189.803641,5.69794841 189.803641,6.75132015 C189.803641,8.41227762 189.111554,9.85898998 187.729132,11.0908993 C186.737433,11.9662914 185.121395,12.4031505 182.877515,12.4031505 L179.990023,12.4031505 L179.990023,30.6178896 C179.990023,32.5996568 179.634343,34.135638 178.923566,35.2252752 C177.728037,37.0463585 175.998696,37.9574581 173.737294,37.9574581 C171.475308,37.9574581 169.736622,37.1272584 168.521236,35.4663009 C167.754976,34.4307829 167.371846,32.8590942 167.371846,30.7517928 L167.371846,12.4031505" id="Fill-6-Copy"></path>-->
<!--                            <path class="svg-fill--starter" d="M198.163001,33.0019243 C197.563776,34.3593679 196.947031,35.3681052 196.311595,36.0286943 C195.040725,37.3504303 193.498276,38.0110194 191.685417,38.0110194 C189.460226,38.0110194 187.731469,37.154039 186.497977,35.4389623 C185.769095,34.4212981 185.404654,33.2786576 185.404654,32.0110407 C185.404654,30.957111 185.666304,29.8942545 186.190188,28.823029 L198.163001,4.47496596 C199.321152,2.10041609 201.256075,0.912583227 203.966603,0.912583227 C206.71451,0.912583227 208.686228,2.13556568 209.882925,4.58208851 L221.968458,29.117616 C222.454379,30.1001306 222.69734,31.0731605 222.69734,32.0378214 C222.69734,33.466122 222.210835,34.7342968 221.238993,35.8412298 C219.967538,37.2879422 218.340988,38.0110194 216.359925,38.0110194 C214.733959,38.0110194 213.378403,37.5289679 212.293841,36.564307 C211.490202,35.8507146 210.686564,34.6628818 209.882925,33.0019243 L198.163001,33.0019243" id="Fill-7-Copy"></path>-->
<!--                            <path class="svg-fill--starter" d="M250.867909,23.6532501 L253.840671,28.2070743 C254.662999,29.4752491 255.074163,30.7785735 255.074163,32.1176053 C255.074163,33.8142703 254.461505,35.2208117 253.237942,36.3366716 C252.013211,37.4530894 250.512813,38.0110194 248.737332,38.0110194 C246.456657,38.0110194 244.727316,37.082624 243.550476,35.2252752 L238.27835,26.975165 L238.27835,31.9301409 C238.27835,33.6268058 237.693726,35.0645913 236.525647,36.2429394 C235.357568,37.4212874 233.885788,38.0110194 232.110307,38.0110194 C229.941768,38.0110194 228.297112,37.2700884 227.175172,35.7871106 C226.165951,34.4843442 225.660757,32.7698254 225.660757,30.6446703 L225.660757,8.1176906 C225.660757,3.49300925 228.268494,1.1803896 233.483384,1.1803896 L241.503417,1.1803896 C244.139188,1.1803896 246.587482,1.90793026 248.849468,3.36301157 C251.11087,4.81920874 252.765454,6.70724369 253.812053,9.02879021 C254.597586,10.7784585 254.990645,12.5376117 254.990645,14.3051337 C254.990645,17.6091949 253.615816,20.7252337 250.867909,23.6532501" id="Fill-8-Copy"></path>-->
<!--                            <path class="svg-fill--starter" d="M266.723418,12.4031505 L263.387383,12.4031505 C261.537146,12.4031505 260.004042,11.921657 258.789239,10.9569961 C257.499095,9.92147813 256.854316,8.53781185 256.854316,6.80543936 C256.854316,5.76992137 257.1586,4.77401641 257.766002,3.81884034 C258.372819,2.86366426 259.157184,2.18466351 260.12085,1.78295395 C261.082763,1.38068646 263.368694,1.1803896 266.976307,1.1803896 L279.706036,1.1803896 C282.828312,1.1803896 284.846753,1.35892719 285.763111,1.71600236 C286.771748,2.10878504 287.589403,2.78332235 288.216078,3.73849842 C288.842752,4.6936745 289.155798,5.69794841 289.155798,6.75132015 C289.155798,8.41227762 288.463711,9.85898998 287.080705,11.0908993 C286.089589,11.9662914 284.472968,12.4031505 282.229671,12.4031505 L279.342179,12.4031505 L279.342179,30.6178896 C279.342179,32.5996568 278.986499,34.135638 278.276307,35.2252752 C277.080194,37.0463585 275.350852,37.9574581 273.088866,37.9574581 C270.826881,37.9574581 269.088195,37.1272584 267.873392,35.4663009 C267.107132,34.4307829 266.723418,32.8590942 266.723418,30.7517928 L266.723418,12.4031505" id="Fill-9-Copy"></path>-->
<!--                            <path class="svg-fill--starter" d="M304.702934,26.4389943 L310.438203,26.4389943 C312.807068,26.4389943 314.5697,26.90375 315.726683,27.8321454 C317.088079,28.9396363 317.769069,30.367937 317.769069,32.1176053 C317.769069,33.9035391 317.086327,35.3502515 315.72201,36.4571845 C314.656722,37.3147228 312.908691,37.7426551 310.478502,37.7426551 L300.63685,37.7426551 C298.318796,37.7426551 296.729624,37.5736023 295.870502,37.233823 C294.187884,36.5737918 293.075872,35.4930815 292.533299,33.9933658 C292.196892,33.0287049 292.029273,31.4480894 292.029273,29.2520771 L292.029273,9.3769385 C292.029273,7.71598104 292.084757,6.60012114 292.196892,6.02824294 C292.402474,4.86774864 292.898324,3.88579193 293.682689,3.08181487 C294.580358,2.17127319 295.720404,1.59102605 297.103994,1.34107343 C297.758118,1.23395088 299.085056,1.1803896 301.085392,1.1803896 L308.62768,1.1803896 C310.684084,1.1803896 311.880781,1.19824336 312.217188,1.23395088 C313.5634,1.35892719 314.665482,1.73385611 315.525773,2.35873766 C317.058293,3.46622861 317.824553,4.91294097 317.824553,6.69831681 C317.824553,8.62652272 317.153491,10.1000157 315.8102,11.1176799 C314.616423,12.0282216 312.984616,12.4834925 310.913612,12.4834925 L304.702934,12.4834925 L304.702934,14.9746497 L309.651502,14.9746497 C311.105761,14.9746497 312.308298,15.3412097 313.258531,16.0732138 C314.265415,16.8593371 314.768857,17.9394894 314.768857,19.3142288 C314.768857,22.2249494 312.913363,23.6800307 309.204128,23.6800307 L304.702934,23.6800307 L304.702934,26.4389943" id="Fill-10-Copy"></path>-->
<!--                            <path class="svg-fill--starter" d="M345.585711,23.6532501 L348.557889,28.2070743 C349.380216,29.4752491 349.79138,30.7785735 349.79138,32.1176053 C349.79138,33.8142703 349.178723,35.2208117 347.954576,36.3366716 C346.730428,37.4530894 345.230031,38.0110194 343.453966,38.0110194 C341.173291,38.0110194 339.444534,37.082624 338.26711,35.2252752 L332.995568,26.975165 L332.995568,31.9301409 C332.995568,33.6268058 332.410944,35.0645913 331.243449,36.2429394 C330.074785,37.4212874 328.603005,38.0110194 326.827525,38.0110194 C324.658401,38.0110194 323.013746,37.2700884 321.891805,35.7871106 C320.882585,34.4843442 320.378559,32.7698254 320.378559,30.6446703 L320.378559,8.1176906 C320.378559,3.49300925 322.985712,1.1803896 328.201186,1.1803896 L336.220635,1.1803896 C338.855822,1.1803896 341.3047,1.90793026 343.566686,3.36301157 C345.828087,4.81920874 347.482672,6.70724369 348.529855,9.02879021 C349.31422,10.7784585 349.706695,12.5376117 349.706695,14.3051337 C349.706695,17.6091949 348.333617,20.7252337 345.585711,23.6532501" id="Fill-11-Copy"></path>-->
                            <text transform="matrix(2.2504178251082765,0,0,1.8687975690540302,-135.94262765027074,-30.909814475776283) " xml:space="preserve" text-anchor="middle" font-family="Cursive" font-size="24" id="svg_3" y="35.99735" x="163.12625" stroke-linecap="inherit" stroke-linejoin="inherit" stroke-dasharray="null" stroke-width="0" fill="#000000" font-weight="bold" class="svg-fill--starter">MENOT</text>

                        </svg>

                        <h1 class="site-nav__item-label">Kickstarter</h1>
                    </a>

                </div>
                <div class="site-nav__right">
                    <a aria-label="Enter Search" class="site-nav__item site-nav__item--search js-toggle-search" data-nav="search" href="#">
                        <svg class="svg-icon__search" aria-hidden="true"><use xlink:href="#search"></use></svg>
                        <span class="site-nav__item-label">Enter Search</span>
                    </a>

                    <a class="site-nav__item site-nav__item--text" href="<?php echo get_home_url(); ?>/login/">
                        <span class="site-nav__item-label">Log in</span>
                    </a>
                    <a class="site-nav__item site-nav__item--text site-nav__item--signup" href="<?php echo get_home_url(); ?>/registration/">
                        <span class="site-nav__item-label">Sign up</span>
                    </a>

                </div>
            </nav>
        </div>
    </div>
</div>