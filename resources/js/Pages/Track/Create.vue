<script setup>
import NavBarLayout from '@/Layouts/NavBarLayout.vue'
import { ref } from 'vue';
import axios from 'axios';

const trackForm = ref({
  title: '',
  artist: '',
  album: '',
  year: '',
});

const createTrack = async () => {
  try {
    const response = await axios.post('/api/tracks', trackForm.value);
    const createdTrack = response.data.track;

    // Mettez à jour l'interface utilisateur ou effectuez d'autres actions nécessaires ici

    console.log('Piste créée avec succès:', createdTrack);
  } catch (error) {
    console.error('Erreur lors de la création de la piste:', error);
    // Gérer les erreurs ici si nécessaire
  }
};
</script>


<template>
    <NavBarLayout>

        <template #title>
            <p>Mon action</p>
        </template>

            
        <template #action>

        </template>

        <template #content>

            <form @submit.prevent="createTrack" class="max-w-md mx-auto mt-8 p-4 bg-white shadow-md rounded">
                <h2 class="text-2xl font-semibold mb-4">Créer une nouvelle piste</h2>

                <!-- Titre -->
                <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre</label>
                <input v-model="trackForm.title" type="text" id="title" name="title" class="w-full border rounded-md p-2">
                </div>

                <!-- Artiste -->
                <div class="mb-4">
                <label for="artist" class="block text-gray-700 text-sm font-bold mb-2">Artiste</label>
                <input v-model="trackForm.artist" type="text" id="artist" name="artist" class="w-full border rounded-md p-2">
                </div>

                <!-- Album -->
                <div class="mb-4">
                <label for="album" class="block text-gray-700 text-sm font-bold mb-2">Album</label>
                <input v-model="trackForm.album" type="text" id="album" name="album" class="w-full border rounded-md p-2">
                </div>

                <!-- Année -->
                <div class="mb-4">
                <label for="year" class="block text-gray-700 text-sm font-bold mb-2">Année</label>
                <input v-model="trackForm.year" type="text" id="year" name="year" class="w-full border rounded-md p-2">
                </div>

                <!-- Bouton de soumission -->
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Créer la piste</button>
            </form>
            
        </template>


    </NavBarLayout>



</template>

<style>


</style>