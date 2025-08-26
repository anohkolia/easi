<template>
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <!-- Titre principal -->
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-[#088178] mb-3">
          Nos services les + demandés
        </h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
          <strong class="text-[#EF7900]">Nos Rock stars tout compris :</strong> main d'œuvre,
          fourniture, déplacement
        </p>
      </div>

      <!-- Grille de services - 4 colonnes -->
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-10">
        <!-- Carte de service -->
        <div
          v-for="(service, index) in visibleServices"
          :key="index"
          class="bg-white p-5 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border-t-4 border-[#088178] flex flex-col"
        >
          <h3 class="text-lg font-semibold text-gray-800 mb-3 flex-grow">{{ service.title }}</h3>
          <button
            class="self-start text-[#088178] font-medium hover:text-[#EF7900] transition-colors duration-300 flex items-center"
            @click="navigateToService(service)"
          >
            Voir les prix
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 5l7 7-7 7"
              />
            </svg>
          </button>
        </div>
      </div>

      <!-- Bouton Voir plus -->
      <div class="text-center">
        <button
          v-if="showMoreButton"
          @click="loadMoreServices"
          class="inline-flex items-center px-5 py-2.5 border border-[#088178] text-[#088178] font-medium rounded-lg hover:bg-[#088178] hover:text-white transition-colors duration-300"
        >
          Voir plus d'offres
          <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M19 9l-7 7-7-7"
            />
          </svg>
        </button>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue'

interface Service {
  title: string
  slug: string
}

// Liste complète des services
const allServices = ref<Service[]>([
  { title: "Plomberie & Sanitaire", slug: 'plomberie-sanitaire' },
  { title: "Peinture & Mur", slug: 'peinture-mur' },
  { title: 'Carrelage & Sol', slug: 'carrelage-sol' },
  { title: 'Serrurerie & Menuiserie', slug: 'serrurerie-menuiserie' },
  { title: "Montage & Démontage", slug: 'montage-demontage' },
  { title: 'Fixations & Poses', slug: 'fixations-poses' },
  { title: 'Entretien & Nettoyage', slug: 'eninstallationtretien-nettoyage' },
  { title: 'Déménagement', slug: 'demenagement' },
  { title: 'Climatisation', slug: 'climatisation' },
  { title: "TV, Informatique & Sécurité", slug: 'informatique' },
  { title: 'Electricité & Énergie', slug: 'electricite-energie' },
  { title: 'Electroménager', slug: 'electromenager' },
])

// Affichage paginé
const itemsPerPage = 8
const visibleCount = ref(itemsPerPage)

const visibleServices = computed(() => allServices.value.slice(0, visibleCount.value))
const showMoreButton = computed(() => visibleCount.value < allServices.value.length)

const loadMoreServices = () => {
  visibleCount.value += itemsPerPage
}

const navigateToService = (service: Service) => {
  console.log(`Navigation vers: ${service.slug}`)
  // router.push(`/services/${service.slug}`);
}
</script>

<style scoped>
/* Animation des cartes */
.bg-white {
  transition:
    transform 0.3s ease,
    box-shadow 0.3s ease;
}

.bg-white:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

/* Responsive */
@media (max-width: 768px) {
  .grid-cols-2 {
    gap: 0.75rem;
  }
}

@media (max-width: 480px) {
  .grid-cols-2 {
    grid-template-columns: 1fr;
  }
}
</style>
