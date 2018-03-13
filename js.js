$( document ).ready(function() {
	$.fn.pressEnter = function(fn) {  

    return this.each(function() {  
        $(this).bind('enterPress', fn);
        $(this).keyup(function(e){
            if(e.keyCode == 13)
            {
              $(this).trigger("enterPress");
            }
        })
    });  
 }; 
	$('#password').pressEnter(function(){login();$('#password').focus();$('#password').blur()})
	$('#name').pressEnter(function(){login();$('#name').focus();$('#name').blur()})
  	$("#loginbutton").click(function()
    {
        login();
    });
});

function login()
    {
        var user = $("#name").val();
        var pass = $("#password").val();
        if (user==""||pass=="")
        {
            $.sweetModal({
                content: 'Tous les champs doivent être remplis.',
                icon: $.sweetModal.ICON_WARNING
            });
            return null;
        }
        $.post("login.php",{ user : user, pass : pass},function(answer){
        	if(answer=="2"){
                $.sweetModal({
                    content: "Identifiants ou mot de passe incorrects",
                    icon: $.sweetModal.ICON_WARNING
                });
        	}
            $.sweetModal({
                    content: answer,
                    icon: $.sweetModal.ICON_WARNING
                });
            return null;
        	
        })
    }