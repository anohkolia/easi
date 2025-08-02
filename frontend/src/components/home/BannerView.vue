<script setup lang="ts">
import { ref } from 'vue'
// Importing banner images
import imgCommerce from '@/assets/images/home/Ba1.jpg'
import imgArtisan from '@/assets/images/home/f1.jpg'
import imgLibrairie from '@/assets/images/home/f2.jpg'

const banners = ref([
  {
    id: 1,
    title: 'E-COMMERCE',
    subtitle: 'Achetez en ligne facilement',
    image: imgCommerce,
  },
  {
    id: 2,
    title: 'E-ARTISAN',
    subtitle: 'Découvrez nos artisans locaux',
    image: imgArtisan,
  },
  {
    id: 3,
    title: 'E-LIBRAIRIE',
    subtitle: 'Explorez notre bibliothèque',
    image: imgLibrairie,
  },
])
</script>

<template>
  <section id="banner" class="py-10 px-10">
    <h2 class="text-3xl font-bold text-center mb-2 text-gray-800">Nos Services</h2>
    <p class="text-center text-gray-600 mb-8">Découvrez nos différentes offres</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div
        v-for="banner in banners"
        :key="banner.id"
        class="transform hover:scale-[1.02] bg-cover bg-center rounded-lg overflow-hidden relative h-64 group transition-all duration-500 hover:shadow-xl"
        :style="{ backgroundImage: `url(${banner.image})` }"
      >
        <div
          class="absolute inset-0 bg-black bg-opacity-30 group-hover:bg-opacity-20 transition-all duration-300"
        ></div>
        <div
          class="absolute bottom-6 left-6 text-white group-hover:translate-x-1 transition-transform duration-300"
        >
          <h2 class="text-2xl font-bold mb-1 drop-shadow-md">{{ banner.title }}</h2>
          <h3 class="text-lg font-medium drop-shadow-sm">{{ banner.subtitle }}</h3>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped></style>
