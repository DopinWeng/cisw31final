<?php
/*
 * Programmer: Aaron Robinson
 * Date Created: 6/6/15
 * Version: 0.0.1
 */
 include ('fns.php');
do_html_header('About Us');
?>

<html>
<title>About Us</title>

<style>
    div {
        font-family: "Arial";
        font-size: 16px;
        padding-top: 25px;
        padding-right: 50px;
        padding-bottom: 25px;
        padding-left: 50px;
    }
</style>
 <body>
<!-- Paul's Profile-->
<div>
    <img src="img/paul.png" alt="Paul Chiu" height="200" width="200">
    <h3>Paul Chiu</h3>
    <p>Hello my name is Paul Chiu and I am one of the members of SugarPADRE.com. <br>
        My expertise is in troubleshooting and fixing computer problems. <br>
        As an IT professional with interests in Cyber Security, I can help secure your computer hardware and software.<br>
        My rates are neogotiable and my schedule is flexible as well.<br>
        <br>
        Thank you for your consideration.</p>
    <hr>
</div>
<div>
    <img src="img/aaron.png" alt="Aaron Robinson" height="200" width="200">
    <h3>Aaron Robinson</h3>
    <p> My name is Aaron and I'm more than happy to be at your service. <br>
        I am more than experienced in the field of home improvement, with my expertise lying in landscaping as well as plumbing. Also, I <br>
        can maintain automobiles with my strength in air conditioning and sound systems. I look forward to our business together.<br>
        <br>
        I can be contacted at (909)555-9284 or email me at aaron@sugarpadre.com<br>
        I am available between 8 am - 6 pm on Monday - Thursday
    </p>
    <hr>
</div>
<div>
    <img src="img/dopin.png" alt="Dopin Weng" height="200" width="200">
    <h3>Dopin Weng</h3>
    <p> My name is Aaron and I'm more than happy to be at your service. <br>
        I am more than experienced in the field of home improvement, with my <br>
        expertise lying in landscaping as well as plumbing. As well as that I <br>
        can maintain automobiles with an emphasis on air conditioning and sound <br>
        systems. I look forward to our business together.<br>
        <br>
        I can be contacted at (909)555-9284 or email me at aaron@sugarpadre.com<br>
        I am available between 8 am - 6 pm on Monday - Thursday
    </p>
    <hr>
</div>
</body>
</html>



<?php
do_html_footer();
?>