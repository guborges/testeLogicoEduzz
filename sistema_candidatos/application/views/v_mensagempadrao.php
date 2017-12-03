<div class="alert <?php echo $tipoMensagem; ?>">
    
    <?php echo $mensagem; ?>
    
</div>
   
<p>
   <?php 
        foreach($link as $link){
            echo $link . " | ";
        }
   
   ?>
    
</p>