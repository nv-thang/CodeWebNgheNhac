$(document).ready(function(){
    
   if( $.cookies.test()){
              
       // ADMIN BLOCK       
       var bAdmin_v = $.cookies.get( 'b_Admin_visibility' );
       
       if(null == bAdmin_v){
           
           if($('.adminControl').hasClass('active'))
               $.cookies.set('b_Admin_visibility','visible');
           else
               $.cookies.set('b_Admin_visibility','hidden');
                      
       }else{
           
           if(bAdmin_v == 'visible')
               $('.adminControl').addClass('active');
           else
               $('.adminControl').removeClass('active');
           
       }
       
       // EOF ADMIN BLOCK
       
   }

});