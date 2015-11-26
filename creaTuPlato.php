<?php
        include $_SERVER['DOCUMENT_ROOT']."/header.php";
        include $_SERVER['DOCUMENT_ROOT']."/admin/conexion.php";
         

        $sqlAcompanamiento="SELECT * FROM creatuplatoacompanamiento"; 
        $resultAcompanamiento = mysqli_query($con,$sqlAcompanamiento);
              
        

        $sqlBase="SELECT * FROM creatuplatobase"; 
        $resultBase = mysqli_query($con,$sqlBase);
        
      
       
?>
        <div class="wrapper">
        
            <!-- Start main-header -->
            <header class="main-header" id="top">
                <?php
                    include $_SERVER['DOCUMENT_ROOT']."/carroCompra.php";
                ?> 
                <div class="logo-container light-shark-bg align-center">
                    <a href="#" class="logo">
                        <img src="img/logo/logo.png" alt="Marine Food Logo">
                    </a>
                </div><!-- /logo-container -->
                <div class="header-bottom-bar">
                </div><!-- /header-bottom-bar -->
            </header>
            <!-- End main-header -->

            <section class="store-items store-items-details">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">                        	
                            <div class="store-item store-item-detail row">                                
                            	<header class="section-title">
                                    <h1><span>Crea</span> Tu Plato</h1>
                                </header>
                                <?php $precio= include $_SERVER['DOCUMENT_ROOT']."/login/obtenerPrecioPedido.php";?>                                
                                <label class="col-md-8"><b>El precio del plato es de $<?php echo number_format($precio);?></b></label>	
                                <br><br><br>
                            	<div class="col-md-8">
                            		<div class="col-md-12">
                                		<label class="col-md-12"><b>Base</b></label>
                                		<br>
                                		<select class="form-control" name="base" id="base">
                                		<?php
                                			for ($i = 0; $i <$resultBase->num_rows; $i++) {         
         								    	$resultBase->data_seek($i);
            									$fila = $resultBase->fetch_assoc();                                
            									$nombreBase=$fila["nombre"];             
            									echo '<option value="'.$nombreBase.'">'.$nombreBase.'</option>';                               
        									}

                                		?>
                                   		</select>                                                                    
                                	</div>
                                	<br><br><br><br>
                                	<div class="col-md-12">
                                  		<label class="col-md-12"><b>Acompañamiento</b></label>
                                  		<br>
                                   		<select class="form-control" name="acompanamiento" id="acompanamiento">
                                   		<?php 
                                   			for ($i = 0; $i <$resultAcompanamiento->num_rows; $i++) {         
            									$resultAcompanamiento->data_seek($i);
            									$fila = $resultAcompanamiento->fetch_assoc();                                                               
            									$nombreAcompanamiento=$fila["nombre"];
            									echo '<option value="'.$nombreAcompanamiento.'">'.$nombreAcompanamiento.'</option>';
        									}

                                   		?>
                                   		</select>                                                                  
                                	</div>

                            	</div>
                                
                                <div class="col-md-4">

                                	<form class="food-order-form">
                                        <input type="text" name="cantidad" id="order-count" value="1">
                                        <?php
                                             echo '<input type="submit" value="Agregar" onclick="return funcionAgregar()">';
                                        ?>
                                    </form><!-- /food-order -->   
                                </div>
                                

                            </div><!-- /store-item -->
                        </div><!-- /col-md-12 -->                        
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>
            <section class="clients white-rock-bg">
                <div class="container">
                    <div class="clients-carousel grayscale-image row">
                     <?php
                        $sqlFotosPiePagina="SELECT * FROM fotos_productos";      
                
                        $resultFotosPiePagina = mysqli_query($con,$sqlFotosPiePagina);
                        $delay=0.2;
                        for ($x = 0; $x <$resultFotosPiePagina->num_rows; $x++) {

                            $resultFotosPiePagina->data_seek($x);
                            $resultadoImagenes = $resultFotosPiePagina->fetch_assoc();   
                            $ruta='admin/productos/'.$resultadoImagenes["ruta_foto"];
                            if($x==0){
                                echo '<div class="client-logo-container wow fadeInUp">';
                                    echo '<figure class="client-logo">';
                                        echo '<img src="'.$ruta.'" alt="Marine Food Clients" height="106px">';
                                    echo '</figure>';
                                echo '</div>';
                            }else{
                                echo '<div class="client-logo-container wow fadeInUp" data-wow-delay="'.$delay.'s">';
                                    echo '<figure class="client-logo">';
                                        echo '<img src="'.$ruta.'" alt="Marine Food Clients" height="106px">';
                                    echo '</figure>';
                                echo '</div>';
                                $delay=$delay+0.2;    
                            }
                             
                         }                        
                     ?>                                         
                    </div><!-- /row -->
                </div><!-- /contianer -->
            </section>

<script type="text/javascript">
    function funcionAgregar() {        
        var base = $("#base").val();
        var acompanamiento = $("#acompanamiento").val();
        var cantidad = $("#order-count").val();

        
            $.ajax({
                url: "/login/compra/agregarCreaTuPlatoBD.php", data: { "base": base ,"acompanamiento" : acompanamiento ,"cantidad" : cantidad},
                success: function (retorno) {  
                    actualizarCarro();
                    
                }
            });
              
            return false;
    }
 
        
</script> 

<?php
    include $_SERVER['DOCUMENT_ROOT']."/footer.php";
?>
