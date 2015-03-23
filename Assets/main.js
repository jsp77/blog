$('document').ready(function(){
    regWall();
    showProfile();
    newPostDisplay();
    $('.main_content').slideToggle();

    $("#createPost").click(function(){
            var postform = $('.new_dropdown');
            var postdata={
                title:postform.find("input[name=title]").val(),
                mini_content:postform.find("textarea[name=mini_content]").val(),
                content:postform.find("textarea[name=content]").val(),
                //confirm_password:postform.find("input[name=confirm_password]").val(),
                //email:postform.find("input[name=email]").val(),
            }
            $.ajax({
                url: '../actions/newPost.php',
                data: postdata, 
                dataType: 'json',
                cache: false,
                method: 'POST',
                success: function(data){ 
                        $('.displayPost').click();
                        $('.new_dropdown').slideUp();
                }
            });
        });
    

    $(".displayPost").click(function(){
        $.ajax({
            url: '../actions/getUserPost.php',
            dataType: 'json',
            cache: false,
            method: 'POST',
            success: function(data){ 
                if(data.success)
                {
                    $(".display_window > .display_content").html(data.html); 
                }
            }
        });
    });
});
function loginWall() {
    $('.left-wall').toggle({width:'toggle'});
    $('.right-wall').toggle({width:'toggle'});
}

function regWall() {
    $('.top-wall').toggle({height:'toggle'});
    $('.bottom-wall').toggle({height:'toggle'});
}
function showProfile() {
    $('.user_profile').slideToggle();
}
function newPostDisplay() {
        $('.main_content').slideDown();
        $('.new_dropdown').slideToggle();
        $('.display_window').slideUp();
}

function displayArea() {
        $('.main_content').slideDown();
        $('.new_dropdown').slideUp();
        $('.display_window').slideToggle();
}


