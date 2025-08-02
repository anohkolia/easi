<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()
const isMobileMenuOpen = ref(false)

const toggleMobileMenu = () => {
  isMobileMenuOpen.value = !isMobileMenuOpen.value
}

const closeMobileMenu = () => {
  isMobileMenuOpen.value = false
}

const isActiveRoute = (path: string): boolean => {
  return route.path === path
}

const handleLogin = () => {
  // Émettre un événement ou naviguer vers la page de connexion
  console.log('Navigate to login')
  // router.push('/connexion')
}

const handleSignup = () => {
  // Émettre un événement ou naviguer vers la page d'inscription
  console.log('Navigate to signup')
  // router.push('/inscription')
}

// Fermer le menu mobile quand on clique ailleurs
const handleClickOutside = (event: Event) => {
  const target = event.target as HTMLElement
  const mobileMenu = document.getElementById('mobile-menu')
  const hamburgerButton = target.closest('button[aria-controls="mobile-menu"]')

  if (isMobileMenuOpen.value && !mobileMenu?.contains(target) && !hamburgerButton) {
    closeMobileMenu()
  }
}

// Fermer le menu mobile avec Escape
const handleKeyDown = (event: KeyboardEvent) => {
  if (event.key === 'Escape' && isMobileMenuOpen.value) {
    closeMobileMenu()
  }
}

onMounted(() => {
  document.addEventListener('click', handleClickOutside)
  document.addEventListener('keydown', handleKeyDown)
})

onUnmounted(() => {
  document.removeEventListener('click', handleClickOutside)
  document.removeEventListener('keydown', handleKeyDown)
})
</script>

<template>
  <header class="fixed top-0 left-0 right-0 z-50 bg-gray-900 shadow-sm border-b border-gray-100 font-poppins">
    <div class="container mx-auto px-4">
      <div class="flex items-center h-16">
        <!-- Logo (reste à gauche) -->
        <div class="flex-none">
          <router-link to="/" class="flex items-center space-x-2">
            <div class="w-10 h-10 bg-[#088178] rounded-lg flex items-center justify-center">
              <span class="text-white font-bold text-xl">e</span>
            </div>
            <span class="text-2xl font-bold text-white">eartisan</span>
          </router-link>
        </div>

        <!-- Conteneur flex pour aligner le reste à droite -->
        <div class="flex-1 flex items-center justify-end space-x-8">
          <!-- Navigation Desktop -->
          <nav class="hidden md:flex items-center space-x-8">
            <router-link
              to="/trouver-artisan"
              class="text-white hover:text-[#088178] transition-colors duration-300 font-medium"
              :class="{ 'text-[#EF7900]': isActiveRoute('/trouver-artisan') }"
            >
              Trouver un artisan
            </router-link>
            <router-link
              to="/demander-devis"
              class="text-white hover:text-[#088178] transition-colors duration-300 font-medium"
              :class="{ 'text-[#EF7900]': isActiveRoute('/demander-devis') }"
            >
              Demander un devis
            </router-link>
            <router-link
              to="/espace-professionnel"
              class="text-white hover:text-[#088178] transition-colors duration-300 font-medium"
              :class="{ 'text-[#EF7900]': isActiveRoute('/espace-professionnel') }"
            >
              Espace professionnel
            </router-link>
          </nav>

          <!-- Boutons Connexion/Inscription Desktop -->
          <div class="hidden md:flex items-center space-x-4">
            <button
              @click="handleLogin"
              class="text-white hover:text-[#088178] transition-colors duration-300 font-medium px-4 py-2 rounded-lg hover:bg-white/10"
            >
              Connexion
            </button>
            <button
              @click="handleSignup"
              class="bg-[#EF7900] text-white px-6 py-2 rounded-lg font-medium hover:bg-[#d6690a] transition-all duration-300 shadow-sm hover:shadow-md"
            >
              S'inscrire
            </button>
          </div>

          <!-- Menu Hamburger Mobile -->
          <button
            @click="toggleMobileMenu"
            class="md:hidden p-2 rounded-lg hover:bg-white/10 transition-colors duration-300"
            :aria-expanded="isMobileMenuOpen"
            aria-controls="mobile-menu"
            aria-label="Toggle navigation menu"
          >
            <div class="w-6 h-6 flex flex-col justify-center items-center">
              <span
                class="block w-6 h-0.5 bg-white transition-all duration-300"
                :class="{ 'rotate-45 translate-y-1.5': isMobileMenuOpen }"
              ></span>
              <span
                class="block w-6 h-0.5 bg-white mt-1 transition-all duration-300"
                :class="{ 'opacity-0': isMobileMenuOpen }"
              ></span>
              <span
                class="block w-6 h-0.5 bg-white mt-1 transition-all duration-300"
                :class="{ '-rotate-45 -translate-y-1.5': isMobileMenuOpen }"
              ></span>
            </div>
          </button>
        </div>
      </div>
    </div>

    <!-- Menu Mobile Overlay -->
    <Transition
      enter-active-class="transition-all duration-300 ease-out"
      enter-from-class="opacity-0 transform -translate-y-full"
      enter-to-class="opacity-100 transform translate-y-0"
      leave-active-class="transition-all duration-300 ease-in"
      leave-from-class="opacity-100 transform translate-y-0"
      leave-to-class="opacity-0 transform -translate-y-full"
    >
      <div
        v-if="isMobileMenuOpen"
        id="mobile-menu"
        class="md:hidden bg-[#088178] border-t border-gray-100 shadow-lg"
      >
        <nav class="px-4 py-6 space-y-4">
          <router-link
            to="/trouver-artisan"
            @click="closeMobileMenu"
            class="block text-white hover:text-[#EF7900] transition-colors duration-300 font-medium py-2"
            :class="{ 'text-[#EF7900]': isActiveRoute('/trouver-artisan') }"
          >
            Trouver un artisan
          </router-link>
          <router-link
            to="/demander-devis"
            @click="closeMobileMenu"
            class="block text-white hover:text-[#EF7900] transition-colors duration-300 font-medium py-2"
            :class="{ 'text-[#EF7900]': isActiveRoute('/demander-devis') }"
          >
            Demander un devis
          </router-link>
          <router-link
            to="/espace-professionnel"
            @click="closeMobileMenu"
            class="block text-white hover:text-[#EF7900] transition-colors duration-300 font-medium py-2"
            :class="{ 'text-[#EF7900]': isActiveRoute('/espace-professionnel') }"
          >
            Espace professionnel
          </router-link>

          <!-- Boutons Mobile -->
          <div class="pt-4 border-t border-gray-100 space-y-3">
            <button
              @click="handleLogin"
              class="w-full text-left text-white hover:text-[#EF7900] transition-colors duration-300 font-medium py-2"
            >
              Connexion
            </button>
            <button
              @click="handleSignup"
              class="w-full bg-[#EF7900] text-white px-4 py-3 rounded-lg font-medium hover:bg-[#d6690a] transition-colors duration-300"
            >
              S'inscrire
            </button>
          </div>
        </nav>
      </div>
    </Transition>
  </header>
</template>

<style scoped>
/* Si la classe font-poppins n'existe pas dans Tailwind, ajoutez ceci : */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');

.font-poppins {
  font-family: 'Poppins', sans-serif;
}
</style>
