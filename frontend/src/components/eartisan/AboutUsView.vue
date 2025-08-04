<script setup lang="ts">
import { ref, onMounted, computed } from 'vue'
import { useCountUp } from '../../composables/useAnimations'

// Statistiques cibles
const targetArtisans = 2500
const targetProjects = 15000
const targetSatisfaction = 98

// Références pour les compteurs
const artisansCounter = ref<HTMLElement>()
const projectsCounter = ref<HTMLElement>()
const satisfactionCounter = ref<HTMLElement>()

// Utilisation du composable pour les animations de compteur
const { count: animatedArtisans, start: startArtisans } = useCountUp(targetArtisans, {
  duration: 2000,
  separator: ' '
})

const { count: animatedProjects, start: startProjects } = useCountUp(targetProjects, {
  duration: 2500,
  separator: ' '
})

const { count: animatedSatisfaction, start: startSatisfaction } = useCountUp(targetSatisfaction, {
  duration: 1500
})

// Gestion du clic sur le blog
const handleBlogClick = () => {
  // Navigation vers le blog (à implémenter selon le router)
  console.log('Navigation vers le blog')
}

// Observer pour déclencher les animations au scroll
onMounted(() => {
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          // Démarrer les animations avec des délais échelonnés
          setTimeout(() => startArtisans(), 200)
          setTimeout(() => startProjects(), 400)
          setTimeout(() => startSatisfaction(), 600)

          // Arrêter l'observation une fois déclenchée
          observer.unobserve(entry.target)
        }
      })
    },
    {
      threshold: 0.3,
      rootMargin: '0px 0px -100px 0px'
    }
  )

  // Observer la section
  const section = artisansCounter.value?.closest('section')
  if (section) {
    observer.observe(section)
  }
})
</script>

<template>
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <!-- Image Section -->
        <div class="order-2 lg:order-1">
          <div class="relative">
            <img
              src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=800"
              alt="Équipe eartisan"
              class="rounded-xl shadow-lg w-full h-96 object-cover"
              loading="lazy"
            />
            <div class="absolute -bottom-6 -right-6 bg-[#EF7900] text-white p-4 rounded-lg shadow-lg">
              <i class="fas fa-heart text-2xl"></i>
            </div>
          </div>
        </div>

        <!-- Content Section -->
        <div class="order-1 lg:order-2">
          <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">
            Chez eartisan, on est passionné et on vous chouchoute
          </h2>

          <p class="text-lg text-gray-600 mb-8 leading-relaxed">
            Notre équipe d'experts s'engage à vous accompagner dans tous vos projets de travaux.
            Nous mettons notre expertise et notre passion au service de votre satisfaction,
            en vous proposant un accompagnement personnalisé de A à Z.
          </p>

          <!-- Statistics -->
          <div class="grid grid-cols-3 gap-6 mb-8">
            <div class="text-center">
              <div
                ref="artisansCounter"
                class="text-3xl font-bold text-[#088178] mb-2"
              >
                {{ animatedArtisans }}
              </div>
              <p class="text-sm text-gray-600">Artisans partenaires</p>
            </div>

            <div class="text-center">
              <div
                ref="projectsCounter"
                class="text-3xl font-bold text-[#088178] mb-2"
              >
                {{ animatedProjects }}
              </div>
              <p class="text-sm text-gray-600">Projets réalisés</p>
            </div>

            <div class="text-center">
              <div
                ref="satisfactionCounter"
                class="text-3xl font-bold text-[#088178] mb-2"
              >
                {{ animatedSatisfaction }}%
              </div>
              <p class="text-sm text-gray-600">Satisfaction client</p>
            </div>
          </div>

          <!-- CTA Button -->
          <div>
            <a
              href="#"
              class="inline-flex items-center px-6 py-3 bg-[#EF7900] text-white font-semibold rounded-lg hover:bg-[#d66800] transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl"
              @click.prevent="handleBlogClick"
            >
              <i class="fas fa-blog mr-2"></i>
              Nos conseils travaux
              <i class="fas fa-arrow-right ml-2"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
/* Animations personnalisées */
@keyframes pulse-soft {
  0%, 100% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.02);
  }
}

.animate-pulse-soft {
  animation: pulse-soft 2s ease-in-out infinite;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .grid-cols-3 {
    gap: 1rem;
  }

  .text-3xl {
    font-size: 1.5rem;
  }
}
</style>
