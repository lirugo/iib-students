//Hide nav-left bar by default
$('#sidebar').toggleClass('active');
//Hide/show nav-left bar by click
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});
//Rotate icon nav-left bar by click
$(".rotate").click(function(){
    $(this).toggleClass("down")  ;
})