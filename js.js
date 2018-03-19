$( document ).ready(function() {
    $.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return decodeURI(results[1]) || 0;
    }
}
    $("#addbutton").click(function()
    {
        var table=$.urlParam('id');
        var str = $("#ajoutform").serialize();
        alert(str);
    });
    $("#deletebutton").click(function()
    {
        var selected = new Array();
        $("input:checkbox[name=delete]:checked").each(function() {
             selected.push($(this).val());
        });
        if(selected[0]==null)
        {
            $.sweetModal({
                    content: "Vous devez au moins cocher une ligne",
                    icon: $.sweetModal.ICON_WARNING
                });
            return null;
        }
        $.sweetModal.confirm('Ces données seront effaces', function() {
         
        var id=$.urlParam('id');
        $.post("model/delete.php",{selected:selected,id:id},function(answer)
        {
            if(answer=="1")
            {
                window.location.reload();
            }
            else{
                $.sweetModal({
                content: answer,
                icon: $.sweetModal.ICON_ERROR
            });
            }
        });
        
        });
    });
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
        	else if(answer=="1"){
        		location.href="main.php";
        	}
            else{
                $.sweetModal({
                    content: answer,
                    icon: $.sweetModal.ICON_WARNING
                });
            }
        })
    }