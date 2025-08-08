<script setup lang="ts">
import { ref, computed } from 'vue'
import { PhoneIcon, EnvelopeIcon, MapPinIcon, CheckCircleIcon } from '@heroicons/vue/24/outline'

// Interfaces
interface FooterLink {
  name: string
  href: string
}

interface SocialLink extends FooterLink {
  icon: any
}

// États réactifs
const newsletterEmail = ref('')
const emailError = ref('')
const isNewsletterLoading = ref(false)
const newsletterSuccess = ref(false)

// Année courante
const currentYear = computed(() => new Date().getFullYear())

// Liens de navigation
const aboutLinks: FooterLink[] = [
  { name: 'Qui sommes-nous', href: '/about' },
  { name: 'Notre mission', href: '/mission' },
  { name: 'Blog', href: '/blog' },
  { name: 'Presse', href: '/presse' },
  { name: 'Carrières', href: '/carrieres' },
]

const serviceLinks: FooterLink[] = [
  { name: 'Trouver un artisan', href: '/artisans' },
  { name: 'Demander un devis', href: '/devis' },
  { name: 'Espace professionnel', href: '/pro' },
  { name: "Sécuri'Travaux", href: '/securitravaux' },
  { name: 'Garanties', href: '/garanties' },
]

const supportLinks: FooterLink[] = [
  { name: 'FAQ', href: '/faq' },
  { name: 'Contact', href: '/contact' },
  { name: 'Aide', href: '/aide' },
  { name: 'Signaler un problème', href: '/signaler' },
  { name: 'Status', href: '/status' },
]

const socialLinks: SocialLink[] = [
  {
    name: 'Facebook',
    href: 'https://facebook.com/eartisan',
    icon: 'fab fa-facebook-f',
  },
  {
    name: 'Twitter',
    href: 'https://twitter.com/eartisan',
    icon: 'fab fa-x-twitter',
  },
  {
    name: 'LinkedIn',
    href: 'https://linkedin.com/company/eartisan',
    icon: 'fab fa-linkedin-in',
  },
  {
    name: 'Instagram',
    href: 'https://instagram.com/eartisan',
    icon: 'fab fa-instagram',
  },
]

// Méthodes
const validateEmail = (email: string): boolean => {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  return emailRegex.test(email)
}

const handleNewsletterSubmit = async () => {
  emailError.value = ''

  if (!newsletterEmail.value) {
    emailError.value = "L'email est requis"
    return
  }

  if (!validateEmail(newsletterEmail.value)) {
    emailError.value = "Format d'email invalide"
    return
  }

  isNewsletterLoading.value = true

  try {
    // Simulation d'appel API
    await new Promise((resolve) => setTimeout(resolve, 1500))

    newsletterSuccess.value = true
    newsletterEmail.value = ''

    // Masquer le message de succès après 3 secondes
    setTimeout(() => {
      newsletterSuccess.value = false
    }, 3000)
  } catch (error) {
    emailError.value = "Erreur lors de l'inscription. Veuillez réessayer."
  } finally {
    isNewsletterLoading.value = false
  }
}
</script>

<template>
  <footer class="bg-gray-900 text-white relative overflow-hidden">
    <!-- Éléments décoratifs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div
        class="absolute top-20 left-20 w-40 h-40 bg-[#088178] opacity-10 rounded-full blur-2xl"
      ></div>
      <div
        class="absolute bottom-20 right-20 w-32 h-32 bg-[#EF7900] opacity-10 rounded-full blur-2xl"
      ></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
      <!-- Section principale -->
      <div class="py-16 border-b border-gray-800">
        <div class="grid lg:grid-cols-5 gap-8">
          <!-- Marque et newsletter -->
          <div class="lg:col-span-2 space-y-6">
            <!-- Logo et tagline -->
            <div class="space-y-4">
              <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-[#088178] rounded-lg flex items-center justify-center">
                  <span class="text-white font-bold text-xl">e</span>
                </div>
                <span class="text-2xl font-bold">eartisan</span>
              </div>
              <p class="text-gray-400 text-sm leading-relaxed max-w-md">
                La plateforme de référence pour trouver des artisans qualifiés et réaliser vos
                travaux en toute confiance.
              </p>
            </div>

            <!-- Newsletter -->
            <div class="space-y-4">
              <h3 class="text-lg font-semibold">Restez informé</h3>
              <p class="text-gray-400 text-sm">
                Recevez nos conseils travaux et les dernières actualités
              </p>
              <form @submit.prevent="handleNewsletterSubmit" class="flex space-y-3">
                <div class="relative">
                  <input
                    v-model="newsletterEmail"
                    type="email"
                    placeholder="Votre adresse email"
                    required
                    class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-[#088178] focus:border-[#088178] text-white placeholder-gray-400 transition-all duration-300"
                  />
                  <div v-if="emailError" class="absolute -bottom-6 left-0 text-red-400 text-xs">
                    {{ emailError }}
                  </div>
                </div>
                <button
                  type="submit"
                  :disabled="isNewsletterLoading"
                  class="bg-[#EF7900] hover:bg-[#d96d00] text-white font-semibold px-6 py-3 rounded-lg transition-all duration-300 transform cursor-pointer hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none flex items-center justify-center gap-2"
                >
                  <span v-if="!isNewsletterLoading">S'abonner</span>
                  <div v-else class="flex items-center gap-2">
                    <div
                      class="animate-spin h-4 w-4 border-2 border-white border-t-transparent rounded-full"
                    ></div>
                    <span>Inscription...</span>
                  </div>
                </button>
              </form>

              <!-- Message de confirmation -->
              <Transition
                enter-active-class="transition duration-300 ease-out"
                enter-from-class="opacity-0 transform scale-95"
                enter-to-class="opacity-100 transform scale-100"
                leave-active-class="transition duration-200 ease-in"
                leave-from-class="opacity-100 transform scale-100"
                leave-to-class="opacity-0 transform scale-95"
              >
                <div
                  v-if="newsletterSuccess"
                  class="text-green-400 text-sm flex items-center gap-2"
                >
                  <CheckCircleIcon class="h-4 w-4" />
                  <span>Inscription réussie !</span>
                </div>
              </Transition>
            </div>
          </div>

          <!-- Liens -->
          <div class="lg:col-span-3 grid sm:grid-cols-3 gap-8">
            <!-- À propos -->
            <div class="space-y-4">
              <h3 class="text-lg font-semibold">À propos</h3>
              <ul class="space-y-3">
                <li v-for="link in aboutLinks" :key="link.name">
                  <a
                    :href="link.href"
                    class="text-gray-400 hover:text-[#088178] text-sm transition-colors duration-200 flex items-center gap-2 group py-0.5"
                  >
                    <span class="group-hover:translate-x-1 transition-transform duration-200">{{
                      link.name
                    }}</span>
                  </a>
                </li>
              </ul>
            </div>

            <!-- Services -->
            <div class="space-y-4">
              <h3 class="text-lg font-semibold">Services</h3>
              <ul class="space-y-3">
                <li v-for="link in serviceLinks" :key="link.name">
                  <a
                    :href="link.href"
                    class="text-gray-400 hover:text-[#088178] text-sm transition-colors duration-200 flex items-center gap-2 group py-0.5"
                  >
                    <span class="group-hover:translate-x-1 transition-transform duration-200">{{
                      link.name
                    }}</span>
                  </a>
                </li>
              </ul>
            </div>

            <!-- Support -->
            <div class="space-y-4">
              <h3 class="text-lg font-semibold">Support</h3>
              <ul class="space-y-3">
                <li v-for="link in supportLinks" :key="link.name">
                  <a
                    :href="link.href"
                    class="text-gray-400 hover:text-[#088178] text-sm transition-colors duration-200 flex items-center gap-2 group py-0.5"
                  >
                    <span class="group-hover:translate-x-1 transition-transform duration-200">{{
                      link.name
                    }}</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Section réseaux sociaux et contact -->
      <div class="py-8 border-b border-gray-800">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
          <!-- Informations de contact -->
          <div class="flex flex-col sm:flex-row gap-6 text-sm text-gray-400">
            <div class="flex items-center gap-2">
              <PhoneIcon class="h-4 w-4" />
              <span>01 23 45 67 89</span>
            </div>
            <div class="flex items-center gap-2">
              <EnvelopeIcon class="h-4 w-4" />
              <span>contact@eartisan.fr</span>
            </div>
            <div class="flex items-center gap-2">
              <MapPinIcon class="h-4 w-4" />
              <span>Paris, France</span>
            </div>
          </div>

          <!-- Réseaux sociaux -->
          <div class="flex items-center gap-4">
            <span class="text-sm text-gray-400">Suivez-nous :</span>
            <div class="flex gap-3">
              <a
                v-for="social in socialLinks"
                :key="social.name"
                :href="social.href"
                :aria-label="social.name"
                class="w-10 h-10 bg-gray-800 hover:bg-[#088178] rounded-lg flex items-center justify-center transition-all duration-300 transform hover:scale-110 group"
                target="_blank"
                rel="noopener"
              >
                <i
                  :class="[social.icon, 'h-5 w-5 text-gray-400 group-hover:text-white text-xl']"
                ></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<style scoped></style>
