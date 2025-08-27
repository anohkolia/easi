<template>
  <div class="min-h-screen bg-gray-50 flex flex-col">
    <!-- Header -->
    <header class="bg-white shadow-sm">
      <div class="container mx-auto px-4 py-4">
        <router-link to="/" class="flex items-center">
          <span class="text-2xl font-bold text-[#088178]">eartisan</span>
        </router-link>
      </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center py-16">
      <div class="container mx-auto px-4 text-center">
        <!-- Illustration -->
        <div class="mb-8">
          <div class="w-48 h-48 mx-auto bg-[#088178] bg-opacity-10 rounded-full flex items-center justify-center">
            <svg class="w-24 h-24 text-[#088178]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.47.87-6.09 2.29M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 8v2m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
            </svg>
          </div>
        </div>

        <!-- Message d'erreur -->
        <h1 class="text-6xl md:text-8xl font-bold text-[#088178] mb-4">404</h1>
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-6">Page non trouvée</h2>
        
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
          Oups ! Il semble que la page que vous recherchez ait été déplacée, 
          supprimée ou n'existe pas. Nos artisans sont sur le coup pour réparer cela !
        </p>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
          <router-link 
            to="/"
            class="px-8 py-3 bg-[#EF7900] text-white font-medium rounded-lg hover:bg-[#d66800] transition-colors duration-300 flex items-center"
          >
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Retour à l'accueil
          </router-link>

          <router-link 
            to="/eartisan"
            class="px-8 py-3 border border-[#088178] text-[#088178] font-medium rounded-lg hover:bg-[#088178] hover:text-white transition-colors duration-300 flex items-center"
          >
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            Voir nos services
          </router-link>

          <button 
            @click="goBack"
            class="px-8 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors duration-300 flex items-center"
          >
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Retour en arrière
          </button>
        </div>

        <!-- Services populaires -->
        <div class="mt-16">
          <h3 class="text-xl font-semibold text-gray-800 mb-6">Services populaires</h3>
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
            <router-link 
              v-for="service in popularServices"
              :key="service.slug"
              :to="`/service/${service.slug}?serviceName=${encodeURIComponent(service.title)}`"
              class="p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 border-l-4 border-[#EF7900] text-center"
            >
              <i :class="service.icon" class="text-[#088178] text-xl mb-2"></i>
              <p class="text-sm font-medium text-gray-700">{{ service.title }}</p>
            </router-link>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
      <div class="container mx-auto px-4 text-center">
        <p class="text-gray-400">© {{ new Date().getFullYear() }} eartisan. Tous droits réservés.</p>
      </div>
    </footer>
  </div>
</template>

<script setup lang="ts">
import { useRouter } from 'vue-router';

const router = useRouter();

const popularServices = [
  { title: "Plomberie", slug: "plomberie-sanitaire", icon: "fas fa-faucet" },
  { title: "Électricité", slug: "electricite-energie", icon: "fas fa-bolt" },
  { title: "Peinture", slug: "peinture-mur", icon: "fas fa-paint-roller" },
  { title: "Déménagement", slug: "demenagement", icon: "fas fa-truck-moving" }
];

const goBack = () => {
  if (window.history.length > 1) {
    router.back();
  } else {
    router.push('/');
  }
};
</script>

<style scoped>
/* Animation douce pour les liens */
.router-link-active {
  @apply transform transition-transform duration-200;
}

.router-link-active:hover {
  @apply scale-105;
}

/* Responsive */
@media (max-width: 640px) {
  .grid-cols-2 {
    grid-template-columns: 1fr;
    gap: 0.75rem;
  }
  
  .flex-col {
    gap: 0.75rem;
  }
  
  .text-6xl {
    font-size: 4rem;
  }
}
</style>