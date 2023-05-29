<?php 
include_once get_stylesheet_directory().'/new-header.php'; ?>



<style>
label {
    font-size: 18px;
    text-align:center;
  width: 100%;
}

select {
    font-size: 16px;
    padding: 5px 5px 5px 5px;
  margin-left: 18px;
}
.output {
    background: center/cover no-repeat url('/media/cc0-images/hamster.jpg');
    position: relative;
}


p.hometoptext {

    margin-bottom: 0px;
    font-weight: 600;
}

h2.hplett {
    text-align: center;
    width: 100%;
    margin-top: 20px;
    color: #404042;
  font-size: 28px;
    font-weight: 600;
}

p.hpledesc {
    text-align: center;
    color: #5a5a5c;
    font-weight: 500;
    font-size: 13px;
  margin: 10px 30px 10px 30px;
}

.hpletcr {
  height: 100px;
  width: 100px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}

.hptopexp {
    border: 1px solid #ccc;
    margin-bottom: 30px;
    vertical-align: middle;
    margin-right: 30px;
    margin-left: 30px;
    border-radius: 10px;
	height: 45px;
}
.hptoptexp {
    background: #538aca;
}
.hptopcexp {
    background: #019b91;
}
.hptopsexp {
    background: #835196;
}
p.hpexptitle {
    float: left;
    font-size: 16px;
    color: #fff;
    padding: 5px 0px 0px 0px;
    font-weight: 600;
    vertical-align: -webkit-baseline-middle;
  margin-bottom: 0px !important;
    line-height: 2;
  
}
img.hpexpimag {
    float: right;
    width: 55px;
    height: 43px;
    display: inline-block;
    padding: 5px 10px 5px 10px;
    margin-right: -16px;
    border-radius: 0px 10px 10px 0px;
}
.hpexptimg {
    background: #3f5f86;
  border-left: 1px solid #3f5f86;
}
.hpexpcimg {
    background: #0e6964;
  border-left: 1px solid #0e6964;
}
.hpexpsimg {
    background: #5d3e67;
  border-left: 1px solid #5d3e67;
}

label.isstherapy-select {
    margin-top: 10px;
    font-size: 20px;
    font-weight: 600;
}

#sectionlist .sectionitem figure figcaption, #sectionlist1 .sectionitem figure figcaption {
    color: #231f20;
    text-align: center;
    font-weight: 600 !important;
    margin-top: 10px;
    margin-bottom: 20px;
  font-size: 15px;
}

.dropbtn {
  background-color: #fff;
    color: #000;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    cursor: pointer;
  width: 300px;
  margin-left: 35px;
    margin-right: 30px;
  text-align: left;

}

.dropbtn:hover, .dropbtn:focus {
  background-color: #fff;
}

input:focus{
	
}
#myInput {
  box-sizing: border-box;
  background-image: url('https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/searchicon.png');
  background-position: 10px 5px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 5px 20px 5px 45px;
  width: 100%;
  font-weight: 600;
  border: 1px solid #ccc;
  border-radius: 50px;
  margin-top: 10px;
  color:#000;
  outline: none;
}


.dropdown {
  /*position: relative;*/
  display: inline-block;
  z-index: 11;
  margin-top: 15px;
  width: 100%;
  margin: 0 auto;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: scroll;
  border: 1px solid #ddd;
  z-index: 1;
  height: max-content;
  max-height: 350px;
  width: 88%;
  margin-left: 55px;
  
  
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #fff;}

.show {display: block;} 

h2.hpissthe {
    font-size: 20px;
    text-align: center;
    width: 100%;
    margin-top: 10px;
}
a.drptitle {
    font-size: 20px;
    font-weight: 600;
    background: #ccc;
}

.dropbtn1{
    background-color: transparent;
    z-index: 11;
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    display: none;
}
.float_div{
  width:100%;
  height:3rem;
  display:flex;
  justify-content: center;
  margin-top: 20px;
  margin-bottom: 10px;
}
.float_div div{
font-size:25px;
line-height: 3rem;

border-radius: 50%;
font-weight: 600;
}
.float_child_cir{
background-color: #63C7DF;
font-weight: bold;
padding: 0px 15px 0px 0px;
position: relative;
}
#catTabs {
    flex: 1;
    display: none;
}
.bubble-bottom-left:before {
  content: "";
  width: 0px;
  height: 0px;
  position: absolute;
  border-left: 24px solid #fff;
  border-right: 12px solid transparent;
  border-top: 12px solid #fff;
  border-bottom: 20px solid transparent;
  left: 32px;
  bottom: -24px;
}

.example-obtuse {
  position:relative;
  margin:0;
  color:#000;
  background:#63c7df; /* default background for browsers without gradient support */
  /* css3 */
  background:-webkit-gradient(linear, 0 0, 0 100%, from(#63c7df), to(#63c7df));
  background:-moz-linear-gradient(#63c7df, #63c7df);
  background:-o-linear-gradient(#63c7df, #63c7df);
  background:linear-gradient(#63c7df, #63c7df);
  /* Using longhand to avoid inconsistencies between Safari 4 and Chrome 4 */
  -webkit-border-top-left-radius:25px 50px;
  -webkit-border-top-right-radius:25px 50px;
  -webkit-border-bottom-right-radius:25px 50px;
  -webkit-border-bottom-left-radius:25px 50px;
  -moz-border-radius:25px / 50px;
  border-radius:25px / 50px;
}

/* creates the larger triangle */
.example-obtuse:before {
  content:"";
  position:absolute;
  bottom:-17px;
  right:34px;
  border-width:0 0 30px 11px;
  border-style:solid;
  border-color:transparent #63c7df;
  /* reduce the damage in FF3.0 */
  display:block;
  width:0;
}


.oval-speech {
  position:relative;
  width:50px;
  padding:0px 15px 0px 3px;
  text-align:center;
  background:#63c7df;
  /* css3 */
  background:-webkit-gradient(linear, 0 0, 0 100%, from(#63c7df), to(#63c7df));
  background:-moz-linear-gradient(#63c7df, #63c7df);
  background:-o-linear-gradient(#63c7df, #63c7df);
  background:linear-gradient(#63c7df, #63c7df);
  /*
  NOTES:
  -webkit-border-radius:220px 120px; // produces oval in safari 4 and chrome 4
  -webkit-border-radius:220px / 120px; // produces oval in chrome 4 (again!) but not supported in safari 4
  Not correct application of the current spec, therefore, using longhand to avoid future problems with webkit corrects this
  */
  -webkit-border-top-left-radius:220px 120px;
  -webkit-border-top-right-radius:220px 120px;
  -webkit-border-bottom-right-radius:220px 120px;
  -webkit-border-bottom-left-radius:220px 120px;
  -moz-border-radius:220px / 120px;
  border-radius:220px / 120px;
}

.oval-speech p {font-size:1.25em;}

/* creates part of the curve */
.oval-speech:before {
  content:"";
  position:absolute;
  z-index:-1;
  bottom:-10px;
  right:33%;
  height:32px;
  border-right:28px solid #63c7df;
  background:#63c7df; /* need this for webkit - bug in handling of border-radius */
  /* css3 */
  -webkit-border-bottom-right-radius:80px 50px;
  -moz-border-radius-bottomright:80px 50px;
  border-bottom-right-radius:80px 50px;
  /* using translate to avoid undesired appearance in CSS2.1-capabable but CSS3-incapable browsers */
  -webkit-transform:translate(0, -2px);
  -moz-transform:translate(0, -2px);
  -ms-transform:translate(0, -2px);
  -o-transform:translate(0, -2px);
  transform:translate(0, -2px);
}

/* creates part of the curved pointy bit */
.oval-speech:after {
  content:"";
  position:absolute;
  z-index:-1;
  bottom:-13px;
  right:-3%;
  width:60px;
  height:30px;
  background:#fff;
  /* css3 */
  -webkit-border-bottom-right-radius:40px 50px;
  -moz-border-radius-bottomright:40px 50px;
  border-bottom-right-radius:40px 50px;
  /* using translate to avoid undesired appearance in CSS2.1-capabable but CSS3-incapable browsers */
  -webkit-transform:translate(-30px, -2px);
  -moz-transform:translate(-30px, -2px);
  -ms-transform:translate(-30px, -2px);
  -o-transform:translate(-30px, -2px);
  transform:translate(-30px, -2px);
}


@media (min-width: 320px) and (max-width: 640px) {
	.ew_accordion ul li {
    width: 90%;
    height: 75px;
    padding: 0;
    margin: 0;
    margin-right: 10px;
    position: relative;
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
    flex-shrink: 0;
    margin-bottom: 15px;
    overflow: hidden;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    -ms-border-radius: 10px;
    border-radius: 10px;
    -webkit-box-shadow: 0 0 6px #000;
    -moz-box-shadow: 0 0 6px #000;
    box-shadow: 0 0 6px #000;
    margin-left: 15px;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #fff;
  min-width: 230px;
  overflow: scroll;
  border: 1px solid #ddd;
  z-index: 1;
  height: max-content;
  max-height: 350px;
  width: 88%;
  margin-left: 55px;
  
  
}
.dropdown {
    display: inline-block;
    z-index: 11;
    margin-top: 15px;
    width: 85% !important;
    margin: 0 auto;
    margin-right: 65px;
}

	
}


</style>
<div class="container text-center" style="margin-top: -20px;margin-bottom: 10px;">

<p class="hometoptext" style="margin-bottom: -6px;"><span style="color:#caacd2; font-size:13px;text-align:left !important">Do you wake up happy? </span></p>
<p class="hometoptext" style="margin-bottom: -2px;"><span style="color:#38c495;font-size:11px;text-align:center !important">Ready to Thriive?</span> <span style="color:#7f7f7f;font-size:11px;text-align:center !important">Or stuck everyday feeling..</span> </p>
<p class="hometoptext" style="margin-bottom: -6px;"><span style="color:#2a2b5e; font-size:22px;text-align:center !important">Holistic Mental Wellness</span></p>
<p class="hometoptext" style="margin-bottom: -2px;"><span style="color:#7f7f7f;font-size:11px;text-align:left !important">Stressed out?</span> <span style="color:#f46966;font-size:11px;text-align:left !important">Relationship struggles?</span> </p>
<p class="hometoptext" style="margin-top: -6px;"><span style="color:#7f4e8f;font-size:11px;text-align:center !important">Issues in the bedroom?</span> </p>

</div>




<div class="container ">
<div class="dropbtn1" onclick="myFunction('drop1')"></div>

<div class="row">


<div class="dropdown">
  <!--<button onclick="myFunction('drop')" class="dropbtn" style="z-index:9;">Search by Issues / Therapies <img src="https://beta1.thriive.in/wp-content/themes/thriive/horoscope_new/down.png" style="    width: 22px;height: 26px;margin-top: -5px;margin-left: 15px;"></button>-->
  
  <input onclick="myFunction('drop')" class="dropbtn" style="z-index:9;" type="text" placeholder="Search by Issues / Therapies" id="myInput" onkeyup="filterFunction()">
  <div id="myDropdown" class="dropdown-content">
   <!-- <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">-->
    <a href="https://www.thriive.in/ailment/relationship-issues">Relationship Issues</a>
    <a href="https://www.thriive.in/ailment/anxiety-disorders">Anxiety & Stress</a>
    <a href="https://www.thriive.in/ailment/anger-management">Anger Management</a>
    <a href="https://www.thriive.in/ailment/family-issues">Family Issues</a>
    <a href="https://www.thriive.in/ailment/career-issues">Career Issues</a>
    <a href="https://www.thriive.in/ailment/lack-of-confidence">Lack of Confidence</a>
    <a href="https://www.thriive.in/ailment/de-motivation">De-motivation</a>
    <a href="https://www.thriive.in/ailment/lack-of-clarity">Lack of Clarity</a>
    <a href="https://www.thriive.in/ailment/phobia">Phobia</a>
    <a href="https://www.thriive.in/ailment/addiction-issues">Addiction Issues</a>
    <a href="https://www.thriive.in/ailment/clinical-depression">Clinical Depression</a>
    <a href="https://www.thriive.in/ailment/emotional-fatigue">Emotional Fatigue</a>
    <a href="https://www.thriive.in/ailment/childhood-trauma">Childhood trauma</a>
    <a href="https://www.thriive.in/ailment/sexual-issues">Sexual Issue</a>
    <a href="https://www.thriive.in/ailment/sexual-dysfunction">Dysfunction</a>
    <a href="https://www.thriive.in/ailment/premature-ejaculation">Premature Ejaculation</a>
    <a href="https://www.thriive.in/ailment/erectile-dysfunction">Erectile Dysfunction</a>
    <a href="https://www.thriive.in/ailment/impotency">Impotency</a>
    <a href="https://www.thriive.in/ailment/sex-problems">Sex Problems</a>
    <a href="https://www.thriive.in/ailment/sexual-arousal-disorders">Sexual Arousal Disorder</a>
	<a href="https://www.thriive.in/counseling">Counseling</a>
	<a href="https://www.thriive.in/talk-to-best-life-coach-online">Life Coach</a>
	<a href="https://www.thriive.in/hypnotherapy1">Hypno Therapy</a>
	<a href="https://www.thriive.in/past-life-regression-therapy">Past Life Regression</a>
	<a href="https://www.thriive.in/inner-child-healing">Inner Child Healing</a>
	<a href="https://www.thriive.in/emotional-freedom-technique-eft">EFT - Emotional Freedom Technique</a>
	<a href="https://www.thriive.in/talk-to-best-tarot-card-reader-online">Tarot Card Reading</a>
	<a href="https://www.thriive.in/find-online-the-best-sex-therapist">Sex Therapy</a>
  </div>
</div>
<script>
  
  function myFunction(dclass){
        let this_drop = document.querySelector('#myDropdown').style.display;
if(dclass=='drop'){
        if(this_drop == "" || this_drop =="none"){
            document.querySelector('#myDropdown').style.display = 'block';
document.querySelector('.dropbtn1').style.display = 'block';
        }else{
        document.querySelector('#myDropdown').style.display = 'none';
        document.querySelector('.dropbtn1').style.display = 'none';
}
    
    }else{
document.querySelector('#myDropdown').style.display='none';

document.querySelector('.dropbtn1').style.display = 'none';
}}



/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function filterFunction() {
 var input, filter, ul, li, a, i;
 input = document.getElementById("myInput");
 filter = input.value.toUpperCase();
 div = document.getElementById("myDropdown");
 a = div.getElementsByTagName("a");
 for (i = 0; i < a.length; i++) {
   txtValue = a[i].textContent || a[i].innerText;
   if (txtValue.toUpperCase().indexOf(filter) > -1) {
     a[i].style.display = "";
   } else {
     a[i].style.display = "none";
   }
 }
}
</script>


</div>






<div class="row">
<div class="float_div">
<div class="float_child">Let's T</div><div class="float_child_cir oval-speech">alk</div>
</div>
<p class="hpledesc">Talk to India’s top verified holistic mental health experts. Thriive your way to mental balance.</p>

<div class="col-md-12 col-xs-12 hptopexp hptoptexp" style="margin-top: 10px;">
<a href="https://www.thriive.in/talk-to-best-tarot-card-reader-online">
<p class="hpexptitle">Talk to Tarot experts</p>
<img class="hpexpimag hpexptimg"  src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/Tarot-Icons-01.svg" alt="Talk to Tarot experts" title="Talk to Tarot experts"/></a>
</div>

<div class="col-md-12 col-xs-12 hptopexp hptopcexp">
<a href="https://www.thriive.in/talk-to-best-life-coach-online">
<p class="hpexptitle">Talk to a Life Coach</p>
<img class="hpexpimag hpexpcimg"  src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/counselor-Icons-02.svg" alt="Talk to a Life Coach" title="Talk to a Life Coach"/></a>
</div>



<div class="col-md-12 col-xs-12 hptopexp hptopsexp" style="margin-bottom: 10px;">
<a href="https://www.thriive.in/find-online-the-best-sex-therapist">
<p class="hpexptitle">Talk to Sex Therapists</p>
<img class="hpexpimag hpexpsimg" src="https://www.thriive.in/wp-content/themes/thriive/assets/images/newsoulimg/sex-thrapy-Icons-03.svg"/ alt="Talk to Sex Therapists" title="Talk to Sex Therapists"></a>
</div>


</div>

<div class="row">
  <div class="seprator my-2">
    <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
  </div>
</div>

  <!-- talk to counselor now -->
  <div class="row">
    <section id="counselor_accordion_block" class="widgetblock">
      <h2 class="wdgt-head mt-2 mb-1 text-center">We Are Here To Help</h2>
      <section id="counselor_accordion" class="ew_accordion">
        <ul>
          <li class="open">
            <div class="bgholder relationship active">
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Relationship_Issues_278x200.jpg)" class="counselImage d-block d-lg-none" ></div>
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Relationship_Issues_401x301.jpg)" class="counselImage d-none d-lg-block" ></div>
            </div>
            <div class="captionText">
              <h2 class="title">Relationship<br>Issues</h2>
                      <div class="descWrapper">
                <div class="desc">
                  <p>Save your relationship by building stronger bond and more fulﬁlling connections with your partner.</p>
                  <p>Consult a Couple's Therapist today</p>
                </div>
                <span class="btn-consult">Get Started</span>
              </div>
            </div>
            <a href="https://www.thriive.in/ailment/relationship-issues" class="counsellink"></a>
        </li>
        <li class="">
            <div class="bgholder family-therapy">
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Stress-Coach-278x201.jpg)" class="counselImage d-block d-lg-none" ></div>
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Stress-Coach-301x401.jpg)" class="counselImage d-none d-lg-block"></div>
            </div>
            <div class="captionText">
              <h2 class="title">Stress/Anxiety<br>/Depression/Career</h2>
              <div class="descWrapper">
                <div class="desc">
                  <p>Save your relationship by building stronger bond and more fulﬁlling connections with your partner.</p>
                  <p>Consult a Couple's Therapist today</p>
                </div>
                <span class="btn-consult">Get Started</span>
              </div>
            </div>
            <a href="https://www.thriive.in/talk-to-best-life-coach-online" class="counsellink"></a>
        </li>
        <li class="">
            <div class="bgholder stress-couching">
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Sexual_Issues_278x200.jpg)" class="counselImage d-block d-lg-none" ></div>
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Sexual_Issues_401x301.jpg)" class="counselImage d-none d-lg-block"></div>
            </div>
            <div class="captionText">
              <h2 class="title">Sexual<br>Issues</h2>
              <div class="descWrapper">
                <div class="desc">
                  <p>A shocking 81% of men face some or the other form of sexual issue, as reported by NCBI.</p>
                  <p>Consult a Sex Therapist today</p>
                </div>
                <span class="btn-consult">Get Started</span>
              </div>
            </div>
            <a href="https://www.thriive.in/find-online-the-best-sex-therapist" class="counsellink"></a>
        </li>
        <li class="">
            <div class="bgholder family-therapy">
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Family-Therapy-278x201.jpg)" class="counselImage d-block d-lg-none" ></div>
              <div style="background-image:url(wp-content/themes/thriive/assets/images/newsoulimg/Family-Therapy-301x401.jpg)" class="counselImage d-none d-lg-block"></div>
            </div>
            <div class="captionText">
              <h2 class="title">Parenting &<br>Teen</h2>
              <div class="descWrapper">
                <div class="desc">
                  <p>It’s not for nothing that teenage is also called the rebel phase! Parenting a teen is no game, especially when it comes to taking care of their mental health.</p>
                </div>
                <span class="btn-consult">Get Started</span>
              </div>
            </div>
            <a href="https://www.thriive.in/ailment/parenting-teen" class="counsellink"></a>
        </li>


        </ul>
      </section>
        
    </section>
  </div>
  <div class="row">
    <div class="seprator my-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
    </div>
  </div>
  
  <div class="row">
    <section id="bodyExperts" class="widgetblock">
     <h2 class="wdgt-head mt-2 mb-4 text-center">  Top Therapies  </h2>
      <ul id="sectionlist1" class="row px-3">
    
        <li class="sectionitem col-6 col-sm-3">
          <a href="https://www.thriive.in/counseling">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/counselling-Icons-04.svg'; ?>" alt="Counseling" title="Counseling">
              <figcaption>Counseling</figcaption>
            </figure>
          </a>
        </li>

      <li class="sectionitem col-6 col-sm-3">
      <a href="https://www.thriive.in/talk-to-best-life-coach-online">
        <figure>
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/lifecoach-Icons-05.svg'; ?>" alt="Life Coaching" title="Life Coaching">
        <figcaption>Life Coaching</figcaption>
        </figure>
      </a>
      </li>   
      
        <li class="sectionitem col-6 col-sm-3">
          <a href="https://www.thriive.in/past-life-regression-therapy">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/plr-Icons-06.svg'; ?>" alt="Past Life Regression" title="Past Life Regression">
              <figcaption>Past Life Regression</figcaption>
            </figure>
          </a>
        </li>
    
        <li class="sectionitem col-6 col-sm-3">
          <a href="https://www.thriive.in/Hypnotherapy">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/hyphontherapy-Icons-07.svg'; ?>" alt="Hypnotherapy" title="Hypnotherapy">
              <figcaption>Hypnotherapy</figcaption>
            </figure>
          </a>
        </li>
    
          <li class="sectionitem col-6 col-sm-3">
            <a href="https://www.thriive.in/inner-child-healing">
              <figure>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/inner-child-Icons-08.svg'; ?>" alt="Innerchild Healing" title="Innerchild Healing">
                <figcaption>Innerchild Healing</figcaption>
              </figure>
            </a>
          </li>
      
    <li class="sectionitem col-6 col-sm-3">
      <a href="https://www.thriive.in/emotional-freedom-technique-eft">
      <figure>
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/eft-Icons-09.svg'; ?>" alt="EFT - Emotional Freedom Technique" title="EFT - Emotional Freedom Technique">
      <figcaption>EFT - Emotional Freedom Technique</figcaption>
      </figure>
      </a>
    </li>

        <li class="sectionitem col-6 col-sm-3">
          <a href="https://www.thriive.in/find-online-the-best-sex-therapist">
            <figure>
              <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/sex-Icons-10.svg'; ?>" alt="Sex Therapy" title="Sex Therapy">
              <figcaption>Sex Therapy</figcaption>
            </figure>
          </a>
        </li>





      <li class="sectionitem col-6 col-sm-3">
            <a href="https://www.thriive.in/talk-to-best-tarot-card-reader-online">
              <figure>
                <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/Icons-01.png'; ?>" alt="Tarot Card Reading" title="Tarot Card Reading">
                <figcaption>Tarot Card</figcaption>
              </figure>
            </a>
          </li>
      </ul>
    </section>
  </div>
  
  
  
  
  <!-- horizontal accordian -->
  <?php if( have_rows('free_meditation_video') ): ?>
    <div class="row">
      <section id="meditation_accordion_block" class="widgetblock">
    
        <h2 class="wdgt-head mt-2 mb-1 text-center">Free Meditation Videos</h2>
        <section id="meditationVideos"  class="ewHorizontalAccordian" >
          <ul>
            <?php $i = 0;
            while ( have_rows('free_meditation_video') ) : the_row(); ?>
                <li <?php if($i == 0){echo 'class="open"'; } ?>>
                <a href="<?php echo get_sub_field('video_link'); ?>">
                    <div class="bgholder">
                      <div style="background-image:url(<?php echo get_sub_field('image_mobile'); ?>)" class="bgimage d-block d-lg-none" ></div>
                      <div style="background-image:url(<?php echo get_sub_field('image_desktop'); ?>)" class="bgimage d-none d-lg-block"></div>
                      <div class="iconplay"><img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-meditation-play.svg'; ?>" alt=""></div>
                    </div>
                    <div class="captionText">
                      <p class="title"><?php echo get_sub_field('video_title'); ?></p>
                      <p><?php echo get_sub_field('video_description'); ?></p>
                    </div>
                </a>
                </li>
            <?php $i++; 
            endwhile; ?>
          </ul>
        </section>
    </div>
    <div class="row">
      <div class="seprator my-2">
          <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
      </div>
    </div>
  <?php endif; ?>
  <!-- horizontal accordian -->
  <?php if( have_rows('free_guided_breathwork') ): ?>
    <div class="row">
      <section id="breathing_accordion_block" class="widgetblock">
        <h2 class="wdgt-head mt-2 mb-1 text-center">Free Guided Breathwork</h2>
        <section id="breathingVideos" class="ewHorizontalAccordian" >
          <ul>
            <?php $i = 0;
            while ( have_rows('free_guided_breathwork') ) : the_row(); ?>
                <li <?php if($i == 0){echo 'class="open"'; } ?>>
                  <a href="<?php echo get_sub_field('video_link'); ?>">
                    <div class="bgholder">
                      <div style="background-image:url(<?php echo get_sub_field('video_image_mobile'); ?>)" class="bgimage d-block d-lg-none" ></div>
                      <div style="background-image:url(<?php echo get_sub_field('video_image_desktop'); ?>)" class="bgimage d-none d-lg-block"></div>
                      <div class="iconplay"><img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/icon-meditation-play.svg'; ?>" alt=""></div>
                    </div>
                    <div class="captionText">
                      <p class="title"><?php echo get_sub_field('video_title'); ?></p>
                      <p><?php echo get_sub_field('video_description'); ?></p>
                    </div>
                  </a>
                </li>
            <?php $i++; 
            endwhile; ?>
          </ul>
        </section>
    </div>
    <div class="row">
      <div class="seprator my-2">
          <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
      </div>
    </div>
  <?php endif; ?>
  

        <div class="row">
        <section id="faqblock" class="widgetblock">
            <h2 class="wdgt-head mt-2 mb-1 text-center">FAQs</h2>
            <section id="accordion" class="faqAccordian" itemscope itemtype="https://schema.org/FAQPage">
              <?php $i = 0; 
                while(have_rows('faq')) : the_row();?>
                    <div class="card" itemprop="mainEntity" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                        <div class="card-header <?php echo $i==0 ?'open':''; ?>" id="heading<?php echo $i; ?>" >
                            <h5 class="mb-0" itemprop="name">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                                <?php the_sub_field('faq_title') ?>
                                </button>
                                <span class="icon"></span>  
                            </h5>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="collapse <?php echo $i==0 ?'show':''; ?>" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                            <div class="card-body" itemprop="text"><?php the_sub_field('faq_description')?></div>
                        </div>
                    </div>
                    <?php $i++;
                endwhile;?> 
            </section>
        </section>
    </div>
  <div class="row">
    <div class="seprator mb-1">
      <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seperator.svg'; ?>" alt="">
    </div>
</div>
<div class="row">
    <section id="mediablock" class="widgetblock mb-3">
      <h2 class="wdgt-head mt-1 mb-3 text-center">Media On Us</h2>
      <section class="mediawrapper">
        <aside class="mediaitem text-center" style="max-height: 60px;border-radius: 0px;">
    <a href="https://yourstory.com/herstory/2019/07/digital-platform-thriive-mental-wellness" target="_blank" rel="nofollow" tabindex="0">
                   <img title="" alt="" class="img-responsive" src="https://www.thriive.in/wp-content/uploads/2019/11/media-05.jpg" style="max-width: 100%;">
    </a>
    </aside>
        <aside class="mediaitem text-center" style="max-height: 60px;border-radius: 0px;">
      <a href="https://m.dailyhunt.in/news/india/english/yourstory-epaper-yourstory/this+digital+platform+believes+the+pursuit+of+wellness+is+important+to+thriive+in+the+modern+world-newsid-125052726" target="_blank" rel="nofollow" tabindex="0">
                   <img title="" alt="" class="img-responsive" src="https://www.thriive.in/wp-content/uploads/2019/11/media-02.jpg" style="max-width: 100%;">
      </a>
    </aside>
        <aside class="mediaitem text-center" style="max-height: 60px;border-radius: 0px;">
      <a href="https://indianexpress.com/article/parenting/health-fitness/meditation-benefits-children-energy-5835255/" target="_blank" rel="nofollow" tabindex="0">
                   <img title="" alt="" class="img-responsive" src="https://www.thriive.in/wp-content/uploads/2019/11/media-04.jpg" style="max-width: 100%;">
      </a>
    </aside>
      </section>
    </section>
</div>
  <div class="row">
    <div class="seprator my-2">
        <img src="<?php echo get_template_directory_uri() .'/assets/images/newsoulimg/seprator_mind.svg'; ?>" alt="">
    </div>
  </div>
</div>
<?php include_once get_stylesheet_directory().'/new-footer.php'; ?>