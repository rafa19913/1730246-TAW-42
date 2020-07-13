<template>
  
<section class="top-bar animated-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.html">
                       
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <button>
                                    <a class="nav-link" href="/">Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </button>
                            </li>
                            <li class="nav-item">
                                   <button>
                                <a class="nav-link" data-toggle="modal" data-target="#modalIngresar">Ingresar</a>
                                </button>
                            </li>
                            <li class="nav-item">
                                   <button>
                                <a class="nav-link" data-toggle="modal" data-target="#modalRegistrarme">Registrarme</a>
                               </button>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
</template>

<script>
export default {
     mounted() {
            console.log('Header Component mounted.')
    }
}
</script>

