

<template>
<section id="hero-area" >
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="block wow fadeInUp" data-wow-delay=".3s">
                
                <!-- Slider -->
                <section class="cd-intro">
                    <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s" >
                    <span>Busca cualquier </span><br>
                    <span class="cd-words-wrapper">
                        <b class="is-visible">Producto</b>
                        <b>Servicio</b>
                        <b>Empresa</b>
                        <b>Negocio</b>
                    </span>
                    </h1>
                </section> <!-- cd-intro -->
                    <!-- /.slider -->
                    <div>

                    <input class="input100" type="text" name="inputBuscar" placeholder="">
                    </div>
                    <br>
                    <button class="login100-form-btn">
                                Buscar
                    </button>
                    </div>
            </div>
        </div>
    </div>
</section><!--/#main-slider-->

</template>


<script>
    export default {
        mounted() {
            console.log('Buscador y mapa Component mounted.')
        }
    }
</script>
