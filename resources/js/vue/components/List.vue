<template>
    <div>

        <o-modal v-model:active="confirmDeleteActive">

            <div class="p-4">
                <p>¿Seguro de eliminar?</p>
            </div>

            <div class="flex flex-row-reverse gap-2 bg-gray-400 p-3">
                <o-button variant="danger" @click="deletePost()">Eliminar</o-button>
                <o-button @click="confirmDeleteActive=false">Cancelar</o-button>                
            </div>   

            
        </o-modal>

        <h1>Listado de Posts</h1>

        <o-button iconLeft="plus" @click="$router.push({name:'save'})">Crear</o-button>

        <div class="mb-5"></div>

        <o-table :loading="isLoading" :data="posts.current_page && posts.data.length == 0 ? [] : posts.data">

            <o-table-column field="id" label="ID" numeric  v-slot="p">
                {{ p.row.id }}
            </o-table-column>

            <o-table-column field="name" label="Nombre"  v-slot="p">
                {{ p.row.name }}
            </o-table-column>

            <o-table-column field="posted" label="Posteado" v-slot="p">
                {{ p.row.posted }}
            </o-table-column>

            <o-table-column field="category" label="Categoria" v-slot="p">
                {{ p.row.category.title }}
            </o-table-column>

            <o-table-column field="created_at" label="Fecha" v-slot="p">
                {{ p.row.created_at }}
            </o-table-column>

            <o-table-column field="Slug" label="Acciones" v-slot="p">
                
                <router-link class="mr-3" :to="{name:'save', params:{'slug': p.row.slug}}">Editar</router-link>
                
                <o-button 
                    iconLeft="delete" 
                    size="small" 
                    variant="danger" 
                    @click="deletePostRow=p; confirmDeleteActive=true "
                >
                    Eliminar
                </o-button>

            </o-table-column>

        </o-table>

        <br/>

        <o-pagination
            v-if="posts.current_page && posts.data.length > 0"
        @change="updatePage"
            :total="posts.total"            
            v-model:current="currentPage"
            :range-before="2"
            :range-after="2"
            order="centered"
            size="small"
            :simple="false"
            :rounded="true"
            :per-page="posts.per_page"
        >
        </o-pagination>

    </div>
</template>

<script>
export default {

    data(){
        return{
            posts: [],
            isLoading: true,
            currentPage: 1,
            confirmDeleteActive: false,
            deletePostRow: ''
        }
    },

    methods:{

        updatePage(){
            setTimeout(this.listPage, 100)
        },

        listPage(){
            // console.log('click' + this.currentPage)

            const config = {
                // headers: { Authorization: `Bearer ${this.$cookies.get('auth').token}`}
                headers: { Authorization: "Bearer " + this.$root.token}
            }

            this.isLoading = true 
            
            this.$axios.get('/api/posts?page='+this.currentPage, config).then((res) => {
                this.posts = res.data

                console.log(this.posts)

                this.isLoading = false
            })
        },
        deletePost(){

            this.confirmDeleteActive = false

            this.posts.data.splice(this.deletePostRow.index, 1)

            const config = {
                // headers: { Authorization: `Bearer ${this.$cookies.get('auth').token}`}
                headers: { Authorization: "Bearer " + this.$root.token}
            }

            // console.log(row)

            // console.log(this.posts)

            this.$axios.delete('/api/posts/'+this.deletePostRow.row.id, config).then((res) => {
                //oruga mesage 
                this.$oruga.notification.open({
                    message: 'Registro eliminado',
                    variant: 'danger',
                    duration: 4000,
                    closable: true
                })
            })
        }
    },

    async mounted(){

        // console.log(this.$cookies.get('auth'))

        this.listPage()       
    }
}
</script>

