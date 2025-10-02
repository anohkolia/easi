<script setup lang="ts">
import { ref } from 'vue'
import SearchForm from '@/components/eartisan/SearchForm.vue'

const selectedJob = ref('')
const selectedLocation = ref('')

const jobCategories = [
  { value: 'plombier', label: 'Plombier' },
  { value: 'electricien', label: 'Électricien' },
  { value: 'peintre', label: 'Peintre' },
  { value: 'menuisier', label: 'Menuisier' },
  { value: 'carreleur', label: 'Carreleur' },
  { value: 'maçon', label: 'Maçon' },
]

const handleSearch = () => {
  console.log('Recherche lancée :', {
    job: selectedJob.value,
    location: selectedLocation.value,
  })
  // Émettre l'événement au parent si nécessaire
}
</script>

<template>
  <section class="bg-gray-50 pt-24 pb-6 md:pt-32">
    <div class="container mx-auto px-4">
      <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-12">
        <!-- Contenu texte -->
        <div class="lg:w-1/2 space-y-6">
          <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
            <span class="text-[#088178]">eartisan</span> : Des professionnels en un clic,
            <span class="text-[#088178]">eartisan</span> vous propose les meilleurs
          </h1>

          <p class="text-lg md:text-xl text-gray-600">
            eartisan vous offre de meilleures prestations et solutions pour faciliter votre
            quotidien
          </p>

          <div class="mt-8 space-y-4">
            <div class="flex items-center gap-3">
              <span
                class="bg-[#EF7900]/10 text-[#EF7900] px-3 py-1 rounded-full text-sm font-medium flex items-center"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-4 w-4 mr-1"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                  />
                </svg>
                Recommandé par la presse TV
              </span>
            </div>
          </div>
        </div>

        <!-- Image hero -->
        <div class="lg:w-1/2 mt-10 lg:mt-0">
          <div class="relative">
            <img
              src="@/assets/images/artisan/hero-artisan.jpg"
              alt="Artisans qualifiés au travail"
              class="w-full h-auto rounded-xl shadow-xl object-cover"
              loading="lazy"
            />
            <div class="absolute -bottom-4 -right-4 bg-white px-6 py-3 rounded-lg shadow-md">
              <div class="flex items-center">
                <div class="flex -space-x-2">
                  <img
                    v-for="i in 4"
                    :key="i"
                    :src="`@/assets/images/artisan/products/i-${i}.png`"
                    class="w-10 h-10 rounded-full border-2 border-white"
                    :alt="`Artisan ${i}`"
                  />
                </div>
                <div class="ml-4">
                  <p class="text-sm font-medium text-gray-900">+500 artisans</p>
                  <p class="text-xs text-gray-500">Disponibles près de chez vous</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Formulaire de recherche -->
    <div class="container mx-auto px-4 mt-12">
      <SearchForm
        size="large"
        @search="handleSearch"
        v-model:job="selectedJob"
        v-model:location="selectedLocation"
        :job-categories="jobCategories"
      />
    </div>
  </section>
</template>

<style scoped>
/* Animation d'entrée */
section {
  animation: fadeIn 0.8s ease-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Style pour les images de placeholder */
img {
  background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
}
</style>
