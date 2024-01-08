<script setup>
import NavBarLayout from '@/Layouts/NavBarLayout.vue'
import { defineProps, onMounted } from 'vue'

const props = defineProps({
    track: Array
});


onMounted(() => {
    console.log(props.track);
});
</script>

<template>
        <NavBarLayout>
        

            <template #title>
                
            </template>
                

            <template #action>

            </template>

            <template #content>
                <div class="container-track-unique">
                    <div class="container-track-unique__content">


                        <img src="https://avisdupublic.net/wp-content/uploads/2015/10/pnl-le-monde-chico.jpg" alt="">

                        <div class="container-track-inside__container-info">
                            <p class="text-xl text-red-400"> {{ track.title }}</p>
                            <p class="text-xl text-green-400"> {{ track.artist }}</p>
                        </div>
                    </div>
                </div>

            </template>
        </NavBarLayout>

    
</template>

<style>

.container-track-unique {
    background-color: black;
    display: flex;
    justify-content: center;
    height: 90vh;
}

.container-track-unique__content {
    display: flex;
    flex-direction: column;
}


.container-track-inside__container-info {
    display: flex;
    flex-direction: column;
}




</style>