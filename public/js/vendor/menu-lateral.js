$(document).ready(
    function () {
        $('.collapse')
            .on('shown.bs.collapse', function() {
                $(this)
                    .parent()
                    .find(".fa-angle-left")
                    .removeClass("fa-angle-left")
                    .addClass("fa-angle-down");
                    
            })
            .on('hidden.bs.collapse', function() {
                $(this)
                    .parent()
                    .find(".fa-angle-down")
                    .removeClass("fa-angle-down")
                    .addClass("fa-angle-left");
            });  
             
        /*
        $('.nav-item')
            .on('click',function(){
                $(this)
                    .addClass('active');
              });               
        */   
    }
);