<template>
    
    <div class="todoistContainer">
    
        <div class="heading">
            <h2>Nova Lista</h2>
            <add-list-form />
        </div>
    
        <list-view />
    
    </div>

</template>

<script>
    
    import addListForm from "./addListForm.vue";
    import listView from "./listView.vue";

    export default {
        components: {
            addListForm,
            listView
        }    
    }
</script>

<style scoped>
/* .todoistContainer {
    width: 350px;
    margin: auto;
} */

.heading {
    background: #e6e6e6;
    padding: 10px;
}

#title {
    text-align: center;
}
</style>