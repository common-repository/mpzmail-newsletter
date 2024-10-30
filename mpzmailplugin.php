<?php   
    /* 
    Plugin Name: MPZMail
    Plugin URI: http://www.mpzmail.com
    Description: Plugin for enabling users to signup to your MPZMail user group
    Author: Mike Way 
    Version: 1.0 
    Author URI: http://www.mpzmail.com
    */  


	function mpzmail_admin() 
	{  
		include('mpzmail_admin.php');  
	}  
  


	function mpzmail_admin_actions() 
	{  
      		add_options_page("MPZMail", "MPZMail", 1, "MPZMail", "mpzmail_admin"); 
	}  
  
	add_action('admin_menu', 'mpzmail_admin_actions');  

	

	 
class MPZMailWidget extends WP_Widget
{
  function MPZMailWidget()
  {
    $widget_ops = array('classname' => 'MPZMailWidget', 'description' => 'Put a newsletter signup form on your website' );
    $this->WP_Widget('MPZMailWidget', 'MPZMail Newsletter Signup Form', $widget_ops);
  }
 
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;


    // WIDGET CODE GOES HERE
    echo "<form method='post' action='http://www.mpzmail.com/tools/addsub.asp' id='mpzmFrm' name='mpzmFrm'>";
    echo "<table width='100%' cellpadding='2' cellspacing='1'>";
    echo "<tr><td>Your Name:</td><td><input type='text' name='CUSTOMERNAME' id='mpzmcustomerName' /></td></tr>";
    echo "<tr><td>Email Address:</td><td><input type='text' name='EMAILADDRESS' id='mpzmemailAddress' /></td></tr>";
    echo "<tr><td>&nbsp;</td><td><input type='button' name='button' id='button' value='Subscribe' onClick='mpzMCheckForm();'/></td></tr></table>";
    echo "<input name='GID' type='hidden' id='gid' value='" . get_option('mpzmail_groupid') . "' />";
    echo "<input name='UID' type='hidden' id='uid' value='" . get_option('mpzmail_userid') . "' />";
    echo "<input name='RETURNURL' type='hidden' id='uid' value=" . get_permalink() . " />";
    echo "</form>";

    echo "<script>";
    echo "function mpzMCheckForm()";
    echo "{";
    echo "var mpzmFailed = 0;";
    echo "if(document.getElementById('mpzmcustomerName').value.length < 1){alert('Please enter a valid name');mpzmFailed = 1;}";
    echo "if(document.getElementById('mpzmemailAddress').value.length < 1 || document.getElementById('mpzmemailAddress').value.indexOf('@') < 0){alert('Please enter a valid email address');mpzmFailed = 1;}";
    echo "if(mpzmFailed == 0){document.mpzmFrm.submit();}";
    echo "}";
    echo "</script>";
    echo $after_widget;
  }
 
}
	add_action( 'widgets_init', create_function('', 'return register_widget("MPZMailWidget");') );
  

?> 


