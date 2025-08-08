<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()
const isMobileMenuOpen = ref(false)
const isScrolled = ref(false)

const toggleMobileMenu = () => {
  isMobileMenuOpen.value = !isMobileMenuOpen.value
}

const closeMobileMenu = () => {
  isMobileMenuOpen.value = false
}

const isActiveRoute = (path: string): boolean => {
  return route.path === path
}

const handleScroll = () => {
  isScrolled.value = window.scrollY > 50
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
  window.addEventListener('scroll', handleScroll)
  document.addEventListener('click', handleClickOutside)
  document.addEventListener('keydown', handleKeyDown)
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
  document.removeEventListener('click', handleClickOutside)
  document.removeEventListener('keydown', handleKeyDown)
})
</script>

<template>
  <header
    :class="[
      'fixed top-0 left-0 right-0 z-50 bg-gray-900 shadow-sm transition-all duration-300 font-poppins',
      isScrolled ? 'bg-gray-900/95 backdrop-blur-sm' : 'bg-gray-900',
    ]"
  >
    <div class="container mx-auto px-4">
      <div class="flex items-center h-16">
        <!-- Logo -->
        <div class="flex-none">
          <router-link to="/" class="flex items-center space-x-2">
            <img src="@/assets/images/logo-easi.png" class="h-15" alt="Logo EASI" />
          </router-link>
        </div>

        <!-- Conteneur flex pour aligner le reste à droite -->
        <div class="flex-1 flex items-center justify-end space-x-8">
          <!-- Navigation Desktop -->
          <nav class="hidden md:flex items-center space-x-12">
            <router-link
              to="/"
              class="text-white hover:text-[#088178] transition-colors duration-300 font-medium px-4"
              :class="{ 'text-[#EF7900]': isActiveRoute('/') }"
            >
              Accueil
            </router-link>
            <router-link
              to="/eartisan"
              class="text-white hover:text-[#088178] transition-colors duration-300 font-medium px-4"
              :class="{ 'text-[#EF7900]': isActiveRoute('/eartisan') }"
            >
              eartisan
            </router-link>
            <router-link
              to="/ecommerce"
              class="text-white hover:text-[#088178] transition-colors duration-300 font-medium px-4"
              :class="{ 'text-[#EF7900]': isActiveRoute('/ecommerce') }"
            >
              ecommerce
            </router-link>
            <router-link
              to="/elibrairie"
              class="text-white hover:text-[#088178] transition-colors duration-300 font-medium px-4"
              :class="{ 'text-[#EF7900]': isActiveRoute('/elibrairie') }"
            >
              elibrairie
            </router-link>
            <router-link
              to="/eimmobilier"
              class="text-white hover:text-[#088178] transition-colors duration-300 font-medium px-4"
              :class="{ 'text-[#EF7900]': isActiveRoute('/eimmobilier') }"
            >
              eimmobilier
            </router-link>
            <router-link
              to="/eagricole"
              class="text-white hover:text-[#088178] transition-colors duration-300 font-medium px-4"
              :class="{ 'text-[#EF7900]': isActiveRoute('/eagricole') }"
            >
              eagricole
            </router-link>
          </nav>

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
        <nav class="px-12 py-6 space-y-4">
          <router-link
            to="/"
            @click="closeMobileMenu"
            class="block text-white hover:text-[#EF7900] transition-colors duration-300 font-medium py-2"
            :class="{ 'text-[#EF7900]': isActiveRoute('/') }"
          >
            Accueil
          </router-link>
          <router-link
            to="/eartisan"
            @click="closeMobileMenu"
            class="block text-white hover:text-[#EF7900] transition-colors duration-300 font-medium py-2"
            :class="{ 'text-[#EF7900]': isActiveRoute('/eartisan') }"
          >
            eartisan
          </router-link>
          <router-link
            to="/ecommerce"
            @click="closeMobileMenu"
            class="block text-white hover:text-[#EF7900] transition-colors duration-300 font-medium py-2"
            :class="{ 'text-[#EF7900]': isActiveRoute('/ecommerce') }"
          >
            ecommerce
          </router-link>
          <router-link
            to="/elibrairie"
            @click="closeMobileMenu"
            class="block text-white hover:text-[#EF7900] transition-colors duration-300 font-medium py-2"
            :class="{ 'text-[#EF7900]': isActiveRoute('/elibrairie') }"
          >
            elibrairie
          </router-link>
          <router-link
            to="/eimmobilier"
            @click="closeMobileMenu"
            class="block text-white hover:text-[#EF7900] transition-colors duration-300 font-medium py-2"
            :class="{ 'text-[#EF7900]': isActiveRoute('/eimmobilier') }"
          >
            eimmobilier
          </router-link>
          <router-link
            to="/eagricole"
            @click="closeMobileMenu"
            class="block text-white hover:text-[#EF7900] transition-colors duration-300 font-medium py-2"
            :class="{ 'text-[#EF7900]': isActiveRoute('/eagricole') }"
          >
            eagricole
          </router-link>
        </nav>
      </div>
    </Transition>
  </header>
</template>

<style scoped>
/* Animation pour le menu mobile */
#mobile-menu {
  transition: all 0.3s ease;
}

/* Style des liens actifs */
.router-link-active {
  position: relative;
}

.router-link-active:not(.exact-active) {
  color: #088178;
}

.router-link-exact-active {
  color: #ef7900;
}

/* Effet de transition pour le header */
header {
  transition: all 0.3s ease;
}

/* Style pour le backdrop blur */
.backdrop-blur-sm {
  backdrop-filter: blur(8px);
}
</style>
