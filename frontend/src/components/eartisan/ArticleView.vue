<script setup lang="ts">
import { ref, onMounted } from 'vue'

const steps = [
  {
    id: 'commande',
    title: 'Commande sécurisée',
    description: 'Paiement bloqué sur un compte sécurisé',
    icon: 'fa-check-circle',
    iconColor: 'text-[#088178]',
  },
  {
    id: 'travaux',
    title: 'Réalisation des travaux',
    description: "L'artisan intervient selon les termes convenus",
    icon: 'fa-clipboard-check',
    iconColor: 'text-[#088178]',
  },
  {
    id: 'validation',
    title: 'Validation client',
    description: 'Vous validez la bonne exécution des travaux',
    icon: 'fa-shield-alt',
    iconColor: 'text-[#088178]',
  },
  {
    id: 'paiement',
    title: 'Paiement débloqué',
    description: "L'artisan est payé après votre accord",
    icon: 'fa-money-bill-wave',
    iconColor: 'text-[#088178]',
  },
]

const animatedSteps = ref(steps.map(() => false))

const startAnimation = () => {
  steps.forEach((_, index) => {
    setTimeout(() => {
      animatedSteps.value[index] = true
    }, index * 200)
  })
}

onMounted(() => {
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          startAnimation()
          observer.unobserve(entry.target)
        }
      })
    },
    { threshold: 0.1 },
  )

  const section = document.getElementById('confiance-section')
  if (section) {
    observer.observe(section)
  }

  return () => {
    if (section) observer.unobserve(section)
  }
})
</script>

<template>
  <section id="confiance-section" class="py-16 bg-[#088178]/5">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          Sécuri'Travaux : la garantie de travaux bien faits
        </h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
          Notre système de paiement sécurisé protège votre argent jusqu'à la complète satisfaction
          de vos travaux.
        </p>
      </div>

      <!-- Timeline Desktop -->
      <div class="hidden md:block">
        <div class="relative">
          <!-- Ligne de progression -->
          <div
            class="absolute left-0 right-0 top-1/2 h-1 bg-gray-200 transform -translate-y-1/2 z-0"
          >
            <div
              class="h-full progress-bar bg-[#088178] transition-all duration-1000 ease-out"
              :style="{ width: `${animatedSteps.filter(Boolean).length * 25}%` }"
            ></div>
          </div>

          <div class="relative z-10 grid grid-cols-4 gap-8">
            <div v-for="(step, index) in steps" :key="step.id" class="flex flex-col items-center">
              <div
                class="w-16 h-16 rounded-full bg-white border-4 border-white flex items-center justify-center mb-4 shadow-md transition-all duration-300"
                :class="{
                  'scale-110': animatedSteps[index],
                  'border-[#088178]': animatedSteps[index],
                }"
              >
                <i :class="`${step.icon} fa-lg ${step.iconColor}`"></i>
              </div>
              <h3 class="text-xl font-semibold text-gray-900 mb-2 text-center">
                {{ step.title }}
              </h3>
              <p class="text-gray-600 text-center">
                {{ step.description }}
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Timeline Mobile -->
      <div class="md:hidden space-y-8">
        <div v-for="(step, index) in steps" :key="step.id" class="flex items-start gap-4">
          <div
            class="flex-shrink-0 w-12 h-12 rounded-full bg-white border-2 flex items-center justify-center mt-1 shadow-sm transition-all duration-300"
            :class="{
              'scale-110 border-[#088178]': animatedSteps[index],
            }"
          >
            <i :class="`${step.icon} ${step.iconColor}`"></i>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-gray-900 mb-1">
              {{ step.title }}
            </h3>
            <p class="text-gray-600">
              {{ step.description }}
            </p>
          </div>
        </div>
      </div>

      <div class="mt-16 bg-white rounded-xl shadow-sm p-6 md:p-8 max-w-4xl mx-auto">
        <div class="flex flex-col md:flex-row items-center gap-6">
          <div class="flex-shrink-0">
            <div class="w-16 h-16 bg-[#088178]/10 rounded-full flex items-center justify-center">
              <i class="fas fa-shield-alt fa-lg text-[#088178]"></i>
            </div>
          </div>
          <div class="text-center md:text-left">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Protection client et artisan</h3>
            <p class="text-gray-600 mb-4">
              eartisan agit comme intermédiaire de confiance entre vous et l'artisan. Le paiement
              est sécurisé retenu pendant 7 jours après la fin des travaux. Cette période permet de
              s'assurer que tout a été réalisé conformément au devis. En cas de litige, notre équipe
              intervient pour trouver une solution équitable.
            </p>
            <router-link
              to="/securitravaux"
              class="inline-flex items-center text-[#EF7900] hover:text-[#d6690a] font-medium transition-colors duration-200"
            >
              En savoir plus
              <i class="fas fa-arrow-right ml-2 text-sm"></i>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.scale-110 {
  transform: scale(1.1);
}

.progress-bar {
  transition: width 1s ease-out;
}
</style>
