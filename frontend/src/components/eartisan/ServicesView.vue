<script setup lang="ts">
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'

interface Service {
  title: string
  slug: string
  icon: string
}

const router = useRouter()

// Liste complète des services avec icônes Font Awesome
const allServices = ref<Service[]>([
  { title: 'Plomberie & Sanitaire', slug: 'plomberie-sanitaire', icon: 'fas fa-faucet' },
  { title: 'Peinture & Mur', slug: 'peinture-mur', icon: 'fas fa-paint-roller' },
  { title: 'Carrelage & Sol', slug: 'carrelage-sol', icon: 'fas fa-border-all' },
  { title: 'Serrurerie & Menuiserie', slug: 'serrurerie-menuiserie', icon: 'fas fa-key' },
  { title: 'Montage & Démontage', slug: 'montage-demontage', icon: 'fas fa-tools' },
  { title: 'Fixations & Poses', slug: 'fixations-poses', icon: 'fas fa-screwdriver' },
  { title: 'Entretien & Nettoyage', slug: 'entretien-nettoyage', icon: 'fas fa-broom' },
  { title: 'Déménagement', slug: 'demenagement', icon: 'fas fa-truck-moving' },
  { title: 'Climatisation', slug: 'climatisation', icon: 'fas fa-fan' },
  { title: 'TV, Informatique & Sécurité', slug: 'informatique', icon: 'fas fa-desktop' },
  { title: 'Electricité & Énergie', slug: 'electricite-energie', icon: 'fas fa-bolt' },
  { title: 'Electroménager', slug: 'electromenager', icon: 'fas fa-blender' },
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
  // Redirection vers la page de formulaire avec le service en paramètre
  router.push({
    name: 'ServiceForm',
    params: { serviceSlug: service.slug },
    query: { serviceName: service.title },
  })
}
</script>

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
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-10">
        <!-- Carte de service -->
        <div
          v-for="(service, index) in visibleServices"
          :key="index"
          class="bg-white p-6 rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 border-t-4 border-[#088178] group cursor-pointer relative overflow-hidden"
          @click="navigateToService(service)"
        >
          <!-- Effet de surbrillance au survol -->
          <div
            class="absolute inset-0 bg-gradient-to-b from-[#EF7900]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"
          ></div>

          <!-- Contenu avec icône à gauche -->
          <div class="flex items-start space-x-4 relative z-10">
            <!-- Icône Font Awesome -->
            <div
              class="w-12 h-12 bg-[#088178] bg-opacity-10 rounded-full flex items-center justify-center flex-shrink-0 group-hover:bg-opacity-20 transition-colors duration-300"
            >
              <i :class="service.icon" class="text-white text-lg"></i>
            </div>

            <!-- Titre et bouton -->
            <div class="flex-1 min-w-0">
              <h3
                class="text-lg font-semibold text-gray-800 mb-2 leading-tight group-hover:text-[#088178] transition-colors duration-300"
              >
                {{ service.title }}
              </h3>

              <div
                class="flex items-center text-[#088178] font-medium group-hover:text-[#EF7900] transition-colors duration-300"
              >
                <span class="mr-2">Voir les prix</span>
                <svg
                  class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5l7 7-7 7"
                  />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Bouton Voir plus -->
      <div class="text-center">
        <button
          v-if="showMoreButton"
          @click="loadMoreServices"
          class="inline-flex items-center px-6 py-3 bg-white border border-[#088178] text-[#088178] font-medium rounded-lg hover:bg-[#088178] hover:text-white hover:border-transparent transition-all duration-300"
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

<style scoped>
/* Animation des cartes */
.bg-white {
  transition: all 0.3s ease;
}

.bg-white:hover {
  transform: translateY(-5px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

/* Empêcher le texte de déborder */
.min-w-0 {
  min-width: 0;
}

/* Responsive */
@media (max-width: 1024px) {
  .lg\:grid-cols-4 {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (max-width: 768px) {
  .md\:grid-cols-3 {
    grid-template-columns: repeat(2, 1fr);
  }

  .bg-white {
    padding: 1.25rem;
  }
}

@media (max-width: 640px) {
  .sm\:grid-cols-2 {
    grid-template-columns: 1fr;
  }

  .flex.space-x-4 {
    flex-direction: column;
    align-items: flex-start;
  }

  .flex.space-x-4 > div:first-child {
    margin-bottom: 0.75rem;
  }
}

@media (max-width: 480px) {
  .bg-white {
    padding: 1rem;
  }

  .w-12.h-12 {
    width: 2.5rem;
    height: 2.5rem;
  }

  .text-lg {
    font-size: 1rem;
  }
}
</style>
