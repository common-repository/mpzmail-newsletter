<?php   
    if($_POST['mpzmail_hidden'] == 'Y') 
	{  
        //Form data sent  
        $mpzmail_userid = $_POST['mpzmail_userid'];  
        update_option('mpzmail_userid', $mpzmail_userid);  
          
        $mpzmail_groupid = $_POST['mpzmail_groupid'];  
        update_option('mpzmail_groupid', $mpzmail_groupid);  
        ?>  
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>  
        <?php  
    } else {  
        //Normal page display  
        $mpzmail_userid = get_option('mpzmail_userid');  
        $mpzmail_groupid = get_option('mpzmail_groupid');  
    }  
?>  

<div class="wrap">  
    <?php    echo "<h2>" . __( 'MPZMail Newsletter Signup Options', 'oscimp_trdom' ) . "</h2>"; ?>  
      
    <form name="mpzmail_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">  
        <input type="hidden" name="mpzmail_hidden" value="Y">  
        <h4>MPZMail Account Details</h4>
        <p><?php _e("MPZMail User ID: " ); ?><input type="text" name="mpzmail_userid" value="<?php echo $mpzmail_userid; ?>" size="20"><?php _e(" ex: 12345" ); ?></p>  
        <p><?php _e("MPZMail Group ID: " ); ?><input type="text" name="mpzmail_groupid" value="<?php echo $mpzmail_groupid; ?>" size="20"><?php _e(" ex: 1234" ); ?></p>    
          
      	<p>You can obtain your MPZMail User ID and group ID by logging in to your <a href="http://www.mpzmail.com/cp" target="_blank">MPZMail control panel</a>, clicking on SUBSCRIBERS, Selecting a group and then clicking "Webmaster Tools"</p>

	<p>Don't have an MPZMail account? <a href="http://www.mpzmail.com/register.asp" target="_blank">Click here to register</a>.</p>


        <p class="submit">  
        <input type="submit" name="Submit" value="<?php _e('Update', 'oscimp_trdom' ) ?>" />  
        </p>  
    </form>  
</div>  