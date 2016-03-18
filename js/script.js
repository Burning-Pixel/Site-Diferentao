/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$( document ).ready(function() {

    /* Scroll Animado */
    $('.cat_bt').click(function (){
        var coord_cnt = '#content_' + $(this).attr('id');
        var p = $(coord_cnt).offset().top -= 85;
        
        
        $('html, body').animate({
            scrollTop: p
        },1000);
    });
    
    
    /* Menu Fixo */
    $(function(){
        
        var valida = $('.cat_name').attr('id');
        
        if(valida != null){
            var nav = $('#menu_de_categorias'); 
            $(window).scroll(function () {
                if ($(this).scrollTop() > 430){
                    nav.addClass("menu_fixo");
                    $('#content_novidades').css('padding', 60);
                } else {
                    nav.removeClass("menu_fixo");
                    $('#content_novidades').css('padding', 0);
                }
            });    
        }
        
    }); 
    
    /* Colocar os inscrever-se das Mídias sociais */
    

});