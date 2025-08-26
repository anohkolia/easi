<script setup lang="ts">
import { ref, onMounted, computed } from 'vue'
import { useCountUp } from '../../composables/useAnimations'

// Configuration des statistiques
const STATS_CONFIG = {
  artisans: { target: 2500, duration: 2000, separator: ' ' },
  projects: { target: 15000, duration: 2500, separator: ' ' },
  satisfaction: { target: 98, duration: 1500 },
}

// Initialisation des compteurs
const { count: animatedArtisans, start: startArtisans } = useCountUp(STATS_CONFIG.artisans.target, {
  duration: STATS_CONFIG.artisans.duration,
  separator: STATS_CONFIG.artisans.separator,
  end: 0,
})

const { count: animatedProjects, start: startProjects } = useCountUp(STATS_CONFIG.projects.target, {
  duration: STATS_CONFIG.projects.duration,
  separator: STATS_CONFIG.projects.separator,
  end: 0,
})

const { count: animatedSatisfaction, start: startSatisfaction } = useCountUp(
  STATS_CONFIG.satisfaction.target,
  {
    duration: STATS_CONFIG.satisfaction.duration,
    end: 0,
  },
)

// Valeurs formatées
const formattedArtisans = computed(() => animatedArtisans.value.toLocaleString())
const formattedProjects = computed(() => animatedProjects.value.toLocaleString())

// Gestion des animations
const startAnimations = () => {
  setTimeout(startArtisans, 200)
  setTimeout(startProjects, 400)
  setTimeout(startSatisfaction, 600)
}

// Observation du scroll
onMounted(() => {
  const observer = new IntersectionObserver(
    (entries) => {
      if (entries[0].isIntersecting) {
        startAnimations()
        observer.disconnect()
      }
    },
    { threshold: 0.3, rootMargin: '0px 0px -100px 0px' },
  )

  const section = document.querySelector('#about-section')
  if (section) observer.observe(section)

  return () => observer.disconnect()
})

// Navigation
const handleBlogClick = () => {
  console.log('Navigation vers le blog')
  // Utilisez votre router ici si nécessaire
}
</script>

<template>
  <section id="about-section" class="py-16 bg-gray-50">
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
            <div
              class="absolute -bottom-6 -right-6 bg-[#EF7900] text-white p-4 rounded-lg shadow-lg animate-pulse-soft"
            >
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
            Nous mettons notre expertise et notre passion au service de votre satisfaction, en vous
            proposant un accompagnement personnalisé de A à Z.
          </p>

          <!-- Statistics -->
          <div class="grid grid-cols-3 gap-6 mb-8">
            <div class="text-center">
              <div class="text-3xl font-bold text-[#088178] mb-2">
                {{ formattedArtisans }}
              </div>
              <p class="text-sm text-gray-600">Artisans partenaires</p>
            </div>

            <div class="text-center">
              <div class="text-3xl font-bold text-[#088178] mb-2">
                {{ formattedProjects }}
              </div>
              <p class="text-sm text-gray-600">Projets réalisés</p>
            </div>

            <div class="text-center">
              <div class="text-3xl font-bold text-[#088178] mb-2">{{ animatedSatisfaction }}%</div>
              <p class="text-sm text-gray-600">Satisfaction client</p>
            </div>
          </div>

          <!-- CTA Button -->
          <div>
            <button
              class="inline-flex items-center px-6 py-3 bg-[#EF7900] text-white font-semibold rounded-lg hover:bg-[#d66800] transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl"
              @click="handleBlogClick"
            >
              <i class="fas fa-blog mr-2"></i>
              Nos conseils travaux
              <i class="fas fa-arrow-right ml-2"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
/* Animations personnalisées */
@keyframes pulse-soft {
  0%,
  100% {
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
