<template>
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <!-- Section Header -->
      <div class="text-center mb-12">
        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
          Pourquoi nous faire confiance ?
        </h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
          Découvrez les avantages qui font d'eartisan votre partenaire de confiance pour tous vos
          projets de travaux et rénovation.
        </p>
      </div>

      <!-- Features Grid -->
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
        <!-- Feature 1 -->
        <div
          class="text-center p-6 rounded-xl bg-gray-50 hover:bg-gray-100 transition-all duration-300 transform hover:scale-105"
        >
          <div
            class="w-16 h-16 bg-[#088178] rounded-full flex items-center justify-center mx-auto mb-4"
          >
            <i class="fas fa-shield-alt text-white text-2xl"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-3">Artisans certifiés</h3>
          <p class="text-gray-600">
            Tous nos artisans sont rigoureusement sélectionnés et certifiés pour garantir la qualité
            de leurs prestations.
          </p>
        </div>

        <!-- Feature 2 -->
        <div
          class="text-center p-6 rounded-xl bg-gray-50 hover:bg-gray-100 transition-all duration-300 transform hover:scale-105"
        >
          <div
            class="w-16 h-16 bg-[#EF7900] rounded-full flex items-center justify-center mx-auto mb-4"
          >
            <i class="fas fa-handshake text-white text-2xl"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-3">Garantie satisfaction</h3>
          <p class="text-gray-600">
            Nous nous engageons sur la qualité de nos prestations avec une garantie satisfaction
            client de 100%.
          </p>
        </div>

        <!-- Feature 3 -->
        <div
          class="text-center p-6 rounded-xl bg-gray-50 hover:bg-gray-100 transition-all duration-300 transform hover:scale-105"
        >
          <div
            class="w-16 h-16 bg-[#088178] rounded-full flex items-center justify-center mx-auto mb-4"
          >
            <i class="fas fa-clock text-white text-2xl"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-3">Intervention rapide</h3>
          <p class="text-gray-600">
            Nos équipes interviennent rapidement pour répondre à vos besoins dans les meilleurs
            délais.
          </p>
        </div>

        <!-- Feature 4 -->
        <div
          class="text-center p-6 rounded-xl bg-gray-50 hover:bg-gray-100 transition-all duration-300 transform hover:scale-105"
        >
          <div
            class="w-16 h-16 bg-[#EF7900] rounded-full flex items-center justify-center mx-auto mb-4"
          >
            <i class="fas fa-euro-sign text-white text-2xl"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-3">Tarifs transparents</h3>
          <p class="text-gray-600">
            Devis gratuits et détaillés, sans surprise. Nos tarifs sont clairs et compétitifs.
          </p>
        </div>

        <!-- Feature 5 -->
        <div
          class="text-center p-6 rounded-xl bg-gray-50 hover:bg-gray-100 transition-all duration-300 transform hover:scale-105"
        >
          <div
            class="w-16 h-16 bg-[#088178] rounded-full flex items-center justify-center mx-auto mb-4"
          >
            <i class="fas fa-tools text-white text-2xl"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-3">Matériaux de qualité</h3>
          <p class="text-gray-600">
            Nous utilisons uniquement des matériaux de première qualité pour assurer la durabilité
            de vos travaux.
          </p>
        </div>

        <!-- Feature 6 -->
        <div
          class="text-center p-6 rounded-xl bg-gray-50 hover:bg-gray-100 transition-all duration-300 transform hover:scale-105"
        >
          <div
            class="w-16 h-16 bg-[#EF7900] rounded-full flex items-center justify-center mx-auto mb-4"
          >
            <i class="fas fa-headset text-white text-2xl"></i>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-3">Support client 7j/7</h3>
          <p class="text-gray-600">
            Notre équipe support est disponible 7 jours sur 7 pour répondre à toutes vos questions.
          </p>
        </div>
      </div>

      <!-- Testimonials Section -->
      <div class="bg-gray-50 rounded-2xl p-8 lg:p-12">
        <div class="text-center mb-8">
          <h3 class="text-2xl font-bold text-gray-900 mb-4">Ce que disent nos clients</h3>
          <div class="flex justify-center mb-4">
            <div class="flex space-x-1">
              <i class="fas fa-star text-yellow-400 text-xl"></i>
              <i class="fas fa-star text-yellow-400 text-xl"></i>
              <i class="fas fa-star text-yellow-400 text-xl"></i>
              <i class="fas fa-star text-yellow-400 text-xl"></i>
              <i class="fas fa-star text-yellow-400 text-xl"></i>
            </div>
          </div>
          <p class="text-lg text-gray-600">
            "Service exceptionnel ! L'équipe eartisan a transformé notre maison avec un
            professionnalisme remarquable. Je recommande vivement !"
          </p>
          <div class="mt-4">
            <p class="font-semibold text-gray-900">Marie Dubois</p>
            <p class="text-gray-600">Cliente satisfaite</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'

// Animation pour les éléments au scroll
const features = ref<HTMLElement[]>([])

onMounted(() => {
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
          setTimeout(() => {
            entry.target.classList.add('animate-fade-in-up')
          }, index * 100)
        }
      })
    },
    {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px',
    },
  )

  // Observer tous les éléments de fonctionnalités
  const featureElements = document.querySelectorAll('.text-center.p-6')
  featureElements.forEach((el) => observer.observe(el))
})
</script>

<style scoped>
@keyframes fade-in-up {
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
  animation: fade-in-up 0.6s ease-out forwards;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .grid {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }

  .text-3xl {
    font-size: 1.875rem;
  }

  .lg\\:text-4xl {
    font-size: 2.25rem;
  }
}
</style>
