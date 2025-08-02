<script setup lang="ts">
import { ref, onMounted } from 'vue'
import api from '@/api/http.js'
import HomePage from '@/views/HomePage.vue'

const message = ref('Chargement...')

onMounted(async () => {
  const res = await api.get<{ message: string }>('/ping')
  message.value = res.data.message
})
</script>

<template>
  <main class="relative">
    <RouterView />
    <!-- Élément vide pour compenser la hauteur de la navbar en position fixe -->
    <div class="h-[72px] hidden" id="navbar-spacer"></div>

    <section class="text-gray-600 body-font">
      <div class="copyright text-center mt-8 text-[#088178]">
        <p>&copy; 2025 - EASI. Tous droits réservés.</p>
      </div>
    </section>
  </main>
</template>

<style scoped></style>
