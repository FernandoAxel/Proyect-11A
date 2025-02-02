<?php
if (!isset($_SESSION)) exit("<script>window.location.href = '../';</script>");
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Intercambiar navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" id="marca_del_producto"><?php echo NOMBRE_NEGOCIO ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                
                <li id="elem_inventarios"><a href="./inventarios"><i class="fa fa-book"></i> Inventarios</a></li>
                
    
                        
                        
                    </ul>
                </li>
            </ul>
           
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php inicia_sesion_segura();
                                                                                                                                        echo $_SESSION["nombre_de_usuario"] . " ";
                                                                                                                                        echo (intval($_SESSION["administrador"]) === 1) ? '<i class="fa fa-unlock"></i>' : '<i class="fa fa-lock"></i>'; ?>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a id="ajustes" href="./modulos/usuarios/cerrar_sesion.php"><i class="fa fa-sign-out"></i>
                                Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    $(document).ready(function() {
        comprobar_productos_con_existencia_minima();
        var veces_tocado = 0,
            ayudante_timeout;
        $("#marca_del_producto").click(function(e) {
            veces_tocado++;
            if (veces_tocado >= 3) {
                $("#modal_acerca_de").modal("show");
            }
            ayudante_timeout = setTimeout(function() {
                veces_tocado = 0;
                clearTimeout(ayudante_timeout);
            }, 500);
            e.preventDefault();
        });
    });

    function abrir_cajon() {
        console.info("Abriendo cajón...");
        $.get("./modulos/abrir_cajon.php");
    }
</script>

<div id="modal_acerca_de" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Acerca de</h4>
            </div>
          
            <div class="modal-footer">
                <div class="col-xs-12">
                    <button data-dismiss="modal" class="form-control btn btn-success">Cerrar</button>
                </div>

            </div>
        </div>
    </div>
</div>