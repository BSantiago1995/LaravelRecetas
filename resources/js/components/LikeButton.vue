<template>
    <div>
  <span class="like-btn" @click="likeReceta" :class="{'like-active':this.likes}"></span>
  <p>{{cantidadLikes}} Les gusto esta receta</p>
</div>
</template>
<script>

export default {
    props:['recetaId','likes','numLike'],
    data: function(){
            return{
                totalLikes:this.numLike
    }},
   methods: {
       likeReceta(){
     
        axios.post('/recetas/'+this.recetaId)
        .then(respuesta=>{
            if(respuesta.data.attached.length > 0){
                this.$data.totalLikes++;
            }else{
                this.$data.totalLikes--;
            }
        })
        .catch(error=>{
            this.$swal({
                    icon: 'error',
                    iconcolor:'#3b080b',
                    title: 'Oops...',
                    text: 'Aún no eres un usuario para dar like!',
                    footer: '<a href="/register">>>Registarte aquí<<</a>'
                    })
        });
       }
           
       
       
   },
   computed:{
       cantidadLikes:function(){
           return this.totalLikes;
       }
   },
}
</script>
