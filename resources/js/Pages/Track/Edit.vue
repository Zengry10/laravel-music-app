<script setup>
import { ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import NavBarLayout from '@/Layouts/NavBarLayout.vue';

const props = defineProps({
    track: Object
});

const form = useForm({
    title: props.track.title,
    artist: props.track.artist,
    image: props.track.image,
    music: props.track.music,
    display: props.track.display,
});

const submit = (e) => {
    console.log(form);
    form.put(route('track.update', props.track.uuid));
};
</script>

<template>
    <Head title="Modifier une musique" />

    <NavBarLayout>
        <template #title>
            <p class="text-white">Modifier une musique</p>
        </template>
        <template #action>
            <Link
                :href="route('tracks.index')"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
            >
                Retour
            </Link>
        </template>
        <template #content>
            <form class="container-form" @submit.prevent="submit">
                <div class="mb-3">
                    <label class="block text-white text-sm font-bold mb-2" for="title">
                        Titre
                    </label>

                    <input
                        v-model="form.title"
                        id="title"
                        name="title"
                        :class="{ 'border-red-500': form.errors.title }"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline"
                        type="text"
                        placeholder="Title"
                    >

                    <p
                        v-if="form.errors.title"
                        class="text-red-500 text-xs italic"
                    >
                        {{ form.errors.title }}
                    </p>
                </div>

                <div class="mb-3">
                    <label class="block text-white text-sm font-bold mb-2" for="artist">
                        Artiste
                    </label>

                    <input
                        v-model="form.artist"
                        id="artist"
                        name="artist"
                        :class="{ 'border-red-500': form.errors.artist }"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline"
                        type="text"
                        placeholder="artist"
                    >
                    
                    <p
                        v-if="form.errors.artist"
                        class="text-red-500 text-xs italic"
                    >
                        {{ form.errors.artist }}
                    </p>
                </div>

                <div class="mb-3">
                    <label class="block text-white text-sm font-bold mb-1" for="display">
                        Afficher
                    </label>

                    <input
                        v-model="form.display"
                        id="display"
                        name="display"
                        class="shadow appearance-none border rounded w-[16px] py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline"
                        type="checkbox"
                    >
                </div>

                <div class="mb-3">
                    <label class="block text-white text-sm font-bold mb-2" for="image">
                        Miniature
                    </label>

                    <input
                        @input="form.image = $event.target.files[0]"
                        id="image"
                        type="file"
                        name="image"
                    >
                </div>

                <div class="mb-3">
                    <label class="block text-white text-sm font-bold mb-2" for="music">
                        Audio
                    </label>

                    <input
                        @input="form.music = $event.target.files[0]"
                        id="music"
                        name="music"
                        type="file"
                    >
                </div>

                <input
                    type="submit"
                    value="Modifier"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
            </form>

            <!-- <pre>{{ form }}</pre> -->
        </template>
    </NavBarLayout>
</template>

<style>

.container-form{
    height: 100vh;
}

</style>