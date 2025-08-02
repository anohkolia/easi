<script setup lang="ts">
import NavbarView from '@/components/home/NavbarView.vue'
import FooterView from '@/components/home/FooterView.vue'
import AccueilView from '@/components/home/AccueilView.vue'

import { onMounted, watch, ref } from 'vue'

const navbarSpacerVisible = ref(false)

const updateNavbarSpacer = () => {
  const spacer = document.getElementById('navbar-spacer')
  if (spacer) {
    if (window.scrollY > 50) {
      spacer.classList.remove('hidden')
    } else {
      spacer.classList.add('hidden')
    }
  }
}

onMounted(() => {
  window.addEventListener('scroll', updateNavbarSpacer)
})
</script>

<template>
  <main class="relative">
    <NavbarView />
    <!-- Élément vide pour compenser la hauteur de la navbar en position fixe -->
    <div class="h-[72px] hidden" id="navbar-spacer"></div>
    <AccueilView />
    <FooterView />
  </main>
</template>
