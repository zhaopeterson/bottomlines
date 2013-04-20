<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Bottomlines</title>
<link href="css_stylesheets/css_reset.css" rel="stylesheet" type="text/css" />
<link href="css_stylesheets/global_bl.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header_wrapper">
  <div id="header">
    <script type="text/javascript">
function openPMWindow(){
	//alert("You clicked Me");
	document.getElementById("pm_container").style.display="block";
}

<!--document.getElementById("pm_button").onclick=openPMWindow();-->

</script>
    <div id="pm_box">
      <!--<form action="" method="post" name="privatemessage">-->
      <input type="button" id="pm_button" name="pm_button" value="" onclick="openPMWindow()" />
      <!--</form>-->
    </div>
    <!--end of PM box-->
    <div id="pm_container">
      <script type="text/javascript">
function addEvent(object, evName, fnName, cap) {
   if (object.attachEvent)
       object.attachEvent("on" + evName, fnName);
   else if (object.addEventListener)
       object.addEventListener(evName, fnName, cap);
}

addEvent(window, "load", setLink, false);
function setLink(){
document.getElementById("sendmessage_link").onclick=createPMForm;
}

function createPMForm(){
	document.getElementById("pm_container").style.display="none";
	//alert("I am trying to create a form")
	var pmForm=document.createElement("form");
	pmForm.action="";
	pmForm.method="post";
	pmForm.id="pmform";
	var pmForm_header=document.createElement("h2");
	pmForm_header.id="pmForm_header";
	pmForm_header.innerHTML="New Message";
	pmForm.appendChild(pmForm_header);
	//---------------------------end of creating header
	var name_para=document.createElement("p");
	var name=document.createElement("span");
	name.id="ally_name";
	name.innerHTML="To: ";
	
	var name_input=document.createElement("input");
	name_input.id="name_input";
	name_input.name="name_input";

	name_para.appendChild(name);
	name_para.appendChild(name_input);
	pmForm.appendChild(name_para);
	var pmessage=document.createElement("span");
	pmessage.id="pmessage_to";
	pmessage.innerHTML="Message: ";
	
	var message_input=document.createElement("textarea");
	message_input.id="message_input";
	message_input.name="message_input";
	var message_para=document.createElement("p")
	message_para.appendChild(pmessage);
	message_para.appendChild(message_input);
	pmForm.appendChild(message_para);
	
	var buttons_para=document.createElement("p");
	buttons_para.id="buttons_para";
	var pm_submitBtn=document.createElement("input");
	pm_submitBtn.type="submit";
	pm_submitBtn.name="pm_submit";
	pm_submitBtn.id="pm_submit";
	pm_submitBtn.value="Send"
	buttons_para.appendChild(pm_submitBtn);
	var pm_cancelBtn=document.createElement("input");
	pm_cancelBtn.type="submit";
	pm_cancelBtn.name="pm_cancel";
	pm_cancelBtn.id="pm_cancel";
	pm_cancelBtn.value="Cancel";
	buttons_para.appendChild(pm_cancelBtn);
	pmForm.appendChild(buttons_para);
	//append the form to the body
	document.body.appendChild(pmForm);
}

</script>
      <h2>Recent Messages  &#160;   &#160;   &#160; <a href="#" id="sendmessage_link" >Send a New Message</a></h2>
      <div class='pm_item'>
        <p><img src='profile_uploads/82805c28520604ba72379161b41ded7da9721486 ' class='avatar_small' width='30' height='30' /> on 2011-06-05 13:04:03<br/>
          Lot of preparation work</p>
      </div>
      <div class='pm_item'>
        <p><img src='profile_uploads/1150c1a50b905b20479a2928f7d516182614435f ' class='avatar_small' width='30' height='30' /> on 2011-06-05 12:07:05<br/>
          I do not want to go, it will be so crowed</p>
      </div>
      <div class='pm_item'>
        <p><img src='profile_uploads/1150c1a50b905b20479a2928f7d516182614435f ' class='avatar_small' width='30' height='30' /> on 2011-06-05 12:06:33<br/>
          I missed her too</p>
      </div>
      <div class='pm_item'>
        <p><img src='profile_uploads/1150c1a50b905b20479a2928f7d516182614435f ' class='avatar_small' width='30' height='30' /> on 2011-06-05 12:04:53<br/>
          I hate cleaning up the house</p>
      </div>
      <div class='pm_item'>
        <p><img src='profile_uploads/1150c1a50b905b20479a2928f7d516182614435f ' class='avatar_small' width='30' height='30' /> on 2011-06-05 11:39:54<br/>
          Gus went to work this morning</p>
      </div>
    </div>
    <!--end of pm contianer-->
    <div id="searchbox">
      <form action="search.php" method="GET" name="searchbox" accept-charset="utf-8">
        <input name="terms" type="text" size="50" id="search_input" />
        <input name="submit_search" type="submit" value= "" id="search_submitbutton" />
      </form>
    </div>
    <!--endof search box-->
    <p class="title"><a href="messages.php?user_id=6 " title="Go back to your own homepage" >Bottomlines</a></p>
  </div>
  <!--end of header-->
</div>
<!--end of header wrapper-->
<div id="topnav">
  <!--start of tope nav-->
  <ul>
    <li><a href="messages.php?user_id=6" >Messages</a></li>
    <li><a href="profile.php?user_id=6" >Profile</a></li>
    <li><a href="Photo.php?user_id=6">Photo</a></li>
    <li><a href="Video.php?user_id=6">Video</a></li>
    <li><a href="logout.php">Log Out</a></li>
  </ul>
</div>
<!--end of topnav-->
<div id="content">
  <div id="leftnav">
    <div id="leftnav_inner">
      <!--content of user profile goes here-->
      <p><b>Brooke Peterson</b></p>
      <p><a href='profile_update.php?user_id=6' >Edit Profile</a></p>
      <p><img src='profile_uploads/1150c1a50b905b20479a2928f7d516182614435f' class='avatar_style' width='120' height='120' /></p>
      <p class='species_style' >Species: borg</p>
      <p class='interests_style' >My mission is to turn Bottomlines into world's largest anti-social network</p>
      <p><a href='displayphoto.php?user_id=6' >Photos</a></p>
      <p><a href='displayinfo.php?user_id=6' >Info</a></p>
      <p><a href='displaynotes.php?user_id=6' >Notes</a></p>
      <h2 class='ally_border'>Allies with</h2>
      <p class='friend_style'><a href='messages.php?user_id=' ><img src='images_profiles/noimage.jpg' class='friend_small' width='50' height='50' /></a><br/>
        Mysterious Ally</p>
      <p class='friend_style'><a href='messages.php?user_id=8' ><img src='profile_uploads/67c17757623bc3ed838ce0129833515bbbf842b9 ' width='50' height='50' class='friend_small' /></a><br/>
        Julie Clever</p>
      <p class='friend_style'><a href='messages.php?user_id=10' ><img src='profile_uploads/3c0220efd5fa195ac3e47ec43969320cf8162be5 ' width='50' height='50' class='friend_small' /></a><br/>
        Maggie Pretty</p>
      <p class='friend_style'><a href='messages.php?user_id=12' ><img src='profile_uploads/cc0c4795591b84f8ae63637906ac4093df5a0a20 ' width='50' height='50' class='friend_small' /></a><br/>
        Joy Gordon</p>
      <p class='friend_style'><a href='messages.php?user_id=13' ><img src='profile_uploads/82805c28520604ba72379161b41ded7da9721486 ' width='50' height='50' class='friend_small' /></a><br/>
        Connie Chang</p>
      <p class='friend_style'><a href='messages.php?user_id=14' ><img src='profile_uploads/350d51e4295cdfb2da3027467ace846cebb0724e ' width='50' height='50' class='friend_small' /></a><br/>
        Anglea Liu</p>
    </div>
    <!--end of left nav inner-->
  </div>
  <!--end of leftnav-->
  <div id='main_content'>
    <div id='main_content_inner'>
      <div id="post_form_container">
        <form action="" method="post" accept-charset="utf-8">
          <h5>Something on your mind, rant and vent!</h5>
          <p id="subject_style">Subject: <br/>
            <input name="subject_post" type="text" size="15" id="subject_input"/>
          </p>
          <p id="body_style"> Message Body: <br/>
            <textarea name="body_post" rows="1" cols="55" id="postbody"></textarea>
          </p>
          <br/>
          <input name="submit_post" type="submit" value="Post" id="submit_posthp" />
          <input name="submitted" type="hidden" value="TRUE" />
        </form>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=67">Roast Duck</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-06-02 06:15:09</p>
        <p>I went to Marina food and brought some duck, it is good. Too salty though</p>
        <form method="post" action="">
          <p class="post_time" > There are: 2 replies. Last reply: 2011-06-05 06:12:13
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button67" id="view_button67" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv67" id="hidden67" />
          </p>
        </form>
        <div class='replies_body' id='replydiv67' >
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-06-02 07:10:30</span><br />
            My mom makes very good salty duck and tofu, come over when you get a chance!</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-05 06:12:13</span><br />
            I have tummy ache from eating at that Thai restraurant</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="67" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=73">Dinner tonight</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-06-05 05:46:55</p>
        <p>We had so much fun tonight! Girls night out is so much fun!!!</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-05 05:46:55
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button73" id="view_button73" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv73" id="hidden73" />
          </p>
        </form>
        <div class='replies_body' id='replydiv73' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="73" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=13" ><img src="images_profiles/connie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=71">cherry blossom</a> By: <a href="messages.php?user_id=13" >conniework</a></p>
        <p class="post_time"> Posted on: 2011-06-02 07:03:07</p>
        <p>We walk to memorial park some time. The cherry blossom there is absolutely stunning. The ducks were happy swimming in the pond. Wonderful place to be.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 1 replies. Last reply: 2011-06-05 00:32:15
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button71" id="view_button71" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv71" id="hidden71" />
          </p>
        </form>
        <div class='replies_body' id='replydiv71' >
          <p class='reply_message'><a href='messages.php?user_id=13' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-05 00:32:15</span><br />
            I love pink ones</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="71" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=9">Mother and Father Doves</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-05-31 02:44:14</p>
        <p>The doves are back to hatch their second set of eggs, great home they made in our porch curtain. It was fun seeing the two little doves hatched and grown and fly way. can't wait to see the second set of ones.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 4 replies. Last reply: 2011-06-04 07:39:36
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button9" id="view_button9" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv9" id="hidden9" />
          </p>
        </form>
        <div class='replies_body' id='replydiv9' >
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 02:47:16</span><br />
            Gus really cares about them!</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-06-02 07:18:22</span><br />
            can not wait to see the videos!</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-06-02 07:21:08</span><br />
            How cute! can not wait to see the videos. I love doves, we had a bird, they kids were nuts about them.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-04 07:39:36</span><br />
            Daddy said they are the baby birds are going to come out soon </p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="9" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=64">Time Problem</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-06-02 06:01:49</p>
        <p>This is driving me nuts. I do not know why the time is not set right</p>
        <form method="post" action="">
          <p class="post_time" > There are: 2 replies. Last reply: 2011-06-04 03:38:58
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button64" id="view_button64" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv64" id="hidden64" />
          </p>
        </form>
        <div class='replies_body' id='replydiv64' >
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-06-02 07:16:15</span><br />
            Hope you find the solution, this is such nice message board.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-04 03:38:58</span><br />
            great day</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="64" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=13" ><img src="images_profiles/connie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=72">Lynda.com</a> By: <a href="messages.php?user_id=13" >conniework</a></p>
        <p class="post_time"> Posted on: 2011-06-02 07:06:17</p>
        <p>Would you please know how you like it when you get a chance. I hope Becca can use the summer time to do some preparation work.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 07:06:17
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button72" id="view_button72" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv72" id="hidden72" />
          </p>
        </form>
        <div class='replies_body' id='replydiv72' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="72" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=13" ><img src="images_profiles/connie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=69">Home made chinese food</a> By: <a href="messages.php?user_id=13" >conniework</a></p>
        <p class="post_time"> Posted on: 2011-06-02 06:57:06</p>
        <p>My mom makes very good food, come over when you have time</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 06:57:06
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button69" id="view_button69" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv69" id="hidden69" />
          </p>
        </form>
        <div class='replies_body' id='replydiv69' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="69" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=10">Bounce House</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-05-31 02:45:16</p>
        <p>I cleaned the little bouncy house and to give it to Mrs. Mac. The kids had a wonderful time playing in it for many years.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 5 replies. Last reply: 2011-06-02 06:45:58
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button10" id="view_button10" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv10" id="hidden10" />
          </p>
        </form>
        <div class='replies_body' id='replydiv10' >
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 02:51:33</span><br />
            We have another bigger one, the kids are still enjoying it.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 02:54:42</span><br />
            Maggie brought two fish yesterday.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-06-01 08:03:49</span><br />
            Brilliant!!</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-01 08:37:49</span><br />
            wow, this is awesome, I spent a day finally figured out how to add this!</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-06-02 06:45:58</span><br />
            you have done so much for your kids. They are so luck.</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="10" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=8" ><img src="images_profiles/julie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=63">My suite in Iwoa</a> By: <a href="messages.php?user_id=8" >Juliedesign</a></p>
        <p class="post_time"> Posted on: 2011-06-02 05:54:44</p>
        <p>has a beautiful window looking out to the beautiful countryside. Can not wait for mom's fried chicked</p>
        <form method="post" action="">
          <p class="post_time" > There are: 1 replies. Last reply: 2011-06-02 06:37:19
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button63" id="view_button63" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv63" id="hidden63" />
          </p>
        </form>
        <div class='replies_body' id='replydiv63' >
          <p class='reply_message'><a href='messages.php?user_id=8' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-02 06:37:19</span><br />
            Bring me with you!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="63" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=66">Roast Duck</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-06-02 06:09:08</p>
        <p>I went to Marina food and brought some duck, it is good. Too salty though</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 06:09:08
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button66" id="view_button66" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv66" id="hidden66" />
          </p>
        </form>
        <div class='replies_body' id='replydiv66' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="66" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=65">Time Problem</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-06-02 06:02:17</p>
        <p>This is driving me nuts. I do not know why the time is not set right</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 06:02:17
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button65" id="view_button65" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv65" id="hidden65" />
          </p>
        </form>
        <div class='replies_body' id='replydiv65' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="65" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=8" ><img src="images_profiles/julie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=4">Garden Rain</a> By: <a href="messages.php?user_id=8" >Juliedesign</a></p>
        <p class="post_time"> Posted on: 2011-05-29 06:55:32</p>
        <p>California is very dry during summer time. Rain is so important for the plants.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 3 replies. Last reply: 2011-06-02 05:31:23
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button4" id="view_button4" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv4" id="hidden4" />
          </p>
        </form>
        <div class='replies_body' id='replydiv4' >
          <p class='reply_message'><a href='messages.php?user_id=8' ><img src='images_profiles/'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>jeffnostress </span><span class='post_time' >2011-05-29 07:22:28</span><br />
            Agree with you! wish we have more rain in the summer, will save me on water bill!</p>
          <p class='reply_message'><a href='messages.php?user_id=8' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-30 20:54:27</span><br />
            Yes, summer rain saves on water bills!</p>
          <p class='reply_message'><a href='messages.php?user_id=8' ><img src='images_profiles/julie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>Juliedesign </span><span class='post_time' >2011-06-02 05:31:23</span><br />
            wow, brooke really want to be a pig</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="4" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=8">Two cantaloupe seedlings</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-05-30 21:29:55</p>
        <p>We went to HomeDepot yesterday. James helped my lifting 10 bsgs of soil on to the car. I dumped new soil on the front planter. We bought two cantaloupe seedlings too, hope they survive.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 6 replies. Last reply: 2011-06-02 03:12:57
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button8" id="view_button8" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv8" id="hidden8" />
          </p>
        </form>
        <div class='replies_body' id='replydiv8' >
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 01:47:35</span><br />
            I checked today and it is alive! Not much sun there, I hope to cut the big tree this winter!</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/maggie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>Maggie </span><span class='post_time' >2011-05-31 07:29:41</span><br />
            I love watermelon more, I do not like cantaloupe.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-05-31 19:28:15</span><br />
            We are growing some tomatoes and not enough space in our backyard</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-05-31 19:31:17</span><br />
            My mom got some lufa seeds i will give it ot you. I love eating lufa stir-fried eggs.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-01 17:21:21</span><br />
            June 1st morning big shoer, good for the plants</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/maggie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>Maggie </span><span class='post_time' >2011-06-02 03:12:57</span><br />
            I hope our grapes coming out soon</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="8" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=10" ><img src="images_profiles/maggie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=43">JamesPants</a> By: <a href="messages.php?user_id=10" >Maggie</a></p>
        <p class="post_time"> Posted on: 2011-06-02 03:08:35</p>
        <p>Post your message here .. </p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 03:08:35
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button43" id="view_button43" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv43" id="hidden43" />
          </p>
        </form>
        <div class='replies_body' id='replydiv43' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="43" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=10" ><img src="images_profiles/maggie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=39">four leave clovers</a> By: <a href="messages.php?user_id=10" >Maggie</a></p>
        <p class="post_time"> Posted on: 2011-06-02 03:07:23</p>
        <p>I found two fours leave clovers yesterday in the backyard, my mom said I was a lucky person.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 03:07:23
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button39" id="view_button39" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv39" id="hidden39" />
          </p>
        </form>
        <div class='replies_body' id='replydiv39' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="39" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=10" ><img src="images_profiles/maggie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=33">Poem</a> By: <a href="messages.php?user_id=10" >Maggie</a></p>
        <p class="post_time"> Posted on: 2011-06-02 02:54:38</p>
        <p>I hate reciting poem very week. Can not wait for the summer</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 02:54:38
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button33" id="view_button33" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv33" id="hidden33" />
          </p>
        </form>
        <div class='replies_body' id='replydiv33' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="33" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=10" ><img src="images_profiles/maggie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=20">National Award</a> By: <a href="messages.php?user_id=10" >Maggie</a></p>
        <p class="post_time"> Posted on: 2011-06-02 02:31:39</p>
        <p>Hi, I got the award today, James got presidential</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 02:31:39
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button20" id="view_button20" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv20" id="hidden20" />
          </p>
        </form>
        <div class='replies_body' id='replydiv20' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="20" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=14" ><img src="images_profiles/angela.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=3">Nice weather tomorrow</a> By: <a href="messages.php?user_id=14" >angela</a></p>
        <p class="post_time"> Posted on: 2011-05-29 06:24:13</p>
        <p>Can you believe ti?! This is the end of May and it is still raining!! I planted more watermelon seeds and pumpkin seeds, hope they will sprout out! My green beans finally coming out, hope the bus do not eat them!</p>
        <form method="post" action="">
          <p class="post_time" > There are: 3 replies. Last reply: 2011-06-01 20:21:23
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button3" id="view_button3" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv3" id="hidden3" />
          </p>
        </form>
        <div class='replies_body' id='replydiv3' >
          <p class='reply_message'><a href='messages.php?user_id=14' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-30 21:26:16</span><br />
            I hope the weather to be nice tmorrow too. I plan to go to the beach with the kids. yes we are going to ditch school</p>
          <p class='reply_message'><a href='messages.php?user_id=14' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 02:49:11</span><br />
            It is really clod for June</p>
          <p class='reply_message'><a href='messages.php?user_id=14' ><img src='images_profiles/maggie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>Maggie </span><span class='post_time' >2011-06-01 20:21:23</span><br />
            PI love raining, I think the doves at our house like it. We do not need to water the garden either.</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="3" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=10" ><img src="images_profiles/maggie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=16">Cranberry dies</a> By: <a href="messages.php?user_id=10" >Maggie</a></p>
        <p class="post_time"> Posted on: 2011-05-31 04:45:53</p>
        <p>I am so sad, Cranberry died today and Daddy buried him in the backyard. I hoep Strawberry do not get lonely, I hope she lives.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 1 replies. Last reply: 2011-06-01 20:20:28
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button16" id="view_button16" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv16" id="hidden16" />
          </p>
        </form>
        <div class='replies_body' id='replydiv16' >
          <p class='reply_message'><a href='messages.php?user_id=10' ><img src='images_profiles/maggie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>Maggie </span><span class='post_time' >2011-06-01 20:20:28</span><br />
            I am going to see kitties this weekend at jerry's friends' house</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="16" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=11">Strawberry and Cranberry</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-05-31 02:58:37</p>
        <p>Maggie draw a lovely fish and named them strawberry and cranberry.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 2 replies. Last reply: 2011-06-01 08:39:34
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button11" id="view_button11" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv11" id="hidden11" />
          </p>
        </form>
        <div class='replies_body' id='replydiv11' >
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-05-31 19:27:04</span><br />
            This is connie, we got a new bunny. You should take the kids and come to visit.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-01 08:39:34</span><br />
            I hope it is working OK</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="11" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=13" ><img src="images_profiles/connie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=18">Work hard is good for you</a> By: <a href="messages.php?user_id=13" >conniework</a></p>
        <p class="post_time"> Posted on: 2011-05-31 19:20:42</p>
        <p>I work very hard I go to work in the morning and come back around 9 and work at home on the weekends. i run a mile a day. I work very hard.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 4 replies. Last reply: 2011-05-31 23:47:30
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button18" id="view_button18" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv18" id="hidden18" />
          </p>
        </form>
        <div class='replies_body' id='replydiv18' >
          <p class='reply_message'><a href='messages.php?user_id=13' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-05-31 19:31:49</span><br />
            I hate traveling I would rather sleeping at home.</p>
          <p class='reply_message'><a href='messages.php?user_id=13' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-05-31 19:32:49</span><br />
            Yes I am so glad my daughter got excepted in RIST lots of money through</p>
          <p class='reply_message'><a href='messages.php?user_id=13' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-05-31 19:36:00</span><br />
            need to go to work now, talk to you later.</p>
          <p class='reply_message'><a href='messages.php?user_id=13' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 23:47:30</span><br />
            great</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="18" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=12" ><img src="images_profiles/joy.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=6">Walk in sunset</a> By: <a href="messages.php?user_id=12" >joychurch</a></p>
        <p class="post_time"> Posted on: 2011-05-30 03:20:03</p>
        <p>Walking is really good, check out new books on walking at 
          http://www.amazon.com/</p>
        <form method="post" action="">
          <p class="post_time" > There are: 3 replies. Last reply: 2011-05-31 19:12:47
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button6" id="view_button6" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv6" id="hidden6" />
          </p>
        </form>
        <div class='replies_body' id='replydiv6' >
          <p class='reply_message'><a href='messages.php?user_id=12' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-30 23:29:14</span><br />
            Great I walk with James and Maggie everyday. They hate it I think it is good for them!</p>
          <p class='reply_message'><a href='messages.php?user_id=12' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 01:40:01</span><br />
            James made it to the front yard with his unicycle and maggie lost a tooth!</p>
          <p class='reply_message'><a href='messages.php?user_id=12' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 19:12:47</span><br />
            I ran for 1 mile yesterday it was good</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="6" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=1">Hello Bottomline</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-05-27 04:45:05</p>
        <p>The largest anti-social network is launched on may 28th in San Jose California</p>
        <form method="post" action="">
          <p class="post_time" > There are: 3 replies. Last reply: 2011-05-31 18:55:34
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button1" id="view_button1" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv1" id="hidden1" />
          </p>
        </form>
        <div class='replies_body' id='replydiv1' >
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/lily.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>lilyflower </span><span class='post_time' >2011-05-30 05:58:36</span><br />
            I love this, I hate those social network make me feel I have to be friend with whoever requested.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-30 23:52:31</span><br />
            Working on this is lots of pain as I do not know the code wellenough, however, it is fun the subject</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 18:55:34</span><br />
            It is really cold here almost June</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="1" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=10" ><img src="images_profiles/maggie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=17">Sleepover</a> By: <a href="messages.php?user_id=10" >Maggie</a></p>
        <p class="post_time"> Posted on: 2011-05-31 04:48:05</p>
        <p>I hope I have a sleep over with my friend soon. I am bored everyday. I love to draw. I draw Strawberry and Cranberry, mommy said she will upload the picture to my website.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-05-31 04:48:05
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button17" id="view_button17" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv17" id="hidden17" />
          </p>
        </form>
        <div class='replies_body' id='replydiv17' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="17" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <!-- Script 15.2 - footer.html -->
    </div>
    <!--end of main content inner-->
    <div id="main_content_right">
      <!--add friends list-->
      <form action="" method="post" name="find_allies">
        <p ><span class="label_style">Choose an Ally*:</span>
          <select name="ally_id" id="user_id">
            <option value="">Select a Ally</option>
            <option value="6"
     >adminbrooke</option>
            <option value="14"
     >angela</option>
            <option value="20"
     >arronschool</option>
            <option value="13"
     >conniework</option>
            <option value="16"
     >eriknurd</option>
            <option value="11"
     >guskayak</option>
            <option value="9"
     >James</option>
            <option value="1"
     >jeffnostress</option>
            <option value="4"
     >Joao</option>
            <option value="12"
     >joychurch</option>
            <option value="8"
     >Juliedesign</option>
            <option value="15"
     >junehappy</option>
            <option value="5"
     >kiwi</option>
            <option value="18"
     >lauracollege</option>
            <option value="17"
     >lilyflower</option>
            <option value="10"
     >Maggie</option>
            <option value="7"
     >Marygarden</option>
            <option value="19"
     >rexhouse</option>
            <option value="3"
     >Silje</option>
            <option value="2"
     >Ute</option>
          </select>
        </p>
        <p class="reg_form" align="center">
          <input type="submit" name="request" value="Request" id="request_button" class="formbutton" onclick="processview()" />
          &#160; &#160; &#160;
          <input type="submit" name="remove" value="Remove" id="remove_button" class="formbutton" />
        </p>
      </form>
      <h2>Life is hard, have some donuts</h2>
      <p>&#160;</p>
      <img src="images_bl/donuts.jpg" /> </div>
    <!--end of right-->
  </div>
  <!--end of main content-->
</div>
<!--end of content-->
<div id="footer_wrapper">
  <div id="footer"> </b>
    <p>
    <form action="forum.php" method="get">
      <select name="lid">
        <option value="0">Language</option>
        <option value="10">Nederlands</option>
        <option value="1">English</option>
        <option value="3">Français</option>
        <option value="7">Deutsch</option>
        <option value="6">Ελληνικά</option>
        <option value="9">日本語</option>
        <option value="4">Norsk</option>
        <option value="2">Português</option>
        <option value="5">Romanian</option>
        <option value="8">Srpski</option>
      </select>
      <br />
      <input name="submit" type="submit" disabled="disabled" value="Submit" />
    </form>
    </p>
    &copy; 2011 Bottomlines.com We will never be free -- free to sell your privacy!</div>
</div>
<!--end of footer-->
</div>
<!--end of global wrapper-->
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Bottomlines</title>
<link href="css_stylesheets/css_reset.css" rel="stylesheet" type="text/css" />
<link href="css_stylesheets/global_bl.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header_wrapper">
  <div id="header">
    <script type="text/javascript">
function openPMWindow(){
	//alert("You clicked Me");
	document.getElementById("pm_container").style.display="block";
}

<!--document.getElementById("pm_button").onclick=openPMWindow();-->

</script>
    <div id="pm_box">
      <!--<form action="" method="post" name="privatemessage">-->
      <input type="button" id="pm_button" name="pm_button" value="" onclick="openPMWindow()" />
      <!--</form>-->
    </div>
    <!--end of PM box-->
    <div id="pm_container">
      <script type="text/javascript">
function addEvent(object, evName, fnName, cap) {
   if (object.attachEvent)
       object.attachEvent("on" + evName, fnName);
   else if (object.addEventListener)
       object.addEventListener(evName, fnName, cap);
}

addEvent(window, "load", setLink, false);
function setLink(){
document.getElementById("sendmessage_link").onclick=createPMForm;
}

function createPMForm(){
	document.getElementById("pm_container").style.display="none";
	//alert("I am trying to create a form")
	var pmForm=document.createElement("form");
	pmForm.action="";
	pmForm.method="post";
	pmForm.id="pmform";
	var pmForm_header=document.createElement("h2");
	pmForm_header.id="pmForm_header";
	pmForm_header.innerHTML="New Message";
	pmForm.appendChild(pmForm_header);
	//---------------------------end of creating header
	var name_para=document.createElement("p");
	var name=document.createElement("span");
	name.id="ally_name";
	name.innerHTML="To: ";
	
	var name_input=document.createElement("input");
	name_input.id="name_input";
	name_input.name="name_input";

	name_para.appendChild(name);
	name_para.appendChild(name_input);
	pmForm.appendChild(name_para);
	var pmessage=document.createElement("span");
	pmessage.id="pmessage_to";
	pmessage.innerHTML="Message: ";
	
	var message_input=document.createElement("textarea");
	message_input.id="message_input";
	message_input.name="message_input";
	var message_para=document.createElement("p")
	message_para.appendChild(pmessage);
	message_para.appendChild(message_input);
	pmForm.appendChild(message_para);
	
	var buttons_para=document.createElement("p");
	buttons_para.id="buttons_para";
	var pm_submitBtn=document.createElement("input");
	pm_submitBtn.type="submit";
	pm_submitBtn.name="pm_submit";
	pm_submitBtn.id="pm_submit";
	pm_submitBtn.value="Send"
	buttons_para.appendChild(pm_submitBtn);
	var pm_cancelBtn=document.createElement("input");
	pm_cancelBtn.type="submit";
	pm_cancelBtn.name="pm_cancel";
	pm_cancelBtn.id="pm_cancel";
	pm_cancelBtn.value="Cancel";
	buttons_para.appendChild(pm_cancelBtn);
	pmForm.appendChild(buttons_para);
	//append the form to the body
	document.body.appendChild(pmForm);
}

</script>
      <h2>Recent Messages  &#160;   &#160;   &#160; <a href="#" id="sendmessage_link" >Send a New Message</a></h2>
      <div class='pm_item'>
        <p><img src='profile_uploads/82805c28520604ba72379161b41ded7da9721486 ' class='avatar_small' width='30' height='30' /> on 2011-06-05 13:04:03<br/>
          Lot of preparation owrk</p>
      </div>
      <div class='pm_item'>
        <p><img src='profile_uploads/1150c1a50b905b20479a2928f7d516182614435f ' class='avatar_small' width='30' height='30' /> on 2011-06-05 12:07:05<br/>
          I do not want to go, it will be so crowed</p>
      </div>
      <div class='pm_item'>
        <p><img src='profile_uploads/1150c1a50b905b20479a2928f7d516182614435f ' class='avatar_small' width='30' height='30' /> on 2011-06-05 12:06:33<br/>
          I missed her too</p>
      </div>
      <div class='pm_item'>
        <p><img src='profile_uploads/1150c1a50b905b20479a2928f7d516182614435f ' class='avatar_small' width='30' height='30' /> on 2011-06-05 12:04:53<br/>
          I hate cleaning up the house</p>
      </div>
      <div class='pm_item'>
        <p><img src='profile_uploads/1150c1a50b905b20479a2928f7d516182614435f ' class='avatar_small' width='30' height='30' /> on 2011-06-05 11:39:54<br/>
          Gus went to work this morning</p>
      </div>
    </div>
    <!--end of pm contianer-->
    <div id="searchbox">
      <form action="search.php" method="GET" name="searchbox" accept-charset="utf-8">
        <input name="terms" type="text" size="50" id="search_input" />
        <input name="submit_search" type="submit" value= "" id="search_submitbutton" />
      </form>
    </div>
    <!--endof search box-->
    <p class="title"><a href="messages.php?user_id=6 " title="Go back to your own homepage" >Bottomlines</a></p>
  </div>
  <!--end of header-->
</div>
<!--end of header wrapper-->
<div id="topnav">
  <!--start of tope nav-->
  <ul>
    <li><a href="messages.php?user_id=6" >Messages</a></li>
    <li><a href="profile.php?user_id=6" >Profile</a></li>
    <li><a href="Photo.php?user_id=6">Photo</a></li>
    <li><a href="Video.php?user_id=6">Video</a></li>
    <li><a href="logout.php">Log Out</a></li>
  </ul>
</div>
<!--end of topnav-->
<div id="content">
  <div id="leftnav">
    <div id="leftnav_inner">
      <!--content of user profile goes here-->
      <p><b>Brooke Peterson</b></p>
      <p><a href='profile_update.php?user_id=6' >Edit Profile</a></p>
      <p><img src='profile_uploads/1150c1a50b905b20479a2928f7d516182614435f' class='avatar_style' width='120' height='120' /></p>
      <p class='species_style' >Species: borg</p>
      <p class='interests_style' >My mission is to turn Bottomlines into world's largest anti-social network</p>
      <p><a href='displayphoto.php?user_id=6' >Photos</a></p>
      <p><a href='displayinfo.php?user_id=6' >Info</a></p>
      <p><a href='displaynotes.php?user_id=6' >Notes</a></p>
      <h2 class='ally_border'>Allies with</h2>
      <p class='friend_style'><a href='messages.php?user_id=' ><img src='images_profiles/noimage.jpg' class='friend_small' width='50' height='50' /></a><br/>
        Mysterious Ally</p>
      <p class='friend_style'><a href='messages.php?user_id=8' ><img src='profile_uploads/67c17757623bc3ed838ce0129833515bbbf842b9 ' width='50' height='50' class='friend_small' /></a><br/>
        Julie Clever</p>
      <p class='friend_style'><a href='messages.php?user_id=10' ><img src='profile_uploads/3c0220efd5fa195ac3e47ec43969320cf8162be5 ' width='50' height='50' class='friend_small' /></a><br/>
        Maggie Pretty</p>
      <p class='friend_style'><a href='messages.php?user_id=12' ><img src='profile_uploads/cc0c4795591b84f8ae63637906ac4093df5a0a20 ' width='50' height='50' class='friend_small' /></a><br/>
        Joy Gordon</p>
      <p class='friend_style'><a href='messages.php?user_id=13' ><img src='profile_uploads/82805c28520604ba72379161b41ded7da9721486 ' width='50' height='50' class='friend_small' /></a><br/>
        Connie Chang</p>
      <p class='friend_style'><a href='messages.php?user_id=14' ><img src='profile_uploads/350d51e4295cdfb2da3027467ace846cebb0724e ' width='50' height='50' class='friend_small' /></a><br/>
        Anglea Liu</p>
    </div>
    <!--end of left nav inner-->
  </div>
  <!--end of leftnav-->
  <div id='main_content'>
    <div id='main_content_inner'>
      <div id="post_form_container">
        <form action="" method="post" accept-charset="utf-8">
          <h5>Something on your mind, rant and vent!</h5>
          <p id="subject_style">Subject: <br/>
            <input name="subject_post" type="text" size="15" id="subject_input"/>
          </p>
          <p id="body_style"> Message Body: <br/>
            <textarea name="body_post" rows="1" cols="55" id="postbody"></textarea>
          </p>
          <br/>
          <input name="submit_post" type="submit" value="Post" id="submit_posthp" />
          <input name="submitted" type="hidden" value="TRUE" />
        </form>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=67">Roast Duck</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-06-02 06:15:09</p>
        <p>I went to Marina food and brought some duck, it is good. Too salty though</p>
        <form method="post" action="">
          <p class="post_time" > There are: 2 replies. Last reply: 2011-06-05 06:12:13
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button67" id="view_button67" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv67" id="hidden67" />
          </p>
        </form>
        <div class='replies_body' id='replydiv67' >
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-06-02 07:10:30</span><br />
            My mom makes very good salty duck and tofu, come over when you get a chance!</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-05 06:12:13</span><br />
            I have tummy ache from eating at that Thai restraurant</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="67" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=73">Dinner tonight</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-06-05 05:46:55</p>
        <p>We had so much fun tonight! Girls night out is so much fun!!!</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-05 05:46:55
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button73" id="view_button73" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv73" id="hidden73" />
          </p>
        </form>
        <div class='replies_body' id='replydiv73' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="73" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=13" ><img src="images_profiles/connie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=71">cherry blossom</a> By: <a href="messages.php?user_id=13" >conniework</a></p>
        <p class="post_time"> Posted on: 2011-06-02 07:03:07</p>
        <p>We walk to memorial park some time. The cherry blossom there is absolutely stunning. The ducks were happy swimming in the pond. Wonderful place to be.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 1 replies. Last reply: 2011-06-05 00:32:15
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button71" id="view_button71" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv71" id="hidden71" />
          </p>
        </form>
        <div class='replies_body' id='replydiv71' >
          <p class='reply_message'><a href='messages.php?user_id=13' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-05 00:32:15</span><br />
            I love pink ones</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="71" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=9">Mother and Father Doves</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-05-31 02:44:14</p>
        <p>The doves are back to hatch their second set of eggs, great home they made in our porch curtain. It was fun seeing the two little doves hatched and grown and fly way. can't wait to see the second set of ones.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 4 replies. Last reply: 2011-06-04 07:39:36
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button9" id="view_button9" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv9" id="hidden9" />
          </p>
        </form>
        <div class='replies_body' id='replydiv9' >
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 02:47:16</span><br />
            Gus really cares about them!</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-06-02 07:18:22</span><br />
            can not wait to see the videos!</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-06-02 07:21:08</span><br />
            How cute! can not wait to see the videos. I love doves, we had a bird, they kids were nuts about them.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-04 07:39:36</span><br />
            Daddy said they are the baby birds are going to come out soon </p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="9" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=64">Time Problem</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-06-02 06:01:49</p>
        <p>This is driving me nuts. I do not know why the time is not set right</p>
        <form method="post" action="">
          <p class="post_time" > There are: 2 replies. Last reply: 2011-06-04 03:38:58
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button64" id="view_button64" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv64" id="hidden64" />
          </p>
        </form>
        <div class='replies_body' id='replydiv64' >
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-06-02 07:16:15</span><br />
            Hope you find the solution, this is such nice message board.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-04 03:38:58</span><br />
            great day</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="64" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=13" ><img src="images_profiles/connie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=72">Lynda.com</a> By: <a href="messages.php?user_id=13" >conniework</a></p>
        <p class="post_time"> Posted on: 2011-06-02 07:06:17</p>
        <p>Would you please know how you like it when you get a chance. I hope Becca can use the summer time to do some preparation work.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 07:06:17
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button72" id="view_button72" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv72" id="hidden72" />
          </p>
        </form>
        <div class='replies_body' id='replydiv72' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="72" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=13" ><img src="images_profiles/connie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=69">Home made chinese food</a> By: <a href="messages.php?user_id=13" >conniework</a></p>
        <p class="post_time"> Posted on: 2011-06-02 06:57:06</p>
        <p>My mom makes very good food, come over when you have time</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 06:57:06
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button69" id="view_button69" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv69" id="hidden69" />
          </p>
        </form>
        <div class='replies_body' id='replydiv69' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="69" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=10">Bounce House</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-05-31 02:45:16</p>
        <p>I cleaned the little bouncy house and to give it to Mrs. Mac. The kids had a wonderful time playing in it for many years.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 5 replies. Last reply: 2011-06-02 06:45:58
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button10" id="view_button10" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv10" id="hidden10" />
          </p>
        </form>
        <div class='replies_body' id='replydiv10' >
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 02:51:33</span><br />
            We have another bigger one, the kids are still enjoying it.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 02:54:42</span><br />
            Maggie brought two fish yesterday.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-06-01 08:03:49</span><br />
            Brilliant!!</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-01 08:37:49</span><br />
            wow, this is awesome, I spent a day finally figured out how to add this!</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-06-02 06:45:58</span><br />
            you have done so much for your kids. They are so luck.</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="10" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=8" ><img src="images_profiles/julie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=63">My suite in Iwoa</a> By: <a href="messages.php?user_id=8" >Juliedesign</a></p>
        <p class="post_time"> Posted on: 2011-06-02 05:54:44</p>
        <p>has a beautiful window looking out to the beautiful countryside. Can not wait for mom's fried chicked</p>
        <form method="post" action="">
          <p class="post_time" > There are: 1 replies. Last reply: 2011-06-02 06:37:19
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button63" id="view_button63" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv63" id="hidden63" />
          </p>
        </form>
        <div class='replies_body' id='replydiv63' >
          <p class='reply_message'><a href='messages.php?user_id=8' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-02 06:37:19</span><br />
            Bring me with you!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="63" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=66">Roast Duck</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-06-02 06:09:08</p>
        <p>I went to Marina food and brought some duck, it is good. Too salty though</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 06:09:08
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button66" id="view_button66" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv66" id="hidden66" />
          </p>
        </form>
        <div class='replies_body' id='replydiv66' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="66" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=65">Time Problem</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-06-02 06:02:17</p>
        <p>This is driving me nuts. I do not know why the time is not set right</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 06:02:17
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button65" id="view_button65" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv65" id="hidden65" />
          </p>
        </form>
        <div class='replies_body' id='replydiv65' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="65" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=8" ><img src="images_profiles/julie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=4">Garden Rain</a> By: <a href="messages.php?user_id=8" >Juliedesign</a></p>
        <p class="post_time"> Posted on: 2011-05-29 06:55:32</p>
        <p>California is very dry during summer time. Rain is so important for the plants.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 3 replies. Last reply: 2011-06-02 05:31:23
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button4" id="view_button4" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv4" id="hidden4" />
          </p>
        </form>
        <div class='replies_body' id='replydiv4' >
          <p class='reply_message'><a href='messages.php?user_id=8' ><img src='images_profiles/'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>jeffnostress </span><span class='post_time' >2011-05-29 07:22:28</span><br />
            Agree with you! wish we have more rain in the summer, will save me on water bill!</p>
          <p class='reply_message'><a href='messages.php?user_id=8' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-30 20:54:27</span><br />
            Yes, summer rain saves on water bills!</p>
          <p class='reply_message'><a href='messages.php?user_id=8' ><img src='images_profiles/julie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>Juliedesign </span><span class='post_time' >2011-06-02 05:31:23</span><br />
            wow, brooke really want to be a pig</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="4" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=8">Two cantaloupe seedlings</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-05-30 21:29:55</p>
        <p>We went to HomeDepot yesterday. James helped my lifting 10 bsgs of soil on to the car. I dumped new soil on the front planter. We bought two cantaloupe seedlings too, hope they survive.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 6 replies. Last reply: 2011-06-02 03:12:57
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button8" id="view_button8" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv8" id="hidden8" />
          </p>
        </form>
        <div class='replies_body' id='replydiv8' >
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 01:47:35</span><br />
            I checked today and it is alive! Not much sun there, I hope to cut the big tree this winter!</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/maggie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>Maggie </span><span class='post_time' >2011-05-31 07:29:41</span><br />
            I love watermelon more, I do not like cantaloupe.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-05-31 19:28:15</span><br />
            We are growing some tomatoes and not enough space in our backyard</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-05-31 19:31:17</span><br />
            My mom got some lufa seeds i will give it ot you. I love eating lufa stir-fried eggs.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-01 17:21:21</span><br />
            June 1st morning big shoer, good for the plants</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/maggie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>Maggie </span><span class='post_time' >2011-06-02 03:12:57</span><br />
            I hope our grapes coming out soon</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="8" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=10" ><img src="images_profiles/maggie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=43">JamesPants</a> By: <a href="messages.php?user_id=10" >Maggie</a></p>
        <p class="post_time"> Posted on: 2011-06-02 03:08:35</p>
        <p>Post your message here .. </p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 03:08:35
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button43" id="view_button43" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv43" id="hidden43" />
          </p>
        </form>
        <div class='replies_body' id='replydiv43' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="43" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=10" ><img src="images_profiles/maggie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=39">four leave clovers</a> By: <a href="messages.php?user_id=10" >Maggie</a></p>
        <p class="post_time"> Posted on: 2011-06-02 03:07:23</p>
        <p>I found two fours leave clovers yesterday in the backyard, my mom said I was a lucky person.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 03:07:23
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button39" id="view_button39" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv39" id="hidden39" />
          </p>
        </form>
        <div class='replies_body' id='replydiv39' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="39" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=10" ><img src="images_profiles/maggie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=33">Poem</a> By: <a href="messages.php?user_id=10" >Maggie</a></p>
        <p class="post_time"> Posted on: 2011-06-02 02:54:38</p>
        <p>I hate reciting poem very week. Can not wait for the summer</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 02:54:38
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button33" id="view_button33" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv33" id="hidden33" />
          </p>
        </form>
        <div class='replies_body' id='replydiv33' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="33" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=10" ><img src="images_profiles/maggie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=20">National Award</a> By: <a href="messages.php?user_id=10" >Maggie</a></p>
        <p class="post_time"> Posted on: 2011-06-02 02:31:39</p>
        <p>Hi, I got the award today, James got presidential</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-06-02 02:31:39
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button20" id="view_button20" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv20" id="hidden20" />
          </p>
        </form>
        <div class='replies_body' id='replydiv20' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="20" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=14" ><img src="images_profiles/angela.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=3">Nice weather tomorrow</a> By: <a href="messages.php?user_id=14" >angela</a></p>
        <p class="post_time"> Posted on: 2011-05-29 06:24:13</p>
        <p>Can you believe ti?! This is the end of May and it is still raining!! I planted more watermelon seeds and pumpkin seeds, hope they will sprout out! My green beans finally coming out, hope the bus do not eat them!</p>
        <form method="post" action="">
          <p class="post_time" > There are: 3 replies. Last reply: 2011-06-01 20:21:23
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button3" id="view_button3" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv3" id="hidden3" />
          </p>
        </form>
        <div class='replies_body' id='replydiv3' >
          <p class='reply_message'><a href='messages.php?user_id=14' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-30 21:26:16</span><br />
            I hope the weather to be nice tmorrow too. I plan to go to the beach with the kids. yes we are going to ditch school</p>
          <p class='reply_message'><a href='messages.php?user_id=14' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 02:49:11</span><br />
            It is really clod for June</p>
          <p class='reply_message'><a href='messages.php?user_id=14' ><img src='images_profiles/maggie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>Maggie </span><span class='post_time' >2011-06-01 20:21:23</span><br />
            PI love raining, I think the doves at our house like it. We do not need to water the garden either.</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="3" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=10" ><img src="images_profiles/maggie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=16">Cranberry dies</a> By: <a href="messages.php?user_id=10" >Maggie</a></p>
        <p class="post_time"> Posted on: 2011-05-31 04:45:53</p>
        <p>I am so sad, Cranberry died today and Daddy buried him in the backyard. I hoep Strawberry do not get lonely, I hope she lives.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 1 replies. Last reply: 2011-06-01 20:20:28
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button16" id="view_button16" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv16" id="hidden16" />
          </p>
        </form>
        <div class='replies_body' id='replydiv16' >
          <p class='reply_message'><a href='messages.php?user_id=10' ><img src='images_profiles/maggie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>Maggie </span><span class='post_time' >2011-06-01 20:20:28</span><br />
            I am going to see kitties this weekend at jerry's friends' house</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="16" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=11">Strawberry and Cranberry</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-05-31 02:58:37</p>
        <p>Maggie draw a lovely fish and named them strawberry and cranberry.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 2 replies. Last reply: 2011-06-01 08:39:34
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button11" id="view_button11" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv11" id="hidden11" />
          </p>
        </form>
        <div class='replies_body' id='replydiv11' >
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-05-31 19:27:04</span><br />
            This is connie, we got a new bunny. You should take the kids and come to visit.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-06-01 08:39:34</span><br />
            I hope it is working OK</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="11" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=13" ><img src="images_profiles/connie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=18">Work hard is good for you</a> By: <a href="messages.php?user_id=13" >conniework</a></p>
        <p class="post_time"> Posted on: 2011-05-31 19:20:42</p>
        <p>I work very hard I go to work in the morning and come back around 9 and work at home on the weekends. i run a mile a day. I work very hard.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 4 replies. Last reply: 2011-05-31 23:47:30
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button18" id="view_button18" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv18" id="hidden18" />
          </p>
        </form>
        <div class='replies_body' id='replydiv18' >
          <p class='reply_message'><a href='messages.php?user_id=13' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-05-31 19:31:49</span><br />
            I hate traveling I would rather sleeping at home.</p>
          <p class='reply_message'><a href='messages.php?user_id=13' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-05-31 19:32:49</span><br />
            Yes I am so glad my daughter got excepted in RIST lots of money through</p>
          <p class='reply_message'><a href='messages.php?user_id=13' ><img src='images_profiles/connie.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>conniework </span><span class='post_time' >2011-05-31 19:36:00</span><br />
            need to go to work now, talk to you later.</p>
          <p class='reply_message'><a href='messages.php?user_id=13' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 23:47:30</span><br />
            great</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="18" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=12" ><img src="images_profiles/joy.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=6">Walk in sunset</a> By: <a href="messages.php?user_id=12" >joychurch</a></p>
        <p class="post_time"> Posted on: 2011-05-30 03:20:03</p>
        <p>Walking is really good, check out new books on walking at 
          http://www.amazon.com/</p>
        <form method="post" action="">
          <p class="post_time" > There are: 3 replies. Last reply: 2011-05-31 19:12:47
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button6" id="view_button6" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv6" id="hidden6" />
          </p>
        </form>
        <div class='replies_body' id='replydiv6' >
          <p class='reply_message'><a href='messages.php?user_id=12' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-30 23:29:14</span><br />
            Great I walk with James and Maggie everyday. They hate it I think it is good for them!</p>
          <p class='reply_message'><a href='messages.php?user_id=12' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 01:40:01</span><br />
            James made it to the front yard with his unicycle and maggie lost a tooth!</p>
          <p class='reply_message'><a href='messages.php?user_id=12' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 19:12:47</span><br />
            I ran for 1 mile yesterday it was good</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="6" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=6" ><img src="images_profiles/brooke.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=1">Hello Bottomline</a> By: <a href="messages.php?user_id=6" >adminbrooke</a></p>
        <p class="post_time"> Posted on: 2011-05-27 04:45:05</p>
        <p>The largest anti-social network is launched on may 28th in San Jose California</p>
        <form method="post" action="">
          <p class="post_time" > There are: 3 replies. Last reply: 2011-05-31 18:55:34
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button1" id="view_button1" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv1" id="hidden1" />
          </p>
        </form>
        <div class='replies_body' id='replydiv1' >
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/lily.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>lilyflower </span><span class='post_time' >2011-05-30 05:58:36</span><br />
            I love this, I hate those social network make me feel I have to be friend with whoever requested.</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-30 23:52:31</span><br />
            Working on this is lots of pain as I do not know the code wellenough, however, it is fun the subject</p>
          <p class='reply_message'><a href='messages.php?user_id=6' ><img src='images_profiles/brooke.jpg'class='avatar_small' width='25' height='25' /></a><span class='reply_name'>adminbrooke </span><span class='post_time' >2011-05-31 18:55:34</span><br />
            It is really cold here almost June</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="1" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <div class="message_style">
        <p><a href="messages.php?user_id=10" ><img src="images_profiles/maggie.jpg" class="avatar_small" width="40" height="40" /></a> Subject: <a href="read.php?tid=17">Sleepover</a> By: <a href="messages.php?user_id=10" >Maggie</a></p>
        <p class="post_time"> Posted on: 2011-05-31 04:48:05</p>
        <p>I hope I have a sleep over with my friend soon. I am bored everyday. I love to draw. I draw Strawberry and Cranberry, mommy said she will upload the picture to my website.</p>
        <form method="post" action="">
          <p class="post_time" > There are: 0 replies. Last reply: 2011-05-31 04:48:05
            <input type="submit" name="view_button" class="view_buttonstyle" value="view_button17" id="view_button17" />
            <input type="hidden" name="div_id" class="view_buttonstyle" value="replydiv17" id="hidden17" />
          </p>
        </form>
        <div class='replies_body' id='replydiv17' >
          <p class='first_reply'>Currently there is no replies, be the first one to reply!</p>
          <div class='reply_message'>
            <form action="" method="post" accept-charset="utf-8">
              <input name="tid" type="hidden" value="17" />
              <p>
                <textarea id="reply_textarea" name="body" rows="1" cols="50">Post a reply here ..</textarea>
              </p>
              <input name="submit" type="submit" value="Reply" id="replybox_button1" />
              <input name="submitted" type="hidden" value="TRUE" />
            </form>
          </div>
        </div>
      </div>
      <!-- Script 15.2 - footer.html -->
    </div>
    <!--end of main content inner-->
    <div id="main_content_right">
      <!--add friends list-->
      <form action="" method="post" name="find_allies">
        <p ><span class="label_style">Choose an Ally*:</span>
          <select name="ally_id" id="user_id">
            <option value="">Select a Ally</option>
            <option value="6"
     >adminbrooke</option>
            <option value="14"
     >angela</option>
            <option value="20"
     >arronschool</option>
            <option value="13"
     >conniework</option>
            <option value="16"
     >eriknurd</option>
            <option value="11"
     >guskayak</option>
            <option value="9"
     >James</option>
            <option value="1"
     >jeffnostress</option>
            <option value="4"
     >Joao</option>
            <option value="12"
     >joychurch</option>
            <option value="8"
     >Juliedesign</option>
            <option value="15"
     >junehappy</option>
            <option value="5"
     >kiwi</option>
            <option value="18"
     >lauracollege</option>
            <option value="17"
     >lilyflower</option>
            <option value="10"
     >Maggie</option>
            <option value="7"
     >Marygarden</option>
            <option value="19"
     >rexhouse</option>
            <option value="3"
     >Silje</option>
            <option value="2"
     >Ute</option>
          </select>
        </p>
        <p class="reg_form" align="center">
          <input type="submit" name="request" value="Request" id="request_button" class="formbutton" onclick="processview()" />
          &#160; &#160; &#160;
          <input type="submit" name="remove" value="Remove" id="remove_button" class="formbutton" />
        </p>
      </form>
      <h2>Life is hard, have some donuts</h2>
      <p>&#160;</p>
      <img src="images_bl/donuts.jpg" /> </div>
    <!--end of right-->
  </div>
  <!--end of main content-->
</div>
<!--end of content-->
<div id="footer_wrapper">
  <div id="footer"> </b>
    <p>
    <form action="forum.php" method="get">
      <select name="lid">
        <option value="0">Language</option>
        <option value="10">Nederlands</option>
        <option value="1">English</option>
        <option value="3">Français</option>
        <option value="7">Deutsch</option>
        <option value="6">Ελληνικά</option>
        <option value="9">日本語</option>
        <option value="4">Norsk</option>
        <option value="2">Português</option>
        <option value="5">Romanian</option>
        <option value="8">Srpski</option>
      </select>
      <br />
      <input name="submit" type="submit" disabled="disabled" value="Submit" />
    </form>
    </p>
    &copy; 2011 Bottomlines.com We will never be free -- free to sell your privacy!</div>
</div>
<!--end of footer-->
</div>
<!--end of global wrapper-->
</body>
</html>
