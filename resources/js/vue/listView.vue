<template>
    <div>
        <div v-for="(list, index) in lists" :key="index">
            <item-list 
                :item="list"
                class="task"
                v-on:itemchanged="$emit('reloadlist')"
            />
        </div>
    </div>
</template>

<script>

import itemList from "./itemList.vue";

export default {
    props: ['lists'],
    components: {
        itemList
    }
}

</script>

<style scoped>

.task {
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
</style>