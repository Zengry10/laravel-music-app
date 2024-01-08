<script setup>
import { defineProps, onMounted, ref } from 'vue'
import NavBarLayout from '@/Layouts/NavBarLayout.vue'
import { Link } from '@inertiajs/vue3'
import Modal from '@/Components/Modal.vue';
import Button from '@/Components/Button.vue';

// import ref from 'vue'

const props = defineProps({
    tracks: Array
});

onMounted(() => {
    console.log(props.tracks);

});

const isOpen = ref(false)

</script>


<template>
    <NavBarLayout>

        <template #title>
            <p>Mes musiques </p>
        </template>
            

        <template #action>
            <div
                @click="isOpen = true"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
            >
                Ajouter une musique
            </div>
            <p>Filtrer</p>
        </template>

        <template #content>
            <div class="container-track">
                <Link
                    :href="route('tracks.show', {id: track.id})"
                    class="container-track-inside" 
                    v-for="track in tracks" 
                    :key="track.id"
                >
                    <img class="container-track-inside__image" src="https://avisdupublic.net/wp-content/uploads/2015/10/pnl-le-monde-chico.jpg" alt="">

                    <div class="container-track-inside__container-info">
                        <p class="text-xl text-red-400"> {{ track.title }}</p>
                        <p class="text-xl text-green-400"> {{ track.artist }}</p>
                    </div>

                </Link>
            </div>  
            <Modal
                :show = isOpen
                title="Création d'une musique"
            >

            <form>
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
                    <input type="text" id="title" name="title" class="w-full border rounded-md p-2">
                </div>

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Artiste</label>
                    <input type="text" id="title" name="title" class="w-full border rounded-md p-2">
                </div>

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
                    <input type="text" id="title" name="title" class="w-full border rounded-md p-2">
                </div>

                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
                    <input type="text" id="title" name="title" class="w-full border rounded-md p-2">
                </div>

                <div class="container-button-all">
                    <Button
                        @click="isOpen = false"
                        title="Fermer"
                        textColor="#FC8989"
                        backgroundColor="#FEDEDE"
                    />
                    <Button/>

                </div>
            </form>


            </Modal>
        </template>


    </NavBarLayout>



</template>

<style>

.container-button-all {
    display: flex;
    justify-content: flex-end;
    margin-left: auto;
    gap: 10px;
    width: 15vh;
}

.container-track-inside__container-image {
    display: flex;
    justify-content: center;
    align-items: center;
}
.container-track {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    background-color: black;
}

.container-track-inside__container-info {
    display: flex;
    flex-direction: column;


}

.container-track-inside {
    display: flex;
    flex-direction: column;
    justify-content: center;
    border-radius: 10px;
    padding: 20px;
    cursor: pointer;
    border: 1px solid #656d7a;

}
.container-track-inside:hover {
    transition: all 0.2s ease-in-out;
    background-color: #101111;
}



</style>