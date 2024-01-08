<script setup>

const props = defineProps({
    title: {
        type: String,
        default: 'Confirmer',
    },
    textColor: {
        type: String,
        default: '#3DD69A',
    },
    backgroundColor: {
        type: String,
        default: '#D8F7EA',
    },

});

</script>


<template>
        <div class="container-button">
            <p>{{ title }}</p>
        </div>
</template>

<style>


.container-button {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: v-bind(backgroundColor);
    color: v-bind(textColor);
    padding: 5px 10px;
    border-radius: 10px;
}

</style>