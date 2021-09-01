<template>
    <div class="item">
        <input 
            type="checkbox"
            class="inputCheck"
            @change="updateCheck()"
        />
        <span :class="[isCheck ? 'completed' : '','itemText']">{{item.list_name}}</span>
        <button @click="removeItem()" class="trashcan">
            <font-awesome-icon icon="trash" />
        </button>
    </div>
</template>

<script>
    export default {
        props: ['item'],
        data: function() {
            return {
                isCheck: false
            }
        },
        methods: {
            updateCheck(){

                //Adicionei somente o efeito pois a modelagem está errada.
                //não precisaria da tabela 'lists'. Poderia usar somente 
                //a tabela 'tasks' e tratar tudo como task
                this.isCheck = !this.isCheck;

                /* axios.put('api/list/'+this.item.id, {
                
                    name      : this.item.name,
                    completed : this.item.completed
                
                }).then(response => {

                    if(response.data.done){
                        this.$emit('itemchanged');
                    }else{
                        this.flashMessage.error({title: error.name || 'Error', message: response.data.message});
                    }

                }).catch(error => {
                    console.log( error );
                    this.flashMessage.error({title: error.name || 'Error', message: error.message});
                }); */
            },
            removeItem(){

                axios.delete('api/list/'+this.item.id)
                .then(response => {

                    if(response.data.done){
                        this.$emit('itemchanged');
                    }else{
                        this.flashMessage.error({title: error.name || 'Error', message: response.data.message});
                    }
                    
                })
                .catch(error => {
                    console.log( error );
                    this.flashMessage.error({title: error.name || 'Error', message: error.message});
                });
            },
        }
    }
</script>

<style scoped>

.completed {
    text-decoration: line-through;
    color: #999999;
}
.itemText {
    width: 100%;
    margin-left: 15px;
}

.trashcan {
    background: #e6e6e6;
    border: none;
    color: #FF0000;
    outline: none;
    float: right;
    margin-right: 10px;
}

.item {
    border-radius: 10px;
}

.checkbox {
    margin-left: 10px;
}
</style>