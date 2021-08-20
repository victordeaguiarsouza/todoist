<template>
    <div class="item">
        <input 
            type="checkbox"
            class="inputCheck"
        />
        <span class="itemText">{{item.list_name}}</span>
        <button @click="removeItem()" class="trashcan">
            <font-awesome-icon icon="trash" />
        </button>
    </div>
</template>

<script>
    export default {
        props: ['item'],
        methods: {
            removeItem(){

                axios.delete('api/list/'+this.item.id)
                .then(response => {

                    if(response.data.done){
                        this.$emit('itemchanged');
                    }
                    
                })
                .catch(error => {
                    console.log( error );
                });
            }
        }
    }
</script>

<style scoped>

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