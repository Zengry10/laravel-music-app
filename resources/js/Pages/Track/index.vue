<script setup>
import { defineProps, onMounted, ref, computed } from 'vue'
import NavBarLayout from '@/Layouts/NavBarLayout.vue'
import { Link } from '@inertiajs/vue3'
import Modal from '@/Components/Modal.vue';
import Button from '@/Components/Button.vue';
import { useForm } from '@inertiajs/vue3'



// import ref from 'vue'

const props = defineProps({
    tracks: Array
});


onMounted(() => {

});

const submitFormCreate = () => {
    form.post(route('track.store'))
};

const form = useForm({
  title: '',
  artist: '',
  image: '',
  music: '',
  display: true,
})

const search = ref("");
const tracksRef = ref(props.tracks);
const currentTrack = ref(null);
const audio = ref(null);
const toggleButtonPlay = ref(false)

const filteredTracks = computed(() => {
    return tracksRef.value.filter(
        (track) =>
            track.title.toLowerCase().includes(search.value.toLowerCase()) ||
            track.artist.toLowerCase().includes(search.value.toLowerCase())
    );
});

const playMusic = (track) => {
    const url = "/storage/" + track.music;


    if (!currentTrack.value) {
        audio.value = new Audio(url);
        audio.value.play();
    } else if (currentTrack.value !== track.uuid) {
        audio.value.pause();
        audio.value.src = url;
        audio.value.play();
    } else if (!audio.value.paused) {
        audio.value.pause();
    } else {
        audio.value.play();
    }

    currentTrack.value = track.uuid;
};


const isOpen = ref(false)

onMounted(() => {
    // Ajoute la propriété isHover à chaque track lors du montage du composant
    tracksRef.value = props.tracks.map(track => ({ ...track, isHover: false, isMusicPlaying: false }));
});

</script>


<template>
    <NavBarLayout>

        <template #title>
            <p>Mes musiques </p>
        </template>
            

        <template #action>
            <div class="container-input-add-track">
                <div
                    @click="isOpen = true"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                >
                    Ajouter une musique
                </div>
                <input
                    class="container-input-add-track__input"
                    v-model="search"
                    type="search"
                    placeholder="Search..."
                    />
            </div>
        </template>

        <template #content>
            <div class="container-track">
                <div
                    v-if="filteredTracks.length > 0"
                    class="container-track-inside" 
                    v-for="track in filteredTracks" 
                    :key="track.id"
                    @click="playMusic(track)"
                >
                <div
                    @mouseover="track.isHover = true"
                    @mouseleave="track.isHover = false"
                >  
                    <div
                        @click="track.isMusicPlaying = !track?.isMusicPlaying"
                        :style="{ backgroundImage: track?.image !== '' ? `url('/storage/${track.image}')` : 'url(https://avisdupublic.net/wp-content/uploads/2015/10/pnl-le-monde-chico.jpg)' }"
                        class="container-track__image"
                    >

                        <div
                            v-if="track.isHover"
                            class="container-track__image__button-play"
                            >
                            <svg v-if="track?.isMusicPlaying" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M15 19q-.825 0-1.412-.587T13 17V7q0-.825.588-1.412T15 5h2q.825 0 1.413.588T19 7v10q0 .825-.587 1.413T17 19zm-8 0q-.825 0-1.412-.587T5 17V7q0-.825.588-1.412T7 5h2q.825 0 1.413.588T11 7v10q0 .825-.587 1.413T9 19zm8-2h2V7h-2zm-8 0h2V7H7zM7 7v10zm8 0v10z"/></svg>
                            <svg v-else xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M8 17.175V6.825q0-.425.3-.713t.7-.287q.125 0 .263.037t.262.113l8.15 5.175q.225.15.338.375t.112.475q0 .25-.112.475t-.338.375l-8.15 5.175q-.125.075-.262.113T9 18.175q-.4 0-.7-.288t-.3-.712"/></svg>
                        </div>

                    </div>
                    <!-- <img class="container-track-inside__image" src="https://avisdupublic.net/wp-content/uploads/2015/10/pnl-le-monde-chico.jpg" alt=""> -->
                    <div class="container-track-inside__container-info">
                        <p class="text-xl text-red-400"> {{ track.title }}</p>
                        <p class="text-xl text-green-400"> {{ track.artist }}</p>
                    </div>
                </div>
                </div>
            </div>  
            <Modal
                :show = isOpen
                title="Création d'une musique"
            >

            <form>
                <div class="mb-4">
                    <label 
                        for="title" 
                        class="block text-gray-700 text-sm font-bold mb-2"
                    >
                        Titre
                    </label>
                    
                    <input 
                        v-model="form.title"
                        type="text" 
                        id="title" 
                        name="title" 
                        class="w-full border rounded-md p-2"
                    >
                </div>

                <div class="mb-4">
                    <label 
                        for="title" 
                        class="block text-gray-700 text-sm font-bold mb-2"
                    >
                        Artiste
                    </label>
                    <input 
                        v-model="form.artist"
                        type="text" 
                        id="artist" 
                        name="artist" 
                        class="w-full border rounded-md p-2"
                    >
                </div>

                <div class="mb-4">
                    <label 
                        for="image" 
                        class="block text-gray-700 text-sm font-bold mb-2"
                    >
                        Image
                    </label>
                    <input 
                        @input="form.image = $event.target.files[0]"
                        type="file" 
                        id="image" 
                        name="image" 
                        class="w-full border rounded-md p-2"
                    >
                </div>

                <div class="mb-4">
                    <label 
                        for="music" 
                        class="block text-gray-700 text-sm font-bold mb-2"
                    >
                        Music
                    </label>
                    <input 
                        @input="form.music = $event.target.files[0]"
                        type="file" 
                        id="music" 
                        name="music" 
                        class="w-full border rounded-md p-2"
                    >
                </div>

                <div class="mb-4">
                    <label 
                        for="display" 
                        class="block text-gray-700 text-sm font-bold mb-2"
                    >
                        Afficher
                    </label>
                    <select
                        v-model="form.display"
                        name="display" 
                        id=""
                    >
                        <option :value="true">Oui</option>
                        <option :value="false">Non</option>
                    </select>
                </div>

                <div v-if="successMessage" class="text-green-500">{{ successMessage }}</div>



                <div class="container-button-all">
                    <Button
                        @click="isOpen = false"
                        title="Fermer"
                        textColor="#FC8989"
                        backgroundColor="#FEDEDE"
                    />
                    <Button
                        @click="submitFormCreate"
                    />

                </div>
            </form>


            </Modal>
        </template>


    </NavBarLayout>



</template>

<style>

.container-track__image {
    width: 330px;
    height: 280px;
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container-track__image__button-play {
    width: 50px;
    height: 50px;
    background-color: #A238FF;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container-input-add-track__input {
    width: 30vh;
    border-radius: 10px;
    border: 1px solid #656d7a;
    padding: 10px;

}
.container-input-add-track {
    display: flex;
    gap: 10px;
}
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
    grid-template-columns: repeat(4, 1fr);
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


<!-- :href="route('tracks.show', {id: track.id})" -->

<!-- <img :src="`/storage/${track.image}`" alt=""> -->


