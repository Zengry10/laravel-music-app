<script setup>
import { defineProps, onMounted } from 'vue'
import NavBarLayout from '@/Layouts/NavBarLayout.vue'
import {Link} from '@inertiajs/vue3'


const props = defineProps({
    tracks: Array
});

onMounted(() => {
    console.log(props.tracks);
});


</script>


<template>
    <NavBarLayout>

        <template #title>
            <p>Mon action</p>
        </template>
            

        <template #action>
            <Link 
            :href="route('tracks.index')"

            >Mes musiques</Link>
        </template>

        <template #content>
            
        </template>


    </NavBarLayout>



</template>

<style>


</style>