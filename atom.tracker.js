function build(mode){
   $('#log').load('log.php?mode='+mode);
   tally();
}
function tally(){
   $('#tally').load('log.php?mode=tally');
}

//####################################################################################
$(document).ready(function(){
   build('build');
   setInterval(function(){
      let mode = $('#btn-mode').data('mode');
      if(mode == ''){ build('build'); }else{build('restore'); }
   }, 30000);
   //############################## SUBMIT BUTTON #####################################################
   $('#form-new').submit(function(event){
      event.preventDefault();
      let form = $(this);
      let data = form.serialize();

      $.ajax({
         type:'GET',
         url:'log.php?mode=new',
         data:data,
         success:function(){
            build('build');
         }
      });
   });
   //############################## STOP BUTTON ######################################################
   $('#log').on('click', '.btn-stop', function(event){
      let id = $(this).data('id');
      event.preventDefault();
      $.ajax({
         type:'GET',
         url: 'log.php?mode=stop&id='+id,
         success:function(){
            build('build');
            button.disabled = true;
         }
      });
   });
   //############################## RESTORE BUTTON ######################################################
   $('#log').on('click', '.btn-restore', function(event){
      let id = $(this).data('id');
      $.ajax({
         type:'GET',
         url:'log.php?mode=status&id='+id,
         success:function(){
            build('restore');
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
            build('build');
         }
      });
   });
   //############################## RESTORE BUTTON ######################################################
   // VANILLA
   $('#btn-mode').on('click', function(event){
      event.preventDefault();
      let mode = $(this).data('mode');

      if(mode == 'restore'){
         build('restore');
         $('#lbl-mode').html('Live')
         $(this).data('mode', 'live')
      }else{
         build('build');
         $('#lbl-mode').html('Restore');
         $(this).data('mode', 'restore');
      }
   });

   // EVERY 30 SECONDS REFRESH PAGE SHOWING TASK THAT DONT HAVE A DATE_END
});