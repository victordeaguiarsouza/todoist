<template>
    
    <div class="todoistContainer">
    
        <div class="heading">
            <add-list-form 
                v-on:reloadlist="getList()"
            />
        </div>
    
        <list-view 
            :lists="lists"
            v-on:reloadlist="getList()"
        />
    
    </div>

</template>

<script>
    
    import addListForm from "./addListForm.vue";
    import listView from "./listView.vue";

    export default {
        components: {
            addListForm,
            listView
        },
        data: function() {
            return {
                lists: []
            }
        },
        methods: {
            getList () {

                axios.get('api/list/by_user/14')
                .then(response => {
                    this.lists = response.data.data;

                    this.$emit('reloadlist');
                })
                .catch(erro => {
                    console.log(error);
                    this.flashMessage.error({title: error.name || 'Error', message: error.message});
                });
            }
        },
        created(){
            this.getList();
        }
    }
</script>

<style scoped>
/* 
.todoistContainer {
    width: 350px;
    margin: auto;
} */

.heading {
    background: #e6e6e6;
    padding: 10px;
    border-radius: 10px;
}

#title {
    text-align: center;
}
</style>