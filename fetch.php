<?php
    $output='';


if(isset($_POST['reli']))
{
    $religion=$_POST['reli'];
    
    if($religion=="hindhu")
{
                                                     
 $output='<label class="col-lg-3 col-form-label">Cast</label>
                                                <div class="col-lg-9">
                                                    <select class="select" name="cast" >
                                                        <option>Select</option>
                                                        <option>Nair</option>
                                                        <option>Ezhava</option>
                                                    </select> </div>
                                                     ';
             
           }
  else if($religion=="christian")
{ 
      
       $output='<label class="col-lg-3 col-form-label">Cast</label>
                                                <div class="col-lg-9">
                                                    <select class="select" name="cast" >
                                                    
                                                        <option>Nill</option>
                                                    </select> </div>
                                                     ';
                                                       
 } 
    else if($religion=="muslim")
{ 
      
       $output='<label class="col-lg-3 col-form-label">Cast</label>
                                                <div class="col-lg-9">
                                                    <select class="select" name="cast" >
                                                    
                                                        <option>others</option>
                                                        <option>Nill</option>
                                                    </select> </div>
                                                     ';
                                                       
 }  
 
else{
    $output = '<label class="col-lg-3 col-form-label">Cast</label>
                                                <div class="col-lg-9">
                                                    <select class="select" name="cast" >
                                                    
                                                        <option>Nill</option>
                                                    </select> </div> ';
    
}
}

echo $output;

?>