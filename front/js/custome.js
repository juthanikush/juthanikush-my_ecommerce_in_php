
function user_register(){
  
  jQuery('.field_error').html('');
  var name=jQuery("#name").val();
    var email=jQuery("#email").val();
    var mobile=jQuery("#mobile").val();
    var password=jQuery("#password").val();
    var is_error="";

    if(name==""){
        jQuery('#name_error').html('place Enter name');
        is_error='yes';
    }
    if(email==""){
        jQuery('#email_error').html("place Enter email");
        is_error='yes';
    }if(mobile==""){
        jQuery('#mobile_error').html("place Enter mobile");
        is_error='yes';
    }
    if(password==""){
        jQuery('#password_error').html("place Enter password");
        is_error='yes';
    }
     if(is_error==''){
        jQuery.ajax({
            url:'register_submit.php',
            type:'post',
            data:'&name='+name+'&email='+email+'&mobile='+mobile+'&password='+password,
            success:function(result){
                if(result=='email_present'){
                  jQuery('#email_error').html('Email is already present');
                }
                if(result=='email_mobile'){
                  jQuery('#mobile_error').html('Mobile already present');
                }
                if(result=='succfull'){
                  jQuery('.register_msg p').html('Thank you for registeration');
                }
            }
        });

    }
}




function user_login(){
  
  jQuery('.field_error').html('');
    var email=jQuery("#login_email").val();
    var password=jQuery("#login_password").val();
    var is_error="";

    
    if(email==""){
        jQuery('#login_email_error').html("place Enter email");
        is_error='yes';
    }
    if(password==""){
        jQuery('#login_password_error').html("place Enter password");
        is_error='yes';
    }
     if(is_error==''){
        jQuery.ajax({
            url:'login_submit.php',
            type:'post',
            data:'email='+email+'&password='+password,
            success:function(result){
                if(result=='wrong'){
                  jQuery('.login_msg p').html('Place Enter correct Details');
                }
                if(result=='right'){
                  window.location.href=window.location.href;
                }
            }
        });

    }
}



function manage_cart(pid,type){
    if(type=='update'){
       var qty=jQuery("#"+pid+"qty").val(); 
    }else{
       var qty=jQuery("#qty").val(); 
    }
    jQuery.ajax({
        url:'manage_card.php',
        type:'post',
        data:'pid='+pid+'&qty='+qty+'&type='+type,
        success:function(result){
            if(type=='update' || type=='remove'){
                window.location.href= window.location.href;
              }
              if(result=='Not_Avaliable')
              {
                alert('Qty not Avaliable')
              }
              else
              {
                jQuery('.htc__qua').html(result);
              }
              
            }
        });
}

function sort_product_drop(cat_id,site_path){
    var sort_product_id=jQuery('#sort_product_id').val();
    window.location.href=site_path+"front/categories.php?id="+cat_id+"&sort="+sort_product_id;
}

function wishlist_manage(pid,type){
    jQuery.ajax({
        url:'wishlist_manage.php',
        type:'post',
        data:'pid='+pid+'&type='+type,
        success:function(result){
            if(result=='not_login'){
               window.location.href='login.php';
              }else{
                jQuery('.htc__wishlist').html(result);
              }
            }
        });

}

