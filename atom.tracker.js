function build(){
   $('#log').load('log.php?mode=build');
   tally();
}
function tally(){
   $('#tally').load('log.php?mode=tally');
}
//####################################################################################
$(document).ready(function(){
   build();
   //############################## SUBMIT BUTTON ######################################################
   $('#form-new').submit(function(event){
      event.preventDefault();
      let form = $(this);
      let data = form.serialize();

      $.ajax({
         type:'GET',
         url:'log.php?mode=new',
         data:data,
         success:function(){
            build();
         }
      });
   });
   //############################## STOP BUTTON ######################################################
   $('#log').on('click', '.btn-stop', function(event){
      let id = $(this).data('id');

      $.ajax({
         type:'GET',
         url: 'log.php?mode=stop&id='+id,
         success:function(){
            build();
         }
      });
   });
   //############################## REMOVE BUTTON ######################################################
   $('#log').on('click', '.btn-remove', function(event){
      let id = $(this).data('id');
      event.preventDefault();

      $.ajax({
         type:'GET',
         url:'log.php?mode=remove&id='+id,
         success:function(){
            build();
         }
      });
   });
   //############################## REMOVE BUTTON ######################################################
   $('#restore a').trigger('click')({

   })
});