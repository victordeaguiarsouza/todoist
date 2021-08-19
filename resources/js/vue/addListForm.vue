<template>
    <div class="addList">
        <input type="text" v-model="item.name" autofocus />
        <font-awesome-icon 
            icon="plus-square"
            @click="addList()"
            :class="[item.name ? 'active' : 'inactive', 'plus']"
        />
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                item: {
                    name: ""
                }
            }
        },
        methods: {
            addList() {
                if(this.item.name == ''){ 
                    console.log('nome vazio'); 
                    return; 
                }

                axios.post(
                    'api/list/store', 
                    this.item 
                )
                .then(response => {

                    if(response.status == 201){
                        this.item.name = "";
                    }

                })
                .catch(error => {
                    console.log(error);
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