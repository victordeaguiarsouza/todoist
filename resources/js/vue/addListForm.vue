<template>
    <div class="addList">
        <input type="text" v-model="list.name" autofocus placeholder="Criar Nova Lista"/>
        <input type="hidden" id="user-id" value="14" />
        <font-awesome-icon 
            icon="plus-square"
            @click="addList()"
            :class="[list.name ? 'active' : 'inactive', 'plus']"
        />
        <FlashMessage :position="'right top'"></FlashMessage>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                list: {
                    name: ""
                }
            }
        },
        methods: {
            addList() {
                if(this.list.name == ''){ 
                    console.log('nome vazio'); 
                    return; 
                }

                axios.post('api/list/store', {
                        user_id : document.getElementById('user-id').value,
                        name    : this.list.name,
                })
                .then(response => {

                    if(response.data.done){
                        
                        this.list.name = "";
                        
                        this.flashMessage.success({
                            title: 'Success',
                            message: response.data.message,
                            time: 4000,
                            flashMessageStyle: {
                                backgroundColor: 'linear-gradient(#e66465, #9198e5)'
                            }
                        });


                    }else{
                        this.flashMessage.error({title: 'Error', message: response.data.message, time: 4000});    
                    }
                    
                    this.$emit('reloadlist');
                    //this.$emit('itemchanged');
                })
                .catch(error => {
                    console.log(error);
                    this.flashMessage.error({title: error.name || 'Error', message: error.message});
                });
            } 
        }
    }
</script>

<style scoped>

.addList {
    display: flex;
    justify-content: center;
    align-items: center;
}

input {
    background: #f7f7f7;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 100%;
}

.plus {
    font-size: 20px;
}

.active {
    color: #00CE25;
}

.inactive {
    color: #999999;
}
</style>