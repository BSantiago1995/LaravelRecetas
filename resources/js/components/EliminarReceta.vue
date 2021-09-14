<template>
    <input type="submit" class="btn btn-danger d-block mt-1 w-100" value="Eliminar" v-on:click="eliminarReceta">
</template>

<script>
    
    export default {
        //permite recibir los parametros desde donde se envian en este caso el index
        //en el index se envia con - por buenas práticas mientras que la recepcion en camllo
        props:['recetasId'],
        //permite la visualizacion dentro de la consola
       /* mounted() {
            console.log('receta-id',this.recetaId);
        },*/
        methods:{
            eliminarReceta(){
                this.$swal({
                title: 'Desea eliminar la Receta',
                text: "Una vez eliminada no se puede recuperar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Deseo eliminar!',
                cancelButtonText:'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    //siempre con axios se envia parametros constantes 
                    const params={
                        id:this.recetasId
                    }                    
                    //axios envia una petición a la ruta, las comillas son invetidas por que es string // el params y methos son del web
                    axios.post(`/recetas/${this.recetasId}`,{params,_method:'delete'})
                    //axios maneja exepciones por lo que se debe definir al igual que un try-catch a diferencia que es then
                    .then(respuesta=>{
                         this.$swal(
                        'Eliminada!',
                        'La receta fue eliminada con exito!.',
                        'success'
                        ),
                        //$el selecciona el elemento y el parent es las etiquetas siempre llegar al padre
                        this.$el.parentElement.parentElement.parentElement.parentElement.parentElement.removeChild(
                            this.$el.parentElement.parentElement.parentElement.parentElement
                        );
                    })
                    .catch(error=>{
                        console.log(error);
                    })
                    
                }
                })
            }
        }
    }
</script>