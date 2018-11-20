    function register()
    {
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var password = document.getElementById('password').value;
        var msg = document.getElementById('msgs');
        if(name.length<3)
        { 
            msg.className='alert-danger';
            msg.innerHTML = 'Name must be atleast 3 characters';
            return false;
            
        }
        else
        {
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".")
            if(atpos<1 || dotpos < atpos+2 || dotpos+2 >= email.length)
            {
                msg.className='alert-danger';
                msg.innerHTML = 'Invalid mail Id';
                return false;
                 
            }
            else
            {
                var number = parseInt(phone);
                if(!Number.isInteger(number) || phone.length != 10)
                {
                    msg.className='alert-danger';
                    msg.innerHTML = 'Invalid mobile number';
                     return false; 
                }
                else
                {
                    if(password.length<8)
                    {
                        msg.className='alert-danger';
                        msg.innerHTML = 'password atleast 8 characters';
                         return false;
                    }
                    else
                    {
                        
                        return true; 
                    }
                }
            }

        } 
    }

    function wishlist(x) 
{

        $.ajax({
            url: "wishlistAdd.php",
            type: "POST",
            data: {'productid': x },
            success: function (result) {
                notify(result);
    }                
        });
   function notify(result)
   {
    var msg = document.getElementById('wishlistNotification');
    if(result == 2){
      msg.innerHTML='<div class="alert alert-danger nortification animateOpen"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span><strong>Not added!</strong> <br>Sign in to add product to your wishlist</div>';
    }
    else if(result == 3)
    {
       msg.innerHTML='<div class="alert alert-success nortification animateOpen"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span><strong>Success!</strong> <br>Product added to your wishlist</div>';
    }
    else
    {
      msg.innerHTML='<div class="alert alert-success nortification animateOpen"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span><strong>Exist!</strong> <br>Product has already added to wishlist</div>';
    }
   }
}