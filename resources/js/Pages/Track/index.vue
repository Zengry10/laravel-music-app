<script setup>
import { defineProps, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import NavBarLayout from '@/Layouts/NavBarLayout.vue'
import {Link} from '@inertiajs/vue3'

const props = defineProps({
    tracks: Array
});

onMounted(() => {
    console.log(props.tracks);
});



const goToDetail = (id) => {
    
}

console.log(props.tracks);
</script>


<template>
    <NavBarLayout>

        <template #title>
            <p>Mes musiques </p>
        </template>
            

        <template #action>
            <Link
                :href="route('tracks.create')"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
            >
                Ajouter une musique
            </Link>
            <p>Filtrer</p>
        </template>

        <template #content>
            <div class="container-track">
                <div  @click="goToDetail(track?.uuid)" class="container-track-inside" v-for="track in tracks" :key="track.id">
                    <img class="container-track-inside__image" src="https://avisdupublic.net/wp-content/uploads/2015/10/pnl-le-monde-chico.jpg" alt="">
                    <p class="text-4xl text-red-400"> {{ track.title }}</p>
                    <p class="text-4xl text-green-400"> {{ track.artist }}</p>
                </div>
            </div>
        </template>


    </NavBarLayout>



</template>

<style>
.container-track {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    background-color: black;
}

.container-track-inside {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: rgb(26, 23, 23);
    border-radius: 10px;
    padding: 20px;
    cursor: pointer;

}
.container-track-inside:hover {
    transition: all 0.3s ease-in-out;
    background-color: rgb(55, 48, 48);
}

.container-track-inside__image {
    width: 400px;
    height: 400px;
}

</style>