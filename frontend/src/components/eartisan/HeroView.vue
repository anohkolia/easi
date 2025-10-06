<script setup lang="ts">
import { onMounted, ref } from 'vue'

// Animation state
const isVisible = ref(false)

onMounted(() => {
  // Trigger animations after component mount
  setTimeout(() => {
    isVisible.value = true
  }, 100)
})
</script>

<template>
  <section
    class="relative mt-17 pt-5 bg-gradient-to-br from-[#088178]/5 via-[#088178]/10 to-[#088178] text-gray-900 overflow-hidden"
  >
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
      <div
        class="absolute inset-0"
        style="
          background-image: url('data:image/svg+xml,%3Csvg width=%2260%22 height=%2260%22 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23ffffff%22 fill-opacity=%220.1%22%3E%3Ccircle cx=%2230%22 cy=%2230%22 r=%222%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');
        "
      ></div>
    </div>

    <div class="container relative max-w-7xl mx-auto px-4 py-5 lg:pb-30">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <!-- Contenu texte -->
        <div class="space-y-4">
          <div class="space-y-3">
            <h1 class="text-4xl md:text-5xl lg:text-5xl font-bold leading-tight">
              Trouvez l'artisan
              <span class="text-[#EF7900]">parfait</span>
              près de chez vous
            </h1>
            <p class="text-xl text-gray-600 leading-relaxed">
              Connectez-vous avec des artisans qualifiés et de confiance pour tous vos projets de
              rénovation, construction et réparation. Devis gratuits et interventions rapides.
            </p>
          </div>

          <!-- Features -->
          <div class="grid sm:grid-cols-3 gap-6">
            <div class="flex items-center space-x-3">
              <div
                class="flex-shrink-0 w-10 h-10 bg-[#EF7900] rounded-full flex items-center justify-center"
              >
                <i class="fas fa-certificate text-white"></i>
              </div>
              <div>
                <p class="font-semibold">Artisans certifiés</p>
                <p class="text-sm text-[#088178]">Vérifiés et qualifiés</p>
              </div>
            </div>
            <div class="flex items-center space-x-3">
              <div
                class="flex-shrink-0 w-10 h-10 bg-[#EF7900] rounded-full flex items-center justify-center"
              >
                <i class="fas fa-clock text-white"></i>
              </div>
              <div>
                <p class="font-semibold">Intervention rapide</p>
                <p class="text-sm text-[#088178]">Sous 24h</p>
              </div>
            </div>
            <div class="flex items-center space-x-3">
              <div
                class="flex-shrink-0 w-10 h-10 bg-[#EF7900] rounded-full flex items-center justify-center"
              >
                <i class="fas fa-shield-alt text-white"></i>
              </div>
              <div>
                <p class="font-semibold">Garantie qualité</p>
                <p class="text-sm text-[#088178]">100% satisfait</p>
              </div>
            </div>
          </div>

          <!-- CTA Buttons -->
          <div class="flex flex-col sm:flex-row gap-4">
            <button
              class="bg-[#088178] hover:bg-[#EF7900]/5 hover:border-[#088178] hover:border-2 hover:text-[#088178] text-white font-bold py-4 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg"
            >
              <i class="fas fa-search mr-2"></i>
              Trouver un artisan
            </button>
            <button
              class="border-2 border-[#088178] hover:bg-[#088178] hover:text-white text-[#088178] font-bold py-4 px-8 rounded-lg transition-all duration-300"
            >
              <i class="fas fa-play mr-2"></i>
              Comment ça marche
            </button>
          </div>
        </div>

        <!-- Image/Illustration -->
        <div class="relative">
          <div class="relative z-10">
            <img
              src="@/assets/images/artisan/hero-artisan.jpg"
              alt="Artisan qualifiés au travail"
              class="rounded-xl shadow-2xl w-full h-auto object-cover"
              loading="lazy"
            />
          </div>
          <!-- Floating Cards -->
          <div
            class="absolute -top-4 -left-4 bg-white rounded-lg p-2 shadow-lg z-20 animate-bounce"
          >
            <div class="flex items-center space-x-2">
              <i class="fas fa-star text-yellow-400"></i>
              <span class="text-gray-800 font-semibold">4.9/5</span>
            </div>
            <p class="text-sm text-gray-600">Note moyenne</p>
          </div>
          <div
            class="absolute -bottom-4 -right-4 bg-white rounded-lg px-4 py-3 shadow-lg z-20 animate-pulse"
          >
            <div class="flex items-center">
              <div class="flex -space-x-2">
                <img
                  v-for="i in 4"
                  :key="i"
                  :src="`/src/assets/images/artisan/products/i${i}.png`"
                  class="w-10 h-10 rounded-full border-2 border-white bg-gray-200"
                  :alt="`Artisan ${i}`"
                />
              </div>
              <div class="ml-4">
                <!-- <i class="fas fa-users text-[#EF7900]"></i> -->
                <span class="text-gray-800 font-semibold">500+</span>
                <p class="text-sm text-gray-600">Artisans près de chez vous</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Wave Bottom -->
    <div class="absolute bottom-0 left-0 right-0">
      <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z"
          fill="white"
        />
      </svg>
    </div>
  </section>
</template>

<style scoped>
/* Animation d'entrée */
section {
  animation: fadeIn 0.8s ease-out;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in-up {
  animation: fadeInUp 0.6s ease-out forwards;
}

/* Style pour les images de placeholder */
img {
  background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
}
</style>
