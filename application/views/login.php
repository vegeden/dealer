<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/dealer/statics/lib/bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet" />
<link href="/dealer/statics/css/frontend/login.css" rel="stylesheet" type="text/css" />
<title><?php echo $lang->line('web_title'); ?></title>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
.style3 {font-family: "新細明體"}
* {margin:0;padding:0;}
-->
</style>

</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="88" bgcolor="#093150"><table width="95%" border="0" align="left" cellpadding="0" cellspacing="0">
          <tr>
            <td width="229" align="center" valign="top"><img src="/dealer/statics/img/admin_vegeden.jpg" width="176" height="68" /></td>
            <td align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td valign="bottom">&nbsp;</td>
                <td width="121"><img src="/dealer/statics/img/admin_logo.jpg" width="121" height="67" /></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="80%" height="50" background="/dealer/statics/img/admin_tour_right.jpg">&nbsp;</td>
            <td width="53"><img src="/dealer/statics/img/admin_tour_middle.jpg" width="53" height="50" /></td>
            <td background="/dealer/statics/img/admin_tour_left.jpg">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="20">
      <tr>
        <td align="center"><div class="wrapper">
  <table width="100%" border="0" cellspacing="30" cellpadding="0">
  <tr>
    <td align="center"><div class="left">
    <div class="left1">
      <h3><span class="A_Title_White"><?php echo $lang->line('web_login_title'); ?></span></h3>
      <div>
		<?php 
			if(isset($error)) {
		?>
			<div class="alert alert-error">
				<?php echo $error;?>
			</div>
		<?php
			}
		?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="148"><img src="/dealer/statics/img/login_icin.jpg" width="148" height="145" /></td>
            <td>
			<form action="" method="POST" name="form">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td align="left" class="Td_line"><span class="A_text"><?php echo $lang->line('web_login_id'); ?></span>
						<input class="input-medium" name="account" type="text" placeholder="<?php echo $lang->line('web_login_id_prompt'); ?>">
					</td>
				  </tr>
				  <tr>
					<td align="left" class="Td_line"><span class="A_text"><?php echo $lang->line('web_login_passwd'); ?></span>
					  <input name="password" class="input-medium" type="password" / class="A_Gray" placeholder="<?php echo $lang->line('web_login_passwd_prompt'); ?>" size="20" /></td>
				  </tr>
				  <tr>
					<td align="left" class="Td_line"><span class="A_text"><?php echo $lang->line('web_login_CheckCode'); ?></span>
					  <input name="check_number" class="input-mini" type="text" / class="A_Gray" size="8" value="<?php echo $rand_number; ?>"/><!-- rand_number -->
					  <?php echo $rand_number; ?>
					</td>
				  </tr>
				  <tr>
					<td height="50" align="center">
						<input name="button" type="submit" class="button_d btn btn-primary" id="button2" value="<?php echo $lang->line('web_login_ButtonValue'); ?>" />
					</td>
				  </tr>
				</table>
				<input type="hidden" value="<?php echo $rand_number;?>" name="hidden_nubmer" />
			</form>
			</td>
          </tr>
        </table>
      </div>
    </div>
    
  </div></td>
  </tr>
</table>


<script type="text/javascript" src="/dealer/statics/js/backend/login.js"></script>
<script type="text/javascript">
	b_RoundCurve("left1","#064e85","#ffffff",3,"h3","","/dealer/statics/img/bg_title.gif");//标题用背景图片
</script></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" class="A_Gray"><?php echo $lang->line('footer'); ?></td>
  </tr>
</table>
</body>
</html>
