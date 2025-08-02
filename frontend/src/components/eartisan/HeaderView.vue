<script setup lang="ts">
import { ref } from 'vue'

const navLinks = [
  { name: 'Accueil', href: '/' },
  { name: 'Trouver un artisan', href: '/artisans' },
  { name: 'Devis', href: '/devis' },
  { name: 'Blog', href: '/blog' },
  { name: 'Contact', href: '/contact' },
]

const mobileMenuOpen = ref(false)
</script>

<template>
  <header class="bg-white shadow sticky top-0 z-50">
    <nav class="container mx-auto px-4 flex items-center justify-between h-16">
      <!-- Logo -->
      <a href="/" class="flex items-center space-x-2">
        <div class="w-9 h-9 bg-[#088178] rounded-lg flex items-center justify-center">
          <span class="text-white font-bold text-xl">e</span>
        </div>
        <span class="text-xl font-bold text-gray-900">eartisan</span>
      </a>

      <!-- Navigation principale (desktop) -->
      <ul class="hidden md:flex items-center gap-8">
        <li v-for="link in navLinks" :key="link.name">
          <a
            :href="link.href"
            class="text-gray-700 hover:text-[#088178] font-medium transition-colors duration-200"
          >
            {{ link.name }}
          </a>
        </li>
      </ul>

      <!-- Actions à droite -->
      <div class="hidden md:flex items-center gap-4">
        <a
          href="/login"
          class="px-4 py-2 rounded-lg text-[#088178] font-semibold hover:bg-[#088178]/10 transition"
        >
          <i class="fa-regular fa-user mr-2"></i>Connexion
        </a>
        <a
          href="/register"
          class="px-4 py-2 rounded-lg bg-[#EF7900] text-white font-semibold hover:bg-[#d96d00] transition"
        >
          <i class="fa-solid fa-user-plus mr-2"></i>S'inscrire
        </a>
      </div>

      <!-- Burger menu (mobile) -->
      <button
        class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-100 transition"
        @click="mobileMenuOpen = !mobileMenuOpen"
        aria-label="Ouvrir le menu"
      >
        <i v-if="!mobileMenuOpen" class="fa-solid fa-bars text-2xl text-gray-700"></i>
        <i v-else class="fa-solid fa-xmark text-2xl text-gray-700"></i>
      </button>
    </nav>

    <!-- Menu mobile -->
    <transition name="fade">
      <div
        v-if="mobileMenuOpen"
        class="md:hidden bg-white border-t border-gray-100 shadow px-4 py-4"
      >
        <ul class="flex flex-col gap-4">
          <li v-for="link in navLinks" :key="link.name">
            <a
              :href="link.href"
              class="block text-gray-700 hover:text-[#088178] font-medium transition-colors duration-200"
              @click="mobileMenuOpen = false"
            >
              {{ link.name }}
            </a>
          </li>
        </ul>
        <div class="flex flex-col gap-2 mt-6">
          <a
            href="/login"
            class="px-4 py-2 rounded-lg text-[#088178] font-semibold hover:bg-[#088178]/10 transition flex items-center"
          >
            <i class="fa-regular fa-user mr-2"></i>Connexion
          </a>
          <a
            href="/register"
            class="px-4 py-2 rounded-lg bg-[#EF7900] text-white font-semibold hover:bg-[#d96d00] transition flex items-center"
          >
            <i class="fa-solid fa-user-plus mr-2"></i>S'inscrire
          </a>
        </div>
      </div>
    </transition>
  </header>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.2s;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
